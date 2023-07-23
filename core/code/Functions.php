<?php

namespace core\code;

use Exception;

class Functions
{
    // ============================================================
    // FUNCTION
    // ============================================================
    private $key = AES_KEY;
    private $iv = AES_IV;

    // ============================================================
    public function __AesEncrypt($string)
    {

        // ENCRYPT STRING
        return bin2hex(openssl_encrypt($string, 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $this->iv));
    }

    // ============================================================
    public function __AesDecrypt($string)
    {

        if (strlen($string) % 2 != 0) {
            return -1;
        }

        // DECRYPT STRING
        return openssl_decrypt(hex2bin($string), 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $this->iv);
    }

    // ============================================================
    public function api_request($variables = [], $method = 'POST')
    {
        // -----------------------------------------------
        // INICIO DO CURL INITIAL
        // -----------------------------------------------
        $initial = curl_init();
        // -----------------------------------------------
        // RETORNO DO RESULTADO NA STRING
        // -----------------------------------------------
        curl_setopt($initial, CURLOPT_RETURNTRANSFER, true);
        // -----------------------------------------------
        // DEFINE THE URL
        // -----------------------------------------------
        $url = URL_API . "&" . http_build_query($variables);

        // -----------------------------------------------
        // DEFINE O MÉTODO HTTP
        // -----------------------------------------------
        switch ($method) {
            case 'GET':
                curl_setopt($initial, CURLOPT_HTTPGET, true);
                break;
            case 'POST':
                curl_setopt($initial, CURLOPT_POST, true);
                curl_setopt($initial, CURLOPT_POSTFIELDS, $variables);
                break;
            case 'PUT':
                curl_setopt($initial, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($initial, CURLOPT_POSTFIELDS, $variables);
                break;
            default:
                // MÉTODO HTTP INVALIDO
                return ("Método HTTP inválido: $method, $variables, $url");
                // throw new Exception("Método HTTP inválido: $method");
        }

        // -----------------------------------------------
        curl_setopt($initial, CURLOPT_URL, $url);
        $response = curl_exec($initial);

        if ($response === false) {
            // -----------------------------------------------
            // ERRO NO CURL
            // -----------------------------------------------
            $error = curl_error($initial);
            curl_close($initial);
            return ("Erro no CURL: $error, $variables, $url");
            // throw new Exception("Erro no CURL: $error");
        }
        // -----------------------------------------------
        $http_code = curl_getinfo($initial, CURLINFO_HTTP_CODE);
        if ($http_code >= 400) {
            // -----------------------------------------------
            // ERRO NA API
            // -----------------------------------------------
            curl_close($initial);
            return ("Erro na API: $http_code, $variables, $url");
            // throw new Exception("Erro na API: $http_code");
        }
        // -----------------------------------------------
        curl_close($initial);
        // -----------------------------------------------
        return (json_decode($response, true));
    }
}
