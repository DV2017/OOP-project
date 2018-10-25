<?php
class ShareModel extends Model {
    public function index(){
        $this->query("SELECT * FROM shares ORDER BY create_date DESC");
        $rows = $this->resultSet();
        //this rows need to be passed to views
        return $rows;
    }

    public function add(){
        $url = ROOT_URL.'shares';
       //sanitize post
       //insert to database
       $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       if($post['submit_shares']){

            if($post['title'] == "" || $post['body'] == ""){
                Messages::setMsg('Please fill in all fields.', 'error');
                return;
            }

           $this->query("INSERT INTO shares (user_id, title, body, link) VALUES (:user_id, :title, :body, :link)");
           $this->bind(':user_id', $_SESSION['user_data']['id']); //getting session data
           $this->bind(':title', $post['title']);
           $this->bind(':body', $post['body']);
           $this->bind(':link', $post['link']);
           $this->execute();

           //verify
           if($this->lastInsertId()){
               echo "
               <script>
               window.open('{$url}', '_self');
               </script>
               ";
           } else{
               return;
           }

       }
       return;
    }
}
?>