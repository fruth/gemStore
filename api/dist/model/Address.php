<?php

class Address {

  private $id;
  private $data;

  public function __construct($data = null) {
    if ($data) {
      $this->id = $data['id'];
      $this->data = $data;
    }
  }

  public function create($userID, $name, $street1, $street2, $city, $state, $country, $zip) {

    $sql =
<<<SQL
    INSERT INTO gem_store.user_address
      (name, street_1, street_2, city, state, country, zip, user_id)
    VALUES
      ('$name', '$street1', '$street2', '$city', '$state', '$country', '$zip', '$userID');
SQL;

    $db = Database::connect();
    $count = $db->exec($sql);
    $this->id = $db->lastInsertId();
    $success = ($count == 1) ? true : false;
    echo "<p>" . $success . ' - ' . $this->id . '</p>';
    Database::disconnect();
    return $success;
  }

  public function delete() {

    $id = $this->id;
    $sql =
<<<SQL
    DELETE FROM gem_store.user_address o
    WHERE o.id = $id;
SQL;

    $db = Database::connect();
    $success = $db->exec($sql);
    Database::disconnect();
    return $success;
  }
}
