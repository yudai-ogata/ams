<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TContent $tContent
 */
?>
<div class="tContents form large-10 medium-9 columns content">
    <?= $this->Form->create($tContent) ?>
    <fieldset>
        <legend><?= __('案件編集') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'名前']);
            echo $this->Form->control('name_kana',['label'=>'名前（カナ）']);
            echo $this->Form->control('age',['type'=>'number','label'=>'年齢']);
            echo $this->Form->radio('gender',[
                ['value' => '1', 'text' => '男性'],
                ['value' => '2', 'text' => '女性'],
              ]);
            echo $this->Form->control('tel',['label'=>'電話番号']);
            echo $this->Form->control('zip',['label'=>'郵便番号','pattern'=>'\d{3}-?\d{4}']);
            echo $this->Form->control('address',['label'=>'住所']);
            echo $this->Form->control('email',['type'=>'email','label'=>'Email']);
            echo $this->Form->control('domain',['label'=>'ドメイン名']);
            echo $this->Form->control('param',['label'=>'アフィリパラメータ']);
            echo $this->Form->control('product_name',['label'=>'商品名']);
            echo $this->Form->control('number1',['label'=>'数量1']);
            echo $this->Form->control('number2',['label'=>'数量2']);
            echo $this->Form->control('number3',['label'=>'数量3']);
            echo $this->Form->control('detail1',['label'=>'詳細1']);
            echo $this->Form->control('detail2',['label'=>'詳細2']);
            echo $this->Form->control('detail3',['label'=>'詳細3']);
            echo $this->Form->control('detail4',['label'=>'詳細4']);
            echo $this->Form->control('detail5',['label'=>'詳細5']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('更新')) ?>
    <?= $this->Form->end() ?>
</div>
