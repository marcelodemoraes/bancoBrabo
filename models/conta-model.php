<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class ContaModel extends Model {

		public function cadastrarConta($dados){
			// 1 - Limpar e Validar os dados
			// 2 - Queries para inserir no banco
			// 3 - Precisa retornar algum dado? qual?
		}

		public function buscarConta($dados){
			// @TODO: Retorna os dados de uma conta.
		}

		public function atualizarSaldo(){
			// @TODO: Atualiza o saldo de uma conta	
		}

	}