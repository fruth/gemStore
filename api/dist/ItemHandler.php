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
  private $database   = "gemStore";

  // Private function for saving email to MySQL database
  public function getItems($id) {

    $mysql = new mysqli('localhost', $this->username, $this->password, $this->database);

    if ($mysql->connect_error) {
      die("Connection failed: " . $mysql->connect_error);
    }

    $sql = "SELECT * FROM items WHERE id=" . $id . " LIMIT 1";

    $result = $mysql->query($sql);
    $item = false;

    while ( $db_field = $result->fetch_assoc() ) {
      $item = $db_field;
    }

    $mysql->close();

    return $item;
  }
}
?>
