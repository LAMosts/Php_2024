?<?php
require_once __DIR__ . "/Table.php";

Class Users extends Table { 
    private $username;

    public function __construct()
    {
        parent::__construct('Users');
    } 
    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->username;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->username = $name;

        return $this;
    }
}