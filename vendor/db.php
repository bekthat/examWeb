<?php
        $connect = mysqli_connect('localhost', 'root','','exam');
        if(!$connect){
            die('Database connect error!');
        }