<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	class UsuarioController extends Controller {

		// Construtor executado antes de todos os outros métodos
		public function __construct() {
			// @TODO: Aqui precisa fazer algum tipo de verificação?
			// se sim insira aqui. 
		}

		// executado na url dominio.com.br/usuario
		public function index() {
			$this->login();
		}

		// executado na url dominio.com.br/usuario/login
		public function login() {
			
			$dadosView = array(
				'formulario-cadastro' => null,
				'formulario-login'    => null,
			);

			// Verificando se o botão de cadastrar foi acionado. Em caso positivo chama
			// o método para controlar os models corretamente.
			if(isset($_POST['btn-cadastrar'])){
				$dadosView['formulario-cadastro'] = $this->formCadastro();
			}

			if(isset($_POST['btn-login'])){
				$dadosView['formulario-cadastro'] = $this->formLogin();
			}

			$this->carregarView("usuario/home", $dadosView);
		}

		// executado na url dominio.com.br/usuario/logout
		public function logout() {
			// @TODO: Aqui deve entrar a página de login e todas e
			// chamar os métodos de login também.
		}

		// Encapsula todos os comandos ligados à função de fazer login
		private function formLogin() {
			if(isset($_POST['btn-login'])){
				$login    = (isset($_POST['login'])) ? $_POST['login'] : '';
				$password = (isset($_POST['password'])) ? $_POST['password'] : '';
				
				$usuarioModel = $this->carregarModel("usuario");
				$userData = $usuarioModel->buscarUsuario($login, $password);

				if(is_array($userData)){
					echo "oi";
				} else {
					echo "nao entrou";
				}
				exit();
			}

			return false;
		}

		// Encapsula todos os comandos ligados à função de cadastrar uma nova conta.
		private function formCadastro() {
			if(isset($_POST['btn-cadastrar'])){
				$login    = (isset($_POST['login'])) ? $_POST['login'] : '';
				$password = (isset($_POST['password'])) ? $_POST['password'] : '';
				$name     = (isset($_POST['name'])) ? $_POST['name'] : '';
				
				$usuarioModel = $this->carregarModel("usuario");
				$contaModel = $this->carregarModel("conta");
				
				$userId    = $usuarioModel->cadastrarUsuario($login, $password, $name);
				$accountId = $contaModel->cadastrarConta($userId, 500);

				return ($userId && $accountId);
			}

			return false;
		}
    
}
