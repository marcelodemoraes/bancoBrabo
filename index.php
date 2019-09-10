<?php

/**
 * Primeiramente, para um programa PHP com arquitetura MVC funcionar, é necessário que haja
 * uma série de etapas de configuração que permitam ao sistema saber quais arquivos devem ser
 * executados.
 *
 * Quanto mais complexo o framework mais complexa é a etapa de configuração e maior a quantidade de
 * arquivos/códigos necessários.
 *
 * Como a ideia é iniciar um sistema mais simples, separei as configs. nos seguintes processos:
 *
 * - index.php >> Responsável por ativar as variáveis de ambiente do sistema. É aqui que estarão
 *                alguns dados mais básicos como _BASEPATH_ do sistema e também será definido se 
 *                o php irá exibir ou não os warnings.
 *
 * - rotas.php >> Responsável por ler a url recebida pelo browser e designar qual método de qual
 *                controle deverá ser chamado. Redirecionamentos ou URL's alternativas (caso existam)
 *                podem ser configuradas nesse arquivo.
 *                 
 *                Caso o Controller exista e o método também, o objeto é instânciado e executado. Caso
 *                contrário o usuário recebe um 404.
 */

	// Caminho para o diretório base do projeto
	define('BASE_PATH', __DIR__ );

	// URL base ou domínio principal do sistema
	define('BASE_URL', 'http://localhost/bancoBrabo/');

	// Caminho principal da pasta SRC
	define('SRC_PATH', BASE_URL . 'src/');

	// Descomente para ver as as variáveis definidas
	// echo BASE_PATH."</br>".BASE_URL."</br>".SRC_PATH; exit();

	define('DEBUG_MODE', true);

	// Configurando a exibição de erros para o usuário.
	if(DEBUG_MODE == false){
		ini_set('display_errors', 0);
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
	} else {
		error_reporting(-1);
		ini_set('display_errors', 1);
	}

	// Configurações do Banco de Dados
	$db_config = array(
		'host'	=>	'localhost',
		'name'	=>	'~~',
		'user'	=>	'~~',
		'pass'	=>	'~~',
	);

	/**
	 * Finalizada as configurações desse arquivo segumos para o próximo.
	 */
	require(BASE_PATH.'/rotas.php');

/**
 * Apenas algumas dicas a mais:
 * - Em arquivos php, evite fechar a tag <?php com exceção dos arquivos de View
 * - Prefira sempre utilizar strings com '' ao inves de "", pois as aspas duplas são pré-interpretadas
 *   pelo php em busca de variáveis para ser substituidas pelo seu valor.
 * - Variáveis definidas em escopo aberto sempre são globais e acessiveis em arquivos incluidos 
     no futuro. Portanto sempre verifique se seu nome de variável não sobrescreve algo já definido.
 */