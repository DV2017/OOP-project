<?php
class Bootstrap{
    private $controller;
    private $request;
    private $action;

    /* this function considers the url parameters as indicated in .htaccess  */
    /* ex: if you tupe index.php/users/requests: users is the controller and requests is action */
    /* you get screen outputs as defined in the construct method */
    /* type index.php and enter --> you view 'home'; index.php/users --> 'users' */
    /* index.php/users/requests --> you view methods defined as 'action', which is requests.  */
    public function __construct($request){
        //$request is the url in an array
        $this->request = $request;

        if($this->request['controller'] == ""){
            $this->controller = 'home';
        }else{
            $this->controller  = $this->request['controller'];
        }

        if($this->request['action'] == ""){
            $this->action = 'index';
        }else{
            $this->action = $this->request['action'];
        }
    }

    //this method creates a new instance of the controller-extended class 
    public function createController(){
       // check for class User in the url
        if(class_exists($this->controller)){
            //class_parents — Return parent classes of the given class as array
            //eg.User class in index.php/User/register
            //if User extends class Controller, then result is an array of parent class Controller
            $parents = class_parents($this->controller);
        
        //check Extend
        //in_array(needle, haystack)
        //checks for class Controller in the returned array
            if(in_array('Controller', $parents)){
                //does the class User have a method register?
                //bool method_exists ( mixed $object , string $method_name )
                if(method_exists($this->controller, $this->action)){
                    //creates an instance object of the User class
                    //this class is extends base Controller class
                    //its passed a method (register) and the url (index.php/Users/register)
                    return new $this->controller($this->action, $this->request);
                }else{
                    //Method does not exist
                    echo 'Method does not exist';
                    return;
                }
            }else {
                //Base controller not found
                echo "Base controller not found";
            }
        }else{
            //Controller class does not exist
            echo "Controller class does not exist";
        }
    }
}
?>