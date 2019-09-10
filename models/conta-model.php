<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class ContaModel extends Model {

		public function cadastrarConta($dados){
			// 1 - Limpar e Validar os dados
			// 2 - Queries para inserir no banco
			// 3 - Precisa retornar algum dado? qual?
		}

		// A função recebe um $userId e retorna:
		// - $dadosConta em caso de sucesso
		// - false em caso de falha.
		public function buscarConta($userId){
			
			// Avisando ao PHP que vou utilizar a variável global$dbConfig;
			global $dbConfig;

			// Verificando se o valor passado é numérico e válido.
			if(is_null($userId) || !is_int($userId)){
				return false;
			}

			// Buscando os dados da conta por meio do $userId
			try {
				// Abre a conexão com o banco
				$conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass']);
				$sql  = "SELECT * FROM account WHERE userId = ? LIMIT 1";

				if($conn){
					// Prepara a query, executa e retorna o resultado
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(1, $userId, PDO::PARAM_INT);
					$stmt->execute();

					// Para multiplos resultados precisa utilizar fetchAll();
					$result = $stmt->fetch(PDO::FETCH_ASSOC); 
					
					if($stmt->rowCount() == 1){
						return $result;
					}
				}

			} catch (Exception $e){
				echo $e->getMessage();
			}

			return false;
		}

		// Recebe o id da conta e o novo saldo ($accountId e newBalance, respectivamente)
		// e atualiza o saldo do usuário no banco de dados. Retorna: 
		// - true  em caso de sucesso
		// - false em caso de erro
		public function atualizarSaldo($accountId, $newBalance){
			
						// Avisando ao PHP que vou utilizar a variável global$dbConfig;
			global $dbConfig;

			// Verificando se o valor passado é numérico e válido.
			if(is_null($userId) || !is_int($userId)){
				return false;
			}

			// Buscando os dados da conta por meio do $userId
			try {
				// Abre a conexão com o banco
				$conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass']);
				$sql  = "SELECT * FROM account WHERE userId = ? LIMIT 1";

				if($conn){
					// Prepara a query, executa e retorna o resultado
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(1, $userId, PDO::PARAM_INT);
					$stmt->execute();

					// Para multiplos resultados precisa utilizar fetchAll();
					$result = $stmt->fetch(PDO::FETCH_ASSOC); 
					
					if($stmt->rowCount() == 1){
						return $result;
					}
				}

			} catch (Exception $e){
				echo $e->getMessage();
			}

			return false;
			
		}

	}