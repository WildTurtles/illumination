<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $semanticCocoonUrl->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonUrl->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Urls'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['controller' => 'HttpStatusCodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['controller' => 'HttpStatusCodes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticCocoonUrls form large-9 medium-8 columns content">
    <?= $this->Form->create($semanticCocoonUrl) ?>
    <fieldset>
        <legend><?= __('Edit Semantic Cocoon Url') ?></legend>
        <?php
            echo $this->Form->input('id_url_visiblis');
            echo $this->Form->input('url');
            echo $this->Form->input('as_title');
            echo $this->Form->input('as_page');
            echo $this->Form->input('title_semantic_rank');
            echo $this->Form->input('page_semantic_rank');
            echo $this->Form->input('page_rank');
            echo $this->Form->input('http_status_code_id', ['options' => $httpStatusCodes]);
            echo $this->Form->input('semantic_cocoon_response_id', ['options' => $semanticCocoonResponses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
