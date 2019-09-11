<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class ContaModel extends Model {

		// Cadastra uma nova conta no sistema e retorna:
		// - true/false em caso de sucesso/falha respectivamente.
		public function cadastrarConta($userId, $balance, $accountNumber = ''){
			
			// Avisando ao PHP que vou utilizar a variável global $dbConfig;
			global $dbConfig;

			// 1 - Limpar e Validar os dados
			// @TODO: Essa parte depende da UtilsModel, então vou ignorar por hora.
			//        coloquei apenas a verificação básica do userId
			//        O ideal é utilizar os filtros de XSS no accountNumber que é string.
			if(is_null($accountId) || !is_numeric($accountId)){
				return false;
			}

			$accountNumber = (empty($accountNumber)) ? '10000X' : $accountNumber;

			// 2 - Criando a nova conta no Banco de Dados
			try {
				// Abre a conexão com o banco
				$conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass']);
				$sql  = "INSERT INTO account ('balance', 'accountNumber', 'userId') 
							VALUES (?,?,?);";

				if($conn){
				
					$stmt = $conn->prepare($sql);
					$stmt->execute([$balance, $accountNumber, $accountId]); 
					
					if($stmt->rowCount() == 1){
						return true;
					}
				}
			} catch (Exception $e){
				// echo $e->getMessage();
			}

			return false;
		}

		// A função recebe um $userId e retorna:
		// - $dadosConta em caso de sucesso
		// - false em caso de falha.
		public function buscarConta($userId){
			
			// Avisando ao PHP que vou utilizar a variável global$dbConfig;
			global $dbConfig;

			// Verificando se o valor passado é numérico e válido.
			if(is_null($userId) || !is_numeric($userId)){
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
				// echo $e->getMessage();
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
			if(is_null($accountId) || !is_numeric($accountId) || 
				!is_numeric($newBalance) || $newBalance < 0.0){
				return false;
			}

			// Buscando os dados da conta por meio do $accountId e atualizando o 'balance'
			try {
				// Abre a conexão com o banco
				$conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass']);
				$sql  = "UPDATE account SET balance = ? WHERE id = ?";

				if($conn){
					// Prepara a query, executa e retorna o resultado
					$stmt = $conn->prepare($sql);
					$stmt->execute([$newBalance, $accountId]); 
					
					if($stmt->rowCount() == 1){
						return true;
					}
				}
			} catch (Exception $e){
				// echo $e->getMessage();
			}

			return false;
		}

	}