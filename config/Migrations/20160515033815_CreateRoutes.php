<?php
use Migrations\AbstractMigration;

class CreateRoutes extends AbstractMigration
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
        $table = $this->table('routes');
        $table->addColumn('source', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('destination', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('hour', 'time', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('weekday', 'boolean', [
            'default' => false,
            'null' => false,
        ]);
        $table->addColumn('weekend', 'boolean', [
            'default' => false,
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
