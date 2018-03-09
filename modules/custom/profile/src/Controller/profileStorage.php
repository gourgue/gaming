<?php

namespace Drupal\profile;

class profileStorage {

  static function getAll() {
    $result = db_query('SELECT * FROM {profile}')->fetchAllAssoc('id');
	return $result;
  }

  static function exists($id) {
    $result = db_query('SELECT 1 FROM {profile} WHERE id = :id', array(':id' => $id))->fetchField();
    return (bool) $result;
  }

  static function add($name, $resultat) {
    db_insert('profile')->fields(array(
	'name' => $name,
	'resultat' => $resultat,	
	))->execute();
  }

  static function delete($id) {
    db_delete('profile')->condition('id', $id)->execute();
  }

}