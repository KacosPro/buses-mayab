<?= $this->Flash->render() ?>
<?= $this->TWBForm->create($user, ['id' => 'userform']) ?>
	<legend><?= __('Edit User') ?></legend>
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
