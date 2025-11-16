# Gestion Articles - Laravel

## Présentation

Cette application développée avec Laravel 10 permet de gérer une liste d'articles en base de données.
Elle permet d'effectuer des opérations CRUD (création, mise à jour et suppression d'un article).

## Schéma de la base de donnée : 
<img width="698" height="408" alt="gestion-articles" src="https://github.com/user-attachments/assets/452b2380-dd00-45c7-ae66-fbd86755ca60" />

**Relations:** : 
- Un article appartient à une famille
- Une famille possède plusieurs articles

## Installation en local
- Vérifier que Composer, Git et Wampserver (ou équivalent) sont installés sur l'ordinateur.
- **Cloner le repository** : ```git clone https://github.com/S-T-L/laravel-gestion-articles.git cd laravel-gestion-article```
- **Installer les dépendances** : ```composer install```
- **Générer la clé d'application ** : ``` php artisan key:generate```
- **Configurer l'environnement** : ``` copy .env.example .env```
- **Créer la base de données**
- **Editer le fichier .env avec les informations de connexion**
- **Lancer les migrations et seeders pour remplir la base** : ``` php artisan migrate:fresh --seed``` : cette commande va créer les tables 'familles' et 'articles' / Générer 5 familles aléatoires et 50 articles
- **Lancer le serveur** : ``` php artisan serve ```

## Test via Postman : 

<h2>Récupérer la liste des articles)</h2>
Méthode HTTP : <strong>GET</strong><br>
URL : http://localhost:8000/api/articles
<ul>
   <li>Réponse attendue : Liste complète des articles au format JSON</li>
   
</ul>

<h2>Créer un nouvel article </h2>
Méthode HTTP : <strong>POST</strong><br>
URL : http://localhost:8000/api/articles<br>
Dans le body (Postman : onglet 'Body', sélectionner 'raw' et 'JSON') :
<ul>
    <li>Ajouter les champs nécessaires au format JSON</li>
</ul>


<h2>Modifier un article </h2>
Méthode HTTP : <strong>PUT / PATCH</strong><br>
URL : http://localhost:8000/api/articles/{id} : 
<ul>
    <li>{id} doit être remplacé par l'identifiant de l'article à modifier
</li>
    <li>- Dans le body, ajouter les champs à modifier au format JSON</li>
</ul>


<h2>Supprimer un article </h2>
Méthode HTTP : <strong>DELETE</strong><br>
URL : http://localhost:8000/api/articles/{id} :
<ul>
    <li>
    {id} doit être remplacé par l'identifiant de l'article à supprimer
</li>
</ul>













  
