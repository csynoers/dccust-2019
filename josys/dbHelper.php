<?php
class dbHelper {
    private $db;
    private $err;
    function __construct($db_config){
		$this->config= $db_config; 
		try {
			$this->db = new PDO("mysql:host={$this->config['host']};dbname={$this->config['dbname']};charset=utf8", $this->config['user'], $this->config['pass']);
			// set the PDO error mode to exception
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			$response["status"] = "error";
            $response["message"] = 'Connection failed: ' . $e->getMessage();
            $response["data"] = null;
            exit;
		}
    }

    function select($table, $where){
        try{
            $a = array();
            $w = "";
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " like :".$key;
                $a[":".$key] = $value;
            }
            $stmt = $this->db->prepare("select * from ".$table." where 1=1 ". $w);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(count($rows)<=0){
                $response["status"] = "warning";
                $response["message"] = "No data found.";
            }else{
                $response["status"] = "success";
                $response["message"] = "Data selected from database";
            }
                $response["data"] = $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    // function get_select($select,$table, $where){
    function get_select($query){
        try{
            $a = array();
            // $w = "";
            // foreach ($where as $key => $value) {
            //     $w .= " and " .$key. " like :".$key;
            //     $a[":".$key] = $value;
            // }

            // $sa = array();
            // $s  ="";
            // foreach ($select as $key => $value) {
            //     $s .= $value .= ',';
            // }
            // $fix_sa = rtrim($s,", ");

            // $stmt = $this->db->prepare("SELECT $fix_sa FROM ".$table." where 1=1 ". $w);
            $stmt = $this->db->prepare($query);
            // $stmt->execute($a);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            if( count($rows)<=0 ){
                $response["status"] = "warning";
                $response["message"] = "No data found.";
                $response["sql"] = $query;
            }else{
                $response["status"] = "success";
                $response["message"] = "Data selected from database";
            }
                $response["data"] = $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    function insert($table, $columnsArray, $requiredColumnsArray) {
        $this->verifyRequiredParams($columnsArray, $requiredColumnsArray);
        
        try{
            $a = array();
            $c = "";
            $v = "";
            foreach ($columnsArray as $key => $value) {
                $c .= $key. ", ";
                $v .= ":".$key. ", ";
                $a[":".$key] = $value;
            }
            $c = rtrim($c,', ');
            $v = rtrim($v,', ');
            $stmt =  $this->db->prepare("INSERT INTO $table($c) VALUES($v)");
            $stmt->execute($a);
            $affected_rows = $stmt->rowCount();
            $response["status"] = "success";
            $response["message"] = $affected_rows." row inserted into database";
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Insert Failed: ' .$e->getMessage();
        }
        return $response;
    }
    function update($table, $columnsArray, $where, $requiredColumnsArray){ 
        $this->verifyRequiredParams($columnsArray, $requiredColumnsArray);
        try{
            $a = array();
            $w = "";
            $c = "";
            foreach ($where as $key => $value) {
                // $w .= " and " .$key. " = '".$value.'\'';
                $w .= " " .$key. " = '".$value.'\'';
                // $a[":".$key] = $value;
            }
            foreach ($columnsArray as $key => $value) {
                $c .= $key. " = '".$value."', ";
                // $c .= $key. " = :".$key.", ";
                // $a[":".$key] = $value;
                // $a[":".$key] = $value;
            }
                $c = rtrim($c,", ");
            // UPDATE MyGuests SET lastname='Doe' WHERE id=2
            // $stmt =  $this->db->prepare("UPDATE $table SET $c WHERE 1=1 ".$w);
            $stmt =  $this->db->prepare("UPDATE $table SET $c WHERE ".$w);
            $stmt->execute($a);
            $affected_rows = $stmt->rowCount();
            if($affected_rows<=0){
                $response["status"] = "warning";
                $response["message"] = "No row updated";
            }else{
                $response["status"] = "success";
                $response["message"] = $affected_rows." row(s) updated in database";
            }
            // $response["message"] = "UPDATE $table SET $c WHERE ".$w;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = "Update Failed: " .$e->getMessage();
        }
        return $response;
    }
    function delete($table, $where){
        if(count($where)<=0){
            $response["status"] = "warning";
            $response["message"] = "Delete Failed: At least one condition is required";
        }else{
            try{
                $a = array();
                $w = "";
                foreach ($where as $key => $value) {
                    $w .= " and " .$key. " = :".$key;
                    $a[":".$key] = $value;
                }
                $stmt =  $this->db->prepare("DELETE FROM $table WHERE 1=1 ".$w);
                $stmt->execute($a);
                $affected_rows = $stmt->rowCount();
                if($affected_rows<=0){
                    $response["status"] = "warning";
                    $response["message"] = "No row deleted";
                }else{
                    $response["status"] = "success";
                    $response["message"] = $affected_rows." row(s) deleted from database";
                }
            }catch(PDOException $e){
                $response["status"] = "error";
                $response["message"] = 'Delete Failed: ' .$e->getMessage();
            }
        }
        return $response;
    }
  
    function verifyRequiredParams($inArray, $requiredColumns) {
        $error = false;
        $errorColumns = "";
        foreach ($requiredColumns as $field) {
            if (!isset($inArray[$field]) || strlen(trim($inArray[$field])) <= 0) {
                $error = true;
                $errorColumns .= $field . ', ';
            }
        }

        if ($error) {
            $response = array();
            $response["status"] = "error";
            $response["message"] = 'Required field(s) ' . rtrim($errorColumns, ', ') . ' is missing or empty';
            print_r($response);
            exit;
        }
    }
}