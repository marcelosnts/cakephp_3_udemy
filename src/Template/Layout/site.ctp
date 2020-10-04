<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'site']) ?>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->element('site_header') ?>

    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>

    <?= $this->element('site_footer') ?>

    <?= $this->Html->script(['jquery-3.3.1.min', 'bootstrap.min', 'popper.min']) ?>
</body>
</html>
