
<div class="jumbotron">
<h3>User Login</h3>
<form action="<?php htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" style="width:30rem;" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <input type="submit" name="login" class="btn btn-primary" value="Login">
</form>
</div>