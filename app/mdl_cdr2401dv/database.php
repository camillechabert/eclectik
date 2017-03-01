<?php

include "params.php";

class database {

    private $dsn;
    public $dbh;
    public $errMsg;
    public $queryErr;

    public function __construct(){
        $this->dsn = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';
        $this->db_connect();
        return $this->dbh;
    }

    private function db_connect() {
        try {
            $this->dbh = new PDO($this->dsn, USERNAME, PASSWORD);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return $this->errMsg = 'Connection error: ' . $e->getMessage();
        }
    }

    public function request_db($sql, $params) {
        $stt = null;
        try {
            $stt = $this->dbh->prepare($sql, $params);
            $stt->execute($params);
        } catch (PDOException $e) {
            $this->queryErr = true;
            $this->errMsg = 'Query error : ' . $e->getMessage();
        }
        return $stt->fetch(PDO::FETCH_ASSOC);
    }

    public function build_request($index, $datas, $table, $array) {
        $id = $index;
        $i = 0;
        $l = count($datas);
        $rqs = 'UPDATE ' .$table.' SET ';
        foreach($datas as $k => $v) {
            $rqs .= $array[':'.$k];
            $rqs .= '=';
            $rqs .= ':'.$k;
            $rqs .= ($i >= $l - 1) ? ' ' : ', ';
            $i++;
        }
        return $rqs .= 'WHERE id = ' . $id;
    }

    public function disconnect() {
        $this->dbh = null;
    }
}



