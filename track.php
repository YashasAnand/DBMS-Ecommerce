

<?php
session_start();
  ini_set('display_errors',0);
  $link = mysqli_connect("localhost","root","","ecom");
  $TEMP=$_SESSION['CUSTOMER_ID'];
   $i=count($_SESSION['CART']);
  


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
    <link rel="stylesheet" href="cart1.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="bootstrap.min.css"/> 
  </head>
  <body>
    <form action="" method="POST">
    <div class="container-alpha">
      <div class="navbar-beta">
     
        <div class="logo">
          <img src="./images/Free_Sample_By_Wix.jfif" width="125px" />
        </div>
         <nav>
          <ul>
            <li>
              <b><a href="logout.php" style="color: white;">Home</a></b>
            </li>
            <li>
              <b><a href="Product.php" style="color: white;">Products</a></b>
            </li>
            <li>
              <b><a href="cart.php" style="color: white;">Cart</a></b>
            </li>
            
            <li>
              <b><input type="submit" name="sub" value="Logout"></b>
            </li>
          </ul>
        </nav>
      </div>
      </form>
      
     
    <div>
     <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Customer Name</th>
      
      <th scope="col">Bill Paid Status</th>
      <th scope="col">Product/s Bought on</th>
      <th scope="col">Delivery Date</th>
   
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $_SESSION['CUSTOMER_NAME']?></th>
      <td>YES</td>
      <?php
      $res=mysqli_query($link,"SELECT * FROM orders WHERE CUSTOMER_ID=$TEMP");
       while($row=mysqli_fetch_array($res))
       {
      ?>
      <td><?php echo $row['ORDER_DATE']?></td>
      <td><?php echo $row['SHIPPING_DATE']?>  </td>

    </tr>
    
  </tbody>
</table>
</div>
    </div>
    <?php
       }

    ?>



     <div class="footer-god">
      <div class="row">
       
        <div class="footer-god-col2">
          <img src="./images/Free_Sample_By_Wix.jfif" width="30px" />
          <p>
            Hope our services have rendered useful. Continue shopping to avail better offers and discounts!!! 
          </p>
        </div>
        
        
      </div>
    </div>


    
     
  </body>
</html>
      
   
   