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
        <?php if (!empty($tContent->name_kana)) { ?>
            <tr>
                <th scope="row"><?= __('名前（カナ）') ?></th>
                <td><?= h($tContent->name_kana) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->age)) { ?>
            <tr>
                <th scope="row"><?= __('年齢') ?></th>
                <td><?= h($tContent->age) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->gender)) { ?>
            <tr>
                <th scope="row"><?= __('性別') ?></th>
                <td><?php if($tContent->gender == 1 ){ echo "男性"; }
                      elseif($tContent->gender == 2 ){ echo "女性"; }
                      else{ echo "未選択"; } ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->tel)) { ?>
            <tr>
                <th scope="row"><?= __('電話番号') ?></th>
                <td><?= h($tContent->tel) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->zip)) { ?>
            <tr>
                <th scope="row"><?= __('郵便番号') ?></th>
                <td><?= h($tContent->zip) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->address)) { ?>
            <tr>
                <th scope="row"><?= __('住所') ?></th>
                <td><?= h($tContent->address) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->email)) { ?>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= h($tContent->email) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->domain)) { ?>
            <tr>
                <th scope="row"><?= __('ドメイン名') ?></th>
                <td><?= h($tContent->domain) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->param)) { ?>
            <tr>
                <th scope="row"><?= __('アフィリパラメータ') ?></th>
                <td><?= h($tContent->param) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->product_name)) { ?>
            <tr>
                <th scope="row"><?= __('商品名') ?></th>
                <td><?= h($tContent->product_name) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->number1)) { ?>
            <tr>
                <th scope="row"><?= __('数量1') ?></th>
                <td><?= h($tContent->number1) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->number2)) { ?>
            <tr>
                <th scope="row"><?= __('数量2') ?></th>
                <td><?= h($tContent->number2) ?></td>
            </tr>
        <?php } ?>
        <?php if (!empty($tContent->number3)) { ?>
            <tr>
                <th scope="row"><?= __('数量3') ?></th>
                <td><?= h($tContent->number3) ?></td>
            </tr>
        <?php } ?>
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
        <?php if( !empty($tContent->detail1) ) { ?>
            <h4><?= __('詳細') ?></h4>
            <?= $this->Text->autoParagraph(h($tContent->detail1)); ?>
        <?php }
        if( !empty($tContent->detail2) ) { ?>
            <h4><?= __('詳細2') ?></h4>
            <?= $this->Text->autoParagraph(h($tContent->detail2)); ?>
        <?php }
        if( !empty($tContent->detail3) ) { ?>
            <h4><?= __('詳細3') ?></h4>
            <?= $this->Text->autoParagraph(h($tContent->detail3)); ?>
        <?php }
        if( !empty($tContent->detail4) ) { ?>
            <h4><?= __('詳細4') ?></h4>
            <?= $this->Text->autoParagraph(h($tContent->detail4)); ?>
        <?php }
        if( !empty($tContent->detail5) ) { ?>
            <h4><?= __('詳細5') ?></h4>
            <?= $this->Text->autoParagraph(h($tContent->detail5)); ?>
        <?php } ?>
    </div>
</div>
