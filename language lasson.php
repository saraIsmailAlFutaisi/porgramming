<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../program language/css/stylenew.css">
      <link rel="stylesheet" href="css\stylenew.css">
</head>
<body>
<header>
<ul>
<li><a href="../program language/home page .php">home</a></li>    
<li><a href="#home">login</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">tool </a>
  
  </li>
  <li><a href="#home">structure</a></li>
  <li><a href="#news">language lasson</a></li>
  <li><a href="../program language/test.php">test</a></li>
</ul>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color: coral;}
</style>
<p><h4>first lesson</h4></p>
</header>
<body>


<form action="language lasson.php" method="post" >    
<table>
    
  <tr>
    <th>tage</th>
    <th>pottom</th>
    <th>result</th>
  </tr>
  <tr>
    <td> <div> 
                <p>  <label for="Choose ">Choose tage</label>
                 <select  name="Choose" id="Choose " required>
                         <option value="h1" >h1</option>
                         <option value="h2" >h2</option>
                         <option value="h3" >h3</option>
                         <option value="h4">h4</option>
                         <option value="h5" >h5</option>
                         <option value="h6" >h6</option>
                        </p>
                        
                  </select>
                </div>
</td>
    <td>
                                                                                                         
    <input type="submit" value="result" name="result1">
    </form>
    
     </td>
    <td><?php
if(isset($_POST['result1'])){
    
      $Choose=$_POST['Choose'];
     switch($Choose)
     {
        case "h1":
          ?>   <p><h1>this is program</h1></p>
           <?php break;
        case"h2":
           ?> <p><h2>this is program</h2></p>
           <?php break;
        case "h3":
            ?><p><h3>this is program</h3></p>
           <?php break;  
        case"h4":
          ?>  <p><h4>this is program</h4></p>
           <?php break;   
        case"h5":
           ?> <p><h5>this is program</h5></p>
          <?php  break;    
        case"h6":
          ?>  <p><h6>this is program</h6></p>
          <?php break;    
        Default:
      ?>  <p>try agin</p>
      <?php      break;
     }   
    }?>
 
   </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

</body>




<footer>

</footer>
</html>



