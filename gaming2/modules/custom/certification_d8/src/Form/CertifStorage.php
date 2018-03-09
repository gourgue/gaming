<?php

namespace Drupal\certification_d8;

class CertifStorage {

  static function getAll() {
    $result = db_query('SELECT * FROM {certification_d8}')->fetchAllAssoc('id');
    return $result;
  }

  static function exists($id) {
    return (bool) $this->get($id);
  }

  static function get($id) {
    $result = db_query('SELECT * FROM {certification_d8} WHERE id = :id', array(':id' => $id))->fetchAllAssoc('id');
    if ($result) {
      return $result[$id];
    }
    else {
      return FALSE;
    }
  }

  static function add($uid, $note, $date) {
    db_insert('certification_d8')->fields(array(
      'uid' => $uid,
      'note' => $note,
      'date' => $date,
    ))->execute();
  }

  static function edit($id, $uid, $note, $date) {
    db_update('certification_d8')->fields(array(
      'uid' => $uid,
      'note' => $note,
      'date' => $date,
    ))
    ->condition('id', $id)
    ->execute();
  }
  
  static function delete($id) {
    db_delete('certification_d8')->condition('id', $id)->execute();
  }
}
