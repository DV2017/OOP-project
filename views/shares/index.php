<div>
<a href="<?php echo ROOT_URL;?>shares/add" class="btn btn-success mb-3">Share now!</a>
<?php foreach($viewmodel as $item):?>
        <div class="jumbotron">
            <h5 class="card-title"><?php echo $item['title'];?></h5 >
            <small><?php echo $item['create_date'];?></small>
            <p class="card-text"><?php echo $item['body'];?></p>
            <a class="btn btn-light" href="<?php echo $item['link'];?>" target="_blank">Link</a>
        </div>   

<?php endforeach; ?>
</div>