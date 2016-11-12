<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Http Status Code'), ['action' => 'edit', $httpStatusCode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Http Status Code'), ['action' => 'delete', $httpStatusCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $httpStatusCode->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request For Comments'), ['controller' => 'RequestForComments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request For Comment'), ['controller' => 'RequestForComments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="httpStatusCodes view large-9 medium-8 columns content">
    <h3><?= h($httpStatusCode->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($httpStatusCode->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($httpStatusCode->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Request For Comment') ?></th>
            <td><?= $httpStatusCode->has('request_for_comment') ? $this->Html->link($httpStatusCode->request_for_comment->name, ['controller' => 'RequestForComments', 'action' => 'view', $httpStatusCode->request_for_comment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($httpStatusCode->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($httpStatusCode->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($httpStatusCode->description)); ?>
    </div>
</div>
