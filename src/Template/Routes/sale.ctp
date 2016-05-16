<table class="table table-striped">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th><?= __('Pasajero') ?></th>
			<th><?= __('Fecha') ?></th>
			<th><?= __('Hora') ?></th>
			<th><?= __('Precio') ?></th>
			<th><?= __('Origen') ?></th>
			<th><?= __('Destino') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $dat): ?>
			<tr>
				<td>&nbsp;</td>
				<td><?= $dat['passenger'] ?></td>
				<td><?= $dat['date'] ?></td>
				<td><?= $hour ?></td>
				<td><?= $dat['price'] ?></td>
				<td><?= $sourceRoute ?></td>
				<td><?= $destinationRoute ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?= $this->Html->link(__('Inicio'), [
		'action' => 'select'
	], [
		'class' => 'btn btn-lg btn-success pull-right',
		'role' => 'button'
	]
) ?>
