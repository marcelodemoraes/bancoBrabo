<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	
	class UsuarioModel extends Model {

		private $ROLE_CLIENTE = 1;
		private $ROLE_ADMIN   = 2;

		// A função realiza a inserção de um novo usuário na base de dados e retorna:
		// - $userId do novo usuário inserido no banco
		// - False caso haja algum erro durante todo o processo.
		public function cadastrarUsuario($login, $password, $name){

			// Etapa 1 - Limpar e Validar os dados
			$utils = $this->carregarModel('utils');

			if(is_null($login) || empty($login) || is_null($password) || empty($password) ||  
			   is_null($name) || empty($name)){
				return false;
			}

			$dadosLimpos = $utils->xssFilter(array($login, $password, $name));
			$login    = trim($dadosLimpos[0]);
			$password = trim($dadosLimpos[1]);
			$name     = trim($dadosLimpos[2]);

			$name = explode(' ', $name);
			$firstName = $name[0];
			array_shift($name);
			$lastname = implode(' ', $name);

			if(!$this->loginDisponivel($login)){
				return false;
			}

			// Etapa 2 - Queries para inserir no banco
			global $dbConfig;

			try {
				// Abre a conexão com o banco
				$conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass']);
				$sql  = "INSERT INTO user (login, password, role, name, lastname) 
							VALUES (?,?,?,?,?)";

				if($conn){
					$stmt = $conn->prepare($sql);
					$stmt->execute([$login, md5($password), 1, $firstName, $lastname]); 
					if($stmt->rowCount() == 1){
						return $conn->lastInsertId();
					}
					
				} else {
					
				}
			} catch (Exception $e){
				echo $e->getMessage();
			}

			return false;
		}

		public function buscarUsuario($login, $password){
			// Busca um usuarío e retorna seus dados
		}

		public function buscarUsuarios(){
			// Retorna uma lista de usuarios clientes.		
		}

		// Verifica se um dado login já está sendo utilizado no sistema e retorna
		// - True caso login esteja disponivel.
		// - False caso login já esteja sendo utilizado.
		public function loginDisponivel($login){
			// Avisando ao PHP que vou utilizar a variável global$dbConfig;
			global $dbConfig;

			// Verificando se o valor passado é numérico e válido.
			if(is_null($login) || empty($login)){
				return false;
			}

			// Buscando os dados da conta por meio do $userId
			try {
				// Abre a conexão com o banco
				$conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass']);
				$sql  = "SELECT login FROM user WHERE login = ? LIMIT 1";

				if($conn){
					// Prepara a query, executa e retorna o resultado
					$stmt = $conn->prepare($sql);
					$stmt->execute([$login]);

					// Para multiplos resultados precisa utilizar fetchAll();
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					
					if($stmt->rowCount() == 0){
						return true;
					}
				}
			} catch (Exception $e){
				// echo $e->getMessage();
			}

			return false;
		}
	}