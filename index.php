<?php
$connect = new mysqli("remotemysql.com","UEjWDl7iVS","fjSyF6sJM3","UEjWDl7iVS");
if($connect){
	 echo "Connection OK";
	
}else{
	echo "Connection Failed";
	exit();
}
$queryResult=$connect->query("SELECT * FROM ACCOUNT");
$result=array();
while($fetchData=$queryResult->fetch_assoc()){
	$result[]=$fetchData;
}
echo json_encode($result);
?>