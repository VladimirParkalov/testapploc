<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->element('head') ?>
</head>
<body>
<?= $this->element('header') ?>
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <!-- navsidebar-->
        <?= $this->cell('Navsidebar') ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
            <?= $this->fetch('content') ?>
        </div>
    </div>
</div>
<?php
/**
<div id="content" class="container">
    <?= $this->Flash->render() ?>
    <div class="row">
        <?= $this->fetch('content') ?>
    </div>
</div>
*/
?>
<?= $this->element('footer') ?>
</body>
</html>