<?php
    $username=$_POST["username"];
    $password=$_POST["password"];
    $organization=$_POST["organization"];
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
    if(count($result)!=0)
    {
        echo "Error1";
    }
    else
    {
        $count=count($result);
        $newdata=[
            '_id' => new MongoDB\BSON\ObjectID, 
            'User-Account' => $username,
            'User-Password' => $password,
            'User-ID' => $count+1
        ];
        $bulk->insert($newdata);
        $res = $manager->executeBulkWrite('Users.Students',$bulk);
        print_r("Success ");
    }
 ?>
 