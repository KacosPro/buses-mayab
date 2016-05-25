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

namespace Phinx\Seed;

use Phinx\Seed\AbstractSeed;

/**
 * Routes seed.
 */
class RoutesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'source' => 'Mérida',
                'destination' => 'Campeche',
                'hour' => '09:00:00',
                'weekday' => 0,
                'weekend' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'source' => 'Mérida',
                'destination' => 'Campeche',
                'hour' => '12:00:00',
                'weekday' => 0,
                'weekend' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'source' => 'Mérida',
                'destination' => 'Campeche',
                'hour' => '15:00:00',
                'weekday' => 0,
                'weekend' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'source' => 'Mérida',
                'destination' => 'Campeche',
                'hour' => '18:00:00',
                'weekday' => 1,
                'weekend' => 0,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'source' => 'Mérida',
                'destination' => 'Campeche',
                'hour' => '21:00:00',
                'weekday' => 1,
                'weekend' => 0,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'source' => 'Mérida',
                'destination' => 'Campeche',
                'hour' => '00:00:00',
                'weekday' => 1,
                'weekend' => 0,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'source' => 'Mérida',
                'destination' => 'Campeche',
                'hour' => '02:00:00',
                'weekday' => 1,
                'weekend' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ]
        ];
        $table = $this->table('routes');
        $table->insert($data)->save();
    }
}
