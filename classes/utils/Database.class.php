<?php

class Database {
	private $db_host = 'localhost'; 
	private $db_user = 'postgres'; 
	private $db_pass = '1234'; 
	private $db_name = 'educar_casa'; 
	private $result = array();
	private $db; 
	
	function __constructor(){
	}

	public function connect(){
        $con_string = "host={$this->db_host} port=5432 dbname={$this->db_name} user={$this->db_user} password={$this->db_pass}";
        $this->db = pg_connect($con_string) or die("erro ao conectar no banco postgres.");
    }

    public function disconnect(){
	    pg_close($this->db);
	}

    public function select($table, $rows = '*', $where = null, $order = null) {
        $query = "SELECT {$rows} FROM {$table}";
        if($where != null) 
            $query.= " WHERE {$where}";
        $result = pg_query($this->db, $query);
        if (!$result) {
            echo "Ocorreu um erro!\n";
            exit;
        }

        $arr = pg_fetch_all($result);

        return $arr;
	}

    public function insert($table,$values,$rows = null) {
        $res = pg_insert($this->db, $table, $values);
        return $res;
    }

    public function delete($table,$where = null) {
        if($this->tableExists($table)) {
            if($where == null) {
                $delete = 'DELETE '.$table; 
            } else {
                $delete = 'DELETE FROM '.$table.' WHERE '.$where; 
            }
            $del = @mysql_query($delete);
            if($del) {
                return true; 
            } else {
               return false; 
            }
        } else {
            return false; 
        }
    }

    public function update($table,$rows,$where) {
        
    }

    public function getResult(){
    	return $this->result;
    }
}