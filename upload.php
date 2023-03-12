<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}
</style>
</head>
<body>

<body>

<h1 style="border: 2px solid DodgerBlue;">มีแค่เราที่รู้ว่าความสำเร็จนั้นน่าภูมิใจขนาดไหน</h1>



</body>
</body>
</html>




<?php
 if(isset($_FILES['image'])){
  $file_name = $_FILES['image']['name'];   
  $temp_file_location = $_FILES['image']['tmp_name']; 

  require 'vendor/autoload.php';

  $s3 = new Aws\S3\S3Client([
   'region'  => 'ap-southeast-1',
   'version' => 'latest',
   'credentials' => [
    'key'    => "AKIA2IZMPCHJRVHAQM42",
    'secret' => "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",
   ]
  ]);  

  $result = $s3->putObject([
   'Bucket' => 'workarapan',
   'Key'    => $file_name,
   'SourceFile' => $temp_file_location   
  ]);

  var_dump($result);
 }
?>

<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">         
 <input type="file" name="image" />
 <input type="submit"/>
</form>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php
require 'display.php';
?>

