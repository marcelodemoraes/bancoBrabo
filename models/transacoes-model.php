<?php 
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
	

	class TransacoesModel extends Model {

		public function cadastrarTransacao($userFrom, $userTo, $amount){
			
			if(is_null($userFrom) || !is_numeric($userFrom) || is_null($amount) || !is_numeric($amount)){
				return false;
			}

			global $dbConfig;

			try {
				// Abre a conexão com o banco
				$conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass']);
				$sql  = "INSERT INTO transactions (userFrom, userTo, amount) 
							VALUES  (?,?,?)";

				if($conn){
					$stmt = $conn->prepare($sql);
					$stmt->execute([$userFrom, $userTo, $amount]); 
					if($stmt->rowCount() == 1){
						return $conn->lastInsertId();
					} else {
						echo "  oi"; exit();
					}
				} 
			} catch (Exception $e){
				//echo $e->getMessage();
			}

			return false;
		}

		public function buscarMes($userId){
			// Etapa 2 - Realizar a Query de busca
			global $dbConfig;

			// Buscando os dados da conta por meio do $userId
			try {
				// Abre a conexão com o banco
				$conn = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass']);
				$sql  = "SELECT 
							t.amount AS 'amount',
							t.date AS 'date', 
							af.accountNumber AS 'userFromNumber', 
							at.accountNumber AS 'userToNumber'
						FROM transactions AS t
						INNER JOIN account  AS af ON af.userId = t.userFrom
					    LEFT  JOIN  account AS at ON at.userId = t.userTo
						WHERE t.userFrom = ? OR t.userTo = ? 
						ORDER BY t.id DESC LIMIT 30";

				if($conn){
					// Prepara a query, executa e retorna o resultado
					$stmt = $conn->prepare($sql);
					$stmt->execute([$userId,$userId]);

					// Para multiplos resultados precisa utilizar fetchAll();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
					if($stmt->rowCount() > 0){
						return $result;
					}
				}
			} catch (Exception $e){
				// echo $e->getMessage();
			}

			return false;
		}

	}