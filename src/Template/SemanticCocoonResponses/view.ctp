<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semantic Cocoon Response'), ['action' => 'edit', $semanticCocoonResponse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semantic Cocoon Response'), ['action' => 'delete', $semanticCocoonResponse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonResponse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Links'), ['controller' => 'SemanticCocoonLinks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Link'), ['controller' => 'SemanticCocoonLinks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Uniform Ressource Locators'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Uniform Ressource Locator'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semanticCocoonResponses view large-9 medium-8 columns content">
    <h3><?= h($semanticCocoonResponse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($semanticCocoonResponse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semantic Cocoon') ?></th>
            <td><?= $semanticCocoonResponse->has('semantic_cocoon') ? $this->Html->link($semanticCocoonResponse->semantic_cocoon->name, ['controller' => 'SemanticCocoons', 'action' => 'view', $semanticCocoonResponse->semantic_cocoon->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Count') ?></th>
            <td><?= $this->Number->format($semanticCocoonResponse->count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($semanticCocoonResponse->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($semanticCocoonResponse->ended) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Semantic Cocoon Links') ?></h4>
        <?php if (!empty($semanticCocoonResponse->semantic_cocoon_links)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Source') ?></th>
                <th scope="col"><?= __('Destination') ?></th>
                <th scope="col"><?= __('Semantic Cocoon Response Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($semanticCocoonResponse->semantic_cocoon_links as $semanticCocoonLinks): ?>
            <tr>
                <td><?= h($semanticCocoonLinks->id) ?></td>
                <td><?= h($semanticCocoonLinks->source) ?></td>
                <td><?= h($semanticCocoonLinks->destination) ?></td>
                <td><?= h($semanticCocoonLinks->semantic_cocoon_response_id) ?></td>
                <td><?= h($semanticCocoonLinks->created) ?></td>
                <td><?= h($semanticCocoonLinks->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SemanticCocoonLinks', 'action' => 'view', $semanticCocoonLinks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SemanticCocoonLinks', 'action' => 'edit', $semanticCocoonLinks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SemanticCocoonLinks', 'action' => 'delete', $semanticCocoonLinks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonLinks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Semantic Cocoon Uniform Ressource Locators') ?></h4>
        <?php if (!empty($semanticCocoonResponse->semantic_cocoon_uniform_ressource_locators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Id Url Visiblis') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('As Title') ?></th>
                <th scope="col"><?= __('As Page') ?></th>
                <th scope="col"><?= __('Title Semantic Rank') ?></th>
                <th scope="col"><?= __('Page Semantic Rank') ?></th>
                <th scope="col"><?= __('Page Rank') ?></th>
                <th scope="col"><?= __('Http Status Code Id') ?></th>
                <th scope="col"><?= __('Semantic Cocoon Response Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($semanticCocoonResponse->semantic_cocoon_uniform_ressource_locators as $semanticCocoonUniformRessourceLocators): ?>
            <tr>
                <td><?= h($semanticCocoonUniformRessourceLocators->id) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->id_url_visiblis) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->url) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->as_title) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->as_page) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->title_semantic_rank) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->page_semantic_rank) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->page_rank) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->http_status_code_id) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->semantic_cocoon_response_id) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->created) ?></td>
                <td><?= h($semanticCocoonUniformRessourceLocators->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'view', $semanticCocoonUniformRessourceLocators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'edit', $semanticCocoonUniformRessourceLocators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'delete', $semanticCocoonUniformRessourceLocators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonUniformRessourceLocators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
