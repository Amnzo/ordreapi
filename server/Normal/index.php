<?php
$servername = "kashar.pro";
$username = "salmitest";
$password = "salmi2019";
$dbname = "mohimane";
if(isset($_REQUEST['executeNoneQuery']) && !empty($_REQUEST['executeNoneQuery']))
    executeNoneQuery($_REQUEST['executeNoneQuery']);
else
    if(isset($_REQUEST['executeQuery']) && !empty($_REQUEST['executeQuery']))
        executeQuery($_REQUEST['executeQuery']);
else echo 0;

function executeNoneQuery($query) {
    global $servername, $username, $password, $dbname;
    $connect = new mysqli($servername, $username, $password, $dbname);
    if($connect->connect_error){
        echo 0;
        return;
    }
    else
    {
        $data = $connect->query($query);
        $connect->close();
        echo $data ? 1 : 0;
    }
}

function executeQuery($qeury) { // null is false
    global $servername, $username, $password, $dbname;
    $connect = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($connect, 'UTF8');
    if($connect->connect_error) {
        echo 0;
        return;
    };

    $data = $connect->query($qeury);

    $rows = array();
    while($array = $data->fetch_assoc()) {
        $rows[] = $array;
    }
    $data->close();
    $connect->close();
    echo  json_encode($rows);
}
?>


