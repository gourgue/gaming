<?php

/*namespace Drupal\certification_d8\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\user\UserInterface;

class DeleteCertificationForm extends ConfirmFormBase {
  protected $id;

  public function getFormId() {
    return 'certification_d8_delete';
  }

  public function getQuestion() {
    return t('Are you sure you want to delete submission %id?', array('%id' => $this->id));
  }

  public function getConfirmText() {
    return t('Delete');
  }

  public function getCancelUrl() {
    return new Url('user.certifications.dashboard');
  }

  public function buildForm(array $form, FormStateInterface $form_state, UserInterface $user) {
    $this->id = \Drupal::request()->get('id');
    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    CertifStorage::delete($this->id);
    //watchdog('certification_d8', 'Deleted BD Contact Submission with id %id.', array('%id' => $this->id));
    \Drupal::logger('certification_d8')->notice('@type: deleted %title.',
        array(
            '@type' => $this->id,
            '%title' => $this->id,
        ));
    drupal_set_message(t('BD Contact submission %id has been deleted.', array('%id' => $this->id)));
    $form_state->setRedirect('user.certifications.dashboard');
  }
}
*/