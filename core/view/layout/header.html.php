<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="icon" href="" type="image/svg+xml">
    <title><?= PROJECT_NAME ?></title>
    <?php if (isset($css) && !empty($css)) : ?>
        <?php foreach ($css as $c) : ?>
            <link rel="stylesheet" href="./resource/style/<?= $c ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <style>
        html {
            display: none;
        }
        
        * {
            outline: 0.5px solid red;
        }
    </style>
</head>

<body>
    <div id="Global">