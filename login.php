<?php
session_start();

if(isset($_POST['Login']))
{
$conn=mysqli_connect("localhost","root","","ecom");
$CUSTOMER_NAME=$_POST['CUSTOMER_NAME'];
$PASSWORD=$_POST['PASSWORD'];
$CUSTOMER_EMAIL=$_POST['CUSTOMER_EMAIL'];


  
    $s = "SELECT * FROM customer where CUSTOMER_NAME='$CUSTOMER_NAME' && CUSTOMER_EMAIL='$CUSTOMER_EMAIL' && PASSWORD='$PASSWORD'";
    ;
   
    $result = mysqli_query($conn,$s);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        
        $_SESSION['CUSTOMER_NAME']=$CUSTOMER_NAME;
        if($CUSTOMER_NAME=="admin" && $CUSTOMER_EMAIL=="admin@admin.in" && $PASSWORD=="admin")
        {
                  header('location:AdminMainPage.php');
        }
        else{
        header('location:logout.php');
    }
}



    
    else{
         echo "<script> alert('Login Unsuccessful, Make sure to register first or Please check your login credentials');window.location='index.php'</script>";
    }
}



/* basic idea is use session in queries*/




?>