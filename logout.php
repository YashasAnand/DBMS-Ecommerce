<?php
    session_start();
     ini_set('display_errors',0);
    $link = mysqli_connect("localhost","root","","ecom");
      $i=count($_SESSION['CART']);
    
    if(isset($_SESSION['CUSTOMER_NAME']))
    {
      $uname=$_SESSION['CUSTOMER_NAME'];
      $idquery="SELECT CUSTOMER_ID FROM `customer` WHERE CUSTOMER_NAME='{$uname}'";
      $result=mysqli_query($link,$idquery);
      $val=mysqli_fetch_array($result);
      if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    
}
    
      $_SESSION['CUSTOMER_ID']=$val['CUSTOMER_ID'];
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
     
  


    
  $count=0
  ;
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
<!-- This is now our home page!-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

  </head>
  <body>
    <form action="" method="POST">
    <div class="header">
    <div class="container">
      
      <div class="navbar">
        <div class="logo">
          <img src="./images/Free_Sample_By_Wix.jfif" width="145px" />
        </div>
        <div>
        <nav>
          <ul>
            <li>
              <b><a href="logout.php">Home</a></b>
            </li>
            <li>
              <b><a href="Product.php" >Products</a></b>
            </li>
            <li>
              <b><a href="cart.php">Cart</a></b>
            </li>
           
            
          
             <li>
                <b><input type="submit" name="sub" value="Logout"></b>
              </li>
            
        
          </ul>
        </nav>
        
        </div>
    </form>
      </div>
      
        <div class="info">
          <h3 style="text-align: center">Welcome <?php echo $_SESSION['CUSTOMER_NAME'] ;?></h3>
          <br>
          <br>
          <h3>
            The best e-commerce webiste which guarantees customer satifaction. Also based on frequency of orders the user will avail better offers and discounts on all orders.<br>We guarantee the best products and timely home delivery as well.</br> Thank you for shopping with us!!!!!!<br>Happy shopping &#x1F600;
          </h3>
          <br>
          <br>
          <a href="product.php" class="btn">Explore Now &#8594</a>
        </div>
      </div>
    </div>
  
  <!--Featured Products-->
  
    <h2 class="title">Featured Products</h2>
    <?php
    $res=mysqli_query($link,"SELECT * FROM product");
   
    while($row=mysqli_fetch_array($res))
    {
      $count=$count+1;
      if($count<4)
      {
      ?>
       <div class="row">
       <div class="col-4">
        <img src="<?php  echo $row["PRODUCT_IMAGE"]?>">
        <h4 style="text-align: center;"><?php  echo $row["PRODUCT_NAME"]  ?></h4>
        <p style="text-align: center;">Rs&nbsp;<?php   echo $row["PRODUCT_PRICE"];?></p>
        <p style="text-align: center;">Category:&nbsp;<?php echo $row["CATEGORY_NAME"];?></p>
        
   </div >
   <a href="Product_details.php?PRODUCT_ID=<?php echo $row["PRODUCT_ID"]; ?> & CATEGORY_NAME=<?php echo $row["CATEGORY_NAME"];?>" class="btn">View Description</a>
   </div>
   
   

      <?php
    }
  }
    ?>
     
   
    <!--Latest Products-->
   
  <!--Footer-->
  <div class="footer">
   
      <div class="row">
       
        <div class="footer-col2">
          <img src="./images/Free_Sample_By_Wix.jfif" width="30px" >
          <p>Hope our services have rendered useful. Continue shopping to avail better offers and discounts!!! </p>
        </div>
        
       
      </div>
    </div>
  </div>
    </body>
</html>
