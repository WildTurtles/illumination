<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cocoonsCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cocoonsCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cocoons Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cocoonsCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($cocoonsCategory) ?>
    <fieldset>
        <legend><?= __('Edit Cocoons Category') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
