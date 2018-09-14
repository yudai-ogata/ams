<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TDomain $tDomain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tDomain->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tDomain->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List T Domains'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List T Users'), ['controller' => 'TUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New T User'), ['controller' => 'TUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tDomains form large-9 medium-8 columns content">
    <?= $this->Form->create($tDomain) ?>
    <fieldset>
        <legend><?= __('Edit T Domain') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
