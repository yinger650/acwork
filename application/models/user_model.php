<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class User_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function getinfo($uid, $withpwd=FALSE)
    {
        $sql = "SELECT uid, username, password, nickname, portrait, email, cellphone, auth FROM user WHERE uid = ?";
        $arg = array($uid);
        $query = $this->db->query($sql, $arg);
        $res = $query->row();
        if(!$withpwd)
            unset($res->password);
        return $res;
    }

}