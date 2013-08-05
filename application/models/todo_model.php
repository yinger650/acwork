<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Todo_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function getlist($uid, $offset=0, $rows=30)
    {
        $sql = "SELECT task.uid, fromuid, fathertid, name, content, remindline, alertline, deadline, task.ctime
            FROM user LEFT JOIN task ON user.uid = task.uid
            WHERE task.status = 'live' AND (task.uid = ? OR task.fromuid = ?)
            ORDER BY task.deadline
            LIMIT ?, ?";
        $arg = array($uid, $uid, $offset, $rows);
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