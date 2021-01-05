# **Todo**
Projet web côté serveur.
Réalisation d'une application web permettant de gérer une liste de taches

Il s'agit d'une application de listes de tâches , en utilisant le parton MVC (*Model Vue Contrôleur*)
Pour cette application il y a deux acteurs: les visiteurs (non connectés) et les utilisateurs (connecté).
Les utilisateurs connectés pourront créer des listes de tâches qui seront privées et qu’eux seuls pourront voir. En revanche les visiteurs ont seulement accès à des listes de tâches publiques.

## Fonctionnement de l'application

- Lorsqu’on arrive sur l’application, aucun utilisateur n’est connecté, les listes des tâches publiques sont listées.
- Le visiteur peut ajouter/supprimer des listes et les tâches publiques sans se connecter.
- Un espace est consacré a la connexion d'un utilisateur
- Un espace est aussi consacré pour un enregistrement d'un utilisateur
- Une fois l’utilisateur connecté, il a accès aux listes publiques (comme le visiteur), mais également à ses listes privées.
- Toutes les listes de tâches ajoutées par un utilisateur sont privées . Il peut bien entendu supprimer ses listes également. les données seront enregistrées dans ma base de donnée fournie avec le code.
- Chaque tâche pourra être complétée via une case à cocher. 

Il y a une gestion d'erreur, et un système pour éviter les injections sur l'application 