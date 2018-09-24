<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '案件管理システム';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-3 columns">
            <li class="name">
                <h1><a href=""></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a><?= $user_info['name'] ?></a></li>
                <li><a><?= $user_info['domain'] ?></a></li>
                <li><a><?= $this->Html->link(__('ログアウト'), ['controller' => 'TUsers', 'action' => 'logout']) ?></a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <nav class="large-2 medium-3 columns" id="actions-sidebar">
          <ul class="side-nav">
              <li><?= $this->Html->link(__('案件一覧'), ['controller' => 'TContents', 'action' => 'index']) ?></li>
                  <?php if($user_info['admin']==true) { ?>
                  <li><?= $this->Html->link(__('ユーザー一覧'), ['controller' => 'TUsers', 'action' => 'index']) ?></li>
                  <li><?= $this->Html->link(__('ユーザー追加'), ['controller' => 'TUsers', 'action' => 'add']) ?></li>
                  <li><?= $this->Html->link(__('ドメイン一覧'), ['controller' => 'TDomains', 'action' => 'index']) ?></li>
                  <li><?= $this->Html->link(__('ドメイン追加'), ['controller' => 'TDomains', 'action' => 'add']) ?></li>
              <?php } ?>
          </ul>
        </nav>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
