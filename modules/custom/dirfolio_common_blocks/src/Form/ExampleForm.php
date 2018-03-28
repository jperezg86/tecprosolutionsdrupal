<?php 

namespace Drupal\dirfolio_common_blocks\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;


/**
 * Implements an example form.
 */
class ExampleForm extends FormBase {
	/**
   * {@inheritdoc}
   */
	public function getFormId() {
	    return 'example_form';
	}

	/**
   	* {@inheritdoc}
   	*/
	public function buildForm(array $form, FormStateInterface $form_state) {

		$form['nombre'] = array(
		  '#type' => 'textfield',
		  '#title' => $this->t('Nombre'),
		);

		$form['container']['output'] = [
		  '#type' => 'textfield',
		  '#size' => '60',
		  '#disabled' => TRUE,
		  '#value' => 'Hello, World!',
		  '#attributes' => [
		    'id' => ['edit-output'],
		  ],
		];

		$form['actions']['#type'] = 'actions';
		$form['actions']['submit'] = array(
		  '#type' => 'submit',
		  '#value' => $this->t('Save'),
		  '#button_type' => 'primary',
		  '#ajax' => array(
		  	'callback' => '::sayHello',
		  )
		);

		return $form;
	}


	public function sayHello(array $form, FormStateInterface $form_state) {
		// $response = new AjaxResponse();
		$elem = [
		    '#type' => 'textfield',
		    '#size' => '60',
		    '#disabled' => TRUE,
		    '#value' => 'Hello, ' . $form_state->getValue('nombre') . '!',
		    '#attributes' => [
		      'id' => ['edit-output'],
		    ],
		  ];

		  $renderer = \Drupal::service('renderer');
		  $response = new AjaxResponse();
		  $response->addCommand(new ReplaceCommand('#edit-output', $renderer->render($elem)));
		  return $response;
	}


  	/**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }


	 /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}