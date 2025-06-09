<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserBusiness Controller
 *
 * @property \App\Model\Table\UserBusinessTable $UserBusiness
 */
class UserBusinessController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->UserBusiness->find()
            ->contain(['Users', 'Businesses']);
        $userBusiness = $this->paginate($query);

        $this->set(compact('userBusiness'));
    }

    /**
     * View method
     *
     * @param string|null $id User Busines id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userBusines = $this->UserBusiness->get($id, contain: ['Users', 'Businesses']);
        $this->set(compact('userBusines'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userBusines = $this->UserBusiness->newEmptyEntity();
        if ($this->request->is('post')) {
            $userBusines = $this->UserBusiness->patchEntity($userBusines, $this->request->getData());
            if ($this->UserBusiness->save($userBusines)) {
                $this->Flash->success(__('The user busines has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user busines could not be saved. Please, try again.'));
        }
        $users = $this->UserBusiness->Users->find('list', limit: 200)->all();
        $businesses = $this->UserBusiness->Businesses->find('list', limit: 200)->all();
        $this->set(compact('userBusines', 'users', 'businesses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Busines id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userBusines = $this->UserBusiness->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userBusines = $this->UserBusiness->patchEntity($userBusines, $this->request->getData());
            if ($this->UserBusiness->save($userBusines)) {
                $this->Flash->success(__('The user busines has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user busines could not be saved. Please, try again.'));
        }
        $users = $this->UserBusiness->Users->find('list', limit: 200)->all();
        $businesses = $this->UserBusiness->Businesses->find('list', limit: 200)->all();
        $this->set(compact('userBusines', 'users', 'businesses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Busines id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userBusines = $this->UserBusiness->get($id);
        if ($this->UserBusiness->delete($userBusines)) {
            $this->Flash->success(__('The user busines has been deleted.'));
        } else {
            $this->Flash->error(__('The user busines could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
