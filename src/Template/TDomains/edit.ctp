<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TDomain $tDomain
 */
?>
<div class="tDomains form large-9 medium-8 columns content">
    <?= $this->Form->create($tDomain) ?>
    <fieldset>
        <legend><?= __('ドメイン編集') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'ドメイン名']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('更新')) ?>
    <?= $this->Form->end() ?>
</div>
