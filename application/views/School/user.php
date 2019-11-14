<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Edu Small</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/flaticon.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/themify-icons.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css" />

  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area white-header">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="index.html">
              <img class="logo-2" src="img/logo2.png" alt="" />
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('School/Admin/index/')?>">Home</a>
                </li>
                  <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('School/Admin/logout/')?>">Logout</a>
                </li> 
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <div class="page_link">
                  <a href="<?=base_url('School/admin/loginAdmin/')?>"><h2 style="color: #d9e8f8">User</h2></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
          <h1 style="font-family: 'Dancing Script', cursive;
                    color: #fdc632;
                    text-align: left;
                    margin: 30px;
                    font-size: 59px;"> Update Infor</h1>

          <form action="" method="POST" >
              
              <table style="margin:30px ">
                <tr>
                      <td ><h4 >Id</h4></td>
                      <td><input style="width: 230px ;color:#918e8e " type="text" name="id" id="id" value="<?php echo $parents['Id_Pa'] ?>" placeholder=" Id" readonly></td>
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
                      <td><input style="width: 230px" type="text" name="fullname" id="fullname" value="<?php echo $parents['Fullname_Pa'] ?>" placeholder="Fullname" required=""></td>
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
              <div style="margin: 30px">
                <button class="" type="submit" name="subUpdate" id="subUpdate" >
                      <span></a> Update </span>
                </button>
              </div>
          </form>            
        </div> 

        <div class="container">
          <h1 style="font-family: 'Dancing Script', cursive;
                    color: #fdc632;
                    margin: 30px;
                    font-size: 57px;">Add Students</h1>


          <form action="" method="POST"  >
              
              <table  style="margin:30px " >
                  <tr>
                      <td><h5 >Username<span style="color: red">*</span></h5></td>
                      <td><input style="width: 230px" type="text" name="username" id="username" value="" placeholder=" Username" required=""></td>
                  </tr>
                  
                  <tr>
                      <td><h5>Email <span style="color: red">*</span></h5></td>
                      <td><input style="width: 230px"type="email" name="email" id="email" value="" placeholder=" Email"required=""></td>
                  </tr>
                  <tr >
                      <td><h5>Fullname <span style="color: red">*</span></h5></td>
                      <td><input style="width: 230px" type="text" name="fullname" id="fullname" value="" placeholder=" Fullname" required=""></td>
                  </tr>
                  <tr>
                      <td><h5>Class <span style="color: red">*</span></h5></td>
                      <td >
                          <select style="width:230px" id="class" name="class">
                           <?php foreach ($class as $cl) { ?>
                          
                            <option value="<?php echo $cl['Id_Cl']; ?>"><?php echo $cl['Name_Class'];?></option>

                            <?php } ?>
                          </select>
                      </td>
                  </tr>
                  <tr>
                      <td><h5>Id_Parents <span style="color: red">*</span></h5></td>
                      <td><input style="width: 230px" type="text" name="idPa" id="idPa" value="" placeholder=" Id_Parents" required=""></td>
                  </tr> 

                  <tr>
                      <td><h5> Number Phone <span style="color: red">*</span></h5></td>
                      <td><input style="width: 230px" type="text" name="phone" id="phone" value="" placeholder=" Number Phone" required=""></td>
                  </tr>

                  <tr>
                      <td><h5>Password <span style="color: red">*</span></h5></td>
                      <td><input style="width: 230px" type="password" name="password" id="password" value="" placeholder=" Password" required=""></td>
                  </tr>

              </table>

              <button class="" type="submit" name="subAdd_St" id="subAdd_St"  style="margin: 30px ">
                    <span></a> Add Students </span>
              </button>          
              <!-- <a href="list.php"class="list">Danh sách</a> -->
          </form>  
        </div> 

        <div class="container">
          <h1 style="font-family: 'Dancing Script', cursive;
                    color: #fdc632;
                    margin: 30px;
                    font-size: 57px;
                    ">Change Class</h1>   
          <form action="" method="POST" >
            <table style="width: 50%;
              " >
              <thead>

                <tr style=" padding: 20px;
                            margin: 20px;" >
                  <th>Id</th>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Class</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              <?php
                foreach ($students as $item) {     //nếu gọi từ hàm danhSach   // còn gọi từ hàm index thì thay câu lệnh if ($list_user as $item)     
              ?>
                <tr>
                  <td><?php echo $item['Id_St']?></td>
                  <td><?php echo $item['User_St'] ?></td>
                  <td><?php echo $item['Fullname_St'] ?></td>

                  <td><select type="text" name="class_<?php echo $item['Id_St'] ?>" id="class_<?php echo  $item['Id_St'] ?>" > 
                  <!-- <option <?php if($item['Class_St']==1){echo 'selected';} else {echo '';} ?> value="1">Anh văn cơ bản</option>--> 
                  <?php foreach ($class as $cl) { ?>                 
                    <option <?php if($item['Class_St'] == $cl['Id_Cl']) {echo 'selected';} else {echo '';}?> value="<?php echo $cl['Id_Cl'];?>"><?php echo $cl['Name_Class'];?></option>
                  <?php } ?>
                  </select></td>
                   
                </tr>                 
              </tbody>          
              <?php } ?>
              </tr>

          </table>
          <button class="" type="submit" name="subChange" id="subChange" >
            <span></a> Change </span>
          </button>
        </form>  
  </div>
  
    </section>
    <!--================Contact Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap" style="height: 330px">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-6 single-footer-widget">
            <h4>Top Products</h4>
            
          </div>
          <div class="col-lg-2 col-md-6 single-footer-widget">
            <h4>Quick Links</h4>
            
          </div>
          <div class="col-lg-2 col-md-6 single-footer-widget">
            <h4>Features</h4>
            
          </div>
          <div class="col-lg-2 col-md-6 single-footer-widget">
            <h4>Resources</h4>           
          </div>

                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between">
      
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-instagram"></i></a>
            <a href="#"><i class="ti-email"></i></a>    
          </div>
        </div>
      </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/theme.js"></script>
  </body>
</html>
