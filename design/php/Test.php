<?php
    $answers=json_decode($_POST["answers"]);
    $paperid=$_POST["paperid"];
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");  
    $bulk = new MongoDB\Driver\BulkWrite;
    print_r($answers);
?>