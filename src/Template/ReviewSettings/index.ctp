<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Integrateideas/Reviews.ReviewSetting[]|\Cake\Collection\CollectionInterface $reviewSettings
  */
?>
<div class="reviewSettings index large-9 medium-8 columns content">
    <h3><?= __('Review Settings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('review_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('business_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviewSettings as $reviewSetting): ?>
            <tr>
                <td><?= $this->Number->format($reviewSetting->id) ?></td>
                <td><?= $reviewSetting->has('review_type') ? $this->Html->link($reviewSetting->review_type->name, ['controller' => 'ReviewTypes', 'action' => 'view', $reviewSetting->review_type->id]) : '' ?></td>
                <td><?= $reviewSetting->has('business') ? $this->Html->link($reviewSetting->business->name, ['controller' => 'Businesses', 'action' => 'view', $reviewSetting->business->id]) : '' ?></td>
                <td><?= $this->Number->format($reviewSetting->points) ?></td>
                <td><?= h($reviewSetting->url) ?></td>
                <td><?= h($reviewSetting->created) ?></td>
                <td><?= h($reviewSetting->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reviewSetting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reviewSetting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reviewSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviewSetting->id)]) ?>
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
