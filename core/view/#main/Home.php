<?php

use core\code\Functions;
use core\code\System;

$Functions = new Functions;

?>
<div id="Home">
    <div class="container">
        <div class="div-space"></div>
        <h1>
            <a href="<?= PROJECT_HTTP ?>" target="_self"><?= PROJECT_NAME ?></a>
        </h1>
        <div class="div-space"></div>
        <strong>
            <span id="text-placeholder"></span>
            <span id="text-cursor">|</span>
        </strong>
        <div class="div-space"></div>
        <div class="div-space"></div>
        <div class="div-input">
            <form id="search-form" action="<?= PROJECT_HTTP ?>" method="post">
                <select name="type" id="type">
                    <option value="movie">Filme</option>
                    <option value="series">Serie</option>
                    <option value="series">Anime</option>
                </select>
                <input type="text" name="search" id="search" autocomplete="off">
                <button type="submit" id="submit">
                    <span class="material-symbols-outlined">Search</span>
                </button>
            </form>
        </div>
    </div>
    <div class="content">
        <?php
        
        if ((isset($_POST['type'])) && isset($_POST['search'])) {
            $url = '&type=' . $_POST['type'] . '&search=' . $_POST['search'];
        } else {
            $url = '&type=movie&search=a';
        }
        
        ?>
        <iframe src="<?= PROJECT_HTTP . '?' . RefPrimary . '=' . ReqSecundary . $url ?>" scrolling="no" frameborder="0" allow="fullscreen"></iframe>
    </div>
</div>