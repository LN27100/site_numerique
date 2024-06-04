<?php

class Pdf
{
    /**
     * Méthode permettant de récupérer tous les fichiers PDF dans la base de données
     * 
     * @return array
     */
    public static function getAll(): array
    {
        try {
            // Création d'un objet $pdo selon la classe PDO
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Stockage de ma requête dans une variable
            $sql = "SELECT * FROM `fichiers_pdf`";

            // Je prépare ma requête pour éviter les injections SQL
            $query = $pdo->prepare($sql);

            // On exécute la requête
            $query->execute();

            // On récupère tous les résultats de la requête dans une variable
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // On retourne le résultat
            return $result ?? [];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Méthode permettant de récupérer un fichier PDF par son ID
     * 
     * @param int $id
     * @return array
     */
    public static function getByIds(array $ids): array
{
    try {
        // Création d'un objet $pdo selon la classe PDO
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête avec des marqueurs nominatifs pour plusieurs ID
        $sql = "SELECT * FROM `fichiers_pdf` WHERE `id` IN (:ids)";
        $query = $pdo->prepare($sql);

        // Conversion des ID en chaîne séparée par des virgules pour le marqueur nominatif
        $idsString = implode(', ', $ids);
        $query->bindValue(':ids', $idsString, PDO::PARAM_STR);

        // Exécution de la requête
        $query->execute();

        // Récupération des résultats dans un tableau
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retour du résultat
        return $result ?? [];
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        die();
    }
}
}
