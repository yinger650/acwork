<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Novelty_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function getdemo($uid, $offset=0, $rows=30)
    {
        $sql = "SELECT 'demo' AS category, demo.did AS forid, demo.tid, task.gid, user.uid, user.nickname, user.portrait, task.name, task.gid, demo.text, demo.attachment, up.count AS up, down.count AS down, fircmt.nickname AS firname, fircmt.portrait AS firpt, fircmt.text AS fircmt, fircmt.ctime AS firtime, lstcmt.nickname AS lstname, lstcmt.portrait AS lstpt, lstcmt.text AS lstcmt, lstcmt.ctime AS lsttime, cmtnum.count AS cmtnum, demo.ctime, !ISNULL(mycomment.did) AS commented
            FROM demo
            LEFT JOIN task ON demo.tid = task.tid
            LEFT JOIN allocate ON task.gid = allocate.gid AND task.uid = allocate.uid
            LEFT JOIN (
                SELECT DISTINCT forid AS did 
                FROM comment 
                WHERE uid = ? AND fortype='demo'
                ) AS mycomment ON demo.did = mycomment.did
            LEFT JOIN (
                SELECT forid AS did, COUNT(*) AS count
                FROM comment 
                WHERE fortype='demo' AND mark='up'
                GROUP BY forid
                ) AS up ON demo.did = up.did
            LEFT JOIN (
                SELECT forid AS did, COUNT(*) AS count
                FROM comment 
                WHERE fortype='demo' AND mark='down'
                GROUP BY forid
                ) AS down ON demo.did = down.did
            LEFT JOIN (
                SELECT forid AS did, COUNT(*) AS count
                FROM comment 
                WHERE fortype='demo' AND `text` is not null
                GROUP BY forid
                ) AS cmtnum ON demo.did = cmtnum.did
            LEFT JOIN (
                SELECT cid, forid AS did, user.nickname, user.portrait, `text`, comment.ctime
                FROM comment 
                LEFT JOIN user ON comment.uid = user.uid 
                WHERE fortype='demo' AND `text` is not null
                ORDER BY comment.ctime 
                LIMIT 1
                ) AS fircmt ON demo.did = fircmt.did
            LEFT JOIN (
                SELECT cid, forid AS did, user.nickname, user.portrait, `text`, comment.ctime
                FROM comment 
                LEFT JOIN user ON comment.uid = user.uid 
                WHERE fortype='demo' AND `text` is not null
                ORDER BY comment.ctime DESC 
                LIMIT 1
                ) AS lstcmt ON demo.did = lstcmt.did
            LEFT JOIN user ON task.uid = user.uid
            WHERE demo.status='hangup' AND (task.uid=? OR task.fromuid=? OR allocate.uid=?)
            ORDER BY commented, demo.ctime DESC
            LIMIT ? , ?";
        $arg = array($uid, $uid, $uid, $uid, $offset, $rows);
        $query = $this->db->query($sql, $arg);
        $demo = $query->result();
        return $demo;
    }

    function getidea($uid, $offset=0, $rows=30)
    {
        $sql = "SELECT 'idea' as category, idea.iid AS forid, idea.gid, user.uid, user.nickname, user.portrait, idea.text, idea.attachment, up.count AS up, down.count AS down, fircmt.nickname AS firname, fircmt.portrait AS firpt, fircmt.text AS fircmt, fircmt.ctime AS firtime, lstcmt.nickname AS lstname, lstcmt.portrait AS lstpt, lstcmt.text AS lstcmt, lstcmt.ctime AS lsttime, cmtnum.count AS cmtnum, idea.ctime, !ISNULL(mycomment.iid) AS commented
            FROM idea
            LEFT JOIN allocate ON idea.gid = allocate.gid
            LEFT JOIN (
                SELECT forid AS iid 
                FROM comment 
                WHERE comment.uid = ? AND fortype='idea'
                ) AS mycomment ON idea.iid = mycomment.iid
            LEFT JOIN (
                SELECT forid AS iid, COUNT(*) AS count
                FROM comment 
                WHERE fortype='idea' AND mark='up'
                GROUP BY forid
                ) AS up ON idea.iid = up.iid
            LEFT JOIN (
                SELECT forid AS iid, COUNT(*) AS count
                FROM comment 
                WHERE fortype='idea' AND mark='down'
                GROUP BY forid
                ) AS down ON idea.iid = down.iid
            LEFT JOIN (
                SELECT forid AS iid, COUNT(*) AS count
                FROM comment 
                WHERE fortype='idea' AND `text` is not null
                GROUP BY forid
                ) AS cmtnum ON idea.iid = cmtnum.iid
            LEFT JOIN (
                SELECT cid, forid AS iid, user.nickname, user.portrait, `text`, comment.ctime
                FROM comment
                LEFT JOIN user ON comment.uid = user.uid 
                WHERE fortype='idea' AND `text` is not null
                ORDER BY comment.ctime 
                LIMIT 1
                ) AS fircmt ON idea.iid = fircmt.iid
            LEFT JOIN (
                SELECT cid, forid AS iid, user.nickname, user.portrait, `text`, comment.ctime
                FROM comment
                LEFT JOIN user ON comment.uid = user.uid
                WHERE fortype='idea' AND `text` is not null
                ORDER BY comment.ctime DESC 
                LIMIT 1
                ) AS lstcmt ON idea.iid = lstcmt.iid
            LEFT JOIN user ON idea.uid = user.uid
            LEFT JOIN comment ON comment.fortype='iid' AND comment.forid=idea.iid
            WHERE allocate.uid=?
            ORDER BY commented, idea.ctime DESC
            LIMIT ? , ?";
        $arg = array($uid, $uid, $offset, $rows);
        $query = $this->db->query($sql, $arg);
        $idea = $query->result();
        return $idea;
    }

    function getlist($uid, $offset=0, $rows=30)
    {
        $demo = $this->getdemo($uid, $offset, $rows);
        $idea = $this->getidea($uid, $offset, $rows);
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
            --$rows;
            if($rows==0) return;
        }
        while($nd){
            array_push($res, $nd);
            $nd = next($demo);
            --$rows;
            if($rows==0) return;
        }
        while($ni){
            array_push($res, $ni);
            $ni = next($idea);
            --$rows;
            if($rows==0) return;
        }
        return $res;
    } 
}