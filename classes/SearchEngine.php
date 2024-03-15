<?php

require_once __DIR__ . "/Table.php";

Class SearchEngine extends Table {
    public function __construct()
    {
        parent::__construct('product');
    }
}