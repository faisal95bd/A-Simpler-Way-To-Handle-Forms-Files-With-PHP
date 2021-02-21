<?php

$errorMessage = "";

if (isset($_FILES["file"])) {
  echo "<pre>";
  var_dump($_FILES);
  echo "</pre>";

  $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
  $ext = strtolower($ext);

  if ($_FILES["file"]["size"] > 5 * 1024 * 1024) {
    $errorMessage = "You can upload maximum 5MB file only!";
  } elseif (!in_array($ext, ["png", "jpg", "jpeg", "svg"])) {
    $errorMessage = "You can upload images only!";
  } else {
    move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php echo '<h3 style="color: red">' . $errorMessage . "</h3>"; ?>

  <form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="">
<button>Submit</button>
  </form>
</body>
</html>