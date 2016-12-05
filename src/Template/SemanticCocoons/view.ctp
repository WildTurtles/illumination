<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semantic Cocoon'), ['action' => 'edit', $semanticCocoon->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semantic Cocoon'), ['action' => 'delete', $semanticCocoon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoon->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Corpuses'), ['controller' => 'Corpuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Corpus'), ['controller' => 'Corpuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Queue Elements'), ['controller' => 'QueueElements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Queue Element'), ['controller' => 'QueueElements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semanticCocoons view large-9 medium-8 columns content">
    <h3><?= h($semanticCocoon->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($semanticCocoon->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($semanticCocoon->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= $semanticCocoon->has('language') ? $this->Html->link($semanticCocoon->language->name, ['controller' => 'Languages', 'action' => 'view', $semanticCocoon->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Corpus') ?></th>
            <td><?= $semanticCocoon->has('corpus') ? $this->Html->link($semanticCocoon->corpus->name, ['controller' => 'Corpuses', 'action' => 'view', $semanticCocoon->corpus->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regular Expression') ?></th>
            <td><?= h($semanticCocoon->regular_expression) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $semanticCocoon->has('account') ? $this->Html->link($semanticCocoon->account->name, ['controller' => 'Accounts', 'action' => 'view', $semanticCocoon->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cocoons Category Id') ?></th>
            <td><?= h($semanticCocoon->cocoons_category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Count') ?></th>
            <td><?= $this->Number->format($semanticCocoon->count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clusters') ?></th>
            <td><?= $this->Number->format($semanticCocoon->clusters) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semanticCocoon->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($semanticCocoon->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exclusive') ?></th>
            <td><?= $semanticCocoon->exclusive ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticCocoon->url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Request') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticCocoon->request)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Queue Elements') ?></h4>
        <?php if (!empty($semanticCocoon->queue_elements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Semantic Cocoon Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($semanticCocoon->queue_elements as $queueElements): ?>
            <tr>
                <td><?= h($queueElements->id) ?></td>
                <td><?= h($queueElements->position) ?></td>
                <td><?= h($queueElements->semantic_cocoon_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'QueueElements', 'action' => 'view', $queueElements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'QueueElements', 'action' => 'edit', $queueElements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'QueueElements', 'action' => 'delete', $queueElements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queueElements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Semantic Cocoon Responses') ?></h4>
        <?php if (!empty($semanticCocoon->semantic_cocoon_responses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Started') ?></th>
                <th scope="col"><?= __('Ended') ?></th>
                <th scope="col"><?= __('Count') ?></th>
                <th scope="col"><?= __('Semantic Cocoon Id') ?></th>
                <th scope="col"><?= __('Token') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($semanticCocoon->semantic_cocoon_responses as $semanticCocoonResponses): ?>
            <tr>
                <td><?= h($semanticCocoonResponses->id) ?></td>
                <td><?= h($semanticCocoonResponses->started) ?></td>
                <td><?= h($semanticCocoonResponses->ended) ?></td>
                <td><?= h($semanticCocoonResponses->count) ?></td>
                <td><?= h($semanticCocoonResponses->semantic_cocoon_id) ?></td>
                <td><?= h($semanticCocoonResponses->token) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SemanticCocoonResponses', 'action' => 'view', $semanticCocoonResponses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SemanticCocoonResponses', 'action' => 'edit', $semanticCocoonResponses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SemanticCocoonResponses', 'action' => 'delete', $semanticCocoonResponses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonResponses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
