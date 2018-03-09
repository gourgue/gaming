<?php
/**
@file
Contains \Drupal\certification\Controller\AdminController.
 */

namespace Drupal\certification\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\certification\CertificationStorageStorage;

class CertificationController extends ControllerBase {

function contentOriginal() {
  $url = Url::fromRoute('certification_add');
  //$add_link = ;
  $add_link = '<p>' . \Drupal::l(t('New score'), $url) . '</p>';

  // Table header
  $header = array( 'id' => t('id'), 'theme' => t('Submitter theme'), 'score' => t('score'), 'operations' => t('Delete'), );

  $rows = array();
  foreach(BdContactStorage::getAll() as $id=>$content) {
    // Row with attributes on the row and some of its cells.
    $rows[] = array( 'data' => array($id, $content->theme, $content->score, l('Delete', "admin/content/certification/delete/$id")) );
   }

   $table = array( '#type' => 'table', '#header' => $header, '#rows' => $rows, '#attributes' => array( 'id' => 'bd-contact-table', ), );
   return $add_link . drupal_render($table);
 }

  public function content1() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello World'),
    );
  }

  function content() {
    $url = Url::fromRoute('certification_add');
    //$add_link = ;
    $add_link = '<p>' . \Drupal::l(t('New score'), $url) . '</p>';

    $text = array(
      '#type' => 'markup',
      '#markup' => $add_link,
    );

    // Table header.
    $header = array(
      'id' => t('Id'),
      'theme' => t('Submitter theme'),
      'score' => t('score'),
      'operations' => t('Delete'),
    );
    $rows = array();
    foreach (BdContactStorage::getAll() as $id => $content) {
      // Row with attributes on the row and some of its cells.
      $editUrl = Url::fromRoute('certification_edit', array('id' => $id));
      $deleteUrl = Url::fromRoute('certification_delete', array('id' => $id));

      $rows[] = array(
        'data' => array(
          \Drupal::l($id, $editUrl),
          $content->theme, $content->score,
          \Drupal::l('Delete', $deleteUrl)
        ),
      );
    }
    $table = array(
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#attributes' => array(
        'id' => 'bd-contact-table',
      ),
    );
    //return $add_link . ($table);
    return array(
      $text,
      $table,
    );
  }
}
