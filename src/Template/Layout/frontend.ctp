<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->element('head') ?>
</head>
<body>
<?= $this->element('header') ?>
<!-- Page Content -->
<div id="content" class="container">
    <?= $this->Flash->render() ?>
    <div class="row">
        <?= $this->fetch('content') ?>
    </div>
</div>
<?= $this->element('footer') ?>
</body>
</html>