<?php
 include'C:\xampp\htdocs\php\porgramming\interface.php';
?>
  </header>
   
    <main >
    <div class="container">
   <p> <form action="cheakllogin.php" method="post"  > 
  
   <h2>Register on the website</h2> 
   <label> firs tname</label>
  <p> <input type="text" required   maxlength="10" minlength="5" placeholder="in ther your first name" name="firstname" ></p>
   <label> last name</label>
       <p>   <input type="text" required   maxlength="10" minlength="5" placeholder="in ther your last name" name="lastname" ></p>
         
   <label> E-mail address </label>
             <p><input type="email" required placeholder="in ther your emil" name="email" autofocus></p>
             <label> phone number </label>
             <p><input type="number" required placeholder="in ther your phone number" name="phone" autofocus></p>
    
        <label>password</label>
        <p><input type="password" required  maxlength="14" minlength="10" placeholder="in ther your password" name="password" autofocus></p>
        <label>confirm password </label>
          <p><input type="password" required  maxlength="14" minlength="10"placeholder="confirm  your password" name="confirm" ></p>
     
            <h2> <input type="submit" value="sinup" name="register">
             <input type="reset" value="Delete all">
            </h2>
           
 
 
    <div class="signup-buttons">
    <a href="../porgramming/login.php">login</a>
 
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
input[type="text"],
input[type="email"],
input[type="number"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #666;
  border-radius: 5px;
  font-size: 16px;
  transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
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

