<?php

	class Connection{

       public static function Connect(){
        $server="localhost";
        $database="techno";
        $user="root";
        $password="";

        //$database="recursoi_nc";
        //$user="recursoi_demo";
        //$password="wh*l2u=CLhtO";
        //yCHr[3rpo;Rg

        $link=new PDO("mysql:host=".$server.";dbname=".$database,$user,$password);
        return $link;
		}

    }

?>