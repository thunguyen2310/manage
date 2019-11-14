<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="dangky">
          <h1 style="font-family: 'Dancing Script', cursive;
                    color: #fdc632;
                    text-align: center;
                    font-size: 40px;">Update Students</h1>

          <form action="" method="POST" >     
              <table style="margin: auto;">
                  <tr>
                      <td><h4 >Id</h4></td>
                      <td><input style="width: 230px" type="text" name="id" id="id" value="<?php echo $students['Id_St'] ?>" placeholder=" Id" readonly></td>
                  </tr>
                  <tr>
                      <td><h4 >Username</h4></td>
                      <td><input style="width: 230px" type="text" name="username" id="username" value="<?php echo $students['User_St'] ?>" placeholder=" Username" required=""></td>
                  </tr>
                  
                  <tr>
                      <td><h4>Email</h4></td>
                      <td><input style="width: 230px"type="email" name="email" id="email" value="<?php echo $students['Email_St'] ?>" placeholder=" Email"required=""></td>
                  </tr>
                  <tr >
                      <td><h4>Fullname</h4></td>
                      <td><input style="width: 230px" type="text" name="fullname" id="fullname" value="<?php echo $students['Fullname_St'] ?>" placeholder=" Fullname" required=""></td>
                  </tr>
                  <tr>
                      <td><h4>Class</h4></td>
                      <td><input style="width: 230px" type="text" name="class" id="class" value="<?php echo $students['Class_St']?>" placeholder=" Class" required=""></td>
                  </tr>
                  <tr>
                      <td><h4>Id_Parents</h4></td>
                      <td><input style="width: 230px" type="text" name="idPa" id="idPa" value="<?php echo $students['Id_St_Pa']?>" placeholder=" Id_Parents" required=""></td>
                  </tr> 

                  <tr>
                      <td><h4> Number Phone</h4></td>
                      <td><input style="width: 230px" type="text" name="phone" id="phone" value="<?php echo $students['Phone_St']?>" placeholder=" Number Phone" required=""></td>
                  </tr>

                  <tr>
                      <td><h4>Password</h4></td>
                      <td><input style="width: 230px" type="password" name="password" id="password" value="<?php echo $students['Pass_St']?>" placeholder=" Password" required=""></td>
                  </tr>               
              </table>

              <button class="" type="submit" name="subUpdate" id="subUpdate" >
                    <span></a> Update Students </span>
              </button>

              <button class="" type="submit" name="subDelete" id="subDelete">
                    <span></a> Delete Students </span>
              </button>
          
              <!-- <a href="list.php"class="list">Danh sách</a> -->
          </form>  
        </div>     
</body>
</html>