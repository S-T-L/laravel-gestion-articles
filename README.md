# Gestion Articles - Laravel

## Présentation

Cette application développée avec Laravel 10 permet de gérer une liste d'articles en base de données.
Elle permet d'effectuer des opérations CRUD (création, mise à jour et suppression d'un article).


## Test de l'application 
- Vérifier que Composer, Git et Wampserver (ou équivalent) sont installés sur l'ordinateur.
- **Cloner le repository** : ```git clone https://github.com/S-T-L/laravel-gestion-articles.git cd laravel-gestion-article```
- **Installer les dépendances** : ```composer install```
- **Configurer l'environnement** : ``` copy .env.example .env```
- **Créer la base de données**
- **Editer le fichier .env avec les informations de connexion**
- **Lancer les migrations et seeders pour remplir la base** : ``` php artisan migrate:fresh --seed``` : cette commande va créer les tables 'familles' et 'articles' / Générer 5 familles aléatoires et 50 articles
- **Lancer le serveur** : ``` php artisan serve ```
  
