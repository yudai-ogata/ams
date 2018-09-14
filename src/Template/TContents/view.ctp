<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TContent $tContent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit T Content'), ['action' => 'edit', $tContent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete T Content'), ['action' => 'delete', $tContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tContent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List T Contents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T Content'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tContents view large-9 medium-8 columns content">
    <h3><?= h($tContent->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tContent->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Kana') ?></th>
            <td><?= h($tContent->name_kana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age') ?></th>
            <td><?= h($tContent->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($tContent->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($tContent->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($tContent->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($tContent->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Domain') ?></th>
            <td><?= h($tContent->domain) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Param') ?></th>
            <td><?= h($tContent->param) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Name') ?></th>
            <td><?= h($tContent->product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tContent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tContent->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tContent->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $tContent->gender ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $tContent->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Detail') ?></h4>
        <?= $this->Text->autoParagraph(h($tContent->detail)); ?>
    </div>
</div>
