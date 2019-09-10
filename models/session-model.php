<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class SessionModel extends Model {

		public function criarSessao($dados){
			// Cria uma nova sessao de login para o usuario atual
		}

		public function destruirSessao($dados){
			// Cria uma nova sessao de login para o usuario atual
		}

		public function verificarSessao($dados){
			// Verifica se o usuario possui uma sessao em aberto.
		}

	}