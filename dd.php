<?php 

session_start();
 $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from user_info";
      $result=mysqli_query($conn,$qry);
      $n=mysqli_num_rows($result);
      
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <table border="1">
 <tr>
 	<th>fname</th>
 	<th>lname</th>
 	<th>city</th>
 	<th>option</th>
 </tr>
 	<?php 

while ($data=mysqli_fetch_assoc($result)) {
	?>

<tr>
	<td><?php echo $data["first_name"]; ?></td>
	<td><?php echo $data["last_name"]; ?></td>
	<td><?php echo $data["city"]; ?></td>
	<td><a href="edit.php?id=<?php echo $data["first_name"]; ?>">edit</a></td>
</tr>

	<?php
}

  ?>
 </table>
 
 </body>
 </html>