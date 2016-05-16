<table class="table table-hover">
	<thead>
		<tr>
			<th><?= __('Ruta') ?></th>
			<th><?= __('Hora') ?></th>
			<th><?= __('Costo') ?></th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($routes as $route): ?>
			<tr>
				<td><?= $route->source . ' a ' . $route->destination ?></td>
				<td><?= $this->Time->format( $route->hour,'HH:mm:ss') ?></td>
				<td><?= $this->Number->currency(250, 'USD') ?></td>
				<td><?php
					echo $this->TWBForm->create($route, ['url' => ['action' => 'purchase']]);
					echo $this->TWBForm->input('date', ['value' => $date, 'type' => 'hidden']);
					echo $this->TWBForm->submit(__('Seleccionar ruta'), ['class' => 'btn-primary btn-xs']);
					echo $this->TWBForm->end();
				?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
