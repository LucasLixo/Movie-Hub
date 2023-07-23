<?php

use core\code\System;
use core\code\Functions;

require_once(dirname(__FILE__) . '/../../../code/Functions.php');
require_once(dirname(__FILE__) . '/../../core/code/System.php');

$data = [
    't' => 'batman',
    'page' => 3,
];

$Functions = new Functions();

System::__Data($Functions->api_request($data), false);

?>
<div id="Home">
    <div class="conteiner">
        <div class="shadow">
            <a href="" target="_blank" class="action-left">
                Assistir Agora
            </a>
            <div class="action-right">
                <a href="" target="_blank">Asistir Mais Tarde</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="session">
            <div class="options">
                <h3>Assistir Filmes Online</h3>
                <span>Novos Filmes</span>
                <span>Populares</span>
                <span>Mais Assistidos</span>
            </div>
            <div class="context">
                <article title="">
                    <a href="" target="_self">

                    </a>
                </article>
            </div>
        </div>
        <div class="session">
            <div class="options">
                <h3>Assistir Series Online</h3>
                <span>Novas Series</span>
                <span>Populares</span>
                <span>Mais Assistidos</span>
            </div>
            <div class="context"></div>
        </div>
        <div class="session">
            <div class="options">
                <h3>Assistir Animes Online</h3>
                <span>Novos Animes</span>
                <span>Populares</span>
                <span>Mais Assistidos</span>
            </div>
            <div class="context"></div>
        </div>
    </div>
</div>