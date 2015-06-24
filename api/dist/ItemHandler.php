<?php

/**
 * FormHandler is the PHP class that manages data from the AJAX or PHP
 * form
 *
 * @author     Aaron Fruth <me@aaronfruth.com>
 */

class ItemHandler {

  private $username   = "root";
  private $password   = "barley";
  private $database   = "gem_store";

  // Private function for saving email to MySQL database
  public function getItems($id = 0) {

    $mysql = new mysqli('localhost', $this->username, $this->password, $this->database);

    if ($mysql->connect_error) {
      die("Connection failed: " . $mysql->connect_error);
    }

    if ($id !== 0) {
      $sql = "SELECT * FROM items WHERE slug='" . $id . "' LIMIT 1";
      $result = $mysql->query($sql);
      $items;
      while ( $db_field = $result->fetch_assoc() ) {
        $items = $db_field;
      }
    } else {
      $sql = "SELECT * FROM items";
      $result = $mysql->query($sql);

      $items = array();

      while ( $db_field = $result->fetch_assoc() ) {
        array_push($items, $db_field);
      }
    }

    $mysql->close();

    return $items;
  }

}
?>
