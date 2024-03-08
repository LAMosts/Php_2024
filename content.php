<?php

class cCRUD {
    private $connexion;

    // Constructeur
    public function __construct($host, $utilisateur, $motDePasse, $baseDeDonnees) {
        $this->connexion = new mysqli($host, $utilisateur, $motDePasse, $baseDeDonnees);

        if ($this->connexion->connect_error) {
            die("Échec de la connexion à la base de données : " . $this->connexion->connect_error);
        }
    }

    // Fonction pour créer un enregistrement
    public function creerEnregistrement($table, $donnees) {
        $colonnes = implode(', ', array_keys($donnees));
        $valeurs = "'" . implode("', '", array_values($donnees)) . "'";

        $requete = "INSERT INTO $table ($colonnes) VALUES ($valeurs)";
        $resultat = $this->connexion->query($requete);

        return $resultat;
    }

    // Fonction pour lire un enregistrement
    public function lireEnregistrement($table, $colonne) {
        $requete = "SELECT $colonne FROM $table";
        $resultat = $this->connexion->query($requete);

        return $resultat->fetch_assoc();
    }

    // Fonction pour mettre à jour un enregistrement
    public function mettreAJourEnregistrement($table, $donnees, $condition) {
        $modification = '';

        foreach ($donnees as $colonne => $valeur) {
            $modification .= "$colonne = '$valeur', ";
        }

        $modification = rtrim($modification, ', ');

        $requete = "UPDATE $table SET $modification WHERE $condition";
        $resultat = $this->connexion->query($requete);

        return $resultat;
    }

    // Fonction pour supprimer un enregistrement
    public function supprimerEnregistrement($table, $condition) {
        $requete = "DELETE FROM $table WHERE $condition";
        $resultat = $this->connexion->query($requete);

        return $resultat;
    }

    // Fermer la connexion à la base de données
    public function fermerConnexion() {
        $this->connexion->close();
    }
}

// Exemple d'utilisation :
$maClasseCRUD = new cCRUD('localhost', 'utilisateur', 'motdepasse', 'basededonnees');

// Créer un enregistrement
$donneesCreation = array('colonne1' => 'valeur1', 'colonne2' => 'valeur2');
$maClasseCRUD->creerEnregistrement('ma_table', $donneesCreation);

// Lire un enregistrement
//$resultatLecture[] = $maClasseCRUD->lireEnregistrement('category', '');
//print_r($resultatLecture);

// Mettre à jour un enregistrement
$donneesMiseAJour = array('colonne1' => 'nouvelle_valeur1', 'colonne2' => 'nouvelle_valeur2');
$maClasseCRUD->mettreAJourEnregistrement('ma_table', $donneesMiseAJour, 'id = 1');

// Supprimer un enregistrement
$maClasseCRUD->supprimerEnregistrement('ma_table', 'id = 1');

// Fermer la connexion
$maClasseCRUD->fermerConnexion();
