# Un stack Docker | MongoDB | PHP 7.4 | Apache qui marche !

Alors déjà quelques petites précisions : 
- L'image de MongoDB officielle 5.x plante... il faut rester sur la 4.4.6
- Composer a du mal à capter que l'extension PHP MongoDB est installée, du coup... il faut lui forcer la main
````
composer require mongodb/mongodb --ignore-platform-reqs
````

## Du coup pour run ce projet :
````
cd ./src
composer install --ignore-platform-reqs
docker-compose up -d
````

En dehors de ça, [la doc plus ou moins complète est ici](https://docs.mongodb.com/php-library/current/tutorial/crud/)

Robo 3T est un client avec un GUI sympa pour visualiser ses datas et insérer le gros JSON comme un âne.