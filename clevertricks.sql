-- creation of tables

CREATE TABLE tricks (
id INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(100) NOT NULL,
content VARCHAR(2000) NOT NULL
);


CREATE TABLE category (
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(100) NOT NULL
);

-- join table of the two previous tables

CREATE TABLE tricks_category (
id INT PRIMARY KEY AUTO_INCREMENT,
tricks_id INT,
category_id INT,
FOREIGN KEY (tricks_id) REFERENCES tricks(id),
FOREIGN KEY (category_id) REFERENCES category(id)
);


-- insert data in the corresponding tables

INSERT INTO category (name) VALUES ('ide'), ('os'), ('terminal'), ('git/github');

INSERT INTO tricks (title, content) 
VALUES 
('utiliser screenfetch pour s\'informer sur notre OS', 
'Screenfetch est un petit script bash, qui permet d’afficher dans un terminal une série d’informations concernant votre distribution GNU/Linux. 
Installation : $ sudo apt update && sudo apt install screenfetch
Voir le manpage en lien'),
('créer un petit script pour mettre à jour notre système',
'Dans un terminal créer un fichier maj (pour mise à jour):
$ touch maj 
puis l ouvrir avec un éditeur de texte et insérer ce qui suit: 
$ gedit maj 
#!/bin/bash 
sudo apt update && sudo apt upgrade 
enregistrer et lui donner les droits d exécution : 
$ chmod +x maj 
l exécuter : 
$ ./maj'),
('agrandir / réduire la fenetre dans vscode','touche windows + flèche haut / touche windows + flèche bas'),
('fermer le document actif dans vscode','CTRL + F4'),
('afficher la liste des fichiers ouverts dans vscode','CTRL + ALT + flèche bas'),
('afficher toutes les fenêtres flottantes dans vscode','CTRL + MAJ + M'),
('démarrer une nouvelle instance dans vscode','touche windows + MAJ + N'),
('basculer entre les fenêtres dans vscode','touche windows + N'),
('créer une branche', 'git branch <BRANCHNAME>'),
('Basculer sur autre branche', 'git checkout <BRANCHNAME>'),
('Vérifier le contenu','git status'),
('faire un clone', 'git clone <URLFROMGITHUB>');


INSERT INTO tricks_category (tricks_id, category_id) VALUES
(1, 3), (2, 3), (3, 1), (4, 1), (5, 1), (6, 1), (7, 1), (8, 1), (9, 4), (10, 4), (11, 4), (12, 4);
