## EXEMPLE ET EXPLICATIONS DES PRINCIPALES FAILLES DE SECURITES SUR LE WEB

Le fichier php `injection.php` permet de tester l'injection SQL classique.

## XSS : Cross-Site Scripting
Inclusion de code javascript dans un champ de formulaire
Protection : htmlspecialchars() en sortie de table. A l'affichage donc !! Jamais à l'insertion en base... car :
    - les données seront transformée, si l'application évolue on perd l'intégrité des données
    - la recherche dans les champs ne sont plus correcte (perte accents et autre caractères spéciaux...)
    - la base ne doit pas contenir de données transformées... on gère à l'affichage !
    - la base peut-être utilisée ailleurs que sur le site... donc on y saisie les données réelles 
    - on peut insérer des données provenant d'ailleurs dans la base... donc on contrôle à l'affichage !

## Faille include
Inclusion d'un autre fichier ou d'un fichier externe
Protection : vérifier toujours que le fichier est présent dans un répertoire sur votre serveur. 
Vérifier que le nom du fichier ne comporte pas de caractère pouvant représenter un répertoire


## Faille Upload
Renommer le fichier et y apposer une extension attendu (.jpg par exemple)

## Faille Injection SQL
Inclusion de commentaire ou d'égalité vrai ou autre manipulation de la requête générée à partir de paramètre dynamique
Protection : préparer les requête avec des paramètres dynamiques et un bindage de donnée
Voir l'exemple dans injection.php avec la base injection.sql à créer 

## CSRF : Cross site request forgery
Utilise l'odinateur d'une personne avec des droits sur un site pour lancer une action détournée.
Protection : s'assurer que l'action transmise est cohérente et provient bien d'une action manuelle :
    - générer un token à chaque étape importante puis correspondance token formulaire <-> token session
    - demander une validation manuelle à chaque étape importante


## CRLF : Carriage Return Line Feed
Cache une double saisie dans un champ, par exemple une double adresse email grace à un retour chariot par caractères ASCII ou HEXA.
Bref on peut se retrouver à envoyer un email à 2 emails si on y fait pas attention.
Protection : vérifier l'intégrité de la données récupérée. S'assurer que l'on a bien un email et que l'on ai pas de retour chariot !

## Vol de session : PHPSESSID
Un utilisateur récupère votre cookie de session sur votre machine et vol donc votre session. Si vous êtes connecté celà est très dangereux !
Protection : c'est assez complexe de protéger l'utilisateur efficacement car le problème vient de son ordinateur (infection par un malWare).
Bref il est possible de générer un ticket par requête qui fait qu'un compte ne pourra pas être utilisé par deux personnes en même temps.
Ce ticket en plus peut contenir des info de vérification comme le USER_AGENT, l'IP de l'utilisateur, ce qui rend la tâche encore plus compliqué au hacker.



