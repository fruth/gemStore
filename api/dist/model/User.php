<?php

ini_set('error_reporting', E_ALL|E_STRICT);
ini_set('display_errors', 1);

require_once 'Database.php';
require_once 'Order.php';
require_once 'Address.php';


/**
 * FormHandler is the PHP class that manages data from the AJAX or PHP
 * form
 *
 * @author     Aaron Fruth <me@aaronfruth.com>
 */

class User {

  private $id;
  private $email;
  private $orders = array();
  private $admin = false;

  public $data;

  function __construct($email) {
    if ($email) {

      $sql =
<<<SQL
      SELECT * FROM gem_store.user u
      JOIN gem_store.user_auth a JOIN gem_store.user_permissions p
      WHERE u.auth_id = a.id AND u.permission_id = a.id
      AND u.email = '$email';
SQL;

      $db = Database::connect();
      $stmt = $db->query($sql);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $id = $result["id"];
      $this->id = $id;
      $this->email = $result["email"];
      $this->admin = $result["is_admin"];

      $sql =
<<<SQL
      SELECT * FROM gem_store.order o
      WHERE o.user_id = $id;
SQL;

      foreach ($db->query($sql) as $order) {
        $this->orders.push($order);
      }

      Database::disconnect();
      }
  }

  function addOrder() {

  }

  function deleteOrder() {

  }

}

$user = new User('atfruth@gmail.com');
$address = new Address();

$address->create(
  1,
  'Aaron Fruth',
  '808 Williamson St',
  '207',
  'Madison',
  'WI',
  'USA',
  53703
);


print_r($address);
?>
