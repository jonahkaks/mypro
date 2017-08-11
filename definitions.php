<?php
/*
-login into the system
-add members into the system
-add investment details into the system
-accept or deny loan requests
*/

function register(){                           // function for registering members into the system
if(isset($_POST['giveout'])){
$name=$_POST['member_name'];
$initial=$_POST['initial'];
$username=$_POST['member_username'];
$code=$_POST['securitycode'];

$conn=mysqli_connect("localhost","root","kafeero");
$create="CREATE DATABASE IF NOT EXISTS FAMILYSACCO";
$cre=mysqli_query($conn,$create);
mysqli_select_db($conn,"FAMILYSACCO");
$table="CREATE TABLE IF NOT EXISTS members( `id` INT(3) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL ,intialcontribution DOUBLE NOT NULL, `username` VARCHAR(20) 
NOT NULL , `password` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$y=mysqli_query($conn,$table);
if(!empty($username) && !empty($code) && !empty($name)){
$insert="INSERT INTO members VALUES(NULL,'$name','$initial','$username','$code')";
mysqli_query($conn,$insert);
echo"Thanks for registering with Family Sacco<br>You are now a member";
}
else{
    ?>
    <script type="text/javascript">
           alert('Oops!! Please you have not been registered!\nEnter missing details to register');
               </script>
    <?php
    }
}
?>

<!--$do = $_POST['func_name'];
if (function_exists($do)) {
  register();
}-->

<div>
<br>
<div id="list">
<br><br><br>
<h5><i>Add members to Family Sacco</i></h5>
<form name="form1" id="mem" method="POST" action="<?php echo $form1 ?>">
<table id="hoho">
<tr>
<td><span id="nameput"></span></td>
</tr>
<tr>
<td><input type="text" name="member_name" placeholder="enter member's name" onmouseover="memn();" onblur="validate();"></td>
<td><span id="nameErr"></span></td>
</tr>
<tr>
<td><input type="text" name="initial" placeholder="Intitial contribution"/>
</tr>
<tr>
<td><input type="text" name="member_username" placeholder="enter username" onblur="username();">
<td><span id="usernameErr"></span></td>
</tr>


<tr>
<td><input type="password" name="securitycode" placeholder="enter password" onblur="passcode();"></td>
<td><span id="passcodeErr"></span></td>
</tr>


<tr>
<td><input type="submit" name="giveout" value="SUBMIT" id="sub" onclick="give();"/>
<input type="reset" value="RESET" id="res"/></td>
<td><span id="$Err"></span></td>
</tr>
</table>
</form>
</div>

<?php }?>


<?php
function login(){                          // function for logging in into the system
$usernameErr= $passwordErr= $adminErr= $memErr= $typeErr= "";
$username= $password= $admin= $mem= $type= "";
?>




<?php }?>

<?php

function approvals(){                           // function for registering members into the system
/*	
if(isset($_POST['accept'])){
$conn=mysqli_connect("localhost","root","kafeero");
$f = fopen("recess.txt", "r") or exit("Unable to open file!");


<table>

  <?php
    $f = fopen("/home/newton/recess.dat", "r") or exit("Unable to open file!");

    //include your connection around here so it is included only once
    // Read line by line until end of file
    while (!feof($f)) { 

    // Make an array using comma as delimiter
       $arrM = explode(" ",fgets($f)); 
    // Write links (get the data in the array)
       echo '<tr><td>'. $arrM[0] .'</td><td>'. $arrM[1] .'</td><td>' . $arrM[2] . '</td><td>' . $arrM[3] . '</td><td>' . $arrM[4] . '</td><td><input type="submit" name="accepted" value="accept" /></td><td><input type="submit" name="denied" value="deny"/></td></tr>'; 
       
       if (isset($_POST['accepted'])) {   
      
           $contr="contribution";
           $idea="idea";
           $loan="loan";
           $
           if($contr == $arrM[0]) {
                   
          
           $sq = "INSERT INTO contributions VALUES (NULL,'$arrM[1]','$arrM[2]','$arrM[3]','$arrM[4]','accepted')";
            //here should be $arrM
            
            
            if (!mysqli_query($conn,$sq)) {
            	 
            
            }  
            } elseif($idea ==  $arrM[0]) { 
            
             $s = "INSERT INTO ideas VALUES (NULL,'$arrM[1]','$arrM[2]','$arrM[3]','$arrM[4]','accepted')"; //here should be $arrM
            if (!mysqli_query($conn,$s)) {
            	
           }  
        }elseif($loan ==  $arrM[0]) { 
            
             $ql = "INSERT INTO loanrequest VALUES (NULL,'$arrM[1]','$arrM[2]','accepted')"; //here should be $arrM
            if (!mysqli_query($conn,$ql)) {
            	
           }  
        }
        }elseif(isset($_POST['denied'])) {
        
        
        
        $contr="contribution";
           $test="idea";
          
           if($contr == $arrM[0]) {
                   
          
           $sq = "INSERT INTO contributions VALUES (NULL,'$arrM[1]','$arrM[2]','$arrM[3]','$arrM[4]','denied')";
            //here should be $arrM
            echo $arrM[1];
            echo $arrM[3];
            if (!mysqli_query($conn,$sq)) {
            	echo"hellojjnjnjnok"; 
            
            }  
            } elseif($idea ==  $arrM[0]) { 
            
             $sql = "INSERT INTO ideas VALUES (NULL,'$arrM[1]','$arrM[2]','$arrM[3]','$arrM[4]','denied')"; //here should be $arrM
            if (!mysqli_query($conn,$sql)) {
            	
           }  
        }elseif($loan ==  $arrM[0]) { 
            
             $sql = "INSERT INTO loanrequest VALUES (NULL,'$arrM[1]','$arrM[2]','denied')"; //here should be $arrM
            if (!mysqli_query($conn,$sql)) {
            	 
           }  
        }
        
        }
    }
     
     
    fclose($f);
    mysqli_close($conn);
    //close your database connection here
   
    echo"</table>";

}*/
     
  ?>

<?php
function investments(){                 //function for displaying webpage of entering investment details

if(isset($_POST['giveme'])){          // php code for adding investment details into the system
$idea=$_POST['idea'];
$date=$_POST['dateinv'];
$price=$_POST['invprice'];
$amount=$_POST['money'];

$conn=mysqli_connect("localhost","root","kafeero");
mysqli_select_db($conn,"FAMILYSACCO");

$cre="CREATE TABLE `FAMILYSACCO`.`investments` ( `id` INT(3) NOT NULL AUTO_INCREMENT ,
 `idea` VARCHAR(20) NOT NULL , `investdate` DATE NOT NULL ,
 `price` INT(13) NOT NULL , `amount` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$r=mysqli_query($conn,$cre); 
if($r){echo"<br>tb success";}
else {echo"<br> tb failure";}
if(!empty($idea) && !empty($date) && !empty($price)){
	$p="INSERT INTO investments VALUES (NULL,'$idea','$date','$price','$amount')";
	$b=mysqli_query($conn,$p);
if($b){echo"put";} else{echo"<br> didnt put ".mysqli_error()."";}
}
else{
    ?>
    <script type="text/javascript">
           alert('Oop!! Impartial details not submitted\nEnter missing details to submit investment details');
               </script>
    <?php
}
  }                 
?>
<?php
if(isset($_POST['give'])){
        echo "
            <script type=\"text/javascript\">
            var e = document.getElementById('ideas'); e.action='better.php'; e.submit();
            </script>
        ";
     }
?>

<script type="text/javascript">     //javascript for enabling client on entering investment ideas
function idea(){
	if(form2.idea.value.length==0){
           document.getElementById('ideaErr').innerHTML="idea must not be null!";
           form2.idea.focus();
           return false;
            
       }
        
        }
function when(){
       if(form2.dateinv.value.length==0){
           document.getElementById('dateErr').innerHTML="date of investment shouldn't empty";
           form2.dateinv.focus();
           return false;
            
       }
}
function price(){
            if(form2.invprice.value.length==0){
           document.getElementById('priceErr').innerHTML="Empty initial investment price";
             form2.invprice.focus();
             return false;
             
                   }	
}
function profit(){
            if(form2.profits.value.length==0){
           document.getElementById('profitsErr').innerHTML="Empty value of profits";
             form2.profits.focus();
             return false;
             
                   }	
}
function loss(){
            if(form2.losses.value.length==0){
           document.getElementById('lossesErr').innerHTML="Empty value of losses";
             form2.losses.focus();
             return false;}	
}
function give(){
if(form2.idea.value.length==0 && form2.dateinv.value.length==0 && form2.invprice.value.length==0 &&
    form2.profits.value.length==0 && form2.losses.value.length==0){
    document.getElementById('Errs').innerHTML="Enter missing information before submitting";
}
}
</script>
<div>
<br>
<div id="list">
<br><br>
<h5><i>Enter investment details</i></h5>
<form name="form2" method="post" action="" id="ideas">
<table id="tabs">
<tr>
</tr>
<tr>
<td><input type="text" name="idea" placeholder="enter investment idea" onblur="idea();"/></td>
<td><span id="ideaErr"></span></td>
</tr>
<tr>
<td><input type="date" name="dateinv" placeholder="enter date of investment" onblur="when();"/></td>
<td><span id="dateErr"></span></td>
</tr>
<tr>
<td><input type="text" name="invprice" placeholder="enter initial investment price" onblur="price();"/></td>
<td><span id="priceErr"></span></td>
</tr>
<tr>
<td>
<input type="text" name="money" placeholder="Enter value of profits(+)losses(-)"/>
</td>
</tr>
</table>
<input type="submit" name="giveme" value="submit" id="sub" onclick="return true" />
<input type="reset" value="reset" id="res"/>
<span id="Errs"></span>
<br/><br/>
</form>
</div></div>
</body>

<?php }?>


<?php
function reports(){              // function for displaying webpage for retrieving reports from the system

?>

<div>
<br>
<div id="retrieve">
<br><br>
<span style="color:green;margin-left:37%;font-size:10pt"><i>select report of your choice</i></span><br><br>
<form method="post" id="reports">
<table>
<tr>
<td>
<select name="report">
<option selected>select report to view</option>
<option value="members">list of regular members</option>
<option value ="benefits">Distribution of benefits</option>
<option value="approved_loans">Approved loans</option>
<option value="approved_contribution"> Approved contributions</option>
<option  value="loanees">members still paying loans</option>
<option value="credits">members defaulting from loans</option>
<option value="working">Best and worst performing ideas</option>
<option value="ideas">List of business ideas</option> 
</select>
</td>
<td><input type="submit" name="reports" value="view" id="see"/></td>
</tr>
<tr>
<td>
<?php                 // php function for retrieving reports from the database
$view=$_POST['report'];
if(isset($view)){
@$con=mysqli_connect("localhost","root","kafeero");
mysqli_select_db($con,"sacco");
if($view=="members"){
$choose="SELECT Name FROM members";
$result=mysqli_query($con,$choose);
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' ><caption style='color:white'><th style='color:green'>List of <br>regular members</th></caption>";
WHILE($rows=mysqli_fetch_array($result)):
$name=$rows['Name'];
echo"<tr><td>$name</td></tr>";
endwhile;
echo"</table>";
}

else if($view=="ideas"){
$a="SELECT idea, date, price FROM investmentIdeas";
$b=mysqli_query($con,$a);
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='3' style='color:green;font-size:10pt'>List of investment ideas</th></caption>
<tr><td style='color:blue'>ideas</td>
<td style='color:blue'>Date of<br>investment</td><td style='color:blue'>initial <br>investment price</td></tr>";
WHILE($myrows=mysqli_fetch_array($b)):
$idea=$myrows[0];
$date=$myrows[1];
$price=$myrows[2];
echo"<tr><td>$idea</td><td>$date</td><td>$price</td></tr>";
endwhile;
echo"</table>";
}


else if($view=="credits"){
$a="SELECT*FROM creditors";
$b=mysqli_query($con,$a);
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='3' style='color:green;font-size:8pt'>members defaulting from loans</th></caption>
<tr><td style='color:blue'>creditor's name</td><td style='color:blue'>ID</td><td style='color:blue'>unpaid Amount</td></caption>";
WHILE($myrows=mysqli_fetch_array($b)):
$creditors_name=$myrows[0];
$id=$myrows[1];
$unpaid=$myrows[2];
echo"<tr><td>$creditors_name</td><td>$id</td><td>$unpaid</td></tr>";
endwhile;
echo"</table>";
}

else if($view=="approved_loans"){
$a="SELECT*FROM ApprovedLoanRequests";
$b=mysqli_query($con,$a);
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='2' style='color:green;font-size:8pt'>Approved Loan Requests</th></caption>
<tr><td style='color:blue'>Member's name</td><td style='color:blue'>Loan request status</td></tr>";
WHILE($myrows=mysqli_fetch_array($b)):
$name=$myrows[0];
$status=$myrows[1];
echo"<tr><td>$name</td><td>$status</td></tr>";
endwhile;
echo"</table>";
}

else if($view=="loanees"){
$a="SELECT*FROM Loanees";
$b=mysqli_query($con,$a);
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='3' style='color:green;font-size:8pt'>members still paying loans</th></caption>
<tr><td style='color:blue'>Member's name</td><td style='color:blue'>unpaid amount</td><td style='color:blue'>paid amount</td></caption>";
WHILE($myrows=mysqli_fetch_array($b)):
$name=$myrows[0];
$paid=$myrows[1];
$unpaid=$myrows[2];
echo"<tr><td>$name</td><td>$paid</td><td>$unpaid</td></tr>";
endwhile;
echo"</table>";
}

else if($view=="approved_contribution"){
$a="SELECT*FROM contributions";
$b=mysqli_query($con,$a);
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='3' style='color:green;font-size:8pt'>Approved contributions</th></caption>
<tr><td style='color:blue'>Member's name</td><td style='color:blue'>ID</td><td style='color:blue'>Contribution Amount</td></tr>";
WHILE($myrows=mysqli_fetch_array($b)):
$name=$myrows[0];
$paid=$myrows[1];
$unpaid=$myrows[2];
echo"<tr><td>$name</td><td>$paid</td><td>$unpaid</td></tr>";
endwhile;
echo"</table>";
}


else if($view=="working"){
$a="SELECT idea,moneytype FROM investmentIdeas WHERE moneytype='profit'";
$b=mysqli_query($con,$a);
echo"<table><tr><td>";
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='2' style='color:green;font-size:8pt'>Best performing ideas</th></caption>
<tr><td style='color:blue'>Investment idea</td><td style='color:blue'>Financial result</td></tr>";
WHILE($myrows=mysqli_fetch_array($b)):
$idea_name=$myrows[0];
$type=$myrows[1];
echo"<tr><td>$idea_name</td><td>$type</td></tr>";
endwhile;
echo"</table>";
echo"</td><td>";

$a="SELECT idea,moneytype FROM investmentIdeas WHERE moneytype='loss'";
$b=mysqli_query($con,$a);
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='2' style='color:green;font-size:8pt'>Worst performing ideas</th></caption>
<tr><td style='color:blue'>Investment idea</td><td style='color:blue'>Financial result</td></tr>";
WHILE($myrows=mysqli_fetch_array($b)):
$idea_name=$myrows[0];
$type=$myrows[1];
echo"<tr><td>$idea_name</td><td>$type</td></tr>";
endwhile;
echo"</table>";
echo"</td></tr></table>";
}
else if($view=="return_on_investment"){
$a="SELECT*FROM investmentIdeas WHERE moneytype='profit'";
$b=mysqli_query($con,$a);
$totalprofits=0;
WHILE($myrows=mysqli_fetch_array($b)):
$totalprofits+=$myrows[4];
endwhile;
$p="SELECT*FROM investmentIdeas WHERE moneytype='loss'";
$q=mysqli_query($con,$p);
$totallosses=0;
WHILE($myrows=mysqli_fetch_array($q)):
$totallosses+=$myrows[4];
endwhile;
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='2' style='color:green;font-size:8pt'>Income Statement</th></caption>
<tr><td style='color:blue'>Total profits</td><td style='color:red;font-size:10pt'>$totalprofits</td></tr>
<tr><td style='color:blue'>Total losses</td><td style='color:red;font-size:10pt'>$totallosses</td></tr>";
}

else if($view=="benefits"){
$a="SELECT*FROM investmentIdeas WHERE moneytype='profit'";
$b=mysqli_query($con,$a);
$totalprofits=0;
WHILE($myrows=mysqli_fetch_array($b)):
$totalprofits+=$myrows[4];
endwhile;
$savings=0.3*$totalprofits;
$shared_profits=0.65*$totalprofits;
echo"<p style='color:green;font-size:10pt'>Total profits made so far:
      <span style='color:red;font-size:10pt'>$totalprofits</span></p>";
echo"<p style='color:green;font-size:10pt'>Family Sacco savings made so far(30% of total profits):
           <span style='color:red;font-size:10pt'>$savings</span></p>";
echo"<p style='color:green;font-size:10pt'>65% of total profits to be shared amongst members:
           <span style='color:red;font-size:10pt'>$shared_profits</span></p>";
$x="SELECT*FROM contributions";
$y=mysqli_query($con,$x);
$total_contributions=0;
WHILE($rows=mysqli_fetch_array($y)):
$d=$rows[2];
$total_contributions+=$d;
endwhile;
echo"<p style='color:green;font-size:10pt'>Total contributions made so far by all members:
           <span style='color:red;font-size:10pt'>$total_contributions</span></p>";

$l="SELECT Name,contribution_Amount FROM contributions";
$m=mysqli_query($con,$l);
echo"<table border='1' cellspacing='0'style='margin-left:6%;color:black;text-align:center;font-size:10pt' >
<caption><th colspan='3' style='color:blue;font-size:8pt'>Members with their shares</th></caption>
<tr><td style='color:green'>Member's name</td><td style='color:green'>Shares(in %)</td><td style='color:green'>Benefits</td></tr>";
WHILE($rows=mysqli_fetch_array($m)):
$member_name=$rows['Name'];
$f=$rows['contribution_Amount'];
$share_precentage=($f/$total_contributions)*100;
$benefits=$share_precentage*$shared_profits;
/*$percent=$f / $total_contribution;*/
echo"<tr><td>$member_name</td><td>$share_precentage</td><td>$benefits</td></tr>";
endwhile;
}

else{
echo"<p style='color:red;font-size:10pt'>please select a report</p>";
}
}
?>
</td>
</tr>
</form>

</div>
</div>
<?php }?>


 
