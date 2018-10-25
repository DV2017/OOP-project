<?php
class Shares extends Controller{
    //a default function called if no data is passed
    /*index is the method accessed if no other parameters 
    are passed after the controller in a url*/
    protected function index(){
        $viewmodel = new ShareModel();
        //passing to controller function params: viewmodel and fullmodel
        //viewmodel index() contains data array : $rows
        $this->returnView($viewmodel->index(), true);
    }

    //calling the add method in ShareModel to insert posts to db
    //send data to share view: add.php

    protected function add(){
        //check for log in status; 
        //allow only if logged in
        if(!isset($_SESSION['is_logged_in'])){
            $url = ROOT_URL.'users/login';
            echo "
               <script>
               window.open('{$url}', '_self');
               confirm('Please log in to share');
               </script>
               ";
        }

        $viewmodel = new ShareModel();
        //passing to controller function params: viewmodel and fullmodel
        //viewmodel index() contains data array : $rows
        $this->returnView($viewmodel->add(), true);
    }
}
?>