<!DOCTYPE html>
  <!--  صفحة نمودج تسجيل الدخول و
    cssالخاص به-->

<html>
  <head>
  <link rel="icon" href="../"/>
    <meta charset="UTF-8" />
   <meta name="تسجيل دخول " content="دخول لأشخاص المسجلين في الصفحة"/ >
   <link rel="stylesheet" href="../porgramming/css/stylenew.css">
      <link rel="stylesheet" href="css\stylenew.css">
    <title>login</title>
  </head> 
  <header>
  <ul>
<li><a href="../porgramming/home page .php">home</a></li>
  <li class="dropdown">
  <li ><a href="">list of language</a></li>
  <li> <a href="../porgramming/workshop.php">workshop</a></li>
  <li><a href="">about us</a></li>
  <li><a href="">evaluation</a></li>
  <li><a href="../porgramming/logout.php">logout</a></li>
</ul>

</ul>
  </header>
   
    <main >
    <div class="container">
   <p> <form action="cheakllogin.php" method="post"  > 
   <h2>Register on the website</h2> 
   <label> E-mail address </label>
             <p><input type="email" required placeholder="in ther your emil" name="email" autofocus></p>
       
    
        <label>password</label>
        <p><input type="password" required  maxlength="14" minlength="10" placeholder="in ther your password" name="password" autofocus></p>
    
     
            <h2> <input type="submit" value="login" name="submit">
             <input type="reset" value="Delete all">
            </h2>
           
 
 
    <div class="signup-buttons">
  <a href="signup.php">Sign Up</a>
 
</div>
   </form>
         
       
    </main> 
    
    </div> 
</body>
<style>
  body {
  margin: 0;
  padding: 0;
  height: 100vh;
  background-image: url('../porgramming/image/istockphoto-1460275725-1024x1024.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: rgba(255, 255, 255, 0.8);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

form {
  max-width: 800px;
  width: 100%;
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

/* Form Sections */
form > div {
  margin-bottom: 20px;
}

/* Labels */
label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #333;
}

/* Input Fields */
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #666;
  border-radius: 5px;
  font-size: 16px;
  transition: border-color 0.3s ease;
}

input[type="email"]:focus,
input[type="password"]:focus {
  outline: none;
  border-color: #ff0000;
}

/* Submit and Reset Buttons */
input[type="submit"],
input[type="reset"] {
  display: inline-block;
  background-color: #ff0000;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
  background-color: #b30000;
}

/* Signup Buttons */
.signup-buttons {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.signup-buttons a {
  display: inline-block;
  background-color: #ff0000;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  text-decoration: none;
  margin: 0 10px;
  transition: background-color 0.3s ease;
}

.signup-buttons a:hover {
  background-color: #b30000;
}

/* Responsive Styles */
@media (max-width: 768px) {
  form {
    padding: 20px;
  }
}
 
 

          </style>
  <footer >
  
    </footer>
  </footer> 
  
</html>