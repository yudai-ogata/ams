<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUser $tUser
 */
?>
<div class="tUsers view large-10 medium-9 columns content">
    <h3><?= h($tUser->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ユーザー名') ?></th>
            <td><?= h($tUser->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ドメイン名') ?></th>
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
