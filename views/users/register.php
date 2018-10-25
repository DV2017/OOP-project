<div class="jumbotron">
<h3>Register User</h3>
<form action="<?php htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
<div class="form-group">
    <label for="name">Name</label>
    <input style="width:30rem;" type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Full name">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <input type="submit" name="register" class="btn btn-primary" value="Register">
</form>
</div>