<?php
/**
 * Example payments Controller
 *
 * @category 	erdiko
 * @package   	payments
 * @copyright	Copyright (c) 2014, Arroyo Labs, www.arroyolabs.com
 * @author 		John Arroyo, john@arroyolabs.com
 */
namespace erdiko\payments\controllers;

/**
 * Example Controller Class
 */
class Payments extends \erdiko\core\Controller
{
	/** Before */
	public function _before()
	{
		$this->setThemeName('bootstrap');
		$this->prepareTheme();
	}

	/**
	 * Get
	 *
	 * @param mixed $var
	 * @return mixed
	 */
	public function get($var = null)
	{
		// error_log("var: $var");
		if(!empty($var))
		{
			// load action based off of naming conventions
			return $this->_autoaction($var, 'get');

		} else {
			return $this->getIndex();
		}
	}

	/**
	 * Homepage Action (index)
	 */
	public function getIndex()
	{	
		// Add page data
		$this->setTitle('Examples');
		$this->addView('examples/index');
	}

	// /**
	//  * Drupal example
	//  */
	// public function getNode()
	// {
	// 	$node = new \erdiko\drupal\models\Node;
	// 	$post = $node->getNode(1);

	// 	$content = \drupal_render(\node_view($post));
	// 	$content .= "<pre>".print_r($post, true)."</pre>";

	// 	$this->setContent( $content );
	// }

	// public function getView($viewName, $data = NULL, $templateRootFolder = NULL)
	// {
	// 	$view = new \erdiko\drupal\models\View;
	// 	$nodes = $view->getView("demo_view", "page");

	// 	$this->setContent( $nodes );
	// }

	/**
	 * Get Braintree
	 */
	public function getBraintreeDemo()
	{
		//$data = \Erdiko::getConfig("application/default");
		$this->setTitle('Braintree');
		$this->setContent( $this->getLayout('braintree', null) );
	}

	public function getBraintree()
	{
		\Braintree_Configuration::environment('sandbox');
		\Braintree_Configuration::merchantId('7hpjkb4p49nb7ntf');
		\Braintree_Configuration::publicKey('8k5sw2c7crsmfj97');
		\Braintree_Configuration::privateKey('58bd528ee8fe66091d0afc63db67ede4');

		//For existing customers
		// $clientToken = \Braintree_ClientToken::generate(array(
		//     "customerId" => $aCustomerId
		// ));

		$clientToken = \Braintree_ClientToken::generate();

		//var_dump($clientToken);

		//$this->setTitle('Braintree');
		//$this->setContent( $this->getLayout('braintree', null) );

		$this->setTitle('Braintree');

		// Set columns directly using a layout
		$columns = array(
			'one' => $this->getView('payments/braintree', null, dirname(__DIR__)),
		);
		$this->setContent( $this->getLayout('1column', $columns) );
	}

	public function postBraintree()
	{
		// \Braintree_Configuration::environment('sandbox');
		// \Braintree_Configuration::merchantId('7hpjkb4p49nb7ntf');
		// \Braintree_Configuration::publicKey('8k5sw2c7crsmfj97');
		// \Braintree_Configuration::privateKey('58bd528ee8fe66091d0afc63db67ede4');
		var_dump($_POST);
		$nonce = $_POST["payment_method_nonce"];
		//var_dump($clientToken);

	}

	/**
	 * Get Braintree
	 */
	public function getCheckout()
	{
		//var_dump($_POST);
		//$nonce = $_POST["payment_method_nonce"];
		//var_dump($nonce);

		$result = \Braintree_Transaction::sale(array(
		  'amount' => '100.00',
		  'paymentMethodNonce' => 'nonce-from-the-client'
		));
		//$this->setTitle('Braintree');
		//$this->setContent( $this->getLayout('braintree', null) );
	}

	/**
	 * Get Braintree
	 */
	public function postCheckout()
	{
		var_dump($_POST);
		$nonce = $_POST["payment_method_nonce"];
		var_dump($nonce);

		$result = \Braintree_Transaction::sale(array(
		  'amount' => '100.00',
		  'paymentMethodNonce' => 'nonce-from-the-client'
		));
		//$this->setTitle('Braintree');
		//$this->setContent( $this->getLayout('braintree', null) );
	}
}