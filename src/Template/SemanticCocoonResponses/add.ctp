<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Links'), ['controller' => 'SemanticCocoonLinks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Link'), ['controller' => 'SemanticCocoonLinks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Uniform Ressource Locators'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Uniform Ressource Locator'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticCocoonResponses form large-9 medium-8 columns content">
    <?= $this->Form->create($semanticCocoonResponse) ?>
    <fieldset>
        <legend><?= __('Add Semantic Cocoon Response') ?></legend>
        <?php
            echo $this->Form->input('started');
            echo $this->Form->input('ended');
            echo $this->Form->input('count');
            echo $this->Form->input('semantic_cocoon_id', ['options' => $semanticCocoons]);
            echo $this->Form->input('token');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
