<?php
session_start();
 $link=mysqli_connect("localhost","root","","ecom");
  ini_set('display_errors',0);
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

     /* if(isset($_POST["submit123"]))
      {
       ?>
       <script>
         ​​window.location="#yash";​
       </script>
       <?php
      }*/









 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce</title>
    <link rel="stylesheet" href="styles1.css" />
    <link rel="stylesheet" href="bootstrap.min.css"/> 
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    


  </head>
  <body>
    <form id="yashform" action="" method="POST">
    <div class="header">
    <div class="container-alpha">
      <div class="navbar-beta">
        <div class="logo">
          <img src="./images/Free_Sample_By_Wix.jfif" width="125px" />
        </div>
        <div>
        <nav>
          <ul>
            <li>
              <b><a href="logout.php" style="color: white;">Home</a></b>
            </li>
            <li>
              <b><a href="Product.php" style="color: white;">Products</a></b>
            </li>
            <li>
              <b><a href="cart.php"style="color: white;">Cart</a></b>
              
            </li>
           
             <li>
                <b><input type="submit" name="sub" value="Logout"></b>
              </li>
              <li>
              
              </li>

          </ul>
        </nav>
        <br>

        <label style="color: white;">Search</label>
              <input type="text" name="search" placeholder="Product Name/Category">
              <button type="submit" name="submit123"><?php   echo "<script>window.location='#yash'</script>"?>Submit</button>
        </div>

      </div>
    </form>






        

        <div class="info-alpha">
          <h1 >Welcome To Product Page!!</h1>
        </div>
      </div>
    </div>


     <h2 class="title">All Products</h2>
     <div class="row mx-5 text-center" id="yash">
       

    <?php
      if(!isset($_POST["submit123"]))
      {
         
         $res=mysqli_query($link,"SELECT * FROM product");
          $res1=mysqli_query($link,"SELECT * FROM product");
          $num= mysqli_num_rows($res1);
          $count=1;
        
  
         while($row=mysqli_fetch_array($res))
         {
            if($count<=$num)
            {
              

           
         ?>
         
        <div class="col-sm-4 mt-5">
          <div class="card" >
          <img  src="<?php  echo $row["PRODUCT_IMAGE"]?>" height="350px"  class="card-img-top"/>
          <div class="card-body">
          <h4 class="card-title" style="text-align: center"><?php  echo $row["PRODUCT_NAME"]  ?></h4>
          <p class="card-text" style="text-align: center">Rs <?php   echo $row["PRODUCT_PRICE"];?></p>
         
        </div>
         <a href="Product_details.php?PRODUCT_ID=<?php echo $row["PRODUCT_ID"]; ?> & CATEGORY_NAME=<?php echo $row["CATEGORY_NAME"];?>" class="btn">View Description</a>
         </div>
        

  
        </div>
        

<?php
         }
         $count=$count+1;
        }
      }
      else{
        $found=0;
         $str=$_POST["search"];
          $res=mysqli_query($link,"SELECT * FROM product WHERE PRODUCT_NAME LIKE '%$str%' OR CATEGORY_NAME='$str' ");
          while($row=mysqli_fetch_array($res))
           { 
             $found++;
            
             
            ?>
            
             
              <div class="col-sm-4 mt-5">
          <div class="card">
            
          <img  src="<?php  echo $row["PRODUCT_IMAGE"]?>" height="350px"  class="card-img-top" />
          <div class="card-body">
          <h4 class="card-title" style="text-align: center"><?php  echo $row["PRODUCT_NAME"]  ?></h4>
          <p class="card-text" style="text-align: center">Rs <?php   echo $row["PRODUCT_PRICE"];?></p>
         
        </div>
         <a href="Product_details.php?PRODUCT_ID=<?php echo $row["PRODUCT_ID"]; ?> & CATEGORY_NAME=<?php echo $row["CATEGORY_NAME"];?>" class="btn">View Description</a>

         </div>
        

  
        </div>
           
        <?php

           }
           if($found==0)
           {
              echo "<script> alert('No Product/Category found');window.location='Product.php'</script>";
           }
          


      }
     

?>

        
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
        

   
       
    <!--Footer-->
    <div class="footer-god">
      <div class="row">
        
        <div class="footer-god-col2">
          <img src="./images/Free_Sample_By_Wix.jfif" width="30px" />
          <p>
            Hope our services have rendered useful. Continue shopping to avail better offers and discounts!!! 
          </p>
        </div>
        
        >
      </div>
    </div>

<script src="bootstrap.min.js">


</script>
 
  </body>
</html>
