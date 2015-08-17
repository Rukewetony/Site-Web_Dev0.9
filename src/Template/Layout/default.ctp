<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        OranTicket // <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('app'); ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="hamburger" onclick="javascript:visible('sidebar');">
  <span></span>
  <span></span>
  <span></span>
</div>
    <script type="text/javascript">

    </script>
    <header id="sidebar" class="row">
        <div class="header">
            <nav class="sidenav">
                <div class="img">
                    <img src="http://img15.hostingpics.net/pics/359461oranticket.png" width="180">
                </div>

                <ul class="main-buttons">
                    <li><a href="#"><i class="fa fa-plus fa-2x"></i></a></li>

                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Tickets</a></li>
                </ul>

                <div class="footer">
                    <div class="row center">
                        <div class="col-md-4 col-xs-4 col-l-4">
                            <a href="#"><i class="fa fa-question fa-1x"></i></a>
                        </div>
                        <div class="col-md-4 col-xs-4 col-l-4">
                            <a href="#"><i class="fa fa-envelope-o fa-1x"></i></a>
                        </div>
                        <div class="col-md-4 col-xs-4 col-l-4">
                            <a href="#"><i class="fa fa-github fa-1x"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

    <script>
        visible('sidebar');
    </script>

</body>
</html>
