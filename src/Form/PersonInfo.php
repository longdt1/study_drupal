<?php
namespace Drupal\person_info\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\Messenger;
/**
 * Implements form.
 */
class PersonInfo extends FormBase {
/**
 * {@inheritdoc}
 */
  public function getFormId() {
    return 'person_info';
  }
/**
 * {@inheritdoc}
 */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['person_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name:'),
      '#required' => TRUE,
    ];
    $form['person_age'] = [
      '#type' => 'number',
      '#title' => $this->t('Age:'),
    ];
    $form['person_dob'] = [
      '#type' => 'date',
      '#title' => $this->t('Date of Birth:'),
    ];
    $form['person_gender'] = [
      '#type' => 'select',
      '#title' => ('Gender:'),
      '#options' => [
        'Female' => $this->t('Female'),
        'Male' => $this->t('Male'),
        'Other' => $this->t('Other'),
        'Prefer Not Say' => $this->t('Prefer Not Say'),
      ],
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    return $form;
  }
/**
 * {@inheritdoc}
 */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messanger()->addMessage('Here is the information you provided:');
    $this->messanger()->addMessage('Name: ' . $form_state->getValue('person_name'));
    $this->messanger()->addMessage('Name: ' . $form_state->getValue('person_name'));
    $this->messanger()->addMessage('Age: ' . $form_state->getValue('person_age'));
    $this->messanger()->addMessage('Gender: ' . $form_state->getValue('person_gender'));
    $this->messanger()->addMessage('Date of Birth: ' . date("d-m-Y", strtotime($form_state->getValue('person_dob'))));
  }
}
