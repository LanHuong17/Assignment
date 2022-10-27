<?php
    class DB{
        private $link;

        function __construct() {
            global $config;
            $this->link = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['data'])
            or die("cannot connect");
            mysqli_query($this->link, "set names 'utf8'");
        }

        function db_query($query)
        {
            $result = mysqli_query($this->link, $query);
            return $result;
        }

        function db_fetch($result)
        {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        
    }
?>