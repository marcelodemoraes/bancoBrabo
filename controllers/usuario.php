<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	class UsuarioController extends Controller {

		// Construtor executado antes de todos os outros métodos
		public function __construct() {
			// Caso o usuário possua uma sessão ativa, o redireciona para /conta
			global $METHOD;
			$sessionModel = $this->carregarModel("session");
			
			if($METHOD != 'logout' && $sessionModel->verificarSessao()){
				header('Location: '. BASE_URL .'conta');
				exit();
			}
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
				$dadosView['formulario-cadastro'] = ($this->formCadastro()) ? 'sucesso' : 'erro';
			}

			if(isset($_POST['btn-login'])){
				$dadosView['formulario-login'] = ($this->formLogin()) ? 'sucesso' : 'erro';
			}

			$this->carregarView("usuario/home", $dadosView);
		}

		// executado na url dominio.com.br/usuario/logout
		public function logout() {
			$sessionModel = $this->carregarModel("session");
			$sessionModel->destruirSessao($dados);
			header('Location: '. BASE_URL .'');
			exit();
		}

		// Encapsula todos os comandos ligados à função de fazer login
		private function formLogin() {
			if(isset($_POST['btn-login'])){
				$login    = (isset($_POST['login'])) ? $_POST['login'] : '';
				$password = (isset($_POST['password'])) ? $_POST['password'] : '';
				
				$sessionModel = $this->carregarModel("session");
				$usuarioModel = $this->carregarModel("usuario");
				$userData = $usuarioModel->buscarUsuario($login, $password);

				if(is_array($userData)){
					$sessionModel->criarSessao(array(
						'id'   => $userData['id'],
						'role' => $userData['role'],
					));

					header('Location: '. BASE_URL .'conta');
					exit();
				} 
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
