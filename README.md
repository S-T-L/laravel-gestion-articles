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

<h2>Récupérer un contenu (select)</h2>
Méthode HTTP : <strong>GET</strong><br>
http://localhost:8000/api/articles
<ul>
   <li>Réponse attendue : Liste complète des articles au format JSON</li>
   <li>Exemple de réponse : ```json  "success": true,
    "data": [
        {
            "id": 1,
            "nom": "error",
            "prix_ht": "2801.00",
            "prix_achat": "1831.00",
            "taux_tgc": "22.00",
            "famille_id": 5,
            "created_at": "2025-11-16T06:16:58.000000Z",
            "updated_at": "2025-11-16T06:16:58.000000Z",
            "famille": {
                "id": 5,
                "nom": "Animaux",
                "created_at": "2025-11-16T06:16:58.000000Z",
                "updated_at": "2025-11-16T06:16:58.000000Z"
            }
        },```</li>
</ul>

<h2>Insérer (insert)</h2>
Méthode HTTP : <strong>POST</strong><br>
http://localhost/rest_mediatekdocuments/table <br>
Réponse attendue : Liste complète des articles au format JSON
<ul>
   <li>Key : 'champs'</li>
   <li>Value : liste des champs (nom/valeur) qui serviront à l'insertion (au format json)</li>
</ul>

<h2>Modifier (update)</h2>
Méthode HTTP : <strong>PUT</strong><br>
http://localhost/rest_mediatekdocuments/table/id (id optionnel)<br>
<ul>
   <li>'table' doit être remplacé par un nom de table (caractères acceptés : alphanumériques et '_')</li>
   <li>'id' (optionnel) doit être remplacé par l'identifiant de la ligne à modifier (caractères acceptés : alphanumériques)</li>
</ul>
Dans le body (Dans Postman, onglet 'Body', cocher 'x-www-form-urlencoded'), ajouter :<br>
<ul>
   <li>Key : 'champs'</li>
   <li>Value : liste des champs (nom/valeur) qui serviront à la modification (au format json)</li>
</ul>

<h2>Supprimer (delete)</h2>
Méthode HTTP : <strong>DELETE</strong><br>
http://localhost/rest_mediatekdocuments/table/champs (champs optionnel)<br>
<ul>
   <li>'table' doit être remplacé par un nom de table (caractères acceptés : alphanumériques et '_')</li>
   <li> 'champs' (optionnel) doit être remplacé par la liste des champs (nom/valeur) qui serviront déterminer les lignes à supprimer (au format json</li>
</ul>











  
