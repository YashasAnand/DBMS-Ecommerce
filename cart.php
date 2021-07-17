<?php

use function PHPSTORM_META\type;

session_start();



 ini_set('display_errors',0);
        
         $i=count($_SESSION['CART']);
         sort($_SESSION['CART']);
        
       
                 $temo=$_SESSION['count'];
                           $e=0;
         
    $link = mysqli_connect("localhost","root","","ecom");
        
          if(isset(($_POST["submit2"])))
                 { 
                   if($i==0)
                   {
                      echo "<script> alert('You cannot proceed to payment,as there are no items to bill');window.location='cart.php'</script>";
                      
                   }
                   else{
                     echo "<script> alert('You will be redirected to payment portal');window.location='payment.php'</script>";
                   
                   while($e<$i)
                   {
                        
                      $val=$_SESSION['CART'][$e];
                     mysqli_query($link,"INSERT into order_items values('','$val','$_SESSION[CUSTOMER_ID]',1)");
                     $e++;
                      
                     



                   }
                  }

                   $temp1=$_SESSION['CUSTOMER_ID'];
                   $sql= "CALL ` FindBill`($temp1)";
                   $res=mysqli_query($link,$sql);
                   $row=mysqli_fetch_assoc($res);
                  
                  
                  
                    
                
                   
              
              }
              
               
                  
   
     
      

      if(is_array($_COOKIE['item']))
      {
        $del=array();
        foreach($_COOKIE['item'] as $name1 => $value1)
        {
          
           $value11=explode("__",$value1);
           if(isset($_POST["delete$name1"]))
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
            print_r($_SESSION['CART']);
     

           
              

            
             setcookie("item[$name1]","",time()-1800);
             ?>
             <script type="text/javascript">
            window.location.href=window.location.href;
             </script>
             <?php
             
           }
        }

        
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
      
       
      
     
       
     
  
?>
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
    <form action="" method="POST" >
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
            $_SESSION['count']=$d;
              ?>
              
              <form name="form2" action="" method="POST" enctype="multipart/form-data">
              <table>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price Per Product</th>
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
                  <input type="submit" name="delete<?php echo $name1;?>" value="delete" >  
                               
                 
                
                 
                 
                  

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
         
           
          <input type="submit" name="submit2" value="Confirm item/s" width="100" height="100">
            
          
      </div>
                     
                </form>
                    
   
          
      </div>
          
   

    <!--Footer-->
    <div class="footer">
      <div class="row">
       
        <div class="footer-col2">
          <img src="./images/Free_Sample_By_Wix.jfif" width="30px" />
          <p>
            Hope our services have rendered useful.Continue shopping to avail better offers and discounts!!! 
          </p>
        </div>
        
        
      </div>
    </div>
  </body>
</html>