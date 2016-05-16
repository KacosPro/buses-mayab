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
		<?= $this->Flash->render() ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<?= $this->TWBForm->create() ?>
						<fieldset>
							<legend><?= __('Please enter your username and password') ?></legend>
							<?= $this->TWBForm->input('username') ?>
							<?= $this->TWBForm->input('password') ?>
						</fieldset>
					<?= $this->TWBForm->button(__('Login'), ['class' => 'btn btn-lg btn-primary pull-right']); ?>
					<?= $this->TWBForm->end() ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<?= $this->Html->link(__('Crear una cuenta'), [
						'controller' => 'Users',
						'action' => 'add'
					]) ?>
				</div>
			</div>
		</div>
	</body>
	<?= $this->Html->script('jquery.js') ?>
	<?= $this->Html->script('bootstrap.js') ?>
	<?= $this->fetch('script') ?>
</html>
