<?php

namespace Drupal\certificationD8;
use Drupal\Core\Database;
//use Drupal\Core\Database\Query\PagerSelectExtender;

class CertificationD8Storage {

  static function getAll() {
   // $result = db_query('SELECT * FROM {certificationD8_table}')->fetchAllAssoc('id');


    $uid = \Drupal::currentUser()->id();
    //$connection = \Drupal::service('database');
    $connection = \Drupal::database();
    $result = $connection->select('certificationD8_table', 'e')
      ->fields(
        'e' , array(
        'id',
        'uid',
        'theme',
        'score',
        'date',
        'certificat_de_validation'
      )
    )
    ->condition('e.uid', $uid)
    ->orderBy('e.date', 'DESC')
    //->range(0, 20)
/*    ->pager('10')
*/ 
    ->execute()
    ->fetchAll();


    //kint($result);exit;

    return $result;
  }


  static function exists($id) {
    return (bool) $this->get($id);
  }

  static function get($id) {
    $result = db_query('SELECT * FROM {certificationD8_table} WHERE id = :id', array(':id' => $id))->fetchAllAssoc('id');
    if ($result) {
      return $result[$id];
    }
    else {
      return FALSE;
    }
  }

  static function add($uid, $theme, $score, $date, $certificat_de_validation) {
    db_insert('certificationD8_table')
    ->fields(
      array(
      'uid' => $uid,
      'theme' => $theme,
      'score' => $score,
      'date' => $date,     
      'certificat_de_validation' => $certificat_de_validation,     
     )
    )->execute();
  }

  static function edit( $id, $uid, $theme, $score, $date,$certificat_de_validation) {
    db_update('certificationD8_table')->fields(array(
      'theme' => $theme,
      'score' => $score,
      'date' => $date,
      'certificat_de_validation' => $certificat_de_validation,
    ))
    ->condition('id', $id)
    ->execute();
  }
  
  static function delete($id) {
    db_delete('certificationD8_table')
    ->condition('id', $id)
    ->execute();
  }
}
