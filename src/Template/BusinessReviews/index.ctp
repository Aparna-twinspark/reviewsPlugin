<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Integrateideas/Reviews.BusinessReview[]|\Cake\Collection\CollectionInterface $businessReviews
  */
?>
<div class="businessReviews index large-9 medium-8 columns content">
    <h3><?= __('Business Reviews') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('business_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('review_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businessReviews as $businessReview): ?>
            <tr>
                <td><?= $this->Number->format($businessReview->id) ?></td>
                <td><?= $businessReview->has('business') ? $this->Html->link($businessReview->business->name, ['controller' => 'Businesses', 'action' => 'view', $businessReview->business->id]) : '' ?></td>
                <td><?= $businessReview->has('review_type') ? $this->Html->link($businessReview->review_type->name, ['controller' => 'ReviewTypes', 'action' => 'view', $businessReview->review_type->id]) : '' ?></td>
                <td><?= $businessReview->has('user') ? $this->Html->link($businessReview->user->id, ['controller' => 'Users', 'action' => 'view', $businessReview->user->id]) : '' ?></td>
                <td><?= h($businessReview->status) ?></td>
                <td><?= h($businessReview->created) ?></td>
                <td><?= h($businessReview->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessReview->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessReview->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessReview->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessReview->id)]) ?>
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
