<?php

class dir_scan {
    
    var $dirpr = array();
    var $ext = array();
    var $res = array();
    var $res_real = array();
    var $err = array();
    var $rec;
    
    function __construct($dir = null, $ext = null, $rec = true, $dir_sep = false) {
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
            $this->search($dr, $dir_sep, $rec);
        }
    }
    
    private function search($dir, $dir_sep, $rec) {
        if ($this->res === false)
            return false;
        $res = array();
        $dir = realpath($dir);
        if ($rec) {
            if (is_dir($dir) === true) {
                $dirs = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS);
                $files = new RecursiveIteratorIterator($dirs, $dir_sep == true ? RecursiveIteratorIterator::SELF_FIRST : 0);
                while ($files->valid()) {
                    if (!empty($this->ext) && is_array($this->ext)) {
                        if (in_array($files->getExtension(), $this->ext)) {
                            $this->res[] = $files->getSubPathname();
                            $this->res_real[] = realpath($files->getPathname());
                        }
                    } else {
                        $this->res[] = $files->getSubPathname();
                        $this->res_real[] = realpath($files->getPathname());
                    }
                    $files->next();
                }
                !empty($this->res) && !empty($this->res_real) ? array_shift($this->res) && array_shift($this->res_real) : "";
            } else if (is_file($dir) === true) {
                $this->res[] = $dir;
                $this->res_real[] = realpath($dir);
            }
        } else {
            if (is_dir($dir) === true) {
                if (!empty($this->ext) && is_array($this->ext))
                    $files = glob($dir . '/*{.' . implode(',.', $this->ext) . '}', GLOB_BRACE);
                else
                    $files = glob($dir . '/*');
                foreach ($files as $file) {
                    $this->res[] = str_replace($dir . '/', '', $file);
                    $this->res_real[] = realpath($file);
                }
            } else if (is_file($dir) === true) {
                $this->res[] = $dir;
                $this->res_real[] = realpath($dir);
            }
        }
    }
}
?>	