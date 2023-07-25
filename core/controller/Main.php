<?php

namespace core\controller;

use core\code\System;

class Main
{
    
    // ============================================================
    // LAYOUT (DATA)
    // ============================================================
    private $data;

    public function __construct()
    {
        $this->data = System::resources();
    }
    
    // ============================================================
    public function Home()
    {
        $this->data['css'][] = 'page/Home.css';
        $this->data['js'][] = 'page/Home.js';

        $array = [
            'layout/header.html',
            // 'layout/header',
            '#main/Home',
            'layout/footer',
            'layout/footer.html',
        ];

        System::layout($array, $this->data);
    }
    
    // ============================================================
    public function Iframe()
    {
        $this->data['css'][] = 'page/Iframe.css';
        $this->data['js'][] = 'page/Iframe.js';

        $array = [
            'layout/header.html',
            '#main/Iframe',
            'layout/footer.html',
        ];

        System::layout($array, $this->data);
    }
    
    // ============================================================
    public function Player()
    {
        $this->data['css'][] = 'page/Player.css';
        $this->data['js'][] = 'page/Player.js';

        $array = [
            'layout/header.html',
            '#main/Player',
            'layout/footer.html',
        ];

        System::layout($array, $this->data);
    }
}