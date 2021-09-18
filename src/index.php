<pre>
<?php

require 'vendor/autoload.php';

$client = new \MongoDB\Client("mongodb://mongo:27017");
$restaurants = $client->demo->restaurants;


$query = $restaurants->findOne(
    [
        "borough" => "Brooklyn",
        "cuisine" => 'Italian',
        'name' => new \MongoDB\BSON\Regex('pizza', 'i'),
        'grades.0.score' => ['$lt' => 15, '$not' => ['$gte' => 15]]
    ],
    [
        'typeMap' => ['root' => 'JohnBob\Src\Test', 'document' => 'array', 'array' => 'array']
    ]
);

print_r($query);

