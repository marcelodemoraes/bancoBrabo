<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class SessionModel extends Model {

		public function criarSessao($dados){
			// Cria uma nova sessao de login para o usuario atual
			session_start();

			if (!is_array($dados)) return false;
			
			$_SESSION['id'] = $dados['id'];
			$_SESSION['role'] = $dados['role'];

			return true;
		}

		public function destruirSessao($dados){
			// Deleta a sessao
			$_SESSION = array();

			if (ini_get("session.use_cookies")) {
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]
				);
			}

			session_destroy();
		}

		public function verificarSessao(){
			session_start();
			// Verifica se o usuario possui uma sessao em aberto.
			return (isset($_SESSION['id']) ? true : false); 
		}

	}