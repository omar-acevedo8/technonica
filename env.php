<?php

	class Connection{

       public static function Connect(){
        $server="localhost";
        $database="techno";
        $user="root";
        $password="";

        //$database="techn869_techno";
        //$user="techn869_root";
        //$password="]puTm;K@gK*e";
        

        $link=new PDO("mysql:host=".$server.";dbname=".$database,$user,$password);
        return $link;
		}

    }

?>