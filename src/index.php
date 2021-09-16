<pre>
<?php

require 'vendor/autoload.php';

/**
 * Il faut contourner le problème pour installer le client
 * Composer, pour une raison étrange, ne détecte pas MongoDb même si il est installé
 *
 * composer require mongodb/mongodb --ignore-platform-reqs
 */

$client = new \MongoDB\Client("mongodb://root:example@mongo:27017");

$database = $client->selectDatabase('demo');
$restaurants = $database->selectCollection('restaurants');

//$collection->insertMany([
//    ['_id' => 1, 'name' => 'coucou']
//]);

//var_dump($collection->findOne(
//    ['_id' => 1]
//));

$res = $restaurants->find(
    [
        "borough" => "Brooklyn",
        "cuisine" => 'Italian',
        'name' => new \MongoDB\BSON\Regex('pizza', 'i'),
        'grades.score' => ['$lt' => 10, '$not' => ['$gte' => 10]]
    ],
    [
        'projection' => ['name' => 1, 'grades.score' => 1],
        'limit' => 5
    ]
);

foreach ($res as $i) {
//    echo $i->name . "<br/>";
    var_dump($i);
    echo '------' . '<br/>';
}

