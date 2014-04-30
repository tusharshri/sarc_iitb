<?php
  class Connection {
    private $server = "admin.sarc-iitb.org";
    private $username = "sarciitborg";
    private $password = "j@g@njyoti";
    private $database = "phonathon_23";

/*        private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "phonathon_14";
*/
    private $conn;
    private $debug_mode = true;
    private $die_message = "Sorry, there seems to be some error. This error has been noted and will be corrected soon.";
    private function die_message ($query, $message = false) {
      if ($this->debug_mode) {
        $error = mysql_error();
        $_SESSION ['mysqlerror'] = "Query: $query" . $error;
        return "Query: $query" . $error;
      }
      else {
        if ($message === false) echo $this->die_message;
        echo message;
      }
    }
    public function __construct () {
      $this->conn = mysql_connect ($this->server, $this->username, $this->password);
      mysql_select_db($this->database);
    }
    public function __destruct() {
      mysql_close ($this->conn);
    }
    private function exec_query ($query) {
      //echo $query;
      //$_SESSION['check'] = $query;
      $res = mysql_query($query) or die ($this->die_message($query));
      return $res;
    }
    public function get_array ($query, $array = NULL) {
      $res_array = array();
      $pq = $this->run_query ($query, $array);
      while ($pqa = mysql_fetch_array ($pq)) {
        array_push ($res_array, $pqa);
      }
      return $res_array;
    }
    private function escape_string ($string) {
      if (get_magic_quotes_gpc()) $string = stripslashes($string);
      return mysql_real_escape_string ($string);
    }
    public function run_query ($query, $args = NULL) {
      $qp = explode("?",$query);
      foreach ($qp as $i=>$p) {
        if ($i == 0) $cq = $qp[0];
        else {
          $cq .= "'" . $this->escape_string ($args[$i-1]) . "'" . $p;
        }
      }
      return $this->exec_query ($cq);
    }
    public function get_list($table, $inXML = false) {
      $query = "SELECT * FROM $table";
      if ($inXML) return get_xml ($query);
      else return $this->get_array ($query);
    }
    
    public function get_grouped_array ($query, $groupby = NULL) {
      if (!$groupby) return $this->get_array($query);
      $res_array = array();
      $pq = $this->run_query ($query, $array);
      while ($pqa = mysql_fetch_array ($pq)) {
        $group = array();
        foreach ($groupby as $arg) {
          array_push ($group, $pqa[$arg]);
        }
        $group = implode("_",$group);
        //if (! array_key_exists ($group, $res_array)) $res_array[$group] = array();
        $res_array[$group] = $pqa;
      }
      return $res_array;
    }
  }
?>
