<div class="login">
    <din class="loginBox">
        <?= $this->Form->create('TUsers'); ?>
        <p class="login_txt">名前</p>
        <?php echo $this->Form->input('name',["label"=>false, "type"=>"text", 'class'=> 'login_input']); ?><br>
        <p class="login_txt">パスワード</p>
        <?php echo $this->Form->input('password',["label"=>false, "type"=>"password", 'class'=> 'login_input']); ?><br>
        <p class="login_txt">パスコード</p>
        <?php echo $this->Form->input('input_code',["label"=>false, "type"=>"text", 'class'=> 'login_input']); ?><br>
        <img class="qr" src="<?= $qrcode ?>">
        <?= $this->Form->button(__('ログイン')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
