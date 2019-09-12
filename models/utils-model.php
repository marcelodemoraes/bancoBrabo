<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class UtilsModel extends Model {

		// @TODO Funções de uso compartilhado.

		//Função que sanitiza input de usuário contra XSS
		//Recebe um array de parametros e os encoda para html entitites
		//Retorna um array, com parametros sanitizados na mesma ordem em que foi recebido 
		public function xssFilter($params){
			//Verifica se o input é um array
			if(!(is_array($params))){
				//@TODO mensagem de erro
			}
			//itera sobre o array e modifica seus valores
			foreach($params as $value){
				//função que encoda as variaveis
				$value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
			}
			return $params;
		}
	}