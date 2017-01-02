<?php
/**
 * Created by PhpStorm.
 * User: chester
 * Date: 01.01.17
 * Time: 19:52
 */

session_start();

$servername="localhost";
$username="root";
$password="9340126abc";

$conn=new mysqli($servername,$username,$password);

if($conn->connect_error){
    echo("connection error");
}else{
    $name=$_SESSION["username"];
    $message=$_POST["message"];
    $select_db=mysqli_select_db($conn,"chat");

    if(!$select_db){
        //echo "Не удалось выбрать БД";
    }else{
        $insert_query="INSERT INTO messages (nameuser,message) VALUES ('$name','$message')";
        $result=mysqli_query($conn,$insert_query);

        if(!$result){
            echo "Нет запроса";
            $conn->close();
        }else{
            echo "Прошел!!!";
            $conn->close();
        }
    }




}


?>