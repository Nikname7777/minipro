<?php
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $conn = new mysqli('localhost','root','','bubble');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connecterror);
    }else {
        $stmt = $conn->prepare("select * from user_ where username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['pass'] === $pass){
                echo '<script>alert("login Successfully");
                window.location.href = "http://localhost/Bubble/project/main.html"
                </script>';


            }else{
                echo '<script>alert("Invalid username or password")
                window.location.href = "http://localhost/Bubble/project/Login.html"
                </script>'; 
            }
        }else{
            echo '<script>alert("Invalid username or password")
            window.location.href = "http://localhost/Bubble/project/Login.html"
            </script>';
        }
    }
?>