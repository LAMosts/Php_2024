?<?php
require_once __DIR__ . "/Table.php";

Class Users extends Table { 

    public function __construct()
    {
        parent::__construct('Users');
    } 

}