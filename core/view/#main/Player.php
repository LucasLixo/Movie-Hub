<?php

use core\code\Functions;
use core\code\System;

$Functions = new Functions;

if (isset($_GET['I'])) {
    $I = $_GET['I'];
    $I = $Functions->__AesDecrypt($I);
    if ($I == false || $I == -1) {
        System::http_reponse_erro(404);
    }
} else {
    System::http_reponse_erro(404);
}

if (isset($_GET['Type'])) {
    $Type = $_GET['Type'];
    $Type = $Functions->__AesDecrypt($Type);
    if ($Type == false || $Type == -1) {
        System::http_reponse_erro(404);
    }
} else {
    System::http_reponse_erro(404);
}

switch ($Type) {
    case 'movie':
        $Type = 'filme';
        break;
    case 'series':
        $Type = 'serie';
        break;
    default:
        System::http_reponse_erro(404);
        break;
}

$results = $Functions->api_request([
    'i' => $I,
    'type' => $Type,
    'plot' => 'full'
]);

if ($results['Response'] !== 'True') {
    System::http_reponse_erro(404);
}

?>
<div id="Player">
    <div class="container">
        <div class="context">
            <h3><?= $results['Title'] ?></h3>
        </div>
        <div id="PlayerEmbed"></div>
    </div>
    <script>
        var type = "serie";
        var imdb = "tt0050079";
        var season = "1";
        var episode = "1";
        PlayerPlugin(type, imdb, season, episode);

        function PlayerPlugin(type, imdb, season, episode) {
            if (type == "filme") {
                season = "";
                episode = "";
            } else {
                if (season !== "") {
                    season = "/" + season;
                }
                if (episode !== "") {
                    episode = "/" + episode;
                }
            }
            var frame = document.getElementById('PlayerEmbed');
            frame.innerHTML += '<iframe src="https://embed.warezcdn.com/' + type + '/' + imdb + season + episode + '#transparent" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';
        }
    </script>
</div>