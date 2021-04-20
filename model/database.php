<?php
    class Database {

        //Local Host

        private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
        private static $username = 'root';
        private static $password = '';
        private static $db;

        // Heroku
        // private static $dsn = 'mysql:host=pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=ez2l6u3r54ymqutp';
        // private static $username = 'p150fq4ifinpynp8';
        // private static $password = 'exnepud0kjhji489';
        // private static $db;


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