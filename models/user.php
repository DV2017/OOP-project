<?php
class UserModel extends Model {

    //functions 
    public function register(){
        $url = ROOT_URL.'users/login';
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = password_hash($post['password'], PASSWORD_DEFAULT);

       if($post['register']){
            if($post['name'] == "" || $post['email'] == "" || $post['password'] == ""){
               Messages::setMsg('Please fill in all fields.', 'error');
               return;
            } 
            $this->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();

           //verify
           if($this->lastInsertId()){
               echo "
               <script>
               window.open('{$url}', '_self');
               </script>
               ";
           }
        }
    }

    public function login(){
        $url_logged_in = ROOT_URL.'shares';
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['login']){
            //compare login
            $this->query("SELECT * FROM users WHERE email = :email ");
            $this->bind(':email', $post['email']);

            $row = $this->getSingleResult();
            
            if($row){
                if(password_verify($post['password'], $row['password'])){
                    //once logged in, creating session variables
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user_data'] = array(
                        "id"    => $row['id'],
                        "name"  => $row['name'],
                        "email" => $row['email']
                    );
                    echo "
                        <script>
                        window.open('{$url_logged_in}', '_self');
                        </script>
                        ";
                }else{
                    Messages::setMsg('Incorrect login.', 'error');
                }
            }else{
                Messages::setMsg('Your email is incorrect.', 'error');
            }
        }
    }
}
?>