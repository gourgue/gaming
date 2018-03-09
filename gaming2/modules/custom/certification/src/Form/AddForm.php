<?php
/**
 * @file
 * Contains \Drupal\certification\AddForm.
 */

namespace Drupal\certification;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;

class AddForm extends FormBase {
  protected $id;

  function getFormId() {
    return 'certification_add';
  }

  function buildForm(array $form, FormStateInterface $form_state) {
    $this->id = \Drupal::request()->get('id');
    $certification = BdContactStorage::get($this->id);

    $form['theme'] = array(
      '#type' => 'textfield',
      '#title' => t('theme'),
      '#default_value' => ($certification) ? $certification->theme : '',
    );
    $form['score'] = array(
      '#type' => 'textarea',
      '#title' => t('score'),
      '#default_value' => ($certification) ? $certification->score : '',
    );
    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => ($certification) ? t('Edit') : t('Add'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }


  function submitForm(array &$form, FormStateInterface $form_state) {
    $theme = $form_state->getValue('theme');
    $score = $form_state->getValue('score');
    if (!empty($this->id)) {
      BdContactStorage::edit($this->id, SafeMarkup::checkPlain($theme), SafeMarkup::checkPlain($score));
      \Drupal::logger('certification')->notice('@type: deleted %title.',
          array(
              '@type' => $this->id,
              '%title' => $this->id,
          ));

      drupal_set_message(t('Your score has been edited'));
    }
    else {
      BdContactStorage::add(SafeMarkup::checkPlain($theme), SafeMarkup::checkPlain($score));
      \Drupal::logger('certification')->notice('@type: deleted %title.',
          array(
              '@type' => $this->id,
              '%title' => $this->id,
          ));

      drupal_set_message(t('Your score has been submitted'));
    }
    $form_state->setRedirect('certification_list');
    return;
  }
}
