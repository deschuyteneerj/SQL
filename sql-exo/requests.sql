1/ Affiche toutes les données.
SELECT * FROM students INNER JOIN school;

2/Affiche uniquement les prénoms.
SELECT prenom FROM students;

3/ Affiche les prénoms, les dates de naissance et l’école de chacun.
SELECT students.prenom,students.datenaissance,school.school FROM students LEFT JOIN school ON school.idschool=students.school;

4/ Affiche uniquement les élèves qui sont de sexe féminin.
SELECT * FROM students WHERE genre='F' ;

5/ Affiche uniquement les élèves qui font partie de l’école Addy.
SELECT * FROM students WHERE school IN (SELECT school FROM students WHERE nom='Addy') ;
// Autre façon de faire (Joann)
SELECT * FROM students WHERE students.school = (SELECT students.school FROM students WHERE students.nom = 'Addy');

6/ Affiche uniquement les prénoms des étudiants, par ordre inverse à l’alphabet (DESC). Ensuite, la même chose mais en limitant les résultats à 2.
SELECT prenom FROM students ORDER BY prenom DESC ;
SELECT prenom FROM students ORDER BY prenom DESC LIMIT 0,2;

7/ Ajoute Ginette Dalor, née le 01/01/1930 et affecte-la à Central, toujours en SQL.
INSERT INTO students VALUES (NULL, 'Dalor', 'Ginette', '1930-01-01', 'F', 1) ;

8/ Modifie Ginette (toujours en SQL) et change son sexe et son prénom en “Omer”.
UPDATE students SET prenom = 'Omer', genre = 'M' WHERE prenom = 'Ginette';

9/ Supprimer la personne dont l’ID est 3.
DELETE FROM students WHERE idStudent = 3;

10/ Modifier le contenu de la colonne School de sorte que "1" soit remplacé par "Central" et "2" soit remplacé par "Anderlecht". (attention au type de la colonne !)
UPDATE school SET school = 'Central' WHERE idschool=1;
UPDATE school SET school = 'Anderlecht' WHERE idschool=2 
