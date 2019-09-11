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
			// $dadosConta = $contaModel->buscarContaAccountNumber('10001');

			if(is_array($dadosConta)){
				$this->carregarView('conta/cliente-dashboard', $dadosConta);
			} else {
				$this->carregarView('conta/cliente-dashboard');
			}
		}

		// executado na url dominio.com.br/conta/sacar
		public function sacar() {
			// Esta tela servirá para o usuário "Sacar" uma quantia de seu saldo.
			// Neste caso, o seu saldo atual deve ser carregado e um valor deve ser subtraido do mesmo.

			$userId = 1;
			$contaModel = $this->carregarModel('conta');
			$dadosConta = $contaModel->buscarConta($userId);

			if(is_array($dadosConta) && $dadosConta['balance'] >= 100.50 ){
				$contaModel->atualizarSaldo($dadosConta['id'], $dadosConta['balance']-50.0);
				$dadosConta['balance'] -= 50.0;
			}

			$this->carregarView('conta/cliente-dashboard', $dadosConta);
		}

		// executado na url dominio.com.br/conta/transferir
		public function transferir() {
			// @TODO: Tela de transferencia de uma conta A para uma conta B.
			//        Para isso ela deve primeiro verificar e atualizar o saldo de ambos os
			//        usuários e, em seguida, cadastrar uma nova movimentação/transferencia 
			//        no banco de dados.
		}
    
}
	
