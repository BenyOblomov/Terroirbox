<?php
function getPDOlink($config) {
    // Construction de la chaîne de connexion DSN (Data Source Name) pour PDO
    $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['dbhost'] . ';port=' . $config['dbport'];

    try {
        // Tentative de connexion à la base de données en utilisant PDO
        $db = new PDO($dsn, $config['dbuser'], $config['dbpass']);

        // Configuration de l'encodage des caractères de la connexion à UTF-8 pour éviter les problèmes d'encodage
        $db->exec("SET NAMES utf8");

        // Définition du mode de récupération par défaut des résultats de requête à FETCH_ASSOC
        // Cela signifie que fetch() retournera un tableau associatif pour chaque ligne de résultat
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Retourne la connexion à la base de données nouvellement établie
        return $db;

    } catch (PDOException $e) {
        // En cas d'échec de la connexion, une exception de type PDOException est attrapée
        // Un message d'erreur est affiché, indiquant le problème rencontré lors de la connexion à la base de données
        exit('BDD Erreur de connexion : ' . $e->getMessage());
    }
}