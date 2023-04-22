SHCHERBAKOVA Kateryna
TKACHENKO Oleksii

Dans le cadre d'un projet de programmation web, un des projets personnels a été pris, écrit en PHP en utilisant le framework Symfony. Le projet consistait en une simple application to-do et les fonctions d'affichage, d'ajout, de
suppression et de modification de l'état des tâches avaient déjà été mises en œuvre.

Pour améliorer le projet, il a été décidé d'ajouter de nouvelles fonctionnalités, qui ont été mises en œuvre par le biais de deux API. La première API ajoutée est l'API Forismatic. Elle permet de générer des citations de grands
personnages. Afin d'ajouter l'API au projet, un nouveau QuoteService a été créé, qui reçoit les données de l'API. Un nouveau chemin /quote a été créé dans le contrôleur, à l'intérieur duquel la fonction getRandomQuote du service a été appelée. Un bloc a été ajouté au modèle html dans le fichier index.html.twig, qui a servi à afficher les citations. De même, une deuxième API a été ajoutée, l'API OpenWeatherMap, qui permet d'afficher le temps qu'il fait dans une ville donnée.

Déploiement
Docker a été utilisé comme outil de déploiement. Les étapes à suivre pour exécuter le projet localement sont les suivantes:
1. Installez Docker sur votre machine locale en suivant les instructions du site officiel de Docker.
2. Clonez le dépôt contenant l'application to-do sur votre machine locale en utilisant Git.
3. Naviguez vers le répertoire racine du projet dans votre terminal.
5. Exécutez la commande docker-compose up pour démarrer les conteneurs Docker.
6. Exécutez la commande docker-compose exec php bin/console doctrine:migrations:migrate pour exécuter les migrations et créer les tables nécessaires dans la base de données.


Liens utiles:
docker-compose up
docker exec -it test-mysql mysql -uuser -ppassword
docker exec -it test-php-apache bash // get into container
php bin/console debug:route // see all routes
php -i | grep pdo
docker-compose build php-apache
