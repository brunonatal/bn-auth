<?php
	class UsuariosController extends AppController {
		
		
		// STA FUNCAO LOGIN PAINEL
		public function painel_login() {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Dados incorretos!');
			}
		}
		// END FUNCAO LOGIN PAINEL
		
		// STA FUNCAO LOGOUT PAINEL
		public function painel_logout() {
			$this->redirect($this->Auth->logout());
		}
		// END FUNCAO LOGOUT PAINEL
		
		// STA MONTA DASHBOARD
		public function painel_dashboard() {

		}
		// END MONTA DASHBOARD
		
}	
?>