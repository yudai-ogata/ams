<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUser $tUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List T Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List T Domains'), ['controller' => 'TDomains', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New T Domain'), ['controller' => 'TDomains', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($tUser) ?>
    <fieldset>
        <legend><?= __('Edit T User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('pw');
            echo $this->Form->control('admin');
            echo $this->Form->control('t_domain_id', ['options' => $tDomains]);
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
