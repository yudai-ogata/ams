<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TContent $tContent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List T Contents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tContents form large-9 medium-8 columns content">
    <?= $this->Form->create($tContent) ?>
    <fieldset>
        <legend><?= __('Add T Content') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('name_kana');
            echo $this->Form->control('age');
            echo $this->Form->control('gender');
            echo $this->Form->control('tel');
            echo $this->Form->control('zip');
            echo $this->Form->control('address');
            echo $this->Form->control('email');
            echo $this->Form->control('domain');
            echo $this->Form->control('param');
            echo $this->Form->control('product_name');
            echo $this->Form->control('detail');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
