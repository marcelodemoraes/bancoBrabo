<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	class ExemploController extends Controller {

		// Construtor executado antes de todos os outros métodos
		public function __construct() {
			echo "<h1>Oi, eu sempre executo =D</h1>";   
		}

		// executado na url dominio.com.br/exemplo
		public function index() {
			echo "<h2>Seja muito bem vindo ao sistema</h2>";
			echo "<p><a href='".BASE_URL."exemplo/somar/2/3' target='_blank'>Veja a outra pagina</a></p>";
		}

		// executado na url dominio.com.br/somar/A/B e exibe A+B na tela
		public function somar($args){
			
			if(is_null($args) || !is_array($args) || sizeof($args) < 2){
				echo "<p>Faltou argumento aí campeão</p>";
			} else {
				echo "<p>$args[0] + $args[1] = ".($args[0] + $args[1])."</p>";
			}
			
		}

		// executado na url dominio.com.br/formulario
		public function formulario($args){

			// Caso o formulário tenha sido disparado, o Controller irá chamar o Model para
			// tratar os dados e, em seguida os envias para a view.
			if(isset($_POST['btn-cadastrar'])){

				$dados['nome']      = (isset($_POST['nome'])) ? $_POST['nome'] : '';
				$dados['sobrenome'] = (isset($_POST['sobrenome'])) ? $_POST['sobrenome'] : '';

				$exemploModel = $this->carregarModel('exemplo');

				$dadosLimpos = $exemploModel->limparNome($dados);
		
				$this->carregarView('exemplo/formulario', $dadosLimpos);          
			
			// Neste caso nenhum formulário foi enviado ainda e então apenas chama a view
			} else {
				$this->carregarView('exemplo/formulario');
			}
		
    }
    
}
	
