<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class ExemploModel extends Model {

		/**
		 * Exemplo de função que executaria alguma regra nesse negócio.
		 * Neste caso a função apenas faz alguns ajustes no nome.
		 * gaBrieL VAN loon >> Gabriel Van Loon
		 */
		public function limparNome($dados){

			if(array_key_exists('nome', $dados)){
				$dados['nome'] = ucwords(strtolower($dados['nome']));
			}

			if(array_key_exists('sobrenome', $dados)){
				$dados['sobrenome'] = ucwords(strtolower($dados['sobrenome']));
			}

			return $dados;
		}

	}