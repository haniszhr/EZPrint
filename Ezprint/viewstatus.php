<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZPrint</title>
    <link rel="stylesheet" type="text/css" href="layout.css">
  <style type=text/css>
 .button:hover {
    border:1px solid rgb(30, 108, 211);
  background-color: rgb(30, 108, 211);
  color: black;
}
  .button{
 
  font-size: 30px;
  font-weight: bold;
  background-color:rgb(64, 85, 97);
  color:white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  }
  nav{
    
    border: none;
    background-color: rgb(111, 127, 145);
    color: white;
    padding: 10px;
font-size: 20px;
font-weight: bolder;
}
nav ul{
    list-style-type:none;

}
nav ul li{
    margin-left: 100px;
    display: inline-block;
    padding: 2px;
}
nav ul li a{
    text-decoration:none;
    padding:10px;
    border: 1px rgb(111, 127, 145);
}
nav ul li a:link{
    
    color: ghostwhite;}

nav ul li a:visited{
    
    color:rgb(0, 40, 87);}
nav ul li a:hover{
    background-color:whitesmoke;
    color:darkcyan;}
.flex-container {
    color:black;

    margin:1px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    background-color: lightgrey;
    flex-wrap: wrap-reverse; /*change the order of the content*/
}
.flex-container > div {
    background-color: white;
    width: 95%;
    margin: 5px;
    text-align: center;
    line-height: 10px;
    font-size: 12px;
    border-style: vertical;
padding: 17px;}
table,th,td{
  padding: 8px;
  font-size: 16px;
  border: 1px solid black;
}th{
  background-color:rgb(64, 85, 97);
  color:white;

}

  </style>
	
</head>
<body>

 
  <header style="background-color: white;">
   
 <center>
    <img src="image/printbanner.png" alt="banner file" style="width:100%">
 </center>
</header>
<nav>
<ul>
            <li><a href="custmenu.php" >MENU</a></li>
                    <li><a href="viewcustprofile.php" >VIEW PROFILE</a></li>

      <li><a href="adddoc.php" >ADD DOCUMENT</a></li>
        <li><a href="viewstatus.php" >VIEW STATUS</a></li>
         <li><a href="custpay1.php" >PAYMENT</a></li>
            
    
</ul>

</nav>
<section style="background-color: white;">
	<article style="background-color: white;">
     
  <?php


include('custid.php');
  $conn=mysqli_connect('localhost','root','','ezprint');

$email=$_SESSION['c_email'];
$psw=$_SESSION['c_psw'];
if (isset($_SESSION['cid']))
     

$sql="SELECT files.FileID,files.FIle_Name,files.Service_Type,files.Date FROM files INNER JOIN customer ON files.CustID=customer.CustID where files.CustID={$_SESSION['cid']}";
$result=$conn->query($sql);
echo" <center>";
         

echo"<form action='vieworderdetail.php' method='post'>";
 echo"  <center><h2 style='font-size: 40px;font-family: sans-serif;'>VIEW YOUR ORDER</h2></center><center>";
 
  echo" <div class='flex-container'> <div>";
echo"<table align='center' width='1200px' cellpadding='0' cellspacing='0' >";
 
echo"  <tr align='center'>";

  echo" <th> File Name</th>";

  echo"<th> Service Type</th>
   <th> Date Upload </th><th> Click to view detail </th>";
   
   echo"</tr>";

  
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc()){
    
     
   echo"   <tr align='center'>";
  
       echo" <td>".$row['FIle_Name']."</td>";
   
       echo" <td>".$row['Service_Type']."</td>";
       echo" <td>".$row['Date']."</td>";
  
     ?>
       <td align="center"><a href="vieworderdetail.php?id=<?php echo $row["FileID"]; ?>" class="button"><b>View Details</b></a></td><?php
     
       
    echo"  </tr>";}
           
  
  
echo"</div></div>
        </br></br></br>

      </center>";
 echo" </form>";}
 else{
  echo"<tr><td colspan='4'>You haven't made any order yet</td></tr>";
} echo" </table>";
  ?>
	</article></br></br>
</section>
</body>

<footer>
<h4>copyright &copy;EZPrint Store</h4>
</footer>
