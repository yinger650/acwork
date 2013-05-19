<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Comment_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    public function post($uid, $fortype, $forid, $content)
    {
        $sql = "INSERT INTO comment (uid, fortype, forid, `text`) VALUES (?, ?, ?, ?)";
        $arg = array($uid, $fortype, $forid, $content);
        $query = $this->db->query($sql, $arg);
    }

    public function mark($uid, $fortype, $forid, $mark)
    {
        $sql = "INSERT INTO comment (uid, fortype, forid, mark) VALUES (?, ?, ?, 'up')";
        $arg = array($uid, $fortype, $forid, $mark);
        $query = $this->db->query($sql, $arg);
    }

    public function getcmt($fortype, $forid)
    {
        $sql = "SELECT cid, comment.uid, user.nickname, user.portrait, fortype, forid, `text`, comment.ctime 
            FROM comment 
            LEFT JOIN user ON user.uid=comment.uid
            WHERE fortype=? AND forid=? AND `text` IS NOT NULL";
        $arg = array($fortype, $forid);
        $query = $this->db->query($sql, $arg);
        $res = $query->result();
        return $res;
    }

    public function getmark($fortype, $forid)
    {
        $sql = "SELECT up.count AS up, down.count AS down
            FROM (
                SELECT count(cid) AS count FROM comment
                WHERE fortype=? AND forid=? AND mark='up'
                ) AS up
            FULL JOIN (
                SELECT count(cid) AS count FROM comment
                WHERE fortype=? AND forid=? AND mark='down'
                ) AS down
            ";
        $arg = array($fortype, $forid, $fortype, $forid);
        $query = $this->db->query($sql, $arg);
        $res = $query->row();
        return $res;
    }

    public function delete($cid)
    {
        $sql = "DELETE FROM comment WHERE cid=?";
        $arg = array($cid);
        $query = $this->db->query($sql, $arg);
    }
}
