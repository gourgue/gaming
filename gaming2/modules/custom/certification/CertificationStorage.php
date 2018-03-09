<?php

namespace Drupal\certification;

class BdContactStorage {

  static function getAll() {
    $result = db_query('SELECT * FROM {certification}')->fetchAllAssoc('id');
    return $result;
  }

  static function exists($id) {
    return (bool) $this->get($id);
  }

  static function get($id) {
    $result = db_query('SELECT * FROM {certification} WHERE id = :id', array(':id' => $id))->fetchAllAssoc('id');
    if ($result) {
      return $result[$id];
    }
    else {
      return FALSE;
    }
  }

  static function add($name, $message) {
    db_insert('certification')->fields(array(
      'name' => $name,
      'message' => $message,
    ))->execute();
  }

  static function edit($id, $name, $message) {
    db_update('certification')->fields(array(
      'name' => $name,
      'message' => $message,
    ))
    ->condition('id', $id)
    ->execute();
  }
  
  static function delete($id) {
    db_delete('certification')->condition('id', $id)->execute();
  }
}
