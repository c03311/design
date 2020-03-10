<?php
    $paperid=$_POST["paperid"];
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");  
    $bulk = new MongoDB\Driver\BulkWrite;
    // 查询数据
    $filter =  ['Test-ID'=>$paperid]; //查询条件 user_id大于0
    $options = [
    'projection' => ['_id' => 0], //不输出_id字段
    'sort' => ['Test-ID'=>1] //根据user_id字段排序 1是升序，-1是降序
    ];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $manager->executeQuery('Tests.Tests', $query);
    foreach($cursor as $document)
    {
        $result=json_encode($document);
    }
    print_r($result);

?>