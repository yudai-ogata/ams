<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUser[]|\Cake\Collection\CollectionInterface $tUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New T User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List T Domains'), ['controller' => 'TDomains', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New T Domain'), ['controller' => 'TDomains', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tUsers index large-9 medium-8 columns content">
    <h3><?= __('T Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pw') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_domain_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tUsers as $tUser): ?>
            <tr>
                <td><?= $this->Number->format($tUser->id) ?></td>
                <td><?= h($tUser->name) ?></td>
                <td><?= h($tUser->pw) ?></td>
                <td><?= h($tUser->admin) ?></td>
                <td><?= $tUser->has('t_domain') ? $this->Html->link($tUser->t_domain->name, ['controller' => 'TDomains', 'action' => 'view', $tUser->t_domain->id]) : '' ?></td>
                <td><?= h($tUser->created) ?></td>
                <td><?= h($tUser->modified) ?></td>
                <td><?= h($tUser->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tUser->id)]) ?>
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
