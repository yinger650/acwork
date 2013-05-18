<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Todo_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function getlist($uid, $start=0, $offset=0)
    {
        $sql = "SELECT task.uid, tid, fromuid, name, deadline
            FROM user LEFT JOIN task ON user.uid = task.uid
            WHERE task.status = 'live' AND (task.uid = ? OR task.fromuid = ?)";
        if ($num != 0)
            $sql .= " LIMIT ".$start.", ".$offset;
        $arg = array($uid, $uid);
        $query = $this->db->query($sql, $arg);
        $res = $query->result();
        return $res;
    }

    function getdetail($tid)
    {
        $sql = "SELECT uid, fromuid, fathertid, name, content, remindline, alertline, deadline, ctime
            FROM task
            WHERE tid = ?";
        $arg = array($tid);
        $query = $this->db->query($sql, $arg);
        $res = $query->result();
        return $res;
    }
}