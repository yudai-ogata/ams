<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TDomain $tDomain
 */
?>
<div class="tDomains view large-9 medium-8 columns content">
    <h3><?= h($tDomain->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ドメイン名') ?></th>
            <td><?= h($tDomain->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('登録日') ?></th>
            <td><?= h($tDomain->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?= h($tDomain->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('閲覧権限持ちユーザー') ?></h4>
        <?php if (!empty($tDomain->t_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ユーザー名') ?></th>
                <th scope="col"><?= __('登録日') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
            <?php foreach ($tDomain->t_users as $tUsers): ?>
            <tr>
                <td><?= h($tUsers->name) ?></td>
                <td><?= h($tUsers->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('編集'), ['controller' => 'TUsers', 'action' => 'edit', $tUsers->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['controller' => 'TUsers', 'action' => 'delete', $tUsers->id], ['confirm' => __('削除してもよろしいですか？', $tUsers->id), 'class' => 'delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
