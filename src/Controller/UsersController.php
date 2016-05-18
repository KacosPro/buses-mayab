<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow();
	}

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index()
	{
		$users = $this->paginate($this->Users);

		$this->set(compact('users'));
		$this->set('_serialize', ['users']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$user = $this->Users->get($id, [
			'contain' => ['Routes']
		]);

		$this->set('user', $user);
		$this->set('_serialize', ['user']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->request->data['password'] !== $this->request->data['confirmPassword']) {
				$user = $this->Users->newEntity();
				$this->set(compact('user'));
				return $this->Flash->error(__('Las contraseñas no son las mismas'));
			}
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['controller' => 'Routes', 'action' => 'select']);
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$routes = $this->Users->Routes->find('list', ['limit' => 200]);
		$this->set(compact('user', 'routes'));
		$this->set('_serialize', ['user']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$user = $this->Users->get($id, [
			'contain' => ['Routes']
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->request->data['password'] !== $this->request->data['confirmPassword']) {
				$user = $this->Users->newEntity();
				$this->set(compact('user'));
				return $this->Flash->error(__('Las contraseñas no son las mismas'));
			}
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['controller' => 'Routes', 'action' => 'select']);
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$routes = $this->Users->Routes->find('list', ['limit' => 200]);
		$this->set(compact('user', 'routes'));
		$this->set('_serialize', ['user']);
	}

	public function login()
	{
		$this->request->session()->write('referer', $this->referer());
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
}
