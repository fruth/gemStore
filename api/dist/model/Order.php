<?php

class Order {

  private $id;
  private $data;

  public function __construct($data) {
    if ($data) {
      $this->id = $data['id'];
      $this->data = $data;
    }
  }

  public function create($total) {

    $sql =
<<<SQL
    INSERT INTO gem_store.order(total)
    VALUES ($total);
SQL;

    $db = Database::connect();
    $count = $db->exec($sql);
    $success = ($count == 1) ? true : false;

    Database::disconnect();
    return $success;
  }

  public function delete() {

    $id = $this->id;
    $sql =
<<<SQL
    DELETE FROM gem_store.order o
    WHERE o.id = $id;
SQL;

    $db = Database::connect();
    $success = $db->exec($sql);
    Database::disconnect();
    return $success;
  }
}
