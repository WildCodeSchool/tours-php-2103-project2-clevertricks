--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'ide'),(2,'os'),(3,'terminal'),(4,'git/github');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Stuff'),(2,'Doodads !'),(3,'cédric');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tricks`
--

LOCK TABLES `tricks` WRITE;
/*!40000 ALTER TABLE `tricks` DISABLE KEYS */;
INSERT INTO `tricks` VALUES (1,'utiliser screenfetch pour s\'informer sur notre OS','Screenfetch est un petit script bash, qui permet d’afficher dans un terminal une série d’informations concernant votre distribution GNU/Linux. \nInstallation : $ sudo apt update && sudo apt install screenfetch\nVoir le manpage en lien'),(2,'créer un petit script pour mettre à jour notre système','Dans un terminal créer un fichier maj (pour mise à jour):\n$ touch maj \npuis l ouvrir avec un éditeur de texte et insérer ce qui suit: \n$ gedit maj \n#!/bin/bash \nsudo apt update && sudo apt upgrade \nenregistrer et lui donner les droits d exécution : \n$ chmod +x maj \nl exécuter : \n$ ./maj'),(3,'agrandir / réduire la fenetre dans vscode','touche windows + flèche haut / touche windows + flèche bas'),(4,'fermer le document actif dans vscode','CTRL + F4'),(5,'afficher la liste des fichiers ouverts dans vscode','CTRL + ALT + flèche bas'),(6,'afficher toutes les fenêtres flottantes dans vscode','CTRL + MAJ + M'),(7,'démarrer une nouvelle instance dans vscode','touche windows + MAJ + N'),(8,'basculer entre les fenêtres dans vscode','touche windows + N'),(9,'créer une branche','git branch <BRANCHNAME>'),(10,'Basculer sur autre branche','git checkout <BRANCHNAME>'),(11,'Vérifier le contenu','git status'),(12,'faire un clone','git clone <URLFROMGITHUB>');
/*!40000 ALTER TABLE `tricks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tricks_category`
--

LOCK TABLES `tricks_category` WRITE;
/*!40000 ALTER TABLE `tricks_category` DISABLE KEYS */;
INSERT INTO `tricks_category` VALUES (1,1,3),(2,2,3),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,4),(10,10,4),(11,11,4),(12,12,4);
/*!40000 ALTER TABLE `tricks_category` ENABLE KEYS */;
UNLOCK TABLES;
