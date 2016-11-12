<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notification Texts'), ['controller' => 'NotificationTexts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notification Text'), ['controller' => 'NotificationTexts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notifications index large-9 medium-8 columns content">
    <h3><?= __('Notifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('uuid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('read') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notification_text_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notifications as $notification): ?>
            <tr>
                <td><?= h($notification->uuid) ?></td>
                <td><?= h($notification->created) ?></td>
                <td><?= h($notification->read) ?></td>
                <td><?= $notification->has('notification_text') ? $this->Html->link($notification->notification_text->name, ['controller' => 'NotificationTexts', 'action' => 'view', $notification->notification_text->uuid]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notification->uuid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notification->uuid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notification->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->uuid)]) ?>
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
