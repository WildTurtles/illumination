<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notification Text'), ['action' => 'edit', $notificationText->uuid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notification Text'), ['action' => 'delete', $notificationText->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $notificationText->uuid)]) ?> </li>
        <li><?= $this->Html->link(__('List Notification Texts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification Text'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notificationTexts view large-9 medium-8 columns content">
    <h3><?= h($notificationText->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Uuid') ?></th>
            <td><?= h($notificationText->uuid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($notificationText->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($notificationText->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($notificationText->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($notificationText->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notifications') ?></h4>
        <?php if (!empty($notificationText->notifications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Uuid') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Read') ?></th>
                <th scope="col"><?= __('Notification Text Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($notificationText->notifications as $notifications): ?>
            <tr>
                <td><?= h($notifications->uuid) ?></td>
                <td><?= h($notifications->created) ?></td>
                <td><?= h($notifications->read) ?></td>
                <td><?= h($notifications->notification_text_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $notifications->uuid]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $notifications->uuid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'action' => 'delete', $notifications->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $notifications->uuid)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
