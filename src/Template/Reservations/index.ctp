<h3><?= __('Reservations') ?></h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th><?= __($this->Paginator->sort('passenger')) ?></th>
			<th><?= __($this->Paginator->sort('date')) ?></th>
			<th><?= __($this->Paginator->sort('route')) ?></th>
			<th><?= __($this->Paginator->sort('price')) ?></th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($reservations as $reservation): ?>
		<tr>
			<td>&nbsp;</td>
			<td><?= h($reservation->passenger) ?></td>
			<td><?= $reservation->date->format('l, d  M  Y') ?></td>
			<td><?= h(
				$reservation->route->source . ' a ' . $reservation->route->destination . ' - ' . $this->Time->format($reservation->route->hour, 'HH:mm:ss')
			) ?></td>
			<td><?= $this->Number->currency($reservation->price, 'USD') ?></td>
			<td>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<div class="paginator">
	<ul class="pagination">
		<?= $this->TWBPaginator->prev() ?>
		<?= $this->TWBPaginator->numbers() ?>
		<?= $this->TWBPaginator->next() ?>
	</ul>
</div>
