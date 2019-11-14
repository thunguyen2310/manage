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
                    font-size: 40px;">Update Parents</h1>

          <form action="" method="POST" >
              
              <table style="margin: auto;">
              	<tr>
                      <td ><h4 >Id</h4></td>
                      <td><input style="width: 230px" type="text" name="id" id="id" value="<?php echo $parents['Id_Pa'] ?>" placeholder=" Id" readonly></td>
                  </tr>
                  <tr>
                      <td><h4 >Username</h4></td>
                      <td><input style="width: 230px" type="text" name="username" id="username" value="<?php echo $parents['User_Pa'] ?>" placeholder=" User"></td>
                  </tr>
                  
                  <tr>
                      <td><h4>Email</h4></td>
                      <td><input style="width: 230px"type="email" name="email" id="email" value="<?php echo $parents['Email_Pa'] ?>" placeholder=" Email" required=""></td>
                  </tr>
                  <tr >
                      <td><h4>Fullname</h4></td>
                      <td><input style="width: 230px" type="text" name="fullname" id="fullname" value="<?php echo $parents['Fullname_Pa'] ?>" placeholder=" Fullname" required=""></td>
                  </tr>
                  <tr>
                      <td><h4>Address</h4></td>
                      <td><input style="width: 230px" type="text" name="address" id="address" value="<?php echo $parents['Address_Pa'] ?>" placeholder=" Address" required=""></td>
                  </tr>
                  <tr>
                      <td><h4>Number Phone</h4></td>
                      <td><input style="width: 230px" type="text" name="phone" id="phone" value="<?php echo $parents['Phone_Pa'] ?>"  placeholder="  Number Phone" required=""></td>
                  </tr>

                  <tr>
                      <td><h4>Password</h4></td>
                      <td><input style="width: 230px" type="password" name="password" id="password" value="<?php echo $parents['Pass_Pa'] ?>" placeholder=" Password" required=""></td>
                  </tr>
                
              </table>

              <button class="" type="submit" name="subUpdate" id="subUpdate" >
                    <span></a> Update Parents </span>
              </button>
              <button class="" type="submit" name="subDelete" id="subDelete" >
                    <span></a> Delete Parents </span>
              </button>
          
          
              <!-- <a href="list.php"class="list">Danh sách</a> -->
          </form>  
        </div>     
</body>
</html>