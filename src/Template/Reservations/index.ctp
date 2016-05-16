<h3><?= __('Reservations') ?></h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('passenger') ?></th>
			<th><?= $this->Paginator->sort('date') ?></th>
			<th><?= $this->Paginator->sort('route') ?></th>
			<th><?= $this->Paginator->sort('price') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($reservations as $reservation): ?>
		<tr>
			<td><?= h($reservation->passenger) ?></td>
			<td><?= h($reservation->date) ?></td>
			<td><?= h(
				$reservation->route->source . ' a ' . $reservation->route->destination . ' - ' . $this->Time->format($reservation->route->hour, 'HH:mm:ss')
			) ?></td>
			<td><?= $this->Number->currency($reservation->price, 'USD') ?></td>
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
