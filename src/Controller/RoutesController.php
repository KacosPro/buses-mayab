<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Routes Controller
 *
 * @property \App\Model\Table\RoutesTable $Routes
 */
class RoutesController extends AppController
{

	public function index()
	{
		$routes = $this->paginate($this->Routes);

		$this->set(compact('routes'));
		$this->set('_serialize', ['routes']);
	}

	public function view($id = null)
	{
		$route = $this->Routes->get($id, [
			'contain' => ['Users']
		]);

		$this->set('route', $route);
		$this->set('_serialize', ['route']);
	}

	public function add()
	{
		$route = $this->Routes->newEntity();
		if ($this->request->is('post')) {
			$route = $this->Routes->patchEntity($route, $this->request->data);
			if ($this->Routes->save($route)) {
				$this->Flash->success(__('The route has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The route could not be saved. Please, try again.'));
			}
		}
		$users = $this->Routes->Users->find('list', ['limit' => 200]);
		$this->set(compact('route', 'users'));
		$this->set('_serialize', ['route']);
	}

	public function edit($id = null)
	{
		$route = $this->Routes->get($id, [
			'contain' => ['Users']
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$route = $this->Routes->patchEntity($route, $this->request->data);
			if ($this->Routes->save($route)) {
				$this->Flash->success(__('The route has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The route could not be saved. Please, try again.'));
			}
		}
		$users = $this->Routes->Users->find('list', ['limit' => 200]);
		$this->set(compact('route', 'users'));
		$this->set('_serialize', ['route']);
	}

	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$route = $this->Routes->get($id);
		if ($this->Routes->delete($route)) {
			$this->Flash->success(__('The route has been deleted.'));
		} else {
			$this->Flash->error(__('The route could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

	public function select()
	{
		$route = $this->Routes->newEntity();
		$sourceRoutes = $this->Routes->find('list', [
				'keyField' => 'source',
				'valueField' => 'source'
		]);
		$destinationRoutes = $this->Routes->find('list', [
				'keyField' => 'destination',
				'valueField' => 'destination'
		]);

		$this->set(compact('route', 'sourceRoutes', 'destinationRoutes'));
	}
}
