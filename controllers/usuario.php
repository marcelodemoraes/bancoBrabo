<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	class HomeController extends Controller {

		// Construtor executado antes de todos os outros métodos
		public function __construct() {
			// @TODO: Aqui precisa fazer algum tipo de verificação?
			// se sim insira aqui. 
		}

		// executado na url dominio.com.br/usuario
		public function index() {
			// @TODO: Verifica se o usuario está online, se sim mostra o painel
			// senao chama o login.
		}

		// executado na url dominio.com.br/usuario/login
		public function login() {
			// @TODO: Aqui deve entrar a página de login e todas e
			// chamar os métodos de login também.
		}

		// executado na url dominio.com.br/usuario/logout
		public function logout() {
			// @TODO: Aqui deve entrar a página de login e todas e
			// chamar os métodos de login também.
		}

		// executado na url dominio.com.br/usuario/cadastrar
		public function cadastrar() {
			// @TODO: Aqui deve entrar a página com o formulário de
			// cadastro.
		}
    
}
