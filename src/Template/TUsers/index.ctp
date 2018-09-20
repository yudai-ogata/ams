<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUser[]|\Cake\Collection\CollectionInterface $tUsers
 */
?>
<div class="tUsers index large-9 medium-8 columns content">
    <h3><?= __('ユーザー一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ユーザー名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('管理ドメイン') ?></th>
                <th scope="col"><?= $this->Paginator->sort('管理権限') ?></th>
                <th scope="col"><?= $this->Paginator->sort('登録日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('更新日') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tUsers as $tUser): ?>
            <tr>
                <td><?= h($tUser->name) ?></td>
                <td><?= $tUser->has('t_domain') ? $this->Html->link($tUser->t_domain->name, ['controller' => 'TDomains', 'action' => 'view', $tUser->t_domain->id]) : '' ?></td>
                <td><?php if($tUser->admin == true) {echo '有';} ?></td>
                <td><?= h($tUser->created) ?></td>
                <td><?= h($tUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $tUser->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $tUser->id], ['confirm' => __('削除してもよろしいですか？', $tUser->id), 'class' => 'delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('前へ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次へ') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('{{pages}} ページ中 {{page}}ページ目, 全 {{count}} 件中 {{current}} 件表示')]) ?></p>
    </div>
</div>
