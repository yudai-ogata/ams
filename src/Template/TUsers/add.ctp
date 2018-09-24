<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUser $tUser
 */
?>
<div class="tUsers form large-10 medium-9 columns content">
    <?= $this->Form->create($tUser) ?>
    <fieldset>
        <legend><?= __('ユーザー追加') ?></legend>
        <?php
            echo $this->Form->control('name',["label"=>"ユーザー名"]);
            echo $this->Form->input('password',["label"=>"パスワード", "type"=>"password"]);
            echo $this->Form->control('admin',["label"=>"管理権限"]);
            echo $this->Form->control('t_domain_id', ['options' => $tDomains,"label"=>"管理ドメイン"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('追加')) ?>
    <?= $this->Form->end() ?>
</div>
