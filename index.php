<?php
session_start();
 $link = mysqli_connect("localhost","root","","ecom");
?>

<!-- REMEMBER THIS INDEX. HTML IS NOW OUR ACCOUNT PAGE!-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce</title>
    <link rel="stylesheet" href="account.css" />
    
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <div class="header">
      <div class="container">
         <div class="navbar">
        <div class="logo">
          <img src="./images/Free_Sample_By_Wix.jfif" width="125px" height="90px" />
        </div>
         </div>
         <h5 style="padding-left: 50px;color:white">WELCOME USER PLEASE LOGIN TO CONTINUE SHOPPING,IF NEW PLEASE REGISTER FIRST.</h5>

       

        <!--Account page-->
        <div class="account-page">
          <div class="row">
            <div class="col-4">
              <div class="form-container">
              <div class="form-btn">
                <span onclick="login()">Login</span>
                <span onclick="register()">Register</span>
                <hr id="Indicator">
                </div>
                <form id="LoginForm" action="login.php" method="post" >
                     <input type="text" placeholder="Username" name="CUSTOMER_NAME" required>
                     <input type="text" placeholder="E-Mail" name="CUSTOMER_EMAIL" required>
                     <input type="password" placeholder="password" name="PASSWORD" required>
                     <button type="submit" class="btn" name="Login">Login</button>


                     
          

                </form>

                 <form id="RegistrationForm" action="insert.php" method="post" enctype="multipart/form-data">
                 <table>
                   <tr>
                     <td><input type="text" placeholder="Username" name="CUSTOMER_NAME" required></td>
                   </tr>
                   <tr>
                    <td> <input type="email" placeholder="Email" name="CUSTOMER_EMAIL" required><td>
</tr>
                       <tr>
                     <td><input type="password" placeholder="Password" name="PASSWORD" required></td>
                       </tr>
    
                     <tr>
                   <td> <textarea cols="20" rows="10" placeholder="Address"name="HOME_ADDRESS" required style="height: 100px;"></textarea></td>
                     </tr>
                     <tr>
                   <td> <input type="text" placeholder="PIN CODE" name="POST_CODE" required>
                   </td></tr>
                   <tr>
                   <td> <input type="text" placeholder="Phone Number" name="PHONE" required></td>
                   </tr>
                   <tr>
                    <td> <button type="submit" class="btn" name="Register">Register</button></td>
                   </tr>
                 </table> 
                </form>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="footer">
        <div class="row">
          
          <div class="footer-col2">
            <img src="./images/Free_Sample_By_Wix.jfif" width="30px" />
            <p>
              The Best only!!!!
            </p>
          </div>
        </div>
      </div>
    </div>
    <!--JS for Toggle form-->
    <script>
        var LoginForm=document.getElementById("LoginForm");
        var RegistrationForm=document.getElementById("RegistrationForm");
        var Indicator=document.getElementById("Indicator");
        function register()
        {
            RegistrationForm.style.transform="translateX(0px)";
            LoginForm.style.transform="translateX(0px)";
            Indicator.style.transform="translateX(100px)";
        }
          function login()
        {
            RegistrationForm.style.transform="translateX(300px)";
            LoginForm.style.transform="translateX(300px)";
             Indicator.style.transform="translateX(0px)";
        }

        </script>

  </body>
</html>
