<?php
    require_once "connection.php";
    $stmt=$db->prepare('select name,email,gender from data');
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    while($row=$stmt->fetch()){
        echo $row->name."<br>";
        echo $row->email."<br>";
        echo $row->gender."<br>";
    }
?>