<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Integrateideas/Reviews.ReviewType $reviewType
  */
?>
<div class="reviewTypes view large-9 medium-8 columns content">
    <h3><?= h($reviewType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($reviewType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reviewType->id) ?></td>
        </tr>
    </table>
     <?= $this->Html->link('Back',$this->request->referer(),['class' => ['button']]);?>
</div>
