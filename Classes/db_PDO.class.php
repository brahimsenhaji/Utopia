<?php

 class Db_PDO_Handler{

    protected function PDOconnect(){
        try{
            $username = 'root';
            $password = '';
            $dbh = new PDO('mysql:host=localhost:3307;dbname=utopia_website', $username, $password);
            return $dbh;
        }catch(PDOException $e){
            print "Error!:". $e->getMessage() . '<br/>';
            die();
        }
    }
 }