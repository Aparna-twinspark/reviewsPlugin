<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Integrateideas/Reviews.ReviewSetting $reviewSetting
  */
?>
<div class="reviewSettings view large-9 medium-8 columns content">
    <h3><?= h($reviewSetting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Review Type') ?></th>
            <td><?= $reviewSetting->has('review_type') ? $this->Html->link($reviewSetting->review_type->name, ['controller' => 'ReviewTypes', 'action' => 'view', $reviewSetting->review_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Business') ?></th>
            <td><?= $reviewSetting->has('business') ? $this->Html->link($reviewSetting->business->name, ['controller' => 'Businesses', 'action' => 'view', $reviewSetting->business->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($reviewSetting->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reviewSetting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Points') ?></th>
            <td><?= $this->Number->format($reviewSetting->points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reviewSetting->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reviewSetting->modified) ?></td>
        </tr>
    </table>
     <?= $this->Html->link('Back',$this->request->referer(),['class' => ['button']]);?>
</div>
