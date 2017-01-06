<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cocoons Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cocoonsCategories index large-9 medium-8 columns content">
    <h3><?= __('Cocoons Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cocoonCategories as $cocoonsCategory): ?>
            <tr>
                <td><?= h($cocoonsCategory->id) ?></td>
                <td><?= h($cocoonsCategory->name) ?></td>
                <td><?= h($cocoonsCategory->created) ?></td>
                <td><?= h($cocoonsCategory->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cocoonsCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cocoonsCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cocoonsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cocoonsCategory->id)]) ?>
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
