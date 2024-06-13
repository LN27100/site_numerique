<?php

class ContactModel
{
    /**
     * Méthode permettant de sauvegarder un message de contact dans la base de données
     * 
     * @param string $name
     * @param string $email
     * @param string $subject
     * @param string $message
     * @return bool
     */
    public static function saveContact(string $name, string $email, string $subject, string $message): bool
    {
        try {
            // Création d'un objet $pdo selon la classe PDO
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête d'insertion avec des paramètres nominatifs
            $sql = "INSERT INTO `contacts` (`name`, `email`, `subject`, `message`) VALUES (:name, :email, :subject, :message)";
            $query = $pdo->prepare($sql);

            // Liaison des valeurs des paramètres
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':subject', $subject, PDO::PARAM_STR);
            $query->bindValue(':message', $message, PDO::PARAM_STR);

            // Exécution de la requête
            return $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Méthode permettant de récupérer tous les messages de contact dans la base de données
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
            $sql = "SELECT * FROM `contacts`";

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
     * Méthode permettant de récupérer un message de contact par son ID
     * 
     * @param int $id
     * @return array|null
     */
    public static function getById(int $id): ?array
    {
        try {
            // Création d'un objet $pdo selon la classe PDO
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête avec un marqueur nominatif pour l'ID
            $sql = "SELECT * FROM `contacts` WHERE `id` = :id";
            $query = $pdo->prepare($sql);

            // Liaison des valeurs des paramètres
            $query->bindValue(':id', $id, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();

            // Récupération du résultat dans un tableau
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Retour du résultat
            return $result ?: null;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
?>
