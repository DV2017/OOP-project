<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shareboard</title>
    <link rel="stylesheet" href="<?php echo ROOT_URL;?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL;?>assets/css/style.css">
</head>
<body>

 <nav class="navbar navbar-expand-md navbar-light">
      <a class="navbar-brand" href="#">Shareboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL;?>home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL;?>shares">Shares</a>
          </li>
        </ul>
      </div>

        <div class="collapse navbar-collapse justify-content-sm-end" id="navbarsExampleDefault">
        <ul class="navbar-nav ">
          <?php if(isset($_SESSION['is_logged_in'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL;?>">Welcome, <?php echo $_SESSION['user_data']['name'];?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL;?>users/logout">Logout</a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL;?>users/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL;?>users/register">Register</a>
          </li>
          <?php endif; ?>

        </ul>
      </div>
    </nav>
    <main role="main" class="container">
        <?php Messages::displayMsg();?>
        <div class="row justify-content-center">       
        <?php require($view);?>
        </div>
    </main><!-- /.container -->
    <!--create views -->
</body>
</html>