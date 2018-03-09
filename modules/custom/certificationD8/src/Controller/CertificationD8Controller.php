<?php
/**
@file
Contains \Drupal\certificationD8\Controller\CertificationD8Controller.
 */

namespace Drupal\certificationD8\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\certificationD8\CertificationD8Storage;
use Drupal\file\Entity\File;

class CertificationD8Controller extends ControllerBase {
  //kint('hello');die;

function contentOriginal() {
  $url = Url::fromRoute('certificationD8_add');
/*  $nodeId = \Drupal::routeMatch()->getParameter('node')->id();
  $nodeType = \Drupal::routeMatch()->getParameter('node')=='certificationD8';
   'user' => \Drupal::currentUser()->id();*/


  //$add_link = ;
  $add_link = '<p>' . \Drupal::l(t('New score'), $url) . '</p>';

  // Table header
  $header = array( 
    'id' => t('Id'), 
      'uid' => t('Uid'), 
      'theme' => t('Theme'), 
      'score' => t('Score'), 
      'date' => t('Date'), 
      'certificat_de_validation' => t('Justificatif'), 
      'operations' => t('Delete'),);

  $rows = array();
  foreach(CertificationD8Storage::getAll() as $id=>$content) {
    // Row with attributes on the row and some of its cells.
    $rows[] = array( 'data' => array(
      $content->id, 
      $content->theme, 
      $content->score, 
      $content->sdate,l('Delete', "admin/content/certificationD8/delete/$id")) );
   }

   $table = array( '#type' => 'table', '#header' => $header, '#rows' => $rows, '#attributes' => array( 'id' => 'bd-contact-table', ), );
   return $add_link . drupal_render($table);
 }


  public function content() {
    $url = Url::fromRoute('certificationD8_add');
    //$add_link = ;
    $add_link = '<p>' . \Drupal::l(t('Entrer un nouveau score'), $url) . '</p>';

    $text = array(
      '#type'      => 'markup',
      '#markup'    => $add_link,
    );

    // Table header.
    $header = array(
      /*'id'                         => t('Id'),
      'uid'                        => t('Uid'),*/
      'theme'                      => t('Theme'),
      'score'                      => t('Score obtenu'),
      'date'                       => t('Date de passage'),
      'certificat_de_validation'   => t('Sertificat'),
      'operations' => t('Delete'),
    );
    $rows = array();
    foreach (CertificationD8Storage::getAll() as $id => $content) {
      // Row with attributes on the row and some of its cells.
      $editUrl = Url::fromRoute('certificationD8_edit', array('id' => $id));
      $deleteUrl = Url::fromRoute('certificationD8_delete', array('id' => $id));

      $url ='';

     if(!empty($content->certificat_de_validation)){

      $file = file_load($content->certificat_de_validation);
      $uri  = $file->get('uri')->value;
      $url  = file_create_url($uri);
      $name = $file->get('filename')->value;
      $lien = Link::fromTextAndUrl('Justificatif',Url::fromUri($url));

      }
     


      $rows[] = array(
        'data' => array(
         /* \Drupal::l($id, $editUrl),
          $content->uid,*/
          $content->theme, 
          $content->score,
          strftime('%A %d %B %Y', $content->date),
         $lien,

          \Drupal::l('Delete', $deleteUrl)
        ),
      );
    }
    $table = array(
      '#type'       => 'table',
      '#header'     => $header,
      '#rows'       => $rows,
      '#attributes' => array(
        'id'        => 'bd-contact-table',
      ),
    );
    //return $add_link . ($table);
    return array(
      $text,
      $table,
    );
  }
}
