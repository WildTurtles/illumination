<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $notification->uuid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $notification->uuid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Notifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Notification Texts'), ['controller' => 'NotificationTexts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notification Text'), ['controller' => 'NotificationTexts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notifications form large-9 medium-8 columns content">
    <?= $this->Form->create($notification) ?>
    <fieldset>
        <legend><?= __('Edit Notification') ?></legend>
        <?php
            echo $this->Form->input('read');
            echo $this->Form->input('notification_text_id', ['options' => $notificationTexts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
