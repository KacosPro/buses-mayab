<?= $this->Html->css('https://code.jquery.com/ui/1.11.4/themes/flick/jquery-ui.css') ?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php
		echo $this->TWBForm->create($route, ['url' => ['action' => 'schedule'], 'id' => 'form']);
		echo $this->TWBForm->label('sourceRoute');
		echo $this->TWBForm->select('sourceRoute', $sourceRoutes, ['required' => 'required']);
		echo '<br>';
		echo $this->TWBForm->label('destinationRoute');
		echo $this->TWBForm->select('destinationRoute', $destinationRoutes, ['required' => 'required']);
		echo '<br>';
		echo $this->TWBForm->input('date', [
			'required' => 'required',
			'autocomplete' => 'off',
			'readonly' => 'readonly'
		]);
		echo '<br>';
		echo $this->TWBForm->submit(__('Send'), ['class' => 'btn-primary btn-lg']);
		echo $this->TWBForm->end();
		?>
	</div>
</div>
<?= $this->Html->script('jquery-ui.js', ['defer' => true]) ?>
<?= $this->Html->scriptBlock("$(function() {
		$( '#date' ).datepicker({
			minDate: 0,
			maxDate: '+1M +10D',
			numberOfMonths: 2,
			dateFormat: 'yy-mm-dd'
		});
	});",
	['block' => true]
) ?>
