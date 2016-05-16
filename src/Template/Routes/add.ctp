<?= $this->TWBForm->create($route) ?>
<fieldset>
	<legend><?= __('Add Route') ?></legend>
	<?php
		echo $this->TWBForm->input('source');
		echo $this->TWBForm->input('destination');
		echo $this->TWBForm->input('hour');
		echo $this->TWBForm->input('weekday');
		echo $this->TWBForm->input('weekend');
		echo $this->TWBForm->input('users._ids', ['options' => $users]);
	?>
</fieldset>
<?= $this->TWBForm->button(__('Submit')) ?>
<?= $this->TWBForm->end() ?>
