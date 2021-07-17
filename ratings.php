<?php
 $PRODUCT_ID=$_GET["PRODUCT_ID"];
session_start();
   $link = mysqli_connect("localhost","root","","ecom");
   $TEMP1=$_SESSION["CUSTOMER_NAME"];
   
 












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
    <script>
        function valid()
        {
            if(document.getElementById('PRODUCT_RATING').value >5)
            {
                 alert('Rating should be between 1-5');
                 return false;
            }
            else if(document.getElementById('PRODUCT_RATING').value=="")
            {
                alert('Please Rate The Product');
            }
        }



    </script>



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
      

      <!---cart items details-->
      <div class="small-container cart-page">
        


              <form name="form2" action="" method="POST" enctype="multipart/form-data" onsubmit="return valid()">
              
              <table>
          <tr>
            <th>Product</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rating</th>
            <th>Rating Description</th>
          </tr>
            
                     
              <div class="cart-info">
                  <td>




                <?php
    $res=mysqli_query($link,"SELECT PRODUCT_IMAGE FROM product  WHERE PRODUCT_ID=$PRODUCT_ID");
    while($row=mysqli_fetch_array($res))
    {
     
    ?>
                  
                <img src="<?php echo $row['PRODUCT_IMAGE']?>" height="100" width="100" />
                
               <?php
    }
    ?>
                               
                 
                
                 
                 
                  

                </div>
              </div>

            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name="PRODUCT_RATING"id="PRODUCT_RATING"></td>


            <td>&nbsp;&nbsp;
                <textarea cols="20" rows="10" name="RATING_DESC"></textarea>
                
                
           </td>
             
          </tr>
  
          
    
                   </table>
                   <div class="total-price">
         
           
          <button type="submit" name="submit5" value="Rate" width="100" height="100">Rate</button>
            
          
      </div>
                     
                </form>
                    
   
          
      </div>
      <?php
      if(isset($_POST["submit5"]))
      {
            echo "<script> alert('Thank you for rating the product.Please Continue Shopping ');window.location='Product.php'</script>";
          mysqli_query($link,"INSERT INTO ratings VALUES('$_GET[CUSTOMER_ID]','$_POST[PRODUCT_RATING]','$_POST[RATING_DESC]','$_GET[PRODUCT_ID]','$_SESSION[CUSTOMER_NAME]')");
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