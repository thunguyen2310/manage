<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		  width: 35%;
		  margin: auto;
		}
		th, td {
		  padding: 5px;
		  text-align: center;
		}
	</style>
</head>
<body>
	<form action="" method="POST" style="margin-top: 60px">
			<h3></h3>

			<table >
			    <thead>
			      <tr>
			      	<th>Id_Pa</th>
			        <th>User</th>
			        <th>Email</th>
			        <th>Fullname</th>
			        <th>Adress</th>
			        <th>Phone</th>
			        <th>Your Son</th>
			        <th>Class</th>
			      </tr>
			    </thead>
			    <tbody>

			    <?php
			      foreach ($parents as $item) {     //nếu gọi từ hàm danhSach   // còn gọi từ hàm index thì thay câu lệnh if ($list_user as $item)     
			    ?>

			      <tr>
			      	<td><?php echo $item['Id_Pa'] ?></td>
			        <td><?php echo $item['User_Pa'] ?></td> 
			        <td><?php echo $item['Email_Pa'] ?></td>
			        <td><?php echo $item['Fullname_Pa'] ?></td>
			        <td><?php echo $item['Address_Pa'] ?></td>
			        <td><?php echo $item['Phone_Pa'] ?></td>  			     
			        <td><?php echo $item['Fullname_St'] ?></td>
			        <td><?php echo $item['Class_St'] ?></td>     
			      </tr>
			      
			    </tbody>
			    <?php } ?>

			    </tr>
			</table>					
	</form>	
</body>
</html>