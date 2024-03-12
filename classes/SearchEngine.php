<?php 

require_once __DIR__ . "/Table.php";

class SearchEngine extends Table {
    private $dbConnection; //à voir pour recup' la connexion a la bdd de table.php
    
    public function __construct() {
        parent::__construct('');
    }
    
    public function fullTextSearch($keyword) {
    }
    
    public function filteredSearch($filters) {

    }
    
    private function executeQuery($query) {
        $result = $this->dbConnection->query($query);
        
        if (!$result) {
            die("Erreur lors de l'exécution de la requête : " . $this->dbConnection->error);
        }
        
        $resultsArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[] = $row;
            }
        }
        
        return $resultsArray;
    }
}


