<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>
             <?php
                     if(isset($title) && $title !== "Administration section") {
              ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CNI Libraries</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="catégorie_list.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp; Catégorie</a></li>
              <li><a href="books.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Books</a></li>
              <li><a href="admin_signout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
              
          </ul>
        </div>
      </div>
    </nav>
    <?php } else{
    ?><nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
      </div>
    </div>
  </nav>
  <?php }
    ?>
    <?php
      if(isset($title) && $title == "Index" || $title == "Administration section") {
    ?>
    <div class="jumbotron">
      <div class="container">
        <h2>Welcome to online CNI Libraries</h2>
  
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">