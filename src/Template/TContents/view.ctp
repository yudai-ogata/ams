<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TContent $tContent
 */
?>
<div class="tContents view large-10 medium-9 columns content">
    <table class="vertical-table">
        <div class="actions">
          <?php if($user_info['admin'] == true) { ?>
              <?= $this->Html->link(__('編集'), ['action' => 'edit', $tContent->id]) ?>
              <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $tContent->id], ['confirm' => __('削除してよろしいですか？', $tContent->id), 'class' => 'delete']) ?>
          <?php } ?>
        </div>
        <tr>
            <th scope="row"><?= __('名前') ?></th>
            <td><?= h($tContent->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('名前（カナ）') ?></th>
            <td><?= h($tContent->name_kana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('年齢') ?></th>
            <td><?= h($tContent->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('性別') ?></th>
            <td><?php if($tContent->gender == 1 ){ echo "男性"; }
                  elseif($tContent->gender == 2 ){ echo "女性"; }
                  else{ echo "未選択"; } ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('電話番号') ?></th>
            <td><?= h($tContent->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('郵便番号') ?></th>
            <td><?= h($tContent->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('住所') ?></th>
            <td><?= h($tContent->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($tContent->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ドメイン名') ?></th>
            <td><?= h($tContent->domain) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('アフィリパラメータ') ?></th>
            <td><?= h($tContent->param) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('商品名') ?></th>
            <td><?= h($tContent->product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('登録日') ?></th>
            <td><?= h($tContent->created->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?= h($tContent->modified->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('詳細') ?></h4>
        <?= $this->Text->autoParagraph(h($tContent->detail)); ?>
    </div>
</div>
