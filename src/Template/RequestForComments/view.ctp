<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Request For Comment'), ['action' => 'edit', $requestForComment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Request For Comment'), ['action' => 'delete', $requestForComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestForComment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Request For Comments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request For Comment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['controller' => 'HttpStatusCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['controller' => 'HttpStatusCodes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requestForComments view large-9 medium-8 columns content">
    <h3><?= h($requestForComment->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($requestForComment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($requestForComment->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($requestForComment->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requestForComment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($requestForComment->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Http Status Codes') ?></h4>
        <?php if (!empty($requestForComment->http_status_codes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Request For Comment Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requestForComment->http_status_codes as $httpStatusCodes): ?>
            <tr>
                <td><?= h($httpStatusCodes->id) ?></td>
                <td><?= h($httpStatusCodes->name) ?></td>
                <td><?= h($httpStatusCodes->description) ?></td>
                <td><?= h($httpStatusCodes->request_for_comment_id) ?></td>
                <td><?= h($httpStatusCodes->created) ?></td>
                <td><?= h($httpStatusCodes->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'HttpStatusCodes', 'action' => 'view', $httpStatusCodes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'HttpStatusCodes', 'action' => 'edit', $httpStatusCodes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'HttpStatusCodes', 'action' => 'delete', $httpStatusCodes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $httpStatusCodes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
