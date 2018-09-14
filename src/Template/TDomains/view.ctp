<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TDomain $tDomain
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit T Domain'), ['action' => 'edit', $tDomain->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete T Domain'), ['action' => 'delete', $tDomain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tDomain->id)]) ?> </li>
        <li><?= $this->Html->link(__('List T Domains'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T Domain'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List T Users'), ['controller' => 'TUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T User'), ['controller' => 'TUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tDomains view large-9 medium-8 columns content">
    <h3><?= h($tDomain->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tDomain->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tDomain->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tDomain->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tDomain->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $tDomain->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related T Users') ?></h4>
        <?php if (!empty($tDomain->t_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Pw') ?></th>
                <th scope="col"><?= __('Admin') ?></th>
                <th scope="col"><?= __('T Domain Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tDomain->t_users as $tUsers): ?>
            <tr>
                <td><?= h($tUsers->id) ?></td>
                <td><?= h($tUsers->name) ?></td>
                <td><?= h($tUsers->pw) ?></td>
                <td><?= h($tUsers->admin) ?></td>
                <td><?= h($tUsers->t_domain_id) ?></td>
                <td><?= h($tUsers->created) ?></td>
                <td><?= h($tUsers->modified) ?></td>
                <td><?= h($tUsers->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TUsers', 'action' => 'view', $tUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TUsers', 'action' => 'edit', $tUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TUsers', 'action' => 'delete', $tUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
