<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Request For Comments'), ['controller' => 'RequestForComments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request For Comment'), ['controller' => 'RequestForComments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="httpStatusCodes index large-9 medium-8 columns content">
    <h3><?= __('Http Status Codes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_for_comment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($httpStatusCodes as $httpStatusCode): ?>
            <tr>
                <td><?= h($httpStatusCode->id) ?></td>
                <td><?= h($httpStatusCode->name) ?></td>
                <td><?= $httpStatusCode->has('request_for_comment') ? $this->Html->link($httpStatusCode->request_for_comment->name, ['controller' => 'RequestForComments', 'action' => 'view', $httpStatusCode->request_for_comment->id]) : '' ?></td>
                <td><?= h($httpStatusCode->created) ?></td>
                <td><?= h($httpStatusCode->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $httpStatusCode->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $httpStatusCode->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $httpStatusCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $httpStatusCode->id)]) ?>
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
