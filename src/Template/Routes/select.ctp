<?= $this->Html->css('https://code.jquery.com/ui/1.11.4/themes/flick/jquery-ui.css') ?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php
		echo $this->TWBForm->create($route, ['url' => ['action' => 'login']]);
		echo $this->TWBForm->label('sourceRoutes');
		echo $this->TWBForm->select('sourceRoutes', $sourceRoutes);
		echo '<br>';
		echo $this->TWBForm->label('destinationRoutes');
		echo $this->TWBForm->select('destinationRoutes', $destinationRoutes);
		echo '<br>';
		echo $this->TWBForm->input('date');
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
			dateFormat: 'DD, d MM'
		});
	});",
	['block' => true]
) ?>
