<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['action' => 'index']) ?></li>
    </ul>
</nav>


<div class="semanticRequests form large-9 medium-8 columns content">
<fieldset>
        <legend><?= __('Informations : ') ?></legend>    
        <div>
            Le champ requête doit etre rempli dans les requêtes de la catégorie titre et texte.
            </br>
            Le champ field correspond selon le cas à l'url, le titre ou le texte.
            </br>
            Le champ block correspond à un selecteur de bloc au format JQuery.
        </div>
        </fieldset>
    <?= $this->Form->create($semanticRequest) ?>

    <fieldset>
        <legend><?= __('Add Semantic Request') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('count');
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('field');
            echo $this->Form->input('request');
            echo $this->Form->input('block');
            echo $this->Form->input('language_id', ['options' => $languages]);
            echo $this->Form->input('corpus_id', ['options' => $corpuses]);
            echo $this->Form->input('account_id', ['options' => $accounts, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
