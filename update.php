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

if ((empty($_POST["id"])) || (empty($_POST["E_Name"]))){
   $idErr = "id is required";
   $nameErr = "Name is required";
   echo "Error: (ID can not be Zero) OR (Name can not be Empty) OR (both can not be Empty)  </br>";
   
} else {
$sql = "UPDATE training.Ashish_Myinfo SET E_Name='$_POST[E_Name]', Email='$_POST[Email]', Mobile='$_POST[Mobile]' where id='$_POST[id]'";
}

if ($conn->query($sql) === TRUE) {
   echo "The Old record updated successfully";
} else {
   echo "Error: Query Is Not Being Perform  " . $sql . "<br>" . $conn->error;
}
$sql1="SELECT  id,E_Name,Email,Mobile FROM training.Ashish_Myinfo ";

$id=$_POST["id"];
$E_Name=$_POST["E_Name"];
$Email=$_POST["Email"];
$Mobile=$_POST["Mobile"];
   echo '<table border cellpadding="1"> 
   <tr> 
      <td> <font face="Time New Roman">Id</font> </td> 
      <td> <font face="Time New Roman">E_NAME</font> </td> 
      <td> <font face="Time New Roman">EMAIL</font> </td> 
      <td> <font face="Time New Roman">Mobile</font> </td> 
      <td><button > <a href="index.html"> Home </a> </button></td> 
      <td><button > <a href="all_data.php">All Info</a> </button></td>   
   </tr>';
echo '<tr><td>';
echo "<input type='id' value='$id'readonly />";
echo '</td>';
echo '<td>';
echo "<input type='E_Name' value='$E_Name' readonly />";
echo '</td>';
echo '<td>';
echo "<input type='Email' value='$Email' readonly />";
echo '</td>';
echo '<td>';
echo "<input type='Mobile' value='$Mobile' readonly/>";
echo '</td></tr>';
mysqli_close($conn);  
?>  