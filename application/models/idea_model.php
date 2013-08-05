<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Idea_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    public function post($uid, $text)
    {
        $sql = "INSERT INTO idea (uid, `text`) VALUES (?, ?)";
        $arg = array($uid, $text);
        $query = $this->db->query($sql, $arg);
    }
}