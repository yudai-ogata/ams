<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TDomain $tDomain
 */
?>
<div class="tDomains form large-10 medium-9 columns content">
    <?= $this->Form->create($tDomain) ?>
    <fieldset>
        <legend><?= __('ドメイン追加') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'ドメイン名']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('追加')) ?>
    <?= $this->Form->end() ?>
</div>
