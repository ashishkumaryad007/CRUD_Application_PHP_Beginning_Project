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
if (empty($_POST["E_Name"])) {
    $nameErr = "Name is required";
    echo "Error: Name can not be Empty  </br>";
} else {
    
    $sql = "INSERT INTO Ashish_Myinfo(E_Name,Email,Mobile)
    VALUES ( '$_POST[E_Name]','$_POST[Email]','$_POST[Mobile]')";
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: Query Is Not Being Perform " . $sql . "<br>" . $conn->error;
}
 $id=mysqli_insert_id($conn);
 $E_Name=$_POST["E_Name"];
 $Email=$_POST["Email"];
 $Mobile=$_POST["Mobile"];
    echo '<table border cellpadding="1">
    <tr>
        <td> <font face="Time New Roman">Id</font> </td>
        <td> <font face="Time New Roman">E_NAME</font> </td>
        <td> <font face="Time New Roman">EMAIL</font> </td>
        <td> <font face="Time New Roman">Mobile</font> </td>
        <td> <font face="Time New Roman">Action-1</font> </td>
        <td> <font face="Time New Roman">Action-2</font> </td>
        
    </tr>';
    
    echo "
    <tr>
    <td><input  value='".$id."'name='id' readonly></td>
    <td><input  value='".$E_Name."'name='E_Name' readonly></td>
    <td><input  value='".$Email."'name='Email' readonly></td>
    <td><input  value='".$Mobile."'name='Mobile' readonly></td>
    
    <form action='all_data.php' method='post'><td>
    <input type='submit' name='All Data' value='All Data' ></form></td>"?>
    <td> <button > <a href="edit.php?id=<?php 
        echo $id; ?>"> Edit </a> </button>
    <td><button > <a href="index.html">Home</a> </button></td> 
    </tr>
    <?php
    
mysqli_close($conn);  
?>  