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
			        <th>Pass</th>		        
			      </tr>
			    </thead>
			    <tbody>
			    <?php           	
                foreach ($export_list as $key => $list) {
                ?>			  
			      <tr>
			        <td><?php echo $list['Id_Pa']?></td>
			        <td><?php echo $list['User_Pa'] ?></td>
			        <td><?php echo $list['Email_Pa'] ?></td>
			        <td><?php echo $list['Fullname_Pa'] ?></td>
			        <td><?php echo $list['Address_Pa'] ?></td>
			        <td><?php echo $list['Phone_Pa'] ?></td>
			        <td><?php echo $list['Pass_Pa'] ?></td>			       
			      </tr>			      
			    </tbody>			    
			    <?php } ?>
			    </tr>
			</table>
			
			 <a href='<?= base_url() ?>school/Export/generateXls'>Export</a> 				
	</form>	 
</body>
</html>