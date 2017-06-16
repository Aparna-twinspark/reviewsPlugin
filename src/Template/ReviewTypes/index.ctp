<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Integrateideas/Reviews.ReviewType[]|\Cake\Collection\CollectionInterface $reviewTypes
  */
?>
<div class="reviewTypes index large-9 medium-8 columns content">
    <h3><?= __('Review Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviewTypes as $reviewType): ?>
            <tr>
                <td><?= $this->Number->format($reviewType->id) ?></td>
                <td><?= h($reviewType->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reviewType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reviewType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reviewType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviewType->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
