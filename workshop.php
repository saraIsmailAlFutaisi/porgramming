<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../program language/css/stylenew.css">
      <link rel="stylesheet" href="css\stylenew.css">
</head>
<body>
<header>
<div id="imge"> <div>
                 <strong>language lasson<p></p> 
                  <p>  </p> </strong>
              </div></div>
              <ul>
<li><a href="../porgramming/home page .php">home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">language </a> </li>
  <li ><a href="">list of language</a></li>
  <li> <a href="../porgramming/workshop.php">workshop</a></li>
  <li><a href="#news">about us</a></li>
  <li><a href="#news">evaluation</a></li>

</ul>
</header>
<section><h2>create new workshop</h2>
 </section>
<main>
       <form action="create new workshop.php"  method="post">
             <div>
               <p> <label>date</label>
                <input  type="date"   name="DATE"/></p>
            </div>
            <div> 
            <p> <label >language </label>
                <input type="language" required placeholder=" language" name="language" autofocus></p>
                </div>

            <div> 
               <p> <label >location </label>
                <input type="location" required placeholder=" location" name="location" autofocus></p>
           </div>
            
          <div> 
          <p> <label >time start </label>
                <input type="time" required placeholder=" time" name="time" autofocus></p>
          </div>
          <div> 
          <p> <label >time end </label>
                <input type="time" required placeholder=" timed" name="timed" autofocus></p>
          </div>
        
          <div> 
            <label> number of seats available </label>
            <p><input type="number" required    name="number" ></p> 
         </div>
         <div> 
            <label> the topic</label>
            <p><input type="text" required   maxlength="15" minlength="10" placeholder="in ther your the topic" name="the topic" ></p> 
         </div>
         
         <p>
            <input type="submit" value="save" name="save">
             <input type="reset" value="Delete all">
             
        </p>
         
       
      





          </form>
          <style>
            
            form {
  max-width: 800px;
  margin: 0 auto;
  padding: 30px;
  background-color: #f2f2f2;
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
input[type="date"],
input[type="text"],
input[type="time"],
input[type="number"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  transition: border-color 0.3s ease;
}

input[type="date"]:focus,
input[type="text"]:focus,
input[type="time"]:focus,
input[type="number"]:focus {
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

/* Responsive Styles */
@media (max-width: 768px) {
  form {
    padding: 20px;
  }
}

          </style>
        </main>
</body>
<footer>
</footer>
</html>