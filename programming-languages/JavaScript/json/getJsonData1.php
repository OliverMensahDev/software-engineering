<?php 
$con = mysqli_connect("localhost","root", "111", "webtechclass");
$get = isset($_GET['data'])? $_GET['data'] : null;
if($get){
	$queryResult = mysqli_query($con, "SELECT * FROM  webtechtable where id ='$get'");
     $json_array = array();

while($row = mysqli_fetch_assoc($queryResult)) {  
	$json_array[] = $row;
}
echo json_encode($json_array);  

}

