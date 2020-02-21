<?php
    $namesearch=$_POST["username"];
    $passwordsearch=$_POST["password"];
    $m = new MongoClient();    // 连接到mongodb
    $db = $m->UserInfo;            // 选择一个数据库
    $collection = $db->Users; // 选择集合
    $cursor = $collection->find($namesearch);
    if($cursor==null)
    {
        echo "Error1" //错误状态1，未找到用户
    }
    else if($cursor!=null)
    {
        if($cursor["password"]!=$passwordsearch) //错误状态2，密码错误
        {
            echo "Error2"
        }
        else
        {
            $userid=$cursor["User-ID"]; //成功找到用户，将用户ID返回至前端
            echo $userid;
        }
    }
?>
 