<?php 
 $name = $_POST['name'];
 $date = $_POST['date'];
 $development = $_POST['development'];
 $calls = $_POST['calls'];
 $specificCalls = $_POST['specificCalls'];
 $observed = $_POST['observed'];
 $behavior = $_POST['behavior'];


    // DATABASE CONNECTION
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contact(name, date, development, calls, specificCalls, observed, behavior) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss",$name, $date, $development, $calls, $specificCalls, $observed, $behavior);
        $stmt->execute();
        header('Location: http://localhost/formcuttack/contact.html');
        $stmt->close();
        $conn->close();
    }
 ?>