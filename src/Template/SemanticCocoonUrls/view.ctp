<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semantic Cocoon Url'), ['action' => 'edit', $semanticCocoonUrl->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semantic Cocoon Url'), ['action' => 'delete', $semanticCocoonUrl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonUrl->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Urls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Url'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['controller' => 'HttpStatusCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['controller' => 'HttpStatusCodes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semanticCocoonUrls view large-9 medium-8 columns content">
    <h3><?= h($semanticCocoonUrl->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($semanticCocoonUrl->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Http Status Code') ?></th>
            <td><?= $semanticCocoonUrl->has('http_status_code') ? $this->Html->link($semanticCocoonUrl->http_status_code->name, ['controller' => 'HttpStatusCodes', 'action' => 'view', $semanticCocoonUrl->http_status_code->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semantic Cocoon Response') ?></th>
            <td><?= $semanticCocoonUrl->has('semantic_cocoon_response') ? $this->Html->link($semanticCocoonUrl->semantic_cocoon_response->id, ['controller' => 'SemanticCocoonResponses', 'action' => 'view', $semanticCocoonUrl->semantic_cocoon_response->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Url Visiblis') ?></th>
            <td><?= $this->Number->format($semanticCocoonUrl->id_url_visiblis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('As Title') ?></th>
            <td><?= $this->Number->format($semanticCocoonUrl->as_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('As Page') ?></th>
            <td><?= $this->Number->format($semanticCocoonUrl->as_page) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title Semantic Rank') ?></th>
            <td><?= $this->Number->format($semanticCocoonUrl->title_semantic_rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Semantic Rank') ?></th>
            <td><?= $this->Number->format($semanticCocoonUrl->page_semantic_rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Rank') ?></th>
            <td><?= $this->Number->format($semanticCocoonUrl->page_rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semanticCocoonUrl->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($semanticCocoonUrl->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticCocoonUrl->url)); ?>
    </div>
</div>
