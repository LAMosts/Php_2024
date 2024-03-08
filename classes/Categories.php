<?php

require_once __DIR__ . "/Table.php";

class Categories extends Table
{
    public function __construct()
    {
        parent::__construct('category');
    }
}