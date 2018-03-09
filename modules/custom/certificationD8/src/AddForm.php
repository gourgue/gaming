<?php
/**
 * @file
 * Contains \Drupal\certificationD8\AddForm.
 */

namespace Drupal\certificationD8;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;

class AddForm extends FormBase {
  protected $id;

  function getFormId() {
    return 'certificationD8_add';
  }

  function buildForm(array $form, FormStateInterface $form_state) {
    $this->id = \Drupal::request()->get('id');
    $certificationD8 = CertificationD8Storage::get($this->id);

    $form['theme'] = array(
      '#type' => 'select',
      '#title' => $this->t('Themes'),
      '#options' => array(
        'webmaster' => $this->t('Webmaster'),
        'themer' => $this->t('Themer'),
        'developpement' => $this->t('Developpement'),
        'expert' => $this->t('Expert'),
     ),
   );
/*  kint('titi');exit;*/
    $form['score'] = array(
      '#type' => 'number',
      '#title' => t('Score'),
      '#min' => 0,
      '#max' => 100,
      '#default_value' => ($certificationD8) ? $certificationD8->score : 0,

    );

    $form['date'] = array(
      '#type' => 'date',
      '#title' => $this->t('Date de passage'),
      '#default_value' => date('d-m-Y'),
      '#max' => date('Y-m-d'),
    );

    $form['certificat_de_validation'] = array(
      '#type' => 'managed_file',
      '#name' => 'certificat_de_validation',
      '#title' => t('certificat de validation'),
      '#size' => 20,
      '#description' => t('format PDF uniquement'),
      '#upload_validators' => $validators,
      '#upload_location' => 'public://',
    );

    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => ($certificationD8) ? t('Editer') : t('Ajouter'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {


  }


  function submitForm(array &$form, FormStateInterface $form_state) {
    $uid = $form_state->getValue('uid');
    $theme = $form_state->getValue('theme');
    $score = $form_state->getValue('score');
    $date = $form_state->getValue('date');
    $date = strtotime($date);
    $certificat_de_validation = $form_state->getValue('certificat_de_validation')[0];

    if (!empty($this->id)) {
      CertificationD8Storage::edit($this->id,
      SafeMarkup::checkPlain($uid),
      SafeMarkup::checkPlain($theme), 
      SafeMarkup::checkPlain($score),
      SafeMarkup::checkPlain($date),
      SafeMarkup::checkPlain($certificat_de_validation));
      \Drupal::logger('certificationD8')->notice('@type: deleted %title.',
          array(
              '@type' => $this->id,
              '%title' => $this->id,
      ));

      drupal_set_message(t('Your score has been edited'));
    }
    else {
      $uid = \Drupal::currentUser()->id();
        CertificationD8Storage::add(
        SafeMarkup::checkPlain($uid),
        SafeMarkup::checkPlain($theme),
        SafeMarkup::checkPlain($score),
        SafeMarkup::checkPlain($date),
        SafeMarkup::checkPlain($certificat_de_validation));

        \Drupal::logger('certificationD8')
        ->notice('@type: deleted %title.',
          array(
              '@type' => $this->id,
              '%title' => $this->id,
      ));
  
      drupal_set_message(t('Your score has been submitted'));
    }
    $form_state->setRedirect('certificationD8_list',[
      'user' => \Drupal::currentUser()->id()
    ]
  );
    return;
  }
}
