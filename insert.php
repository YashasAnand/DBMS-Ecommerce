<?php
session_start();
if (isset($_POST['Register'])){
       
        
        $CUSTOMER_NAME = $_POST['CUSTOMER_NAME'];
        $CUSTOMER_EMAIL = $_POST['CUSTOMER_EMAIL'];
        $PASSWORD = $_POST['PASSWORD'];
        $HOME_ADDRESS = $_POST['HOME_ADDRESS'];
        $POST_CODE = $_POST['POST_CODE'];
        $PHONE = $_POST['PHONE'];
        
        

}

$CUSTOMER_NAME= stripcslashes($CUSTOMER_NAME);
$CUSTOMER_EMAIL= stripcslashes($CUSTOMER_EMAIL);
$PASSWORD= stripcslashes($PASSWORD);
$HOME_ADDRESS= stripcslashes($HOME_ADDRESS);
$POST_CODE= stripcslashes($POST_CODE);
$PHONE= stripcslashes($PHONE);

  //create connection  $sql = "INSERT INTO customer(CUSTOMER_NAME,CUSTOMER_EMAIL,PASSWORD,HOME_ADDRESS,POST_CODE,PHONE)VALUES('$CUSTOMER_NAME','$CUSTOMER_EMAIL', '$PASSWORD','$HOME_ADDRESS','$POST_CODE','$PHONE')";
  $conn=mysqli_connect("localhost","root","","ecom");
  if($conn === false)
  {
     die("ERROR: Could not connect. " . mysqli_connect_error());
     }
  else{
    
     
    $CUSTOMER_NAME = mysqli_real_escape_string($conn, $CUSTOMER_NAME);
    $CUSTOMER_EMAIL = mysqli_real_escape_string($conn, $CUSTOMER_EMAIL);
    $PASSWORD= mysqli_real_escape_string($conn, $PASSWORD);
    $HOME_ADDRESS = mysqli_real_escape_string($conn, $HOME_ADDRESS);
    $POST_CODE = mysqli_real_escape_string($conn, $POST_CODE);
    $PHONE = mysqli_real_escape_string($conn, $PHONE);
    $s="SELECT * FROM customer where CUSTOMER_EMAIL='$CUSTOMER_EMAIL'";
    $result = mysqli_query($conn,$s);
    $num= mysqli_num_rows($result);
    
    if($num ==1)
    {
      echo "username already taken";
      
    }
    if(strlen($PHONE)!=10)
    {
       echo "<script> alert('Invalid Phone Number, Please Enter Valid 10-digit Phone Number');window.location='index.php'</script>";
     
    }
    if(strlen($POST_CODE)!=6)
    {
        echo "<script> alert('Invalid Phone Number, Please Enter Valid 6-digit Post Code');window.location='index.php'</script>";

    }
   
    else{
     
       $sql = "INSERT INTO customer(CUSTOMER_ID,CUSTOMER_NAME,CUSTOMER_EMAIL,PASSWORD,HOME_ADDRESS,POST_CODE,PHONE)VALUES('','$CUSTOMER_NAME','$CUSTOMER_EMAIL', '$PASSWORD','$HOME_ADDRESS','$POST_CODE','$PHONE')";
       mysqli_query($conn,$sql);
       echo "<script> alert('Registration Successful! Please Login to start shopping'); window.location='index.php'</script>";
    }




  }



  
  ?>

