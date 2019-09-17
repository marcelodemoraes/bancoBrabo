<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	class ContaController extends Controller {

		// Construtor executado antes de todos os outros métodos
		public function __construct() {
			global $METHOD;
			$sessionModel = $this->carregarModel("session");
			
			if(!$sessionModel->verificarSessao()){
				header('Location: '. BASE_URL);
				exit();
			}
		}

		// executado na url dominio.com.br/conta
		public function index() {
			// Esta tela irá exibir os dados básicos da conta de um usuário.
			// Ela servirá como painel principal.
			// Por enquanto o $userId é fixo, mas ele deverá ser carregado da 
			// $_SESSION[] atual do usuário utilizando o sistema.

			$userId       = $_SESSION['id'];
			$usuarioModel = $this->carregarModel('usuario');
			$contaModel   = $this->carregarModel('conta');
			$transacoesModel = $this->carregarModel('transacoes');

			$dadosView = array(
				'formulario-transferencia' => '',
				'formulario-saque'         => '',
			);
			$dadosView['account'] = $contaModel->buscarConta($userId);

			if(isset($_POST['btn-transferir'])){
				if($this->formTransferencia()){
					$dadosView['formulario-transferencia'] = 'sucesso' ;
				} else {
					$dadosView['formulario-transferencia'] = 'erro';
				}
				$dadosView['account'] = $contaModel->buscarConta($userId);
			} 

			if(isset($_POST['btn-sacar'])){
				if($this->formSacar()){
					$dadosView['formulario-saque'] = 'sucesso' ;
				} else {
					$dadosView['formulario-saque'] = 'erro';
				}
				$dadosView['account'] = $contaModel->buscarConta($userId);
			}

			$dadosView['extrato'] = $transacoesModel->buscarMes($userId);

			$this->carregarView('conta/cliente-dashboard', $dadosView);
		}

		// executado na url dominio.com.br/conta/sacar
		public function formSacar() {
			// Esta tela servirá para o usuário "Sacar" uma quantia de seu saldo.
			// Neste caso, o seu saldo atual deve ser carregado e um valor deve ser subtraido do mesmo.
			if(isset($_POST['btn-sacar'])){
				$amount = (isset($_POST['amount'])) ? $_POST['amount'] : '';

				$contaModel      = $this->carregarModel("conta");
				$transacoesModel = $this->carregarModel("transacoes");
			
				$remetente = $contaModel->buscarConta($_SESSION['id']);
				
				if(!$remetente || !is_numeric($amount) || $amount > $remetente['balance']) {
					return false;
				}

				$contaModel->atualizarSaldo($remetente['id'], $remetente['balance'] - $amount);
				$transacoesModel->cadastrarTransacao($remetente['userId'], NULL, $amount);
				return true;
			}

			return false;
		}

		// executado na url dominio.com.br/conta/transferir
		private function formTransferencia() {
			if(isset($_POST['btn-transferir'])){
				$accountNumber    = (isset($_POST['accountNumber'])) ? $_POST['accountNumber'] : '';
				$amount           = (isset($_POST['amount'])) ? $_POST['amount'] : '';

				$contaModel      = $this->carregarModel("conta");
				$transacoesModel = $this->carregarModel("transacoes");
			
				$remetente    = $contaModel->buscarConta($_SESSION['id']);
				$destinatario = $contaModel->buscarContaAccountNumber($accountNumber);
				
				if(!$remetente || !$destinatario || !is_numeric($amount) || $amount > $remetente['balance']) {
					return false;
				}

				$contaModel->atualizarSaldo($remetente['id'], $remetente['balance'] - $amount);
				$contaModel->atualizarSaldo($destinatario['id'], $destinatario['balance'] + $amount);
				$transacoesModel->cadastrarTransacao($remetente['userId'], $destinatario['userId'], $amount);
				return true;
			}

			return false;
		}
    
}
	
