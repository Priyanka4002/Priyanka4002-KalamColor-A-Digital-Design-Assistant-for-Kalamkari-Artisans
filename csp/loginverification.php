<?php  
$uname=$_POST['u'];  
$pwd=$_POST['p'];  
$servername="localhost:3306/varshi";  
$username="root";  
$password="";  
$dbname="myDB1"; 
$flag=0;  
$conn=mysqli_connect($servername,$username,$password,$dbname);  
if(!$conn)  
{  
 die("connection failed:".mysqli_connect_error());  
}  
$res=mysqli_query($conn,"select * from user1");  
while($row=mysqli_fetch_assoc($res)) 
{  
 $uname1=$row['username'];  
 $pwd1=$row['password'];  
  
 if($uname1==$uname)  
 {  
  if($pwd1==$pwd)  
  {  
   $flag=1; 
   break;    
  }  
 } 
} 
if($flag==1) 
{ 
   session_start();  
   $_SESSION['sess_user']=$uname1;  
   header("Location:main.html");  
} 
 else 
 {  
  header("Location:failure.php"); 
  } 
  
echo "</center>";  
mysqli_close($conn);  
?>