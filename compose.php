<?php
    session_start();
    $dbname = 'cheapomail';
    $dbhost = 'localhost'; 
    $dbuser = 'root'; 
    $dbpass = '';

    $recepient = $_POST["to"];
    $subject = $_POST["subject"];
    $body = $_POST["message"];

    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser,$dbpass);

    $conn->exec("INSERT INTO message(id, body, subject, user_id, recipient_ids)
        VALUES('$recepient','$body','$subject','$recepient','$recepient')");

    if(isset($_SESSION['ID'])){
        $useridquery =  "SELECT id FROM User WHERE name = '$_SESSION[ID]'; ";
        $recidquery =  "SELECT id FROM User WHERE name = '$recipient'; ";
        $userres = mysqli_query($con,$useridquery);
        $recres = mysqli_query($con,$recidquery);
        if(mysqli_fetch_array($recres)==0){
            echo "Invalid Recipient Username";
            
        }else{
        
            while($row=mysqli_fetch_array($userres)){
                while($row2=mysqli_fetch_array($recres)){
                    $sql = "INSERT INTO message (body, subject, user_id, recipient_ids) VALUES (:Message,:Subject,'$row1[id]','$row2[id]');";
                
                    if (!mysqli_query($con,$sql))
                        {
                            die('Error: ' . mysqli_error($con));
                        }else{
                            echo "1 record added";
                        }
                }
            }
        }
    }else{
        header("Location: compose.html");
        echo "Session not set";
    }
?>