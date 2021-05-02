# PROJET LARAVEL RECETTES MASTER
###### fait par Fahmi FARHAT, Hicham NEGHIZ

### Commandes utiles

Commandes pour installer jetstream : 

composer require laravel/jetstream
php artisan jetstream:install livewire

 Il faut aussi installer les dépendances NPM :

 npm install npm run dev
 php artisan migrate 

Voir le site jetstream pour plus de détails. https://jetstream.laravel.com/2.x/installation.html

Il existe dans le projet un dossier sous le nom ".idea".Ce dossier a été ajouté dans notre projet car nous avons utilisé l'IDE PhpStorm dans le développement du projet. Dans le cas où il pose un problème, ne hésitez pas à le supprimer. 

### Points importants

Ne faites pas de lancement des migrations avant de tester le projet. 
Ne faites pas des migrations et Rollbacks de la base de données avant de tester toutes les fonctionnalités de site car les données dans la base de données seront perdus. Il faut vous connecter en tant qu’administrateur de site et tester  les fonctionnalités dans le site avant de taper des commandes telles que :
php artisan migrate:refresh
php artisan migrate:refresh –seed 

 Les données qui sont déjà dans la base de données sont importantes pour que le site fonctionne sans problèmes surtout pour l’accès à l’espace administrateur du site. 

Le site web offre système de multi-authentification : 
Connectez-vous en tant qu’administrateur. Vous pouvez UNIQUEMENT vous connecter avec deux comptes qui portent l’ID 11 ou bien 12 pour accéder à l’espace administrateur: 

Email : toto@admin.com  /mot de passe : 12345678 
son ID dans la base de données est 11 . 

Email : titi@admin.com / mot de passe : 12345678  
Son id dans la base de données est 12

Connectez-vous en tant que utilisateur ordinaire. Vous pouvez vous connecter avec le compte suivant :
alex@user.com /mot de passe : 12345678 

Vous pouvez  bien évidement créer votre compte et vous connecter en tant que user ordinaire mais l’id ne doit etre différent de 11 et 12.


Dans le cas où vous pensez que c’est obligatoire de faire des migrations des migrations, 10 faux comptes utilisateurs seront créés. L’ID s’incrémente à chaque fois par 1.  Il faut que vous fassiez la création d’un nouveau compte qui va avoir l’ID 11. Vérifiez bien que le compte créé a l’ID 11 ou bien 12 pour  vous connecter en tant qu’Administrateur.  L’accès au compte Administrateur est possible UNIQUEMENT si l’ID de user est 11 ou bien 12. 

ATTENTION !
Dans le cas ou vous trouvez un problème pour vous connecter en tant qu’administrateur, il faut regarder l’utilisateur qui correspond à l’ ID 11 et l’ID 12 dans la base des données.


### Explications des fonctionnalités de site 

La partie programmation serveur est le produit de notre effort personnel. Nous avons essayé de personnaliser quelques codes trouvés sur internet seulement pour le design de notre site. 

#### IMPORTANT !

Il important que vous auriez accès à une connexion internet pour que certaines ressources CSS utilisées pour que le design de notre application marchent sans problème. 

Notre application offre la possibilité de s’authentifier en tant que user ou administrateur. On trouve un espace dédié pour les utilisateurs ordinaire et un espace pour les deux administrateurs de site. Le continu est différent en fonction de l’utilisateur connecté. Si l’utilisateur est l’administrateur de site. il peut voir tous les onglets disponibles à sa disposition dans le header de la page. L’onglet « espace Administrateur »  en rouge s’ajoute aux autres onglets uniquement dans le cas où l’utilisateur est administrateur. Dans le cas ou l’utilisateur n’est pas l’administrateur de site, l’onglet espace admin est remplacé par l’onglet « gestion des recettes » . 

Dans la page « espace Administrateur », l’administrateur peut se servir de toutes les fonctionnalités qui existe dans le site. Le bouton « gérer les commentaires » s’ajoute devant chaque recette seulement dans le cas où l’utilisateur est administrateur. Quand l’administrateur clique sur le bouton, il aura la possibilité de supprimer un commentaire ou plus. Il peut supprimer tous les commentaires s’il le souhaite. Si l’utilisateur n’est pas l’administrateur de la page, il aura la possibilité d’écrire, modifier et supprimer son commentaire mais il ne peut pas supprimer les commentaires des autres utilisateurs. Uniquement l’administrateur peut effectuer cela.. 

Dans la page home, ou on peut trouver les trois dernières recettes , les photos qui existent sur la page à droite sont CLIQUABLES. La taille de la photo va s’agrandir sur une partie de front de la même page pour que l’utilisateur puisse voir mieux la recette mais il faut qu’il clique sur la photo. 

L’utilisateur peut importer une image dans la page d’accueil ou on trouve les trois dernières recettes ou dans la page administration des recettes, l’utilisateur peut cliquer sur l’image pour l’agrandir après l’importation seulement dans la page d’administration des recettes. Les images dans la page d’accueil sont cliquables. Le design de trois dernières recettes est dynamique. L’ID de l’auteur de la recette et les boutons bougent si vous mettez le curseur sur l’espace dédié pour les trois dernières recettes. 

Vous pouvez tester toutes les pages web du site telles que la page contact , la création d’une nouvelle recette, la modification d’une recette , voir mon profile, etc. 

Nous avons utilisé JavaScript surtout pour afficher un message d’erreur ou d’information aux utilisateurs quand un événement est déclenché.   

Nous avons utilisé jetstream pour l’authentification. Nous n’avons pas utilisé les vues de Jetstream. Il y a une différence avec les vues classiques qu’on connait. Il faut connaitre les système de composants, Livewire et surtout Tailwind CSS . Nous avons décidé finalement d’utiliser jetstream pour la partie authentification car les vues de Tailwind sont majoritairement payantes. 

Dans le cas où vous rencontrez un problème, il faut  penser à télécharger quelques dépendances que nous avons utilisés dans notre projet telles que jetstream. Si le problème persiste, nous pourrons éventuellement faire des captures vidéo de notre projet, ou organiser une réunion zoom et vous montrer le projet et ses différentes fonctionnalités. 

Nous restons à votre disposition pour tout complément d’information. 
