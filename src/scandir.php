<?php

class dir_scan
{

    var $dir;
    var $ext = array();
    var $res = array();

    function __construct($dir, $exts = array(), $rec = true)
    {
        if (!is_string($dir))
            return false;
        $this->dir = $dir;
        if (is_string($exts))
            $exts = explode(',', $exts);
        $this->ext = $exts = array_map('strtolower', $exts);

        if (empty($exts)) {
            if (!$rec) return $this->res = self::glob_standard($dir);
            return $this->res = self::glob_recursive($dir);
        }
        if ($rec) return $this->res = self::glob_recursive($dir, $exts);
        return $this->res = self::glob_standard($dir, $exts);
    }

    static private function glob_standard($dirs, $exts = false)
    {
        if ($exts) {
            $e = $dirs . "/*.{";
            foreach ($exts as $k => $ext) {
                $e .= strtolower($ext) . "," . strtoupper($ext);
                if ($k != count($exts) - 1)
                    $e .= ",";
            }
            $e .= "}";
            return glob($e, GLOB_BRACE);
        }
        return glob($dirs . "/*");
    }

    static private function glob_recursive($dirs, $exts = false)
    {
        $files = self::glob_standard($dirs, $exts);
        foreach (glob($dirs . "/*", GLOB_ONLYDIR) as $dir)
            $files = array_merge($files, self::glob_recursive($dir, $exts));
        return $files;
    }
}
