<?php

namespace App\Core;

class Config
{
    private $data;

    public function __construct() {
        $json = file_get_contents(__DIR__ . '/../../config/app.json');
        $this->data = json_decode($json, true);
    }

    public function get($key) {
        if (!isset($this->data[$key])) {
            throw new Exception("Key $key not in config.");
        }
        return $this->data[$key];
    }
}