<!DOCTYPE html>
<html>
<head>
    <title>codeigniter ajax request - itsolutionstuff.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>codeigniter ajax request - itsolutionstuff.com</h2>
        </div>
    </div>
</div>
<div>
  <input type="text" name="full_name" id="full_name" />
  <button id="search" name="search">Search</button>
</div>
<hr>

<div class="row">
  
  <div class="col-lg-8">
    <strong>User_Ad:</strong>
    <textarea name="User_Ad" id="User_Ad" class="form-control" placeholder="User_Ad"><?php echo $info_admin['User_Ad']; ?></textarea>
  </div>
    <div class="col-lg-8">
    <strong>Fullname_Ad:</strong>
    <textarea name="Fullname_Ad" id="Fullname_Ad" class="form-control" placeholder="Fullname_Ad"><?php echo $info_admin['Fullname_Ad']; ?></textarea>
  </div>
  <div class="col-lg-8">
    <br/>
    <?php if (empty($id)) { ?>
      <button type="button" class="btn btn-success" id="btnAdd">Submit</button>
    <?php } else {?>
      <button type="button" class="btn btn-success" id="btnEdit">Submit</button>
      <input type="hidden" id="Id_Ad" value="<?php echo $id; ?>">
     <?php } ?>
  </div>
</div>

<form action="" method="POST">
<table class="table table-bordered" style="margin-top:20px; width: 80%" id="table02"> 
      <tr>
          <th>ID</th>
          <th>User_Ad</th>
          <th>Fullname_Ad</th>
          <th>Edit</th>
      </tr>
   <?php foreach ($listadmin as $item) { ?>      
      <tr>
          <td><?=$item['Id_Ad']; ?></td>
          <td><?=$item['User_Ad']; ?></td>
          <td><?=$item['Fullname_Ad']; ?></td>
          <td><input type="button" data-id="<?php echo $item['Id_Ad'] ?>" class="delete" style="color: red" value="Delete" >
              <a href="<?= base_url() ?>school/Admin/ajaxRequest/<?php echo $item['Id_Ad']?>"><input type="button" class="update" style="color: red" value="Edit" ></a>
              
          </td>
      </tr>
   <?php } ?>

</table>
</form>
</div>

<script type="text/javascript">
    $("#btnAdd").click(function(){
       var User_Ad = $("#User_Ad").val();
       var Fullname_Ad = $("#Fullname_Ad").val();
        $.ajax({
           url: '<?= base_url() ?>school/Admin/ajaxRequestPost',
           type: 'POST',
           data: {User_Ad: User_Ad, Fullname_Ad: Fullname_Ad, },
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                // $("tbody").append("<tr><td>"+Id_Ad+"</td><td>"+User_Ad+"</td><td>"+Fullname_Ad+"</td></tr>");
                alert("Record added successfully");  
                location.reload();
                // $("#table02").load("#table02");
           }
        });
    });

      $("#btnEdit").click(function(){
      var Id_Ad = $("#Id_Ad").val();
       
       console.log(Id_Ad);
       var User_Ad = $("#User_Ad").val();
       var Fullname_Ad = $("#Fullname_Ad").val();
        $.ajax({
           url: '<?= base_url() ?>school/Admin/updateAdmin',
           type: 'POST',
           data: { Id_Ad: Id_Ad, User_Ad: User_Ad, Fullname_Ad: Fullname_Ad, },
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {                
              alert("Record update successfully"); 
              location.reload();
          }
        });
    });


      $(".delete").click(function(){
       var Id_Ad = $(this).data('id');
       console.log(Id_Ad);
       var x = confirm("bạn có muốn xóa")
       if(x == true){
        $.ajax({
           url: '<?= base_url() ?>school/Admin/deleteAdmin',
           type: 'POST',
           data: { Id_Ad: Id_Ad},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                
                // alert("Record delete successfully");
                location.reload();  
           }
        });
      }
    });


    $("#search").click(function(){
       var full_name = $("#full_name").val();
        $.ajax({
           url: '<?= base_url() ?>school/Admin/listSearch',
           type: 'POST',
           data: { 
              full_name: full_name, 
           },
           success: function(data) {
                var obj = JSON.parse(data);
                $('#table02').html(obj.data_html);
           }
        });
    });
 
// $('#search_event').submit(function (event) {
//     event.preventDefault();
//     var id_event = $('#id_event').val();
//     var name_event = $('#name_event').val();
//     var type = $('input[name="type"]:checked').val();
//     var fromdate = $('#fromdate').val();
//     var todate = $('#todate').val();
//     $.ajax({
//         url: '<?=base_url()?>admin/event/search',
//         data: {
//           id_event:id_event,
//           name_event:name_event,
//           type:type,
//           fromdate:fromdate,
//           todate:todate,
//         },
//         type: 'POST',
//         success: function (data) {
//           var obj = JSON.parse(data);
//           console.log(obj);
//           $('.table02').html(obj.data_html);
//           $('.count_list').html(obj.data_count);
//           if(obj.data_total_rows == 1 ||  obj.data_total_rows == 0) {
//             $('.pagination .page').html("<li class='btn_prev'><span></span></li>");
//           } else {
//           $('.pagination .page').html("<li class='btn_prev'><span>ページ "+obj.data_page+"/"+obj.data_total_rows+"</span></li>"+obj.data_pagination);
//           $('#this_page').val(obj.data_this_page);
//           rewrite_onclick();
//         }
//         }
//     });
//   });
</script>
</body>
</html>