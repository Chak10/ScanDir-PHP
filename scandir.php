<?php

class dir_scan {
    
    var $dirpr = array();
    var $ext = array();
    var $res = array();
    var $err = array();
    var $rec;
    
    function __construct($dir = null, $ext = null, $rec = true) {
        if (is_string($dir)) {
            $dir = explode(',', $dir);
        }
        if (is_array($dir)) {
            foreach ($dir as $d) {
                if (is_dir($d)) {
                    $this->dirpr[] = $d;
                } else {
                    $this->err[] = "($d) not is a dir";
                }
            }
        }
        empty($this->dirpr) ? $this->res = false : '';
        if (is_array($ext)) {
            $ext = array_map('strtolower', $ext);
            $this->ext = $ext;
        } elseif (is_string($ext)) {
            $ext = explode(',', $ext);
            $ext = array_map('strtolower', $ext);
            $this->ext = $ext;
        }
        $this->rec = $rec;
        foreach ($this->dirpr as $dr) {
           $this->search($dr);
        }
        
    }
    
    private function search($dir) {
        if ($this->res === false)
            return false;
        $res = array();
        $root = scandir($dir);
        foreach ($root as $v) {
            if ($v === '.' || $v === '..')
                continue;
            if (is_file($dir . DIRECTORY_SEPARATOR . $v)) {
                if (is_array($this->ext) && !empty($this->ext)) {
                    foreach ($this->ext as $ext) {
                        $extinfo = pathinfo($v, PATHINFO_EXTENSION);
                        in_array($extinfo, $this->ext) && !in_array($dir . DIRECTORY_SEPARATOR . $v, $res) ? $this->res[] =  $res[] = $dir . DIRECTORY_SEPARATOR . $v : '';
                    }
                } else {
                   $this->res[] =  $res[] = $dir . DIRECTORY_SEPARATOR . $v;
                }
                continue;
            }
            if ($this->rec == true) {
                foreach ($this->search($dir . DIRECTORY_SEPARATOR . $v) as $vx) {
                   $this->res[] =  $res[] = $vx;
                }
            }
        }
        return $res;
    }
}

?>