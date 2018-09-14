<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUser $tUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit T User'), ['action' => 'edit', $tUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete T User'), ['action' => 'delete', $tUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List T Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List T Domains'), ['controller' => 'TDomains', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T Domain'), ['controller' => 'TDomains', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tUsers view large-9 medium-8 columns content">
    <h3><?= h($tUser->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tUser->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pw') ?></th>
            <td><?= h($tUser->pw) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Domain') ?></th>
            <td><?= $tUser->has('t_domain') ? $this->Html->link($tUser->t_domain->name, ['controller' => 'TDomains', 'action' => 'view', $tUser->t_domain->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $tUser->admin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $tUser->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
