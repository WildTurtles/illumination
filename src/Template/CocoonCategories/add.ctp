<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cocoons Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cocoonCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($cocoonCategory) ?>
    <fieldset>
        <legend><?= __('Add Cocoon Category') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
