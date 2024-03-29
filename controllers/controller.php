<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	/**
	 * Esta é uma classe pai dos Controllers e deve ser herdada por todos os Controllers
	 * criados.
	 * Ela possui funções que facilitam o processo de carregar models e views.
	 *
	 * Como este é um exemplo simples foi adicionado apenas duas funções.
	 */ 
	class Controller {

		public function carregarModel($modelName){

			$modelName = strtolower($modelName);

			// Verificando o arquivo em que a classe se encontra
			if(file_exists(BASE_PATH.'/models/'.$modelName.'-model.php')) {
				require_once(BASE_PATH.'/models/'.$modelName.'-model.php');
			} else {
				return null;
			}

			// Verificando se a Classe do Model existe
			if(class_exists(ucwords($modelName).'Model')){
				$modelName = ucwords($modelName).'Model';
				return new $modelName;
			} 

			return null;
		}	

		public function carregarView($viewName, $viewData = array()){
			
			// Verificando o arquivo em que a classe se encontra
			if(file_exists(BASE_PATH.'/views/'.$viewName.'.php')) {
				include(BASE_PATH.'/views/'.$viewName.'.php');
				return true;
			} 

			return false;
		}

	}
