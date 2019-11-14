<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table, th, td, tr{
		  border: 1px solid black;
		  border-collapse: collapse;
		  width: 40%;
		  margin: auto;
		}
		th, td {
		  padding: 17px;
		  margin: 20px;
		  text-align: center;
		  width: 40%;
		}
	</style>
</head>
<body>
	<form action="" method="POST" style="margin-top: 60px">
			<h3></h3>

			<table >
			    <thead>
			      <tr>
			        <th>Id</th>
			        <th>User</th>
			        <th>Fullname</th>
			        <th>Email</th>
			        <th>Phone</th>
			        <th>Class</th>
			      </tr>
			    </thead>
			    <tbody>

			    <?php
			      foreach ($students as $item) {     //nếu gọi từ hàm danhSach   // còn gọi từ hàm index thì thay câu lệnh if ($list_user as $item)     
			    ?>

			      <tr>
			        <td><?php echo $item['Id_St'] ?></td>
			        <td><?php echo $item['User_St'] ?></td> 
			        <td><?php echo $item['Fullname_St'] ?></td>
			        <td><?php echo $item['Email_St'] ?></td>
			        <td><?php echo $item['Phone_St'] ?></td>
			        
			        <td><select type="text" name="class.'Id_St'" id="class" disabled> 
                  <option <?php if($item['Class_St']== 1){echo 'selected';} else {echo '';} ?> value="1">Anh văn cơ bản</option>
                  <option <?php if($item['Class_St']== 2){echo 'selected';} else {echo '';} ?> value="2" >Anh văn phổ thông</option>
                  <option <?php if($item['Class_St']== 3){echo 'selected';} else {echo '';} ?> value="1">Lớp luyện nghe</option>
                  <option <?php if($item['Class_St']== 4){echo 'selected';} else {echo '';} ?> value="2" >Lớp luyện ngữ pháp</option>
                  <option <?php if($item['Class_St']== 5){echo 'selected';} else {echo '';} ?> value="1">Lớp giao tiếp</option>
                  <option <?php if($item['Class_St']== 6){echo 'selected';} else {echo '';} ?> value="2" >Lớp Toiec</option>
                  </select></td>
			      </tr>
			      
			    </tbody>
			    <?php } ?>

			    </tr>
			</table>					
	</form>	
</body>
</html>