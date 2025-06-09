<?php

declare(strict_types=1);

namespace App\Controller;

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
        // dd($userId);
        // Obtén el ID del usuario autenticado
        $query = $this->Business->find()
            ->matching('UserBusiness', function ($q) use ($userId) {
                return $q->where(['UserBusiness.user_id' => $userId]);
            });
        $business = $this->paginate($query);

        $this->set(compact('business'));
        return $this->render('index');
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
        $busines = $this->Business->newEmptyEntity();
        if ($this->request->is('post')) {
            $busines = $this->Business->patchEntity($busines, $this->request->getData());
            if ($this->Business->save($busines)) {
                $this->Flash->success(__('The busines has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The busines could not be saved. Please, try again.'));
        }
        $this->set(compact('busines'));
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
        $busines = $this->Business->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $busines = $this->Business->patchEntity($busines, $this->request->getData());
            if ($this->Business->save($busines)) {
                $this->Flash->success(__('The busines has been saved.'));

                return $this->redirect(['action' => 'index']);
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
        $this->request->allowMethod(['post', 'delete']);
        $busines = $this->Business->get($id);
        if ($this->Business->delete($busines)) {
            $this->Flash->success(__('The busines has been deleted.'));
        } else {
            $this->Flash->error(__('The busines could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
