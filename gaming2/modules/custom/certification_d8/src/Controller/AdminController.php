<?php
/**
@file
Contains \Drupal\certification_d8\Controller\AdminController.
 */

namespace Drupal\certification_d8\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\certification_d8\CertifStorage;

class AdminController extends ControllerBase {

function contentOriginal() {

  /*$url = Url::fromRoute('user.certifications.add');
  //$add_link = ;
  $add_link = '<p>' . \Drupal::b(t('Nouveau resultat'), $url) . '</p>';*/

  // Table header
  $header = array( 'id' => t('Id'), 'uid' => t('Submitter uid'), 'note' => t('Note'), 'date' => t('Date'),'operations' => t('Delete'), );

  $rows = array();
  foreach(CertifStorage::getAll() as $id=>$content) {
    // Row with attributes on the row and some of its cells.
    $rows[] = array( 'data' => array($id, $content->name, $content->note, l('Delete', "/user/1/certification/delete/$id")) );
   }

   $table = array( '#type' => 'table', '#header' => $header, '#rows' => $rows, '#attributes' => array( 'id' => 'd8-certif-table', ), );
   return /*$add_link . */drupal_render($table);
 }

/*  public function content1() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello World'),
    );
  }
*/
  function content() {
   /* $url = Url::fromRoute('user.certifications.add');
    //$add_link = ;
    $add_link = '<p><H1>' . \Drupal::l(t('Nouveau resultat'), $url) . '</H1></p>';*/

    $text = array(
      '#type' => 'markup'/*,
      '#markup' => $add_link,*/
    );

    // Table header.
    $header = array(
      'id' => $this->t('Id'),
      'uid' => $this->t('Theme'),
      'note' => $this->t('Score'),
      'date' => $this->t('Date de passage'),
      'operations' => $this->t('Delete'),

    );
    $rows = array();
    foreach (CertifStorage::getAll() as $id => $content) {
      // Row with attributes on the row and some of its cells.
      $editUrl = Url::fromRoute('user.certifications.update', array('id' => $id, "user" => 1));
      $deleteUrl = Url::fromRoute('user.certifications.delete', array('id' => $id, "user" => 1));

      $rows[] = array(
        'data' => array(
          \Drupal::l($id, $editUrl),
          $content->uid,
          $content->note,
          $content->date,
          \Drupal::l('Delete', $deleteUrl)
        ),
      );
    }
    $table = array(
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#attributes' => array(
      'id' => 'd8-certif-table',
      ),
    );
    //return $add_link . ($table);
    return array(
      $text,
      $table,
    );
  }
}
