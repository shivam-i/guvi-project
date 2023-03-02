<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
	// header('Location: ../login.html');
	exit;
}
$mongoServer = "mongodb://localhost:27017";
$mongoDatabase = "mydatabase";
$mongoCollection = "mycollection";

$mongoClient = new MongoDB\Client($mongoServer);

$mongoDB = $mongoClient->$mongoDatabase;

$mongoCollection = $mongoDB->$mongoCollection;

$insertOneResult = $mongoCollection->insertOne([
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'age' => 30,
]);

$insertedID = $insertOneResult->getInsertedId();

$filter = ['_id' => new MongoDB\BSON\ObjectID($insertedID)];
$document = $mongoCollection->findOne($filter);

var_dump($document);



?>
