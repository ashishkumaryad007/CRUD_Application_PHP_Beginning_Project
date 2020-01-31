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
 $r=$id;
   
    $query = "DELETE  FROM Ashish_Myinfo WHERE id=$id";
    $result = mysqli_query($conn,$query);
    if ($result==TRUE) {
        echo '<br>The selected row ' .$r.' has been Deleted.<br>';
        echo '<br>';
    }else{
        echo '<br>Deletion not performed on row no '.$r.'.</br>';
        echo '<br>';
    }
    $sql = "SELECT id,E_Name,Email,Mobile FROM Ashish_Myinfo;";
    $result2 = mysqli_query($conn, $sql);
        echo '<table border cellpadding="1"> 
        <tr> 
            <td> <font face="Time New Roman">Id</font> </td> 
            <td> <font face="Time New Roman">E_NAME</font> </td> 
            <td> <font face="Time New Roman">EMAIL</font> </td> 
            <td> <font face="Time New Roman">Mobile</font> </td>
            <td><button > <a href="index.html"> Home </a> </button>
            <button > <a href="all_data.php">All Info</a> </button></td>    
        </tr>';
    if ($result2->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
        {
            echo '<tr><td>';
            echo ($row['id']);
            echo '</td>'; 
            echo '<td>';
            echo ($row['E_Name']);
            echo '</td>';
            echo '<td>';
            echo ($row['Email']);
            echo '</td>';
            echo '<td>';
            echo ($row['Mobile']);
            echo '</td>'; 
            echo '</tr>';
        }
    } else {
        echo "0 results";
    }    
mysqli_close($conn);  
?>  
