<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Request For Comment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['controller' => 'HttpStatusCodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['controller' => 'HttpStatusCodes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requestForComments index large-9 medium-8 columns content">
    <h3><?= __('Request For Comments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requestForComments as $requestForComment): ?>
            <tr>
                <td><?= h($requestForComment->id) ?></td>
                <td><?= h($requestForComment->name) ?></td>
                <td><?= h($requestForComment->link) ?></td>
                <td><?= h($requestForComment->created) ?></td>
                <td><?= h($requestForComment->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requestForComment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requestForComment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requestForComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestForComment->id)]) ?>
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
