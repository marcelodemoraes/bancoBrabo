<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class UsuarioModel extends Model {

		public function cadastrarUsuario($dados){
			// 1 - Limpar e Validar os dados
			// 2 - Queries para inserir no banco
			// 3 - Precisa retornar algum dado? qual?
		}

		public function buscarUsuario($dados){
			// Busca um usuarío e retorna seus dados
		}

		public function buscarUsuarios(){
			// Retorna uma lista de usuarios clientes.		
		}

	}