<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Route'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routes index large-9 medium-8 columns content">
    <h3><?= __('Routes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('source') ?></th>
                <th><?= $this->Paginator->sort('destination') ?></th>
                <th><?= $this->Paginator->sort('hour') ?></th>
                <th><?= $this->Paginator->sort('weekday') ?></th>
                <th><?= $this->Paginator->sort('weekend') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routes as $route): ?>
            <tr>
                <td><?= $this->Number->format($route->id) ?></td>
                <td><?= h($route->source) ?></td>
                <td><?= h($route->destination) ?></td>
                <td><?= h($route->hour) ?></td>
                <td><?= h($route->weekday) ?></td>
                <td><?= h($route->weekend) ?></td>
                <td><?= h($route->created) ?></td>
                <td><?= h($route->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $route->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $route->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
