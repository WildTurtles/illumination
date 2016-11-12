<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $httpStatusCode->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $httpStatusCode->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Request For Comments'), ['controller' => 'RequestForComments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request For Comment'), ['controller' => 'RequestForComments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="httpStatusCodes form large-9 medium-8 columns content">
    <?= $this->Form->create($httpStatusCode) ?>
    <fieldset>
        <legend><?= __('Edit Http Status Code') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('request_for_comment_id', ['options' => $requestForComments]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
