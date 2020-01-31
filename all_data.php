<?php
$host = '45.64.11.3';  
$user = 'trainee';  
$pass = 'trai@123';  
$dbname = 'training';  
  
// Create connection
$conn = new mysqli($host, $user, $pass,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,E_Name,Email,Mobile FROM Ashish_Myinfo;";
$result = $conn->query($sql);
echo '<h1> All Data In The Table</h1>';

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
        <td> <font face="Time New Roman">Action(Edit/Delete)</font> </td>
        <td><button > <a href="index.html"> Home </a> </button></td>
        
    </tr>  ';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr><td>';
        echo $row["id"];
        echo '</td>'; 
        echo '<td>';
        echo $row["E_Name"];
        echo '</td>';
        echo '<td>';
        echo $row["Email"];
        echo '</td>';
        echo '<td>';
        echo $row["Mobile"];
        echo '</td>';?>
        <td> <button > <a href="edit.php?id=<?php 
            echo $row['id']; ?>"> Edit </a> </button> 
             <button > <a href="delete.php?id=<?php 
            echo $row['id']; ?>"> Delete </a>  </button> </td></tr> 

        
        <?php
    }?>
    </table>
    
    </html>
    <?php    
} else {
    echo "0 results";
}       
mysqli_close($conn);  
?> 