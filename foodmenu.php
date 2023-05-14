<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  
   require_once('db_config.php');
   
   $sql = "SELECT * FROM food";
   
   $result = mysqli_query($con, $sql);
   
   if (mysqli_num_rows($result) > 0) {
		$menu_list=array();
		while ($row = mysqli_fetch_assoc($result)){
			  $myObject = new stdClass();
			  $myObject->id = $row['id'];
			  $myObject->name = $row['name'];
			  $myObject->description = $row['description'];
			  $myObject->price = $row['price'];
			  $myObject->image = $row['image'];
			  $menu_list[] = $myObject;
		}
        echo json_encode(array("menu_list" => $menu_list));

    } else {
        echo json_encode(array("status" => "error", "message" => "Error with connection"));
    }
    
    mysqli_close($con);
}
?>