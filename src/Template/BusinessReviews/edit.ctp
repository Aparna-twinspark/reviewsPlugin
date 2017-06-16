<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="businessReviews form large-9 medium-8 columns content">
    <?= $this->Form->create($businessReview) ?>
    <fieldset>
        <legend><?= __('Edit Business Review') ?></legend>
        <?php
            echo $this->Form->control('business_id', ['options' => $businesses]);
            echo $this->Form->control('review_type_id', ['options' => $reviewTypes]);
            echo $this->Form->control('description');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
