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
        $result = pg_query($this->db, "SELECT {$rows} FROM {$table}");
        if (!$result) {
            echo "Ocorreu um erro!\n";
            exit;
        }

        $arr = pg_fetch_all($result);

        return $arr;
	}

    public function insert($table,$values,$rows = null) {
        $res = pg_insert($this->db, $table, $values);
        if ($res) {
            echo "Dados foram arquivados com sucesso\n";
        }
        else {
            echo "O usuário deve ter inserido entradas inválidas\n";
        }
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
        if($this->tableExists($table)) {
            // Parse the where values
            // even values (including 0) contain the where rows
            // odd values contain the clauses for the row
            for($i = 0; $i < count($where); $i++) {
                if($i%2 != 0) {
                    if(is_string($where[$i])) {
                        if(($i+1) != null)
                            $where[$i] = '"'.$where[$i].'" AND ';
                        else
                            $where[$i] = '"'.$where[$i].'"';
                    }
                }
            }
            $where = implode('=',$where);

            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows); 
            for($i = 0; $i < count($rows); $i++) {
                if(is_string($rows[$keys[$i]])) {
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                } else {
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                 
                // Parse to add commas
                if($i != count($rows)-1) {
                    $update .= ','; 
                }
            }
            $update .= ' WHERE '.$where;
            $query = @mysql_query($update);
            if($query) {
                return true; 
            } else {
                return false; 
            }
        } else {
            return false; 
        }
    }

    public function getResult(){
    	return $this->result;
    }
}