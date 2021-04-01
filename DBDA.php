<?php

class DBDA{
    public $host="localhost";
    public $uid="root";
    public $password="";
    public $dbname="shop_database";
    public function StrQuery($sql,$type=1){
        $db = new mysqli($this->host,$this->uid,$this->password,$this->dbname);
        //connect to the database
        $r = $db->query($sql);
        if($type==1){
            $attr = $r->fetch_all();
            $str = "";
            foreach ($attr as $v){
                $str .= implode("^",$v)."|";
            }
            return substr($str,0,strlen($str)-1);
        }
        else {
            return $r;
        }
    }
}