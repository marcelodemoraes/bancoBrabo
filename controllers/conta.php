<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	class ContaController extends Controller {

		// Construtor executado antes de todos os outros métodos
		public function __construct() {
			// @TODO: Aqui precisa fazer algum tipo de verificação?
			// se sim insira aqui. 
		}

		// executado na url dominio.com.br/conta
		public function index() {
			// A função index() invoca a mesma tela do que a tela de Saldo.
			$this->saldo();
		}

		// executado na url dominio.com.br/conta/extrato
		public function extrato() {
			// @TODO: Página simples que mostra os extratos do mês corrente.
		}

		// executado na url dominio.com.br/conta/saldo
		public function saldo() {
			// Esta tela irá exibir os dados básicos da conta de um usuário.
			// Ela servirá como painel principal.
			// Por enquanto o $userId é fixo, mas ele deverá ser carregado da 
			// $_SESSION[] atual do usuário utilizando o sistema.

			$userId = 1;
			$contaModel = $this->carregarModel('conta');
			$dadosConta = $contaModel->buscarConta($userId);

			if(is_array($dadosConta)){
				$this->carregarView('conta/cliente-dashboard', $dadosConta);
			} else {
				$this->carregarView('conta/cliente-dashboard');
			}
		}

		// executado na url dominio.com.br/conta/sacar
		public function sacar() {
			// @TODO: Realiza o saque de um valer.
		}

		// executado na url dominio.com.br/conta/transferir
		public function transferir() {
			// @TODO: Tela de transferencia de uma conta A para uma conta B.
		}
    
}
	
