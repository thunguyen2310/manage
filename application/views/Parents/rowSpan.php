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
			        <th>Fullname</th>
			        <th>Your Son</th>
			        <th>Email</th>
			        <th>Adress</th>
			        <th>Phone</th>			        
			      </tr>
			    </thead>
			    <tbody>

			    <?php
			    // echo '<pre>';
			    // print_r($list_all);
			      foreach ($list_all as $key1) {
			      foreach ($key1['list_student'] as $i => $key2) {		              	   	 	      			      	 
			    ?> 
			      <tr>
			      	<?php if($i == 0) { ?>
				        <td rowspan="<?php echo $key1['count_student'] ?>"><?php echo $key1['Id_Pa'] ?></td>
				        <td rowspan="<?php echo $key1['count_student'] ?>"><?php echo $key1['User_Pa'] ?></td>		
				        <td rowspan="<?php echo $key1['count_student'] ?>"><?php echo $key1['Fullname_Pa'] ?></td>
			    	<?php } ?>
			        <td >
			        	<?=$key2['Fullname_St']?>
			        </td>
			        <?php if($i == 0) { ?>
				        <td rowspan="<?php echo $key1['count_student'] ?>"><?php echo $key1['Email_Pa'] ?></td>
				        <td rowspan="<?php echo $key1['count_student'] ?>"><?php echo $key1['Address_Pa'] ?></td>
				        <td rowspan="<?php echo $key1['count_student'] ?>"><?php echo $key1['Phone_Pa'] ?></td>	
			        <?php } ?>		       
			      </tr>			      
			    		    
			    <?php }}?>
			    </tbody>	
			</table>					
	</form>	
</body>
</html>