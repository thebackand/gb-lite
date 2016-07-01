<?php
require 'INewsDB.class.php';

class NewsDB implements INewsDB{
    protected $_db;
    const DB_NAME = 'C:\WebServers\home\workDB\www\news.db';
    function __construct(){
   if(is_file(self::DB_NAME)){     
        $this->_db = new SQLite3(self::DB_NAME);
   }else{
        $this->_db = new SQLite3(self::DB_NAME);
  
  $sql= "CREATE TABLE msgs(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  title TEXT,
  category INTEGER,
  description TEXT,
  source TEXT,
  datetime INTEGER
  )";  
$this->_db->exec($sql) or die($this->_db->lassErrorMsg());
       
    
  $sql= "CREATE TABLE category(
  id INTEGER,
  name TEXT)";  
$this->_db->exec($sql) or die($this->_db->lassErrorMsg());   

       
  $sql= "INSERT INTO category(id,name)
  SELECT 1 as id, 'Политика' as name
  UNION SELECT 2 as id, 'Культура' as name
  UNION SELECT 3 as id, 'Спорт' as name
  ";  
$this->_db->exec($sql) or die($this->_db->lassErrorMsg());   

   }
    }
    
  
    
    
    function __dectruct(){
        unset($this->_db);
    }
    
    function clearStr($data){
        $data = trim(strip_tags($data));
        return $this->_db->escapeString($data);
    }
    
    function clearInt($data){
        return abs((int)$data);
    }
    
        function saveNews($t, $c, $d, $s){
            $dt = time();
            $sql = "INSERT INTO msgs(
            title,
            category,
            description,
            source,
            datetime) 
            VALUES(
            '$t', $c, '$d', '$s', $dt)";
    $this->_db->exec($sql) or die($this->_db->lassErrorMsg());   
        }
    
    protected function db2Arr($data){
        $arr = array();
            while($row =$data->fetchArray(SQLITE3_ASSOC)){
                $arr[]=$row;
            }
        return $arr;
    }
        function getNews(){
            $sql = "SELECT * FROM msgs ORDER BY ID DESC";            
        $resd = $this->_db->query($sql) or die($this->_db->lastErrorMsg());
            return $this->db2Arr($resd);
        }
        function deleteNews($id){
            $sql = "DELETE FROM msgs WHERE id=$id";
            $resd = $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
        }
}


?>