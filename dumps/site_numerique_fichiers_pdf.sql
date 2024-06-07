-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: site_numerique
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fichiers_pdf`
--

DROP TABLE IF EXISTS `fichiers_pdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fichiers_pdf` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_fichier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `chemin_fichier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'chemin_par_defaut',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichiers_pdf`
--

LOCK TABLES `fichiers_pdf` WRITE;
/*!40000 ALTER TABLE `fichiers_pdf` DISABLE KEYS */;
INSERT INTO `fichiers_pdf` VALUES (1,'calcul_heure_supp_Excel.pdf',''),(2,'Corrigé _prix_HT_et_TTC.pdf',''),(3,'corrigé_exercice2_fonctionSI.pdf',''),(4,'corrigé_exercice3_fonctionSI.pdf',''),(5,'Corrigé_fonctionSI.pdf',''),(6,'Corrigé_formules_de_base.pdf',''),(7,'corrigé_moyenne_et_fonctionSI.pdf',''),(8,'Corrigé_note_des_eleves.pdf',''),(9,'corrigé_tableau_taxes_séjour.pdf',''),(10,'Créer_des_dossiers_et_sous-dossier.pdf',''),(11,'créer_différents_types_de_fichiers.pdf',''),(12,'Exercice_formules_de_base.pdf',''),(13,'Exercice_graphique_à_2_axes.pdf',''),(14,'exercice_moyenne_et_fonctionSI.pdf',''),(15,'Exercice_note_des_eleves1sur2.pdf',''),(16,'Exercice_prix_HT_et_TTC.pdf',''),(17,'Exercice_réalisation_de_4_graphiques.pdf',''),(18,'Exercice_réaliser_un_graphique.pdf',''),(19,'Exercice_tableau_taxe_séjour1sur2.pdf',''),(20,'Exercice_tableau_taxe_séjour2sur2.pdf',''),(21,'Exercice2_fonctionSI.pdf',''),(22,'Exercice3_fonctionSI.pdf',''),(23,'moyenne_et_fonctionSI.pdf',''),(24,'Exercice1_fonctionSI.pdf',''),(25,'Exercice _tableaux.pdf',''),(26,'Exercice_copier_coller.pdf',''),(27,'Exercice_fiche_adhésion.pdf',''),(28,'Exercice_fusion_de_cellules_dans_un_tableau.pdf',''),(29,'Exercice_insertion_tableau_word.pdf',''),(30,'Exercice_niveau_2_Tarte_aux_poireaux.pdf',''),(31,'Exercice_saisie_des_caractères_du_clavier.pdf',''),(32,'Exercice_tableau_avec_image.pdf',''),(33,'Exercice_tableau_facture.pdf',''),(34,'Exercice_tableau_recette_gateau.pdf',''),(35,'Exercice_niveau_1_tourte_poireaux.pdf',''),(36,'Exercice_envoi_email.pdf',''),(37,'Exercices_effectuer_des_recherches_sur_le_web.pdf',''),(38,'bases_ordinateur.pdf','assets\\pdf\\ordi\\bases_ordinateur.pdf'),(39,'caracteres_clavier.pdf',''),(40,'majuscule_avec_accents.pdf',''),(41,'les_differents_types_de_stockages.pdf',''),(42,'tailles_fichiers_et_capacites_stockages.pdf',''),(43,'fonctions_de_base_tableur.pdf',''),(44,'menu_deroulant_sur_tableur.pdf',''),(45,'realiser_un_diagramme_ou_graphique_sur_tableur.pdf',''),(46,'apprendre_le_traitement_de_texte.pdf',''),(47,'Modèle_structure_CV1.pdf',''),(48,'Modèle_structure_CV2.pdf',''),(49,'Modèle_structure_CV3.pdf',''),(50,'Modèle_structure_lettre_de_motivation.pdf',''),(51,'apprendre_a_creer_une_adresse_mail_et_utilisation.pdf',''),(52,'apprendre_a_effectuer_un_recherche_web.pdf',''),(53,'Corrigé_effectuer_une_recherche_web.pdf','chemin_par_defaut'),(54,'Exercice-note-des-eleves2sur2.pdf','chemin_par_defaut'),(55,'Exercice_copier_un_texte_et_enregistrer.pdf','chemin_par_defaut'),(56,'Modèle_structure_CV1.pdf','chemin_par_defaut');
/*!40000 ALTER TABLE `fichiers_pdf` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-07 11:33:42
