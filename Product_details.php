<?php
      session_start();
      
        ini_set('display_errors',0);
     
       $TEMP=$_SESSION['CUSTOMER_NAME'];
     
        $i=count($_SESSION['CART']);
           if(isset($_POST))
     {
       $PRODUCT_ID=$_GET["PRODUCT_ID"];
      $CATEGORY_NAME=$_GET["CATEGORY_NAME"];
      if(empty($_SESSION['CART']))
      {

     
      $_SESSION['CART']=array();
      }
      if(isset($_POST['submit1']))
      {
        $_SESSION['CART'][]=$_SESSION['PRODUCT_ID'];
        
        
      }
      
    
      
      
      
     }
  
    
    
    
    


     $link=mysqli_connect("localhost","root","","ecom");
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
      
     if(isset($_POST["submit1"]))
     {
     


       echo "<script> alert('Item Successfully Added To Cart! Please Continue Shopping!!');window.location='Product.php'</script>";
       
       $d=0;
       if(is_array($_COOKIE['item']))
       {
         foreach($_COOKIE['item'] as $name => $value)
         {
           $d=$d+1;
          
         }
         $d=$d+1;
       }
       else{
         $d=$d+1;
       }
     
       $res3=mysqli_query($link,"SELECT * FROM product where PRODUCT_ID=$PRODUCT_ID");
       while($row3=mysqli_fetch_array($res3))
       {
         $god=$row3["PRODUCT_ID"];
         $img1=$row3["PRODUCT_IMAGE"];
          $nm=$row3["PRODUCT_NAME"];
           $prize=$row3["PRODUCT_PRICE"];
            $qty="1";
             $total=$prize*$qty;

       }

       if(is_array($_COOKIE['item']))
       {
          foreach($_COOKIE['item'] as $name1 => $value)
          {
            $value11=explode("__",$value);
            $found=0;
            if($img1==$value11[0])
            {
              $found=$found+1;
              $qty=$value11[3]+1;
              
              

              $tb_qty;
              $res=mysqli_query($link,"SELECT * FROM product where PRODUCT_IMAGE='$img1'");
              while($row=mysqli_fetch_array($res))
              {
                  $tb_qty=$row["STOCK"];
              }
              if($tb_qty<$qty)
              {
                ?>
                <script type="text/javascript">
                alert("The quantity is unavailable")
              </script>


              <?php 
              }
              else{
              $total=$value11[2]*$qty;
               setcookie("item[$name1]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$god,time()+1800);
              
            }
          }
        }
          if($found==0)
          {
             $tb_qty;
              $res=mysqli_query($link,"SELECT * FROM product where PRODUCT_IMAGE='$img1'");
              while($row=mysqli_fetch_array($res))
              {
                  $tb_qty=$row["STOCK"];
              }
              if($tb_qty<$qty)
              {
                ?>
                <script type="text/javascript">
                alert("The quantity is unavailable")
              </script>


              <?php 
              }
              else{
            
             setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$god,time()+1800);
          }
       }
      }
       else{
          $tb_qty;
              $res=mysqli_query($link,"SELECT * FROM product where PRODUCT_IMAGE='$img1'");
              while($row=mysqli_fetch_array($res))
              {
                  $tb_qty=$row["STOCK"];
              }
              if($tb_qty<$qty)
              {
                ?>
                <script type="text/javascript">
                alert("The quantity is unavailable")
              </script>


              <?php 
              }
              else{

     
       setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$god,time()+1800);
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
    <link rel="stylesheet" href="styles_p1.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <form action="" method="POST">
    <div class="container-alpha">
      <div class="navbar-beta">
        <div class="logo">
          <img src="./images/Free_Sample_By_Wix.jfif" width="125px" height="100px" />
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
              <b><a href="">Ratings</a></b>
            </li>
            <li>
              <b><input type="submit" name="sub" value="Logout"></b>
            </li>
          </ul>
        </nav>
    </form>
      </div>

      <!--Single product Details-->

    <?php
    $res=mysqli_query($link,"SELECT * FROM product  WHERE PRODUCT_ID=$PRODUCT_ID");
    while($row=mysqli_fetch_array($res))
    {
      $_SESSION['PRODUCT_ID']=$PRODUCT_ID;
      $STOCK=$row["STOCK"];
      
      $_SESSION["STOCK"]=$STOCK;
    ?>
    <form name="form1" action="" method="POST">
      <div class="small-container single-product">
        <div class="row">

          <div class="col-4">
            <img src="<?php echo $row["PRODUCT_IMAGE"];?>" height="350px"
            />
          </div>
          <div class="col-4">
            
            <h1 style="padding-left: 40%;"><?php echo $row["PRODUCT_NAME"];?><br /><br /></h1>
            <h4 style="padding-left: 40%;">Rs&nbsp;<?php echo $row["PRODUCT_PRICE"]?><br /><br /></h4>
              
           
            <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <input type="text" value="1"/>
      
            <br />
            <br />
            <br />
            <p><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quantity Availabile:</b><?php echo $row["STOCK"];?> </p>
            


            <br>
            <br>
             
                  <a href="ratings.php?PRODUCT_ID=<?php echo $row["PRODUCT_ID"]; ?> & CUSTOMER_ID=<?php echo $_SESSION["CUSTOMER_ID"]?>" style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rate This Product</a>
                  <div style="padding-left: 250;">
                  <button type="submit" name="submit1" class="btn" style="align-items: center;padding-right:50px" ?PRODUCT_ID=<?php echo $row["PRODUCT_ID"]; ?>  >Add To Cart</button>
    </div>

            


            <br />
             
                  

           

          </div>

         
          
          <div class="col-4">
            <h3 style="padding-bottom: 70%;">Product Description:<br><br><?php echo $row["PRODUCT_DESC"]?></h3>
            
            
            
          </div>
         
          
          
          
        </div>
       

       






         </table>

        
      </div>
      
      
    </div>
    
    
    </form>


     <?php

    }
     ?>


<h2 class="title">User Ratings</h2>
<?php
 $res22=mysqli_query($link,"SELECT * FROM ratings where PRODUCT_ID=$PRODUCT_ID");
 while($row=mysqli_fetch_array($res22))
         {



?>
  <table style="width:100%">
  <tr>
    <th>User Name</th>
    <th>User Ratings</th>
    <th>User Review</th>
  </tr>
  <br>
  <tr>
    <td style="text-align: center;"><?php  echo $row["CUSTOMER_NAME"];  ?></td>
    <td style="text-align: center;"><?php  echo $row["PRODUCT_RATING"];  ?></td>
    <td  colspan="10"><?php  echo $row["RATING_DESC"];  ?></td>
  </tr>
  
</table>
<?php
         }



?>



   <h2 class="title">Related products</h2>
      <?php
         $res1=mysqli_query($link,"SELECT * FROM product WHERE CATEGORY_NAME='$CATEGORY_NAME' AND PRODUCT_ID!=$PRODUCT_ID");
         while($row=mysqli_fetch_array($res1))
         {
           
      ?>
   
      <div class="row">
       <div class="col-4">
        <img src="<?php  echo $row["PRODUCT_IMAGE"]?>" height="350px" >
        <h4 style="text-align: center;"><?php  echo $row["PRODUCT_NAME"]  ?></h4>  
        
        <p style="text-align: center;">Rs <?php   echo $row["PRODUCT_PRICE"];?></p>
       </div>

        <a href="Product_details.php?PRODUCT_ID=<?php echo $row["PRODUCT_ID"]; ?> & CATEGORY_NAME=<?php echo $row["CATEGORY_NAME"];?>"        class="btn">View Description</a>
      
      </div>
      <?php
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
