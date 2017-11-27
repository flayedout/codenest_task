<?php

  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('export_helper')){
    function export_helper($data = null){
        if($data !== null && !empty($data)) {
            function filterData(&$str)
            {
                $str = preg_replace("/\t/", "\\t", $str);
                $str = preg_replace("/\r?\n/", "\\n", $str);
                if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
            }
            $fileName = "tasks".sha1(rand(0,10)) . date('Ymd') . ".xls";
            header("Content-Disposition: attachment; filename=\"$fileName\"");
            header("Content-Type: application/vnd.ms-excel");

            $flag = false;
            foreach($data as $row) {
                if(!$flag) {
                    // display column names as first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $flag = true;
                }
                // filter data
                array_walk($row, 'filterData');
                echo implode("\t", array_values($row)) . "\n";

            }
        }else{
            redirect('/mylists');
        }
    }
}
if ( ! function_exists('sanitize')){
    function sanitize($input){
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = htmlentities($input);
        $input = strip_tags($input);
        $input = addslashes($input);
        return $input;
    }
}

