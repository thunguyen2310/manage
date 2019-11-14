<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https:/code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
 
<script type="text/javascript">

  function LoadImage()
    {
     $.ajax("<?= base_url() ?>school/Admin/viewcode")
     .done(function (rs){
         $('#msg').html(rs);
     alert('Xin chào , đây là code JS đầu tiền của tôi');
     });
    }
</script>

<a href="javascript:LoadImage()">[Load hình ảnh]</a>
<div id="msg">Giá trị ban đầu</div>

</body>
</html>