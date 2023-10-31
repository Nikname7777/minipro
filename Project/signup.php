<?php
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $pass = $_POST['pass'];
   
    $conn = new mysqli('localhost','root','','bubble');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connecterror);
    } else {
        $stmt = $conn->prepare("insert into user_(username, firstname, lastname, phonenumber, pass) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $firstname, $lastname, $phonenumber, $pass);
        $execval = $stmt->execute();
        echo $execval;
        echo '<script>alert("Sign up Successfully");
                window.location.href = "http://localhost/Bubble/project/Login.html"
                </script>';
        $stmt->close();
        $conn->close();
    }
?>