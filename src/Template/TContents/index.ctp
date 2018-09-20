<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TContent[]|\Cake\Collection\CollectionInterface $tContents
 */
?>

<div class="tContents index large-9 medium-8 columns content">
    <h3><?= __('案件一覧') ?></h3>
    <h5>ドメイン選択</h5>
    <?php
      foreach($tDomains as $name ) {
        echo $name['name'];
      }
    ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('登録日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ドメイン名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('アフィリパラメータ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('登録者名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('製品名') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tContents as $tContent): ?>
            <tr>
                <td><?= h($tContent->created) ?></td>
                <td><?= h($tContent->domain) ?></td>
                <td><?= h($tContent->param) ?></td>
                <td><?= h($tContent->name) ?></td>
                <td><?= h($tContent->product_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $tContent->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $tContent->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $tContent->id], ['confirm' => __('削除してよろしいですか？', $tContent->id), 'class' => 'delete']) ?>
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
