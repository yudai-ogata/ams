<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TDomain[]|\Cake\Collection\CollectionInterface $tDomains
 */
?>
<div class="tDomains index large-9 medium-8 columns content">
    <h3>ドメイン一覧</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ドメイン名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('登録日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('更新日') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tDomains as $tDomain): ?>
            <tr>
                <td><?= h($tDomain->name) ?></td>
                <td><?= h($tDomain->created) ?></td>
                <td><?= h($tDomain->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('ユーザー'), ['action' => 'view', $tDomain->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $tDomain->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $tDomain->id], ['confirm' => __('削除してもよろしいですか？', $tDomain->id), 'class' => 'delete']) ?>
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
