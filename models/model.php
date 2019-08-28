<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	/**
	 * Esta é uma classe pai dos Models e deve ser herdada por todos que forem
	 * criados.
	 * Ela possui funções que facilitam o processo de carregar models.
	 *
	 */ 
	class Model {

		public function carregarModel($modelName){

			$modelName = strtolower($modelName);

			// Verificando o arquivo em que a classe se encontra
			if(file_exists(BASE_PATH.'/models/'.$modelName.'.php')) {
				require(BASE_PATH.'/models/'.$modelName.'.php');
			} else {
				return null;
			}

			// Verificando se a Classe do Model existe
			if(!$erro_rota && class_exists(ucwords($modelName).'Model')){
				$modelName = ucwords($modelName).'Model';
				return new $modelName;
			} 

			return null;
		}	

	}