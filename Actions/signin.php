<?php

  session_start();
  include "config.php";
    
  $user_name= $_POST['user_name'];
  $password = $_POST['password'];
    

  if(!empty($user_name)|| !empty($password) ){
    $escapedPW = mysqli_real_escape_string($conn,$_REQUEST['password']);
    //save this user and pass as cookie if remeber checked start
    if (isset($_REQUEST['remember_me']))
      $escapedRemember = mysqli_real_escape_string($conn,$_REQUEST['remember_me']);
      $cookie_time = 60 * 60 * 24 * 30; // 30 days
      $cookie_time_Onset = $cookie_time+ time();
      if (isset($escapedRemember)) {
      /*
       * Set Cookie from here for one hour
       * */
      setcookie("user_name", $user_name, $cookie_time_Onset);
      setcookie("password", $escapedPW, $cookie_time_Onset);  

      }
      else {
        $cookie_time_fromOffset = time() - $cookie_time;
        setcookie("user_name", '',$cookie_time_fromOffset );
        setcookie("password", '', $cookie_time_fromOffset);  
      }

    
    $pass = md5($password);
    $sql = "SELECT * FROM users where user_name = '$user_name' and password = '$pass ";
    $result = $conn->query($sql);
    if($result->num_rows >0 ){
      $_SESSION['user_name'] = $user_name;

      // for getting userid
      $row = mysqli_fetch_assoc( $result );
      $userid = $row['user_id'];
      $_SESSION['user_id'] = $userid;
      echo 1;  
    }
    else{
      echo 0;
    }
  }

?>