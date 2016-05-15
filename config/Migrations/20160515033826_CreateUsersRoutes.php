<?php
use Migrations\AbstractMigration;

class CreateUsersRoutes extends AbstractMigration
{
	/**
	 * Change Method.
	 *
	 * More information on this method is available here:
	 * http://docs.phinx.org/en/latest/migrations.html#the-change-method
	 * @return void
	 */
	public function change()
	{
		$table = $this->table('users_routes');
		$table->addColumn('user_id', 'uuid', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('route_id', 'string', [
			'default' => null,
			'limit' => 255,
			'null' => false,
		]);
		$table->addColumn('date', 'date', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('created', 'datetime', [
			'default' => null,
			'null' => false,
		]);
		$table->addColumn('modified', 'datetime', [
			'default' => null,
			'null' => false,
		]);
		$table->create();
	}
}
