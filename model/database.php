<?php
    class Database {
        private static $dsn = 'mysql:host=g84t6zfpijzwx08q.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=zsoacbo8t52k0we8';
        private static $username = 'um65gkttlf3d0tct';
        private static $password = 't0q4zhu1m9wz3yio';
        private static $db;


        private function __construct() {}

        public static function getDB() {
            if(!isset(self::$db)) {
                try {
                    self::$db = new PDO(
                    self::$dsn,
                    self::$username,
                    self::$password);
                } catch(PDOException $e) {
                    $error = $e->getMessage();
                    include('view/error.php');
                    exit();
                }
            }
            return self::$db;
        }

    }




// Local Host
    // $dsn = 'mysql:host=g84t6zfpijzwx08q.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=zsoacbo8t52k0we8';
    // $username = 'um65gkttlf3d0tct';
    // $password = 't0q4zhu1m9wz3yio';


    //Old Heroku

    // $dsn = 'mysql:host=dt3bgg3gu6nqye5f.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=qg5x767ae80na8fk';
    // $username = 'swy15zsjmy8cb2f1';
    // $password = 'tzyfvmzyo70ieubf';

    // try
    // {
    //     $db = new PDO($dsn,$username,$password);
    // } catch (PDOException $e)
    // {
    //     $error = "Database error: ";
    //     $error .= $e -> getMessage();
    //     include('view/error.php');
    //     exit();
    // }
    