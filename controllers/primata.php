<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	class PrimataController extends Controller {

		// Construtor executado antes de todos os outros métodos
		public function __construct() {
			// @TODO: Aqui precisa fazer algum tipo de verificação?
			// se sim insira aqui. 
		}

		// executado na url dominio.com.br/conta
		public function index() {
			// @TODO: Mostra o painel inicial com os dados da conta
		}

		// executado na url dominio.com.br/primata/login
		public function login() {
			// @TODO: Aqui deve entrar a página de login e todas e
			// chamar os métodos de login também.
		}

		// executado na url dominio.com.br/primata/logout
		public function logout() {
			// @TODO: Aqui deve entrar a página de login e todas e
			// chamar os métodos de login também.
		}

		// executado na url dominio.com.br/primata/contas
		public function contas() {
			// @TODO: Lista todas as contas de clientes salvas no sistema.
		}

		// executado na url dominio.com.br/primata/deposito/nroConta
		public function deposito($args) {
			// @TODO: Deposita um valor X na conta $nroConta
		}
    	
}
	
