<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
   $email = $_POST['email'];
   $password = $_POST['password'];
  
   // Connect to database
   require_once('db_config.php');
   
   // Execute SQL query
   $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result = mysqli_query($con, $sql);

   // Check if query was successful
   if (mysqli_num_rows($result) > 0) {
        // Get user information
        $row = mysqli_fetch_assoc($result);
        $user_info = array(
            'family_name' => $row['family_name'],
            'first_name' => $row['first_name'],
            'address' => $row['address'],
            'email' => $row['email'],
            'age' => $row['age']
            );
        
        // Return user information
        echo json_encode(array('status' => 'success', 'user_info' => $user_info));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Invalid email or password'));
    }
    
    // Close database connection
    mysqli_close($con);
}

?>