<?php

namespace Drupal\profile;

use Drupal\Core\Form\FormInterface;

class AddForm implements FormInterface {

  function getFormID() {
    return 'profile_add';
  }

  function buildForm(array $form, array &$form_state) {
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name'),
    );
    $form['Resultats'] = array(
      '#type' => 'textarea',
      '#title' => t('resultat'),
    );
    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Add'),
    );
    return $form;
  }

  function validateForm(array &$form, array &$form_state) {
    /*Nothing to validate on this form*/
  }

  function submitForm(array &$form, array &$form_state) {
    $name = $form_state['values']['name'];
    $resultat = $form_state['values']['resultat'];
    BdContactStorage::add(check_plain($name), check_plain($resultat));
    
    watchdog('profile', 'BD Contact resultat from %name has been submitted.', array('%name' => $name));
    drupal_set_resultat(t('Your resultat has been submitted'));
    $form_state['redirect'] = 'admin/content/profile';
    return;
  }

}