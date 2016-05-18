<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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

	public function schedule()
	{
		if (!$this->request->is('post')) {
			return $this->redirect(['action' => 'select']);
		}

		if (empty($this->request->data)) {
			$this->Flash->error(__('Todos los campos deben estar llenos'));
			return $this->redirect(['action' => 'select']);
		}

		$sourceRoute = $this->request->data['sourceRoute'];
		$destinationRoute = $this->request->data['destinationRoute'];
		$date = $this->request->data['date'];
		if(date('w', strtotime($date)) == 6 || date('w', strtotime($date)) == 0)  {
			$routes = $this->Routes->find('all')->where([
				'source' => $sourceRoute,
				'destination' => $destinationRoute,
				'weekend' => 1
			]);
			$this->set('date');
			$this->set('routes', $this->paginate($routes));
		} else {
			$routes = $this->Routes->find('all')->where([
				'source' => $sourceRoute,
				'destination' => $destinationRoute,
				'weekday' => 1
			]);
			$this->set('date');
			$this->set('routes', $this->paginate($routes));
		}
	}

	public function purchase($id = null)
	{
		if (empty($this->request->data)) {
			throw new BadRequestException(__('Bad Request'));
		}
		$route = $this->Routes->get($id);
		$date = $this->request->data['date'];
		$reservations = $this->Routes->Reservations
			->find()
			->where(['route_id' => $id])
			->count();
		$seatsLeft = 20 - $reservations;

		$this->set(compact('route', 'date', 'seatsLeft'));
	}

	public function buy($id = null)
	{
		if (empty($this->request->data)) {
			return $this->redirect(['action' => 'select']);
		}
		$requestData = $this->request->data;
		$requestData['route_id'] = $id;
		if (!$this->Auth->user()) {
			return $this->redirect(['controller' => 'Users', 'action' => 'login']);
		}

		$reservations = $this->Routes->Reservations
			->find()
			->where(['route_id' => $id])
			->count();
		$seatsLeft = 20 - $reservations;

		$this->set(compact('requestData'));
	}

	public function confirm()
	{
		$request = $this->request->data;
		$this->request->session()->write('request', $request);
		$this->set(compact('request'));
	}

	public function sale()
	{

		if (!$this->request->is('post')) {
			return $this->redirect(['action' => 'select']);
		}

		$userId = $this->Auth->user('id');
		$routeId = $this->request->data['route_id'];
		$sourceRoute = $this->request->data['sourceRoute'];
		$destinationRoute = $this->request->data['destinationRoute'];
		$hour = $this->request->data['hour'];
		$date = str_replace(',', '', $this->request->data['date']);
		$data = [];
		if (isset($this->request->data['regular']) && !empty($this->request->data['regular'])) {
			foreach ($this->request->data['regular'] as $name) {
				$data[] = [
					'user_id' => $userId,
					'route_id' => $routeId,
					'passenger' => $name,
					'date' => $date,
					'price' => '250'
				];
			}
		}
		if (isset($this->request->data['half']) && !empty($this->request->data['half'])) {
			foreach ($this->request->data['half'] as $name) {
				$data[] = [
					'user_id' => $userId,
					'route_id' => $routeId,
					'passenger' => $name,
					'date' => $date,
					'price' => '125'
				];
			}
		}
		$reservations = TableRegistry::get('Reservations');
		$entities = $reservations->newEntities($data);
		foreach ($entities as $entity) {
			if (!$reservations->save($entity)) {
			 	return $this->redirect(['action' => 'select']);
			 }
		}

		$this->set(compact('data', 'sourceRoute', 'destinationRoute', 'hour'));
	}
}
