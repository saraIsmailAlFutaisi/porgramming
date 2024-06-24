<!DOCTYPE html>
<!--
  سارة إسماعيل الفطيسي
  تقوم الصفحة بسماح دخول للأشخاص المسجلين في قاعدة البيانات
   !-->
<html>
  <head>
  <link rel="icon" href="../"/>
    <meta charset="UTF-8" />
   <meta name="تسجيل دخول " content="دخول لأشخاص المسجلين في الصفحة"/ >
   <link rel="stylesheet" href="../program language/css/stylenew.css">
      <link rel="stylesheet" href="css\stylenew.css">
    <title>login</title>
  </head> 
  <header></header>
   
    <main >
    <div class="container">
   <p> <form action="cheaklogin.php" method="post"  > 
   <h2>porgram language</h2> 
   <label> E-mail address </label>
             <p><input type="email" required placeholder="in ther your emil" name="email" autofocus></p>
       
    
        <label>password</label>
        <p><input type="password" required  maxlength="14" minlength="10" placeholder="in ther your password" name="password" autofocus></p>
    
     
            <h2> <input type="submit" value="login" name="submit">
             <input type="reset" value="Delete all"></h2>
           
 
 
    <div class="signup-buttons">
  <a href="signup.php">Sign Up</a>
  <a href="forgot-password.php">Forgot Password</a>
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
  background-image: url('../program language/image/istockphoto-1460275725-1024x1024.jpg');
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
 
  background-size: cover;
  background-position: center;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
 
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
  border: 1px solid #ccc;
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
  background-color: #4CAF50;
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
  background-color: #357a38;
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