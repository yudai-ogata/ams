<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TContent[]|\Cake\Collection\CollectionInterface $tContents
 */
?>

<div class="tContents index large-10 medium-9 columns content">
    <h3><?= __('案件一覧') ?></h3>
    <div class="find_box">
        <?= $this->Form->create("",["action"=>"find"]) ?>
        <?= $this->Form->input('find',["label"=>"案件検索", "value"=>$find]); ?>
        <?= $this->Form->button('検索',["class"=>"find_btn"]) ?>
        <?= $this->Form->end() ?>
    </div>
    <p class="find_notice">
        検索対象は「登録日」「ドメイン名」「アフィリパラメータ」「登録者名」「製品名」です。<br>
        このうち、「アフィリパラメータ」のみ、検索ワードと登録内容が完全一致した場合のみヒットします。
    </p>
    <div class="findDomain">
        <h5 class="domain_ttl">ドメイン検索</h5>
        <?php
          foreach($tDomains as $name ) {?>
            <?= $this->Html->link(__($name['name']), ['action' => 'find', $name['name']],[ 'class' => "domain_name"]) ?>
          <?php }
        ?>
    </div>
    <div class="numberBox">
        <span class="numberText">表示件数：</span>
        <?php if ($number == 10) { ?>
            <span class="number number_selected">10件</span>
        <?php } else {
            echo $this->Html->link(__('10件'), ['action' => 'find', $find, 10],[ 'class' => "number"]);
        } ?>
        <?php if ($number == 30) { ?>
            <span class="number number_selected">30件</span>
        <?php } else {
            echo $this->Html->link(__('30件'), ['action' => 'find', $find,30],[ 'class' => "number"]);
        } ?>
        <?php if ($number == 50) { ?>
            <span class="number number_selected">50件</span>
        <?php } else {
            echo $this->Html->link(__('50件'), ['action' => 'find', $find,50],[ 'class' => "number"]);
        } ?>
        <?php if ($number == 100) { ?>
            <span class="number number_selected">100件</span>
        <?php } else {
            echo $this->Html->link(__('100件'), ['action' => 'find', $find,100],[ 'class' => "number"]);
        } ?>
    </div>
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
                <td><?= h($tContent->created->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></td>
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
    <?= $this->Html->link(__('CSV出力'), ['action' => 'export'],['class' => 'export_btn']) ?>
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
