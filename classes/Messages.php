<?php
class Messages{
    public static function setMsg($message, $type){
        if($type == 'error'){
            $_SESSION['errorMsg'] = $message;
        }else{
            $_SESSION['successMsg'] = $message;
        }
    }

    public static function displayMsg(){
        if(isset($_SESSION['errorMsg'])){
            echo "<div class='alert alert-danger'>{$_SESSION['errorMsg']}</div>";
            unset($_SESSION['errorMsg']);
        }
        if(isset($_SESSION['successMsg'])){
            echo "<div class='alert alert-success'>{$_SESSION['successMsg']}</div>";
            unset($_SESSION['successMsg']);
        }
    }
}
?>