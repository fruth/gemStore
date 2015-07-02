<?php

/**
 * FormHandler is the PHP class that manages data from the AJAX or PHP
 * form
 *
 * @author     Aaron Fruth <me@aaronfruth.com>
 */

class Database {

  private static $username   = "root";
  private static $password   = "barley";
  private static $database   = "gem_store";

  private static $mysql = false;

  public static function connect() {

     # MySQL with PDO_MYSQL
     try {
       $database = self::$database;
       $mysql = new PDO("mysql:host=localhost;dbname=$database", self::$username, self::$password);
       $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
       self::$mysql = $mysql;
       return self::$mysql;
     } catch (PDOException $e) {
       echo 'ERROR';
       echo '<p>' . $e->getMessage() . '<p/>';
       print_r($e);
       return false;
     }
   }

   public static function disconnect() {
     self::$mysql = null;
     return true;
   }

}
