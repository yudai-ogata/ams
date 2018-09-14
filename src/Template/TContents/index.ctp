<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TContent[]|\Cake\Collection\CollectionInterface $tContents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New T Content'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tContents index large-9 medium-8 columns content">
    <h3><?= __('T Contents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_kana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('domain') ?></th>
                <th scope="col"><?= $this->Paginator->sort('param') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tContents as $tContent): ?>
            <tr>
                <td><?= $this->Number->format($tContent->id) ?></td>
                <td><?= h($tContent->name) ?></td>
                <td><?= h($tContent->name_kana) ?></td>
                <td><?= h($tContent->age) ?></td>
                <td><?= h($tContent->gender) ?></td>
                <td><?= h($tContent->tel) ?></td>
                <td><?= h($tContent->zip) ?></td>
                <td><?= h($tContent->address) ?></td>
                <td><?= h($tContent->email) ?></td>
                <td><?= h($tContent->domain) ?></td>
                <td><?= h($tContent->param) ?></td>
                <td><?= h($tContent->product_name) ?></td>
                <td><?= h($tContent->created) ?></td>
                <td><?= h($tContent->modified) ?></td>
                <td><?= h($tContent->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tContent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tContent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tContent->id)]) ?>
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
