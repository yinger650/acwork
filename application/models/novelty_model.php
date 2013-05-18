<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Novelty_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function getdemo($uid, $start=0, $offset=30)
    {
        $sql = "SELECT 'demo' AS category, demo.did, demo.tid, task.name, task.gid, demo.text, demo.attachment, demo.ctime, !ISNULL(mycomment.tid) AS commented
            FROM demo
            LEFT JOIN task ON demo.tid = task.tid
            LEFT JOIN allocate ON task.gid = allocate.gid AND task.uid = allocate.uid
            LEFT JOIN (
                SELECT forid AS tid 
                FROM comment 
                WHERE comment.uid = ? AND fortype='demo'
                ) AS mycomment ON demo.tid = mycomment.tid
            WHERE demo.status='hangup' AND (task.uid=? OR task.fromuid=? OR allocate.uid=?)
            ORDER BY commented, demo.ctime DESC
            LIMIT ? , ?";
        $arg = array($uid, $uid, $uid, $uid, $start, $offset);
        $query = $this->db->query($sql, $arg);
        $demo = $query->result();
        return $demo;
    }

    function getidea($uid, $start=0, $offset=30)
    {
        $sql = "SELECT 'idea' as category, idea.iid, idea.gid, idea.text, idea.attachment, idea.ctime, !ISNULL(mycomment.iid) AS commented
            FROM idea
            LEFT JOIN allocate ON idea.gid = allocate.gid
            LEFT JOIN (
                SELECT forid AS iid 
                FROM comment 
                WHERE comment.uid = ? AND fortype='idea'
                ) AS mycomment ON idea.iid = mycomment.iid
            WHERE allocate.uid=?
            ORDER BY commented, idea.ctime DESC
            LIMIT ? , ?";
        $arg = array($uid, $uid, $start, $offset);
        $query = $this->db->query($sql, $arg);
        $idea = $query->result();
        return $idea;
    }

    function getlist($uid, $start=0, $offset=30)
    {
        $demo = $this->getdemo($uid, $start, $offset);
        $idea = $this->getidea($uid, $start, $offset);
        $nd = reset($demo); $ni = reset($idea);
        $res = array();
        while($nd && $ni){
            if(($ni->commented < $nd->commented) or ($ni->commented == $nd->commented && $ni->ctime>$nd->ctime)){
                array_push($res, $nd);
                $nd = next($demo);
            }
            else{
                array_push($res, $ni);
                $ni = next($idea);
            }
        }
        while($nd){
            array_push($res, $nd);
            $nd = next($demo);
        }
        while($ni){
            array_push($res, $ni);
            $ni = next($idea);

        }
        return $res;
    } 
}