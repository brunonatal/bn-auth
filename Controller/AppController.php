<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	//STA ADD COMPONENTS
	public $components = array('Session', 'Auth');
	//END ADD COMPONENTS
	
	//STA SE VERIFICA PREFIXO
	protected function _isPrefix($prefix) {
		return isset($this->params['prefix']) &&
		$this->params['prefix'] === $prefix;
	}
	//END SE VERIFICA PREFIXO
	
	
	//STA ACAO DEPOIS DO VERIFICAR O PREFIXO
	public function beforeFilter() {
		
		//STA SE ESTA NO PAINEL
		if ($this->_isPrefix('painel')){
			$this->layout = 'backend'; 
			return parent::beforeFilter();
		
		$this->Auth->authenticate = array('Form' => array(
			'userModel' => 'Usuario',
				'fields' => array(
				'username' => 'usuario',
				'password' => 'senha')));
				
		$this->Auth->loginAction = array(
			'controller' => 'usuarios',
			'action' => 'login',
			'painel' => true);
		}
		//END SE ESTA NO PAINEL
		
		//STA SE ACESSO FOR DIFERENTE DE PAINEL PODE ACESSAR
		if (!$this->_isPrefix('painel')){
			$this->Auth->allow();
		}
		//END SE ACESSO FOR DIFERENTE DE PAINEL PODE ACESSAR
	}
	//END ACAO DEPOIS DO VERIFICAR O PREFIXO
	
}
