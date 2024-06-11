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
     * Méthode permettant de récupérer plusieurs fichiers PDF par leurs ID
     * 
     * @param array $ids
     * @return array
     */
    public static function getByIds(array $ids): array
    {
        try {
            // Création d'un objet $pdo selon la classe PDO
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête avec des marqueurs nominatifs pour plusieurs ID
            $inQuery = implode(',', array_fill(0, count($ids), '?'));
            $sql = "SELECT * FROM `fichiers_pdf` WHERE `id` IN ($inQuery)";
            $query = $pdo->prepare($sql);

            // Liaison des valeurs des paramètres
            foreach ($ids as $k => $id) {
                $query->bindValue(($k + 1), $id, PDO::PARAM_INT);
            }

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

    /**
     * Méthode permettant de rechercher des fichiers PDF par mots-clés dans la base de données
     * 
     * @param string $keyword
     * @return array
     */
    public static function searchByKeyword(string $keyword): array
    {
        try {
            // Création d'un objet $pdo selon la classe PDO
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête SQL avec des paramètres nominatifs pour éviter les injections SQL
            $sql = "SELECT * FROM `fichiers_pdf` WHERE `nom_fichier` LIKE :keyword";
            $query = $pdo->prepare($sql);

            // Liaison des valeurs des paramètres
            $query->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);

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

