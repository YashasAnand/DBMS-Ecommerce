<?php

$link=mysqli_connect("localhost","root","","ecom");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main Page</title>
    <link rel="stylesheet" href="cart.css" />
</head>
<body>
<h2 style="text-align: center">Admin Page</h2>
<div class="container">
<div class="row">
<form name="form1" action="" method="POST" enctype="multipart/form-data">
<table>
<tr>
    <td>Product Name</td>
    <td><input type="text" name="PRODUCT_NAME" required></td>
</tr>
<tr>
    <td>Product Price</td>
    <td><input type="text" name="PRODUCT_PRICE" required></td>
</tr>
<tr>
    <td>Product Stock Available</td>
    <td><input type="text" name="STOCK" required></td>
</tr>
<tr>
    <td>Product Description</td>
    <td><textarea cols="15" rows="10" name="PRODUCT_DESC" required></textarea></td>
</tr>
<tr>
    <td>Product</td>
    <td><input type="file" name="PRODUCT_IMAGE" required></td>
</tr>
<tr>
    <td>Product Category</td>
    <td>
        <select name="CATEGORY_NAME">
            <option value="Watches">Watches</option>
            <option value="Phones" >Phones</option>
            <option value="Pens">Pens</option>
            <option value="Shoes">Shoes</option>
            <option value="Earphones">Earphones</option>
            

        </select>
    </td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
</tr>

</table>

</form>
</div>
<form action="" method="POST">
<div class="row">


<input type="submit" name="sub" value="Logout">

</div>

</form>
</div>
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

<?php
if(isset($_POST["submit1"]))
{

      $fnm=$_FILES["PRODUCT_IMAGE"]["name"];
      $dst="./product_image/".$fnm;
      $dst1="product_image/".$fnm;
      move_uploaded_file($_FILES['PRODUCT_IMAGE']["tmp_name"],$dst);

mysqli_query($link,"INSERT into product values('','$_POST[PRODUCT_NAME]','$_POST[PRODUCT_DESC]',$_POST[PRODUCT_PRICE],$_POST[STOCK],'$_POST[CATEGORY_NAME]','$dst1')");

 echo "<script> alert('Upload Successful, Product is now available to user');window.location='AdminMainPage.php'</script>";
}
?>
</body>
</html>