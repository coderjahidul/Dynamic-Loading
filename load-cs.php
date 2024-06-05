<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "testjahidul";

// Create Connection
$connect = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if(!$connect){
    die("Connection Failed" . mysqli_connect_error());
}
if($_POST['type'] == ""){
    $sql = "SELECT * FROM country";
    $query = mysqli_query($connect, $sql);

    $str = "";
    while($row = mysqli_fetch_assoc($query)){
        $str .= "<option value='{$row['id']}'>{$row['name']}</option>";
    }
}else if($_POST['type'] == "stateData"){
    $sql = "SELECT * FROM state WHERE country_id = {$_POST['id']}";
    $query = mysqli_query($connect, $sql);

    $str = "";
    while($row = mysqli_fetch_assoc($query)){
        $str .= "<option value='{$row['id']}'>{$row['name']}</option>";
    }
}

echo $str;