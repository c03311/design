<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$collection=$manager->Students;
$cursor = $collection->find();
foreach ($cursor as $restaurant) {
    var_dump($restaurant);
 };
?>