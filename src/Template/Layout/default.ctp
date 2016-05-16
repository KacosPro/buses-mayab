<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= 'Autobuses De la Mayab' ?>:<?= $this->fetch('title') ?></title>
		<?= $this->Html->meta('icon') ?>

		<?= $this->Html->css('bootswatch.css') ?>

		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Autobuses CNP</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li>
					<?php if (isset($user)): ?>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=
							$user['name'] . ' ' . $user['lastname']
						?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#"><?= __('Mostrar historial') ?></a></li>
							<li role="separator" class="divider"></li>
							<li><?= $this->Html->link(__('Salir'), [
								'controller' => 'Users',
								'action' => 'logout'
							]) ?></li>
						</ul>
					<?php else: ?>
						<?= $this->Html->link('Acceder',
							['controller' => 'Users', 'action' => 'login']
						) ?>
					<?php endif ?>
					</li>
				</ul>
			</div>
		</nav>
		<?= $this->Flash->render() ?>
		<div class="container">
			<?= $this->fetch('content') ?>
		</div>

		<?= $this->Html->script('jquery.js') ?>
		<?= $this->Html->script('bootstrap.js') ?>
		<?= $this->fetch('script') ?>
	</body>
</html>
