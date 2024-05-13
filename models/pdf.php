<?php

class Userprofil
{
    /**
     * Méthode permettant de créer un utilisateur
     * @param string $nom Nom de l'utilisateur
     * @param string $prenom Prénom de l'utilisateur
     * @param string $pseudo Pseudo de l'utilisateur
     * @param string $email Email de l'utilisateur
     * @param string $mot_de_passe Mot de passe de l'utilisateur
     */

    public static function create(string $userprofil_name, string $userprofil_firstname, string $userprofil_pseudo, string $userprofil_mail, string $userprofil_zipcode, string $userprofil_street_name, string $userprofil_phone, string $userprofil_additional_adress, string $userprofil_city, string $userprofil_password)
    {
        try {
            // Conexion à la base de données
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Stockage de la requete dans une variable
            $sql = "INSERT INTO userprofil (USERPROFIL_NAME, USERPROFIL_FIRSTNAME, USERPROFIL_PSEUDO, USERPROFIL_MAIL, USERPROFIL_ZIPCODE, USERPROFIL_STREET_NAME, USERPROFIL_PHONE, USERPROFIL_ADITTIONAL_ADRESS, USERPROFIL_CITY, USERPROFIL_PASSWORD)
             VALUES (:userprofil_name, :userprofil_firstname, :userprofil_pseudo, :userprofil_mail, :userprofil_zipcode, :userprofil_street_name, :userprofil_phone, :userprofil_additional_adress, :userprofil_city, :userprofil_password)";

            $query = $pdo->prepare($sql);

            // Relier les valeurs aux marqueurs nominatifs
            $query->bindValue(':userprofil_name', htmlspecialchars($userprofil_name), PDO::PARAM_STR);
            $query->bindValue(':userprofil_firstname', htmlspecialchars($userprofil_firstname), PDO::PARAM_STR);
            $query->bindValue(':userprofil_pseudo', htmlspecialchars($userprofil_pseudo), PDO::PARAM_STR);
            $query->bindValue(':userprofil_mail', $userprofil_mail, PDO::PARAM_STR);
            $query->bindValue(':userprofil_zipcode', $userprofil_zipcode, PDO::PARAM_STR);
            $query->bindValue(':userprofil_password', password_hash($userprofil_password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(':userprofil_street_name', $userprofil_street_name, PDO::PARAM_STR);
            $query->bindValue(':userprofil_phone', $userprofil_phone, PDO::PARAM_STR);
            $query->bindValue(':userprofil_additional_adress', $userprofil_additional_adress, PDO::PARAM_STR);
            $query->bindValue(':userprofil_city', $userprofil_city, PDO::PARAM_STR);

            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur :' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les informations d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $email Adresse mail de l'utilisateur
     * 
     * @return bool
     */
    public static function checkMailExists(string $userprofil_mail): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `userprofil` WHERE `USERPROFIL_MAIL` = :userprofil_mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $pdo->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':userprofil_mail', $userprofil_mail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }


    /**
     * Methode permettant de vérifier si le pseudo existe déjà dans la base de données
     * 
     * @param string $pseudo Pseudo à vérifier
     * 
     * @return bool
     */
    public static function checkPseudoExists(string $userprofil_pseudo): bool
    {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `userprofil` WHERE `userprofil_pseudo` = :userprofil_pseudo";

            $query = $pdo->prepare($sql);
            $query->bindValue(':userprofil_pseudo', $userprofil_pseudo, PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les infos d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $email Adresse mail de l'utilisateur
     * 
     * @return array Tableau associatif contenant les infos de l'utilisateur
     */
    public static function getInfos(string $userprofil_mail): array
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // stockage de ma requete dans une variable
            $sql = "SELECT *
                FROM `userprofil` 
                WHERE `USERPROFIL_MAIL` = :userprofil_mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $pdo->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':userprofil_mail', $userprofil_mail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result ?? [];
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * * Méthode pour modifier le profil utilisateur
     */
    public static function updateProfil(int $USERPROFIL_ID, string $new_street, string $new_name, string $new_firstname, string $new_pseudo, string $new_email, string $new_additionnal, string $new_zipcode, string $new_city, string $new_phone)
    {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE userprofil 
                SET USERPROFIL_PHONE = :new_phone, 
                USERPROFIL_STREET_NAME = :new_street,  
                USERPROFIL_MAIL = :new_email, 
                USERPROFIL_PSEUDO = :new_pseudo, 
                USERPROFIL_ADITTIONAL_ADRESS = :new_additionnal, 
                USERPROFIL_ZIPCODE = :new_zipcode, 
                USERPROFIL_CITY = :new_city,
                USERPROFIL_FIRSTNAME = :new_firstname,
                USERPROFIL_NAME = :new_name  
                WHERE USERPROFIL_ID = :USERPROFIL_ID";

            $query = $pdo->prepare($sql);

            $query->bindValue(':new_street', $new_street, PDO::PARAM_STR);
            $query->bindValue(':new_name', $new_name, PDO::PARAM_STR);
            $query->bindValue(':new_firstname', $new_firstname, PDO::PARAM_STR);
            $query->bindValue(':new_pseudo', $new_pseudo, PDO::PARAM_STR);
            $query->bindValue(':new_email', $new_email, PDO::PARAM_STR);
            $query->bindValue(':new_additionnal', $new_additionnal, PDO::PARAM_STR);
            $query->bindValue(':new_zipcode', $new_zipcode, PDO::PARAM_STR);
            $query->bindValue(':new_city', $new_city, PDO::PARAM_STR);
            $query->bindValue(':new_phone', $new_phone, PDO::PARAM_STR);
            $query->bindValue(':USERPROFIL_ID', $USERPROFIL_ID, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            error_log('Erreur lors de la mise à jour du profil : ' . $e->getMessage());
            throw new Exception('Une erreur s\'est produite lors de la mise à jour du profil.');
        }
    }

    /**
     * Méthode pour supprimer le profil entreprise
     * @param int $entreprise_id est l'id de l'entreprise
     * @return bool|string Renvoie true si la suppression est réussie, sinon renvoie un message d'erreur
     */
    public static function deleteUser(int $USERPROFIL_ID)
    {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);          
            $sql = "DELETE FROM `userprofil` WHERE USERPROFIL_ID = :USERPROFIL_ID";
            $query = $pdo->prepare($sql);
            $query->bindValue(':USERPROFIL_ID', $USERPROFIL_ID, PDO::PARAM_INT);
            $query->execute();
            // Détruire la session
            session_destroy();
            // Supprimer le mot de passe de la session
            unset($_SESSION['USERPROFIL_PASSWORD']);
            return true;
        } catch (PDOException $e) {
            // Si une erreur se produit, retourner le message d'erreur
            return 'Erreur : ' . $e->getMessage();
        }
    }
}
