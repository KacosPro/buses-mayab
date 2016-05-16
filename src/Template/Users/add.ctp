<?= $this->layout = false ?>
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
		<div class="container" >
			<?= $this->Flash->render() ?>
			<?= $this->TWBForm->create($user) ?>
				<legend><?= __('Add User') ?></legend>
				<?php
					echo $this->TWBForm->input('username');
					echo $this->TWBForm->input('password');
					echo $this->TWBForm->input('confirmPassword', ['type' => 'password']);
					echo $this->TWBForm->input('name');
					echo $this->TWBForm->input('lastname');
					echo $this->TWBForm->input('email');
					echo $this->TWBForm->button(__('Submit'), [
						'class' => 'btn-lg btn-primary pull-right']
					);
				?>
			<?= $this->TWBForm->end() ?>
		</div>
	</body>
	<?= $this->Html->script('jquery.js') ?>
	<?= $this->Html->script('bootstrap.js') ?>
	<?= $this->fetch('script') ?>
</html>
