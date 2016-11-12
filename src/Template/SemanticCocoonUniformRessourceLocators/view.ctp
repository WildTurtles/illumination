<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semantic Cocoon Uniform Ressource Locator'), ['action' => 'edit', $semanticCocoonUniformRessourceLocator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semantic Cocoon Uniform Ressource Locator'), ['action' => 'delete', $semanticCocoonUniformRessourceLocator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonUniformRessourceLocator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Uniform Ressource Locators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Uniform Ressource Locator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['controller' => 'HttpStatusCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['controller' => 'HttpStatusCodes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semanticCocoonUniformRessourceLocators view large-9 medium-8 columns content">
    <h3><?= h($semanticCocoonUniformRessourceLocator->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($semanticCocoonUniformRessourceLocator->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Http Status Code') ?></th>
            <td><?= $semanticCocoonUniformRessourceLocator->has('http_status_code') ? $this->Html->link($semanticCocoonUniformRessourceLocator->http_status_code->name, ['controller' => 'HttpStatusCodes', 'action' => 'view', $semanticCocoonUniformRessourceLocator->http_status_code->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semantic Cocoon Response') ?></th>
            <td><?= $semanticCocoonUniformRessourceLocator->has('semantic_cocoon_response') ? $this->Html->link($semanticCocoonUniformRessourceLocator->semantic_cocoon_response->id, ['controller' => 'SemanticCocoonResponses', 'action' => 'view', $semanticCocoonUniformRessourceLocator->semantic_cocoon_response->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Url Visiblis') ?></th>
            <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->id_url_visiblis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('As Title') ?></th>
            <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->as_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('As Page') ?></th>
            <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->as_page) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title Semantic Rank') ?></th>
            <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->title_semantic_rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Semantic Rank') ?></th>
            <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->page_semantic_rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Rank') ?></th>
            <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->page_rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semanticCocoonUniformRessourceLocator->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($semanticCocoonUniformRessourceLocator->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticCocoonUniformRessourceLocator->url)); ?>
    </div>
</div>
