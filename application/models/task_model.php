<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Task_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function post($taskinfo)
    {
        $sql = "INSERT INTO task
            (uid, gid, fromuid, fathertid, name, `text`, remindline, alertline, deadline)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, FROM_UNIXTIME(?))";
        $arg = array(
            element('uid', $taskinfo, null),
            element('gid', $taskinfo, null),
            element('fromuid', $taskinfo, null),
            element('fathertid', $taskinfo, null),
            element('name', $taskinfo, null),
            element('text', $taskinfo, null),
            element('remindline', $taskinfo, null),
            element('alertline', $taskinfo, null),
            element('deadline', $taskinfo, null),
            );
        $query = $this->db->query($sql, $arg);
    }

    function kill($tid)
    {
        $sql = "UPDATE task SET status = 'killed' WHERE tid = ?";
        $arg = array($tid);
        $query = $this->db->query($sql, $arg);
    }

    function finish($tid)
    {
        $sql = "UPDATE task SET status = 'finished', ftime = ? WHERE tid = ?";
        $arg = array(time(), $tid);
        $query = $this->db->query($sql, $arg);
    }

    function delay($tid, $newtime)
    {
        $sql = "UPDATE task SET deadline = ? WHERE tid = ?";
        $arg = array($newtime, $tid);
        $query = $this->db->query($sql, $arg);
    }
}