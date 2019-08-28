<?php
	/**
	 * Um dos aspectos importantes de segurança do MVC é garantir que nenhum arquivo .php será
	 * executado diretamente pelo usuário. 
     *
	 * Para isso é comum que no começo de cada arquivo seja feita a verificação abaixo
	 * pois ela garante que o php carregou o index.php antes de tentar executar o código 
	 * seguinte.
	 * 
	 */
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 

	/**
	 * A etapa a seguir é simples e intuitiva, iremos quebrar a url nos seguimentos
	 * /Controller/Ação/Args[] e verificar se são válidos.
	 */

	// Controller executado ao carregar o website
	$home_controller = 'exemplo';

	// Método padrão executado ao carregar o website
	$home_metodo     = 'index';

	// Quebrando a Query nos seguimentos
	$q = ( isset($_GET['q']) ) ? $_GET['q'] : $home_controller.'/'.$home_metodo;
	$q = explode('/', $q);

	$C    = (sizeof($q) >= 1 )  ? $q[0] : $home_controller;
	$M    = (sizeof($q) >= 2 && !empty($q[1]))  ? $q[1] : 'index';
	$ARGS = (sizeof($q) >  2 && !empty($q[3])) ? array_slice($q, 2) : null;

	// Fazendo alguns tratamentos nas variáveis recebidas.
	$C = strtolower($C); //ucwords(str)
	$M = strtolower($M);

	// Antes de carregar as classes desejadas, precisamos carregar as classes pais
	// que todos os controllers irão herdar
	require(BASE_PATH.'/controllers/controller.php');
	require(BASE_PATH.'/models/model.php');

	// Variável de controle que verifica se houve algum erro no fim do processo.
	$erro_rota = false;

	// Por fim, precisamos verificar se o Controller especificado pela URL 
	// realmente existe e chamá-lo dinâmicamente.
	if(file_exists(BASE_PATH.'/controllers/'.$C.'.php')) {
		require(BASE_PATH.'/controllers/'.$C.'.php');
	} else {
		$erro_rota = true;
	}

	// Estancia o Controller e chama o método desejado.
	if(!$erro_rota && class_exists(ucwords($C).'Controller')){
		$C = ucwords($C).'Controller';
		$C_Obj = new $C;

		if(method_exists($C_Obj, $M)) {
			$C_Obj->$M($ARGS);
		} else {
			$erro_rota = true;
		} 

	} else {
		$erro_rota = true;
	}

	// Caso tenha ocorrido algum erro ao gerar a rota o arquivo exibe a página 404.
	// Aqui pode haver o carregamento de algum controller que chama uma página 404 personalizada
	// por exemplo.
	if($erro_rota){
		header("HTTP/1.0 404 Not Found");
		echo "<h1>404 Not Found</h1>";
		echo "The page that you have requested could not be found.";
		exit();
	}

/**
 * Uma configuração importante para que todos os processos desse arquivo funcione é o arquivo .htacces
 * [Caso você esteja usando linux é necessário usar 'ls -la' para visualizá-lo.]
 * Porém não é necessário entender 100% do que a configuração faz pois maioria dos códigos que coloquei
 * nele são facilmente encontrados na internet.
 */