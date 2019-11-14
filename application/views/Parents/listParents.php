<!DOCTYPE html>
<html>
<head>
	 <title></title>
	<style>
		table, th, td, tr{
		  border: 1px solid black;
		  border-collapse: collapse;
		  width: 50%;
		  margin: auto;
		}
		th, td {
		  padding: 17px;
		  margin: 20px;
		  text-align: center;
		  width: 50%;
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
			      </tr>
			    </thead>
			    <tbody>

			     <?php
			      foreach ($parents as $key=>$val) {     //nếu gọi từ hàm danhSach   // còn gọi từ hàm index thì thay câu lệnh if ($list_user as $item)     
			    ?>
			      <tr>
			        <td><?php echo $val['Id_Pa'] ?></td>
			        <td><?php echo $val['User_Pa'] ?></td>
			        <td><?php echo $val['Email_Pa'] ?></td>
			        <td><?php echo $val['Fullname_Pa'] ?></td>
			        <td><?php echo $val['Address_Pa'] ?></td>
			        <td><?php echo $val['Phone_Pa'] ?></td>			       
			      </tr>			      
			    </tbody>			    
			    <?php } ?> 
			    
			    </tr>
			</table>
			<!-- <a href='<?= base_url() ?>school/admin/exportCSV'>Export</a> -->
			<input type="text" name = "keyword" />
			<input type="submit" value = "Search" id="submit" name="submit" />  
	</form>	 
</body>
</html>

