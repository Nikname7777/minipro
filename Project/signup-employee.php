<?php
    $emname = $_POST['emname'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $pass = $_POST['pass'];
   
    $conn = new mysqli('localhost','root','','bubble');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connecterror);
    } else {
        $stmt = $conn->prepare("insert into employee_(emname, firstname, lastname, phonenumber, pass) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $emname, $firstname, $lastname, $phonenumber, $pass);
        $execval = $stmt->execute();
        echo $execval;
        echo '<script>alert("Sign up Successfully");
                window.location.href = "http://localhost/Bubble/project/login-employee.html"
                </script>';
        $stmt->close();
        $conn->close();
    }
?>