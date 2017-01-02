<?php

session_start();

$servername="localhost";
$username="root";
$password="9340126abc";

$conn=new mysqli($servername,$username,$password);

if($conn->connect_error){
    echo("connection error");
}else{

    $select_db=mysqli_select_db($conn,"chat");

    if(!$select_db){
        //echo "Не удалось выбрать БД";
    }else{
        $insert_query="SELECT * FROM messages";
        $result=mysqli_query($conn,$insert_query);

        if(!$result){
            echo "Нет запроса";
            $conn->close();
        }else{
            $rows=array();
            while ($r= mysqli_fetch_assoc($result)){
                array_push($rows,$r);
            }
            echo json_encode($rows);
            $conn->close();
        }
    }

}
?>