<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="reviewSettings form large-9 medium-8 columns content">
    <?= $this->Form->create($reviewSetting) ?>
    <fieldset>
        <legend><?= __('Edit Review Setting') ?></legend>
        <?php
            echo $this->Form->control('review_type_id', ['options' => $reviewTypes]);
            echo $this->Form->control('business_id', ['options' => $businesses]);
            echo $this->Form->control('points');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Html->link('Back',$this->request->referer(),['class' => ['button']]);?>
    <?= $this->Form->end() ?>
</div>
