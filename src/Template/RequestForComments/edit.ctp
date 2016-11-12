<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requestForComment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requestForComment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Request For Comments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['controller' => 'HttpStatusCodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['controller' => 'HttpStatusCodes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requestForComments form large-9 medium-8 columns content">
    <?= $this->Form->create($requestForComment) ?>
    <fieldset>
        <legend><?= __('Edit Request For Comment') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
