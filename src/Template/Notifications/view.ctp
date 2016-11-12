<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notification'), ['action' => 'edit', $notification->uuid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notification'), ['action' => 'delete', $notification->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->uuid)]) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notification Texts'), ['controller' => 'NotificationTexts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification Text'), ['controller' => 'NotificationTexts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notifications view large-9 medium-8 columns content">
    <h3><?= h($notification->uuid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Uuid') ?></th>
            <td><?= h($notification->uuid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notification Text') ?></th>
            <td><?= $notification->has('notification_text') ? $this->Html->link($notification->notification_text->name, ['controller' => 'NotificationTexts', 'action' => 'view', $notification->notification_text->uuid]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($notification->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Read') ?></th>
            <td><?= $notification->read ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
