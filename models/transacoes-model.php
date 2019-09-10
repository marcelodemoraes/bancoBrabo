<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class TransacoesModel extends Model {

		public function cadastrarTransacao($dados){
			// 1 - Limpar e Validar os dados
			// 2 - Queries para inserir no banco
			// 3 - Precisa retornar algum dado? qual?
		}

		public function buscarMes($dados){
			// @TODO: Retorna a lista de transacoes feita no mes
			// para gerar a tela de extrato		
		}

	}