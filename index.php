<?php 
//calls.php 
include("definitions.php");
$conn = mysqli_connect("localhost","root","kafeero");
$db = mysqli_select_db($conn,"FAMILYSACCO");
$c = $_REQUEST['action'];
$d = $_REQUEST['action'];
?>

     <style type="text/css">
     @import http://fonts.googleapis.com/css?family=Raleway;
/*----------------------------------------------
CSS Settings For HTML Div ExactCenter
------------------------------------------------*/
#main {
width:960px;
margin:50px auto;
font-family:raleway
}

#content {;
border-radius:10px;
font-family:raleway;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:10px;
background-color:whitesmoke;

}
input[type=text],input[type=password],input[type=date] {
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:raleway
}

#profile {
padding:25px;
border:1px dashed grey;
font-size:20px;
background-color:#DCE6F7;
}
#logout {
float:right;
padding:5px;
border:dashed 1px gray
}
#list{margin-left:35%;}
#invest{margin-left:35%;}
#retrieve{margin-left:35%;}
#menu ul li{
display:inline-block; list-style-type:none; font-weight:bolder; padding:10px;
 }
span{
color:red;
}
a:link,
a:visited,
a:active,
button.mult_submit,
.checkall_box+label {
    text-decoration: none;
    color: #235a81;
    cursor: pointer;
    outline: none;
}
.ac{
border:1px solid green;

}

h5{
align-self:center;
}
    </style>
<body  id="main">
<div id="profile">
<h2>FAMILY SACCO WEB BASED SYSTEM</h2>
</div>
<div id="content">

<div id="menu">
<ul>
<li><a href="?action=members">Add members</a></li>
<li><a href="?action=investment">Enter investment details</a></li>
<li><a href="?action=reports">Get Reports</a></li>
<li><a href="?action=approvals">Accept or Deny Requests</a></li>
<li><a href="?action=logout">Logout</a></li>

</ul>
<?php if(!isset($_SESSION['username'])){ login();  } ?>
<?php
if(isset($_SESSION['username']) && ($_SESSION['type'])=="admin") {
	
switch($c){
case "members":  
     register();  
break;

case "investment":
  investments();
break;

case "reports":
reports();

break;

case "approvals":
     approval();
break;

case "logout":
 logout();
 break;
}
}
if(isset($_SESSION['username']) && ($_SESSION['type'])=="member") {
switch($d){

case "reports":
reports();

break;

case "logout":
 logout();
 break;
}
}



?>

