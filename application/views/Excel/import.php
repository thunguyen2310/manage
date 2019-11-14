<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter Import Example</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<form action="<?= base_url() ?>school/Import/importFile" method="post" enctype="multipart/form-data">
    Upload excel file : 
    <input type="file" name="uploadFile" value="" /><br><br>
    <input type="submit" name="submit" value="Import" />
</form>
</body>
</html>