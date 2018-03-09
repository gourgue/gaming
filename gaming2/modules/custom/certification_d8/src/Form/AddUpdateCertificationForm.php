<?php
/**
 * @file
 * Contains \Drupal\certification_d8\AddForm.
 */
/*
namespace Drupal\certification_d8\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;

use Drupal\user\UserInterface;

class AddUpdateCertificationForm extends FormBase {
  protected $id;

  public function getFormId() {
    return 'certification_d8_add';
  }*/

/*  public function getTitle(){
    return $this->t("Éditer la certification @theme du @date", 
      array(
        "@name" => "Webmaster", 
        "@date" => "27 février 2018"
      )
    );
  }*/
/*
  public function buildForm(array $form, FormStateInterface $form_state, UserInterface $user) {
    $this->id   = \Drupal::request()->get('id');
    $certification_d8  = CertifStorage::get($this->id);

    $form['theme'] = [
    '#type' => 'select',
    '#title' => $this
      ->t('Theme'),
    '#options' => [
    'Webmaster' => $this->t('Webmaster'),
    'Themer' => $this->t('Themer'),
    'Développement' => $this->t('Développement'),
    'Expert' => $this->t('Expert'),
    ],
  ];

    $form['note'] = array(
      '#type' => 'number',
      '#title' => t('Note'),
      '#default_value' => ($certification_d8) ? $certification_d8->note : '',
    );
    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => ($certification_d8) ? t('Editer') : t('Ajouter'),
    );

    $form['date'] = array(
      '#type' => 'date',
      '#title' => $this
        ->t('Date de passage')
    );
        return $form;
    }*/

  /**
   * {@inheritdoc}
   */
/*  public function validateForm(array &$form, FormStateInterface $form_state) {

  }


  public function submitForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('theme');
    $note = $form_state->getValue('note');
    $date = $form_state->getValue('date');

    if (!empty($this->id)) {
      CertifStorage::edit($this->id, SafeMarkup::checkPlain($name), SafeMarkup::checkPlain($note), SafeMarkup::checkPlain($date));
      \Drupal::logger('certification_d8')->notice('@type: deleted %title.',
          array(
              '@type' => $this->id,
              '%title' => $this->id,
          ));

      drupal_set_message(t('Votre note a été ajouté'));
    }
    else {
      CertifStorage::add(SafeMarkup::checkPlain($name), SafeMarkup::checkPlain($note),  SafeMarkup::checkPlain($date));
      \Drupal::logger('certification_d8')->notice('@type: deleted %title.',
          array(
              '@type' => $this->id,
              '%title' => $this->id,
          ));

      drupal_set_message(t('Le note a été enregistré'));
    }
    $form_state->setRedirect('user.certifications.dashboard');
    return true;
  }


}

*/