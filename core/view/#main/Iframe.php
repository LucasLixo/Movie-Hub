<?php

use core\code\Functions;
use core\code\System;

$Functions = new Functions;

$results = $Functions->api_request([
    's' => 'batman',
    'type' => 'movie',
]);

if ($results['Response'] == "False") {
    System::http_reponse_erro(404);
}

?>
<div id="Iframe">
    <div class="container">
        <div class="movies">
            <?php foreach ($results['Search'] as $result) { ?>
                <article style="background: url(<?= $result['Poster'] ?>); background-size: cover;">
                    <?php
                    
                    $url = PROJECT_HTTP . '?' . RefPrimary . '=' . ReqTertiarty;
                    $url .= '&Movie=' . $Functions->__AesEncrypt($result['imdbID']);

                    ?>
                    <a href="<?= $url ?>">
                        <h5><?= $result['Year'] ?></h5>
                        <div>
                            <h4><?= $result['Title'] ?></h4>
                        </div>
                    </a>
                </article>
            <?php } ?>
        </div>
        <div class="page">
            <h4><?= floor($results['totalResults'] / 10) ?></h4>
        </div>
    </div>
</div>