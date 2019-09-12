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
			
			// Verificando se o botão de cadastrar foi acionado. Em caso positivo chama
			// o método para controlar os models corretamente.
			if(isset($_POST['btn-cadastrar'])){
				$this->cadastrar();
			}




			$this->carregarView("usuario/home");
		}

		// executado na url dominio.com.br/usuario/logout
		public function logout() {
			// @TODO: Aqui deve entrar a página de login e todas e
			// chamar os métodos de login também.
		}

		// Encapsula todos os comandos ligados à função de cadastrar uma nova conta.
		private function cadastrar() {
			if(isset($_POST['btn-cadastrar'])){
				$login    = (isset($_POST['login'])) ? $_POST['login'] : '';
				$password = (isset($_POST['password'])) ? $_POST['password'] : '';
				$name     = (isset($_POST['name'])) ? $_POST['name'] : '';
				
				$usuarioModel = $this->carregarModel("usuario");
				$resultado    = $usuarioModel->cadastrarUsuario($login, $password, $name);
				echo $resultado;
				exit();
			}
		}
    
}
