<pre>
<?php

require 'vendor/autoload.php';

/**
 * Il faut contourner le problème pour installer le client
 * Composer, pour une raison étrange, ne détecte pas MongoDb même si il est installé
 *
 * composer require mongodb/mongodb --ignore-platform-reqs
 */

$client = new \MongoDB\Client("mongodb://mongo:27017");

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
        'grades.score' => ['$lt' => 15, '$not' => ['$gte' => 15]]
    ],
    [
        //        'projection' => ['name' => 1, 'grades.score' => 1, 'borough' => 1, '_id' => 1],
        'limit' => 1
    ]
);

$res->setTypeMap(['root' => 'JohnBob\Src\Test', 'document' => 'array', 'array' => 'array']);
$results = $res->toArray();

//var_dump($results);

// print_r($results[0]);

// var_dump($results[0]->getGrades()[0]['date']->toDateTime()->format('Y/m/d H:i:s'));

var_dump($results[0]->getGrades()[0]->getDate()->format('Y/m/d H:i:s'));

//$res = iterator_to_array($res);
//
//array_walk($res, function (&$res) {
//        if (isset($res['grades'])) {
//            $res['grades'] = iterator_to_array($res['grades']);
//        }
//    }
//);
//
//var_dump($res);

//foreach ($res as $i) {
////    echo $i->name . "<br/>";
//    var_dump(iterator_to_array($i));
////    var_dump($i->jsonSerialize());
////    echo $i['name'] . ' est situé à ' . $i->borough;
//    echo '<br/>------<br/>';
//}
