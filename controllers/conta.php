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
			// @TODO: Mostra o painel inicial com os dados da conta
		}

		// executado na url dominio.com.br/conta/extrato
		public function extrato() {
			// @TODO: Página simples que mostra os extratos do mês corrente.
		}

		// executado na url dominio.com.br/conta/saldo
		public function saldo() {
			// @TODO: Aqui deve mostrar o saldo atual.
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
	
