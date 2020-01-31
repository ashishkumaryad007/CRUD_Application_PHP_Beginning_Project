<!DOCTYPE html>
<html>
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <script>
function validateForm() {

//validate the mobile no.
var t=document.Myinfo.Mobile.value
  if (t == "") {                        
    window.alert("Please enter your Valid Mobile number."); //The pop up alert for an invalid Mobile Number
    document.Myinfo.Mobile.focus(); 
    return false; 
    }
  if(isNaN(t)||t.indexOf(" ")!=-1){
    alert("Enter numeric value")      //The pop up alert for an invalid Mobile number
    return false; 
    }
  if ((t.length<10)||(t.length>10)){
    alert("enter 10 characters");     //The pop up alert for an invalid mebile number
    return false;
    }
// Validate the Name
  var q=document.Myinfo.E_Name.value
  var ptt = /^[A-Za-z]+$/;
  if(q==""){
    alert("Please Enter Your Name");      //The pop up alert for an invalid E_Name 
    document.Myinfo.E_Name.focus();
    return false;
    }
  if(!(q.match(ptt))){
    alert("Please Enter Only Characters");    //The pop up alert for an invalid E_Name
    document.Myinfo.E_Name.select();
    return false;
    }
  if ((q.length < 4) || (q.length > 15)){
    alert("Your Character must be 5 to 15 Character");    //The pop up alert for an invalid E_Name 
    document.Myinfo.E_Name.select();
    return false;
    }
// Validation of Email Id
  var mail= /^\w+([\.-]?\w+)*@[A-Za-z]*(\.\w{2,3})+$/;
  if(document.Myinfo.Email.value.match(mail)){
    document.Myinfo.Email.focus();
    return true;
  }
  else{
    alert("You have entered an invalid email address!");    //The pop up alert for an invalid email address
    document.Myinfo.Email.focus();
    return false;
  }
}
  </script>
  <style>
.container {
  border-radius: 6px;
  background-color:#f2f2f2;
  padding-right: 20px;
  max-width:500px;
  width: 100%;
  margin:0 auto;
  position:relative;
}
</style>
</head>
<body>

<?php  
$host = '45.64.11.3';  
$user = 'trainee';  
$pass = 'trai@123';  
$dbname = 'training';  
  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
echo 'Connected successfully<br/>';  

$id=$_GET["id"];
 
  $query = "SELECT id,E_Name,Email,Mobile FROM Ashish_Myinfo WHERE id=$id";
  $result = mysqli_query($conn,$query);
  $getRowAssoc = mysqli_fetch_assoc($result);
   
  $id=$getRowAssoc['id'];
  $E_Name=$getRowAssoc['E_Name'];
  $Email=$getRowAssoc['Email'];
  $Mobile=$getRowAssoc['Mobile'];

    echo '<table border cellpadding="1">
    <tr>
        <div class="container" >
        <td> <font face="Time New Roman">Id</font> </td>
        <td> <font face="Time New Roman">E_NAME</font> </td>
        <td> <font face="Time New Roman">EMAIL</font> </td>
        <td> <font face="Time New Roman">Mobile</font> </td>
        <td> <font face="Time New Roman">Action</font> </td>
        <td><button > <a href="index.html">Home</a> </button>
        <button > <a href="all_data.php">All Info</a> </button></td>
        </div>
    </tr>';
    echo "
    <div class='container' >
    <h1>Myinfo_Edit Form</h1>
    <p>Here you can Edit your information </p>
    </div>";?>
    <div class='container' >
    <form name='Myinfo' action='update.php' onsubmit='return validateForm()' method='post'><?php 
    echo "<tr>
    <td><input type='text' value='".$id."'name='id'></td>
    <td><input type='text' value='".$E_Name."'name='E_Name'></td>
    <td><input type='email' value='".$Email."'name='Email'></td>
    <td><input type='text' value='".$Mobile."'name='Mobile'></td>

    <td><input type='submit' name='update' value='update' ></form></div></td>
    </tr>";
mysqli_close($conn);  
?>  
</body>
</html>
