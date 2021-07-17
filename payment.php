<?php
session_start();
   ini_set('display_errors',0);
     $link = mysqli_connect("localhost","root","","ecom");
     $TEMP=$_SESSION['CUSTOMER_ID'];
        $i=count($_SESSION['CART']);
        $e=0;
        $val=1;

if(isset(($_POST["submit3"])))
{
   echo "<script> alert('Payment Successful, Track your order');window.location='track.php'</script>";
}
   if(is_array($_COOKIE['item']))
      {
       
        foreach($_COOKIE['item'] as $name1 => $value1)
        {
          
           $value11=explode("__",$value1);
           if(isset($_POST["sub"]))
           {
              $help=0;
                $temp=(int)$value11[5];
            while($help<$i)
            {
                  if($_SESSION['CART'][$help]==$temp)
                  {
                    unset($_SESSION['CART'][$help]);
                   
                  }
                  $help++;
            }
             $_SESSION['CART']=array_values($_SESSION['CART']);

             setcookie("item[$name1]","",time()-1800);
             ?>
             <script type="text/javascript">
            window.location='index.php';
             </script>
             <?php
             
           }
        }

        
      }
  /* if(isset(($_POST["submit3"])))
   {
     while($e<$i)
     {
       $val1=$_SESSION["CART"][$e];
     $sql= "CALL `stock_update`($val,$val1 )";
     $res=mysqli_query($link,$sql);
                   $row=mysqli_fetch_assoc($res);
                   $e++;
     }
   }
   print_r($row);*/



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce</title>
    <link rel="stylesheet" href="cart.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <form action="" method="POST">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <img src="./images/Free_Sample_By_Wix.jfif" width="125px" />
        </div>
        <nav>
          <ul>
            <li>
              <b><a href="logout.php">Home</a></b>
            </li>
            <li>
              <b><a href="Product.php">Products</a></b>
            </li>
            <li>
              <b><a href="cart.php">Cart</a></b>
            </li>
           
            <li>
              <b><input type="submit" name="sub" value="Logout"></b>
            </li>
          </ul>
        </nav>
        </form>
      </div>
      <H2 style="color:white">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAYMENT PORTAL
      </H2>

      <!---cart items details-->
      <div class="small-container cart-page">
        

          <?php
          $d=0;

          if(is_array($_COOKIE['item']))
          {
             $d=$d+1;
          }
          if($d==0)
          {
              echo "no records available";
          }
          else
          {
              ?>
              <form name="form2" action="" method="POST" enctype="multipart/form-data">
              <table>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
             <tr>
                 <?php
                 $tot=0;
                 if(is_array(($_COOKIE['item'])))
                 {
                 foreach ($_COOKIE['item'] as $name1 => $value)
                 {

                     $value11=explode("__",$value);
                     $tot=$tot+$value11[4];
                     
                     ?>
                     
              <div class="cart-info">
                  <td>
                  
                <img src="<?php echo $value11[0];?>" height="100" width="100" />
                <div>
                  <p><?php echo $value11[1];?></p>
                               
                 
                
                 
                 
                  

                </div>
              </div>

            </td>
            <td>&nbsp;&nbsp;<?php echo $value11[3];?></td>
            <td>&nbsp;&nbsp;<?php echo $value11[2];?></td>
             
                 </tr>
  
          
          
                
                     
           <?php

                     
                 }
                }  
              }
            
            
               
           
                    ?>
                   
                    
                 
   
                   </table>
                         <div class="total-price">
                           <table>
                             <tr>
                               <td>Total Price:</td>
          
          
            <td><?php echo $tot  ?></td>
            
          </tr>
          <tr>
            <td> </td>
            <td>  <input type="submit" name="submit3" value="Pay Now" width="100" height="100"></td>
          </tr>
                           </table>
            
          
      </div>
             
                     
                     
                </form>
               
      </div>
      <?php
 if(isset($_POST["sub"]))
 {
   ?>
    <script type="text/javascript">
            window.location='index.php';
             </script>
<?php
 }

?>

<?php
$today=date('Y-m-d');
$add=date('Y-m-d',strtotime($today.'+2 days'));

if(isset($_POST["submit3"]))
{
  mysqli_query($link,"INSERT INTO orders VALUES ('','$TEMP','$tot','$add','$today')");
}




?>
   
    <!--Footer-->
    <div class="footer">
      <div class="row">
        
        <div class="footer-col2">
          <img src="./images/Free_Sample_By_Wix.jfif" width="30px" />
          <p>
            Hope our services have rendered useful. Continue shopping to avail better offers and discounts!!! 
          </p>
        </div>
        
      </div>
    </div>
  </body>
</html>