# PHP - CNAM 2024

---

# E-commerce Backend Website

Ce projet est un site web backend pour un commerce électronique où les utilisateurs peuvent se connecter et s'inscrire. L'objectif principal est d'afficher différentes catégories de produits ainsi que les produits associés. Actuellement, le site permet de réaliser des recherches spécifiques, mais il rencontre des difficultés pour rechercher un produit sans avoir spécifié de catégorie. De plus, bien que le système de connexion soit configuré, l'idée était de permettre la gestion (ajout ou suppression) des catégories et des produits une fois connecté.

## Problème de Recherche

Le principal problème identifié est que la recherche de produits sans avoir spécifié de catégorie ne fonctionne pas correctement. Cela semble être lié à une erreur de syntaxe quelque part dans le code, mais l'endroit exact n'a pas encore été identifié.

## Fonctionnalités Actuelles

- Connexion et inscription d'utilisateurs.
- Affichage des catégories de produits et des produits associés.
- Recherche spécifique de produits.
- Gestion de l'affichage des produits en fonction des catégories.
- Connexion: inscription avec hachage et chiffrement du mdp

## Prochaines Étapes

- Résoudre le problème de recherche pour permettre la recherche de produits sans spécifier de catégorie.
- Implémenter la fonctionnalité de gestion des catégories et des produits une fois connecté.
- Réaliser des tests pour s'assurer que toutes les fonctionnalités sont opérationnelles.

## Instructions d'Installation

1. Clonez ce dépôt sur votre machine locale.
2. Configurez l'environnement de développement (PHP, base de données, etc.).
3. Importez la base de données fournie php_store/bdd/php_store.php et configurez les informations de connexion dans le fichier `db.ini`.
4. Lancez le serveur et accédez au site dans votre navigateur. il se peut que les img ne s'affiche pas dans ce cas tourner vous sur le navigateur `duckduckgo`

## Base de données - Configuration 
`db.ini` dans le dossier `Config`, données de configuration : 

````ini
HOST =dbhost
PORT =dbPort
DB_NAME =dbname
CHARSET =dbCHARSET
USER =dbuser
PASSWORD =dbpsswrd
````

## Technologies Utilisées

- PHP
- HTML
- CSS

---