<?php

declare(strict_types=1);

namespace App\Controller;

use Exception;
use PhpParser\Node\Stmt\TryCatch;
use Authorization\Exception\ForbiddenException;
use Authorization\Exception\MissingIdentityException;

/**
 * Business Controller
 *
 * @property \App\Model\Table\BusinessTable $Business
 */
class BusinessController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $query = $this->Business->find();
        $business = $this->paginate($query);

        $this->set(compact('business'));
    }
    public function myBusiness()
    {
        $this->Authorization->skipAuthorization();
        $userId = $this->Authentication->getIdentity()->get('id');
        // Obtén el ID del usuario autenticado
        $query = $this->Business->find()
            ->matching('UserBusiness', function ($q) use ($userId) {
                return $q->where(['UserBusiness.user_id' => $userId]);
            });
        $business = $this->paginate($query);

        $this->set(compact('business'));
        return $this->render('my');
    }

    /**
     * View method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $busines = $this->Business->get($id, contain: []);
        $this->set(compact('busines'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        try {

            $this->Authorization->skipAuthorization();
            $busines = $this->Business->newEmptyEntity();
            if ($this->request->is('post')) {
                $busines = $this->Business->patchEntity($busines, $this->request->getData());
                $userId = $this->Authentication->getIdentity()->get('id'); // Obtener el ID del usuario auten
                // Crear asociación en UserBusiness con el rol 'owner'

                if ($this->Business->save($busines)) {
                    $userBusinessTable = $this->fetchTable('UserBusiness');
                    $userBusiness = $userBusinessTable->newEntity([
                        'user_id' => $userId,
                        'business_id' => $busines->id,
                        'role' => 'owner',
                    ]);
                    if ($userBusinessTable->save($userBusiness)) {
                        $this->Flash->success(__('El negocio se creo y tu eres el Propietario!.'));
                    } else {
                        $this->Flash->error(__('Ocurrio un error al guardar.'));
                    }


                    return $this->redirect(['action' => 'myBusiness']);
                }
                $this->Flash->error(__('El negocio no pudo ser guardado. Por favor, intentalo de nuevo.'));
            }
            $this->set(compact('busines'));
        } catch (Exception $error) {
            if ($error instanceof ForbiddenException) {
                $this->Flash->error('No tienes Permisos');
                return $this->redirect(['action' => 'myBusiness']);
            }
            if ($error instanceof MissingIdentityException) {
                $this->Flash->error('No estas registrado');
                return $this->redirect(['controller' => 'Pages', 'action' => 'display']);
            }

            dd($error);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $busines = $this->Business->get($id,  [
            'contain' => ['UserBusiness'],
        ]);
        $this->Authorization->skipAuthorization();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $busines = $this->Business->patchEntity($busines, $this->request->getData());
            $this->Authorization->authorize($busines, 'edit');
            if ($this->Business->save($busines)) {
                $this->Flash->success(__('The busines has been saved.'));

                return $this->redirect(['action' => 'myBusiness']);
            }

            $this->Flash->error(__('The busines could not be saved. Please, try again.'));
        }
        $this->set(compact('busines'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        try {

            $this->request->allowMethod(['post', 'delete']);
            $busines = $this->Business->get($id, [
                'contain' => ['UserBusiness'],
            ]);
            $this->Authorization->authorize($busines, 'delete');
            if ($this->Business->delete($busines)) {
                $this->Flash->success(__('El negocio se elimino.'));
            } else {
                $this->Flash->error(__('Por favor intentalo de vuelta.'));
            }

            return $this->redirect(['action' => 'myBusiness']);
        } catch (Exception $error) {
            if ($error instanceof ForbiddenException) {
                $this->Flash->error('No tienes Permisos');
                return $this->redirect(['action' => 'myBusiness']);
            }
            if ($error instanceof MissingIdentityException) {
                $this->Flash->error('No estas registrado');
                return $this->redirect(['controller' => 'Pages', 'action' => 'display']);
            }
            dd($error);
        }
    }
}
