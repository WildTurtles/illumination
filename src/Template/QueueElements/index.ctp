<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Queue Element'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="queueElements index large-9 medium-8 columns content">
    <h3><?= __('Queue Elements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semantic_cocoon_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($queueElements as $queueElement): ?>
            <tr>
                <td><?= h($queueElement->id) ?></td>
                <td><?= $this->Number->format($queueElement->position) ?></td>
                <td><?= $queueElement->has('semantic_cocoon') ? $this->Html->link($queueElement->semantic_cocoon->name, ['controller' => 'SemanticCocoons', 'action' => 'view', $queueElement->semantic_cocoon->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $queueElement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $queueElement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $queueElement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queueElement->id)]) ?>
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
