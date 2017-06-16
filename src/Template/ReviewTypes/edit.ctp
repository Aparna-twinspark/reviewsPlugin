<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="reviewTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($reviewType) ?>
    <fieldset>
        <legend><?= __('Edit Review Type') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Html->link('Back',$this->request->referer(),['class' => ['button']]);?>
    <?= $this->Form->end() ?>
</div>
