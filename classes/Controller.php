<?php
//creating the base controller class
//created as an abstract class to extend other classes
//does not need instantiation
//every class created will extend this class

abstract class Controller{
    //has 2 properties that can be accessed from the extended class
    protected $request;
    protected $action;

    public function __construct($action, $request){
        $this->action = $action;
        $this->request = $request;
    }

    public function executeAction(){
        //returns the action for that controller (ex: add in shares controller)
        return $this->{$this->action}();
    }

    //base controller must also be able to return a view to the controllers
    protected function returnView($viewmodel, $fullview){
        //$fullview is a boolean
        /* $viewmodel is a parameter from model passed 
        //via the respective controllers
        //SETS URL TO VIEW
        //controller function to be able to assign views to methods such as register
        //called by extension only; usable only by methods that extend Controller
        //important to name the view the same as the class*/
        $view = 'views/'. get_class($this). '/' . $this->action. '.php';
        if($fullview){
            //if fullview param is set to true, load the main layout file
            //which has all standard html, head tags which you want in every file
            require("views/main.php");
        } else {
            //load individual view
            require($view);
        }
    }
}
?>