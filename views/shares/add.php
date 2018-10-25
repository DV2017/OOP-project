

<div class="jumbotron">
<form action="<?php htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
        <div class="form-group">
          <label for="title">Title</label>
          <input style="width:50rem;" type="text" class="form-control" name="title" id="" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea class="form-control" name="body" id="" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="">Link to:</label>
          <input type="text" class="form-control" name="link" id="" >        
        </div>
        <input class="btn btn-light" type="submit" name="submit_shares" value="Submit">
        <a class="btn btn-dark" href="<?php echo ROOT_URL;?>shares">Cancel</a>
    </form>
</div>


