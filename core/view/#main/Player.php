<?php

use core\code\Functions;
use core\code\System;

$Functions = new Functions;

if ($_GET['Movie']) {
    $Movie = $_GET['Movie'];
    $Movie = $Functions->__AesDecrypt($Movie);
    if ($Movie == false || $Movie == -1) {
        System::http_reponse_erro(404);
    }
} else {
    System::http_reponse_erro(404);
}

?>
<div id="Player">
    <div class="container">
        
    </div>
</div>