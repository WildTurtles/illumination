<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semantic Response'), ['action' => 'edit', $semanticResponse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semantic Response'), ['action' => 'delete', $semanticResponse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticResponse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Responses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Response'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['controller' => 'SemanticRequests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['controller' => 'SemanticRequests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semanticResponses view large-9 medium-8 columns content">
    <h3><?= h($semanticResponse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($semanticResponse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= $semanticResponse->has('language') ? $this->Html->link($semanticResponse->language->name, ['controller' => 'Languages', 'action' => 'view', $semanticResponse->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semantic Request') ?></th>
            <td><?= $semanticResponse->has('semantic_request') ? $this->Html->link($semanticResponse->semantic_request->name, ['controller' => 'SemanticRequests', 'action' => 'view', $semanticResponse->semantic_request->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Count') ?></th>
            <td><?= $this->Number->format($semanticResponse->count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('As Title') ?></th>
            <td><?= $this->Number->format($semanticResponse->as_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('As Page') ?></th>
            <td><?= $this->Number->format($semanticResponse->as_page) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('As Text') ?></th>
            <td><?= $this->Number->format($semanticResponse->as_text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semanticResponse->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($semanticResponse->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticResponse->url)); ?>
    </div>
</div>
