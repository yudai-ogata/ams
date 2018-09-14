<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TDomain[]|\Cake\Collection\CollectionInterface $tDomains
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New T Domain'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List T Users'), ['controller' => 'TUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New T User'), ['controller' => 'TUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tDomains index large-9 medium-8 columns content">
    <h3><?= __('T Domains') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tDomains as $tDomain): ?>
            <tr>
                <td><?= $this->Number->format($tDomain->id) ?></td>
                <td><?= h($tDomain->name) ?></td>
                <td><?= h($tDomain->created) ?></td>
                <td><?= h($tDomain->modified) ?></td>
                <td><?= h($tDomain->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tDomain->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tDomain->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tDomain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tDomain->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
