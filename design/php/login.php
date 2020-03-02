<?php
    $username=$_POST["username"];
    $password=$_POST["password"];
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");  
    $bulk = new MongoDB\Driver\BulkWrite;
    // 查询数据
    $filter =  ['User-Account'=>$username]; //查询条件 user_id大于0
    $options = [
    'projection' => ['_id' => 0], //不输出_id字段
    'sort' => ['User-Account'=>1] //根据user_id字段排序 1是升序，-1是降序
    ];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $manager->executeQuery('Users.Students', $query);
    $result=[];
    foreach ($cursor as $document) {
        $document=json_encode($document);
        $result=json_decode($document,true);
    }
    if(count($result)==0)
    {
        echo "Error1";
    }
    else if($result["User-Password"]!=$password)
    {
        echo "Error2";
    }
    else
    {
        print_r($result);
    }
?>
 