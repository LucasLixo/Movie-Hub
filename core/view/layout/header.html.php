<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> -->
    <link rel="icon" href="./resource/image/Logo.png" type="image/png">
    <title><?= PROJECT_NAME ?></title>
    <?php if (isset($css) && !empty($css)) : ?>
        <?php foreach ($css as $c) : ?>
            <link rel="stylesheet" href="./resource/style/<?= $c ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <style type="text/css">
        html {
            display: none;
        }
        /* * {
            outline: solid red 1px;
        } */
    </style>
</head>

<body>
    <aside id="Global">