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
<main>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color: coral;}
</style> 
 
       
      


<form action="test.php" method="post" >    
<table>
    
  <tr>
    <th><h1>quation</h1></th>
    <th><h1>answer</h1></th>\
    <th><h1>adagre</h1></th>
  
  </tr>
  <tr>
    <td><div> 
                <p>  <label for="Choose " >choose the tage that gives this result for world language lasson </label>
                  <select  name="Choose" id="Choose " required>
                         <option value="h1" >h1</option>
                         <option value="strong" >strong</option>
                         <option value="em" >em</option>
                         <option value="p">p</option>
                         <option value="br" >br</option>
                         <option value="code" >code</option>
                         <option value="img" >img</option>
                        </p>
                        
                  </select>
                </div>
                  
</td>
<td>
<em>language lasson</em>
</td>
    </form>
    
     </td>
    <td><?php
if(isset($_POST['result1'])){
    
      $Choose=$_POST['Choose'];
     switch($Choose)
     {
        case "h1":  $Cho=0
          ?>   <p><h1>false</h1>
         ;</p>
           <?php break;
        case"em": $Cho=1
           ?> <p><h1>true</h1></p>
           <?php break;
        case "strong": $Cho=0
            ?> <p><h1>false</h1></p>
           <?php break;  
        case"p": $Cho=0
          ?>   <p><h1>false</h1></p>
           <?php break;   
        case"br": $Cho=0
           ?> <p><h1>false</h1></p>
          <?php  break;    
        case"code": $Cho=0
          ?>   <p><h1>false</h1></p>
          <?php break; 
          case"img": $Cho=0
            ?>  <p><h1>false</h1></p>
            <?php break;     
        Default:
      ?>  <p>try agin</p>
      <?php      break;
     }   
    }?>
 
   </td>
  </tr>
  <tr>
 
   
  </tr>
  <tr>
  <td><div> 
                <p>  <label for="Ch" >choose the tage that gives this result for world language lasson </label>
                  <select  name="Ch" id="Ch " required>
                         <option value="h1" >h1</option>
                         <option value="strong" >strong</option>
                         <option value="em" >em</option>
                         <option value="p">p</option>
                         <option value="br" >br</option>
                         <option value="code" >code</option>
                         <option value="img" >img</option>
                        </p>
                        
                  </select>
                </div>
              
<td>
<em>language lasson</em>
</td>
  
    
     </td>
    <td><?php
if(isset($_POST['result1'])){
    
      $Choose2=$_POST['Ch'];
     switch( $Choose2)
     {
        case "h1":   $Cho2=0;
          ?>   <p><h1>false</h1>
         ;</p>
           <?php break;
        case"em":   $Cho2=1;
           ?> <p><h1>true</h1></p>
           <?php break;
        case "strong":  $Cho2=0;
            ?> <p><h1>false</h1></p>
           <?php break;  
        case"p": $Cho2=0;
          ?>   <p><h1>false</h1></p>
           <?php break;   
        case"br": $Cho2=0;
           ?> <p><h1>false</h1></p>
          <?php  break;    
        case"code": $Cho2=0;
          ?>   <p><h1>false</h1></p>
          <?php break; 
          case"img": $Cho2=0;
            ?>  <p><h1>false</h1></p>
            <?php break;     
        Default:
      ?>  <p>try agin</p>
      <?php      break;
     }   
    }?>
 
   </td>
   
  </tr>
  <tr>
    <td>Cleveland</td>
    <td>Brown</td>
    
  </tr>
</table>

<input type="submit" value="result1" name="result1">         
</form>
       
        </main>
<?php
 $Ch=  $Cho2 +  $Cho;
 echo" $Ch";
?>
  
</header>
</body>
</html> 