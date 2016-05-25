<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

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
