<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Uniform Ressource Locator'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['controller' => 'HttpStatusCodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['controller' => 'HttpStatusCodes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticCocoonUniformRessourceLocators index large-9 medium-8 columns content">
    <h3><?= __('Semantic Cocoon Uniform Ressource Locators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_url_visiblis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_page') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title_semantic_rank') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_semantic_rank') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_rank') ?></th>
                <th scope="col"><?= $this->Paginator->sort('http_status_code_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semantic_cocoon_response_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticCocoonUniformRessourceLocators as $semanticCocoonUniformRessourceLocator): ?>
            <tr>
                <td><?= h($semanticCocoonUniformRessourceLocator->id) ?></td>
                <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->id_url_visiblis) ?></td>
                <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->as_title) ?></td>
                <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->as_page) ?></td>
                <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->title_semantic_rank) ?></td>
                <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->page_semantic_rank) ?></td>
                <td><?= $this->Number->format($semanticCocoonUniformRessourceLocator->page_rank) ?></td>
                <td><?= $semanticCocoonUniformRessourceLocator->has('http_status_code') ? $this->Html->link($semanticCocoonUniformRessourceLocator->http_status_code->name, ['controller' => 'HttpStatusCodes', 'action' => 'view', $semanticCocoonUniformRessourceLocator->http_status_code->id]) : '' ?></td>
                <td><?= $semanticCocoonUniformRessourceLocator->has('semantic_cocoon_response') ? $this->Html->link($semanticCocoonUniformRessourceLocator->semantic_cocoon_response->id, ['controller' => 'SemanticCocoonResponses', 'action' => 'view', $semanticCocoonUniformRessourceLocator->semantic_cocoon_response->id]) : '' ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocator->created) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocator->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semanticCocoonUniformRessourceLocator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $semanticCocoonUniformRessourceLocator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semanticCocoonUniformRessourceLocator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonUniformRessourceLocator->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
