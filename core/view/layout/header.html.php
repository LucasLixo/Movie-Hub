<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="icon" href="./resource/image/logo.png" type="image/png">
    <title><?= PROJECT_NAME ?></title>
    <?php if (isset($css) && !empty($css)) : ?>
        <?php foreach ($css as $c) : ?>
            <link rel="stylesheet" href="./resource/style/<?= $c ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <style>
        /* html {
            display: none;
        } */
    </style>
</head>

<body>
    <div id="Global">