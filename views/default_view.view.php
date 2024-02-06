<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My PHP Router Trial App | <?= $heading ?></title>
</head>

<body>
  <?php
  require 'partials/header.php';
  ?>
  <h3>Welcome home! <?= $_SESSION["name"] ?></h3>

  <p>My posts</p>
  <?php
  foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
  }
  ?>
</body>

</html>
