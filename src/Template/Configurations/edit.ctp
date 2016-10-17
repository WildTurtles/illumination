<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $configuration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $configuration->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Configurations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="configurations form large-9 medium-8 columns content">
    <?= $this->Form->create($configuration) ?>
    <fieldset>
        <legend><?= __('Edit Configuration') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('visiblis_api_key');
            echo $this->Form->input('ip');
            echo $this->Form->input('is_default');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
