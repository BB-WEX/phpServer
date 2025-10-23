<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Hello, World!</h1>
  <p>Welcome to your PHP Server</p>
  <p>This page is served using PHP.</p>
  <p>Visiting http://localhost/ now shows a list of all project folders in www/.</p>
  <p><strong>Each subfolder can still be accessed directly:</strong><p>
  <p>http://localhost/my_new_app</p>
  <p>http://localhost/another_app</p>
  <?php
    echo "<p>Current date and time: " . date('Y-m-d H:i:s') . "</p>";
  ?>
</body>
</html>
