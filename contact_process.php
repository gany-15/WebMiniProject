<?php

    if(isset($_POST['submit'])){
        $to = "mrpotato1769@gmail.com";
        $from = $_POST['email'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $number = $_POST['number'];
        $cmessage = $_POST['message'];
    }


    $dbhost = "localhost";
    $dbuser = "root";
    $pass = "";
    $db = "locator_feedback";
    function openConn($dbhost, $dbuser, $pass, $db){
        $conn = new mysqli($dbhost, $dbuser, $pass, $db) or die("Connection Failed ".$conn->error);
        return $conn;
    }
    function closeConn($conn){
        $conn->close();
    }
    $conn = openConn($dbhost, $dbuser, $pass, $db);
    if(!$conn)
        echo "Not Connected";
    $sql = "INSERT INTO contact(`sender`, `name`, `subject`, `number`, `message`) VALUES ('$from', '$name', '$subject', '$number', '$cmessage')";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    closeConn($conn);
    header("refresh:2; url=contact.html");
?>
