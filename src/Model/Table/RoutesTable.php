<?php
namespace App\Model\Table;

use App\Model\Entity\Route;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Routes Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Users
 */
class RoutesTable extends Table
{

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config)
	{
		parent::initialize($config);

		$this->table('routes');
		$this->displayField('id');
		$this->primaryKey('id');

		$this->addBehavior('Timestamp');

		$this->hasMany('Reservations', [
			'foreignKey' => 'route_id'
		]);

		$this->belongsToMany('Users', [
			'foreignKey' => 'route_id',
			'targetForeignKey' => 'user_id',
			'joinTable' => 'reservations'
		]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator)
	{
		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->requirePresence('source', 'create')
			->notEmpty('source');

		$validator
			->requirePresence('destination', 'create')
			->notEmpty('destination');

		$validator
			->time('hour')
			->requirePresence('hour', 'create')
			->notEmpty('hour');

		$validator
			->boolean('weekday')
			->requirePresence('weekday', 'create')
			->notEmpty('weekday');

		$validator
			->boolean('weekend')
			->requirePresence('weekend', 'create')
			->notEmpty('weekend');

		return $validator;
	}
}
