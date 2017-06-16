<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Integrateideas/Reviews.BusinessReview $businessReview
  */
?>
<div class="businessReviews view large-9 medium-8 columns content">
    <h3><?= h($businessReview->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Business') ?></th>
            <td><?= $businessReview->has('business') ? $this->Html->link($businessReview->business->name, ['controller' => 'Businesses', 'action' => 'view', $businessReview->business->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Review Type') ?></th>
            <td><?= $businessReview->has('review_type') ? $this->Html->link($businessReview->review_type->name, ['controller' => 'ReviewTypes', 'action' => 'view', $businessReview->review_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $businessReview->has('user') ? $this->Html->link($businessReview->user->id, ['controller' => 'Users', 'action' => 'view', $businessReview->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($businessReview->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($businessReview->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($businessReview->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $businessReview->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($businessReview->description)); ?>
    </div>
</div>
