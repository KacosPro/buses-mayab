<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 */
class ReservationsController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index()
	{
		if (!$this->Auth->user()) {
			return $this->redirect(['controller' => 'Routes', 'action' => 'select']);
		}

		$this->paginate = [
			'order' => ['Reservations.date' => 'DESC'],
			'contain' => ['Routes'],
			'conditions' => ['user_id' => $this->Auth->user('id')]
		];
		$reservations = $this->paginate($this->Reservations);

		$this->set(compact('reservations'));
		$this->set('_serialize', ['reservations']);
	}
}
