<?php
include "database.php"
?>


<?php
class cartegory{
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }
    
    public function insert_cartegory($cartegory_name_add){
        $query = "INSERT INTO tbl_cartegory (cartegory_name) VALUES ('$cartegory_name_add')";
        $result = $this->db->insert($query);
        return $result; 
    }
}
?>