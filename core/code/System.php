<?php

namespace core\code;

use Exception;

class System
{
    // ============================================================
    // STATIC FUNCTIONS
    // ============================================================
    public static function __Data($data, $die = true)
    {

        echo '<pre>';
        if (is_object($data) || is_array($data)) {
            print_r($data);
        } else {
            echo $data;
        }

        if ($die) {
            die(PHP_EOL . 'FINISHED' . PHP_EOL);
        } else {
            echo (PHP_EOL . 'CONTINUED' . PHP_EOL);
            echo '</pre>';
        }
    }

    // ============================================================
    public static function http_reponse_erro($value = false)
    {
        if (!is_int($value)) {
            if ($value instanceof Exception) {
                $value = $value->getMessage();
            }
            
            $value = intval($value);
        }

        http_response_code($value);
        header("HTTP/1.0 $value");
        die;
    }

    // ============================================================
    public static function layout($structure = [], $data = null)
    {

        // VERIFY IF THE STRUCTURE IS AN ARRAY
        if (!is_array($structure)) {
            throw new Exception("invalid structure");
        }

        if (!empty($data) && is_array($data)) {
            extract($data);
        }

        // VARIABLES
        foreach ($structure as $s) {
            include_once("../core/view/$s.php");
        }
    }
    
    // ============================================================
    public static function resources() {
        return [
            'css' => ['reset.min.css', 'font.min.css', 'all.min.css'],
            'js' => ['jquery.bundle.js', 'all.bundle.js'],
        ];
    }

}

?>