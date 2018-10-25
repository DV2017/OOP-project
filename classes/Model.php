<?php
/*Base Model as abstract database access layer. */
abstract class Model{
    protected $dbh;
    protected $stmt;
    private $dsn;

    public function __construct(){
        //create new PDO: php data object to connect to db
        /* take constants defined in config.php*/ 
        $this->dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $this->dbh = new PDO($this->dsn, DB_USER, DB_PASS);
    } 

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
                default:
                $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute(){
        $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

    public function getSingleResult(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>