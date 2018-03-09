<?php

namespace Drupal\certificationD8;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class DeleteForm extends ConfirmFormBase {
  protected $id;

  function getFormId() {
    return 'certificationD8_delete';
  }

  function getQuestion() {
    return t('Are you sure you want to delete submission %id?', array('%id' => $this->id));
  }

  function getConfirmText() {
    return t('Delete');
  }

  function getCancelUrl() {
    return new Url('certificationD8_list');
  }

  function buildForm(array $form, FormStateInterface $form_state) {
    $this->id = \Drupal::request()->get('id');
    return parent::buildForm($form, $form_state);
  }

  function submitForm(array &$form, FormStateInterface $form_state) {
    certificationD8tStorage::delete($this->id);
    //watchdog('certificationD8', 'Deleted certification D8 Submission with id %id.', array('%id' => $this->id));
    \Drupal::logger('certificationD8')->notice('@type: deleted %title.',
        array(
            '@type' => $this->id,
            '%title' => $this->id,
        ));
    drupal_set_message(t('certification D8 submission %id has been deleted.', array('%id' => $this->id)));
    $form_state->setRedirect('certificationD8_list');
  }
}
