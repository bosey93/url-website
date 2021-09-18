<?php 
  include "php/config.php";
  $new_url = "";
  if(isset($_GET)){
    foreach($_GET as $key=>$val){
      $u = mysqli_real_escape_string($conn, $key);
      $new_url = str_replace('/', '', $u);
    }
      $sql = mysqli_query($conn, "SELECT full_url FROM url WHERE shorten_url = '{$new_url}'");
      if(mysqli_num_rows($sql) > 0){
        $sql2 = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$new_url}'");
        if($sql2){
            $full_url = mysqli_fetch_assoc($sql);
            header("Location:".$full_url['full_url']);
          }
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>URL Shortener in PHP | CodingNepal</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
  <style>

  </style>
</head>
</head>
<body>

<ul>
  <li><a class="active" href="#">Home</a></li>
  <li><a href="manage.php">Manage url(s)</a></li>
    <li><a href="/">Create urls(s)</a></li>
</ul>
 
<div class="hel" style="display: flex; align-items: center; color: white; width: 500px; height: 130px; background: #262d61; border-radius: 20px;">
  <h1>
BOS-URL.TK <br>
<p>RACCOURCISSEUR D'URL</p>
</h1>

</div>

<style>
body{
  display: flex; 
  justify-content: center;
  width: 100%;
    overflow: hidden;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
    position: absolute;
    top: 0;
    left: 0;
}

li a {
    display: block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #262d61;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
</body>
</html>

