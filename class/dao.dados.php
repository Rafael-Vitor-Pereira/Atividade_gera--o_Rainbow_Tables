<?php
	require_once('conexao.php');
	require_once('dados.php');

	class DaoDados{
		public static $instance;

		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance = new DaoDados();
			}

			return self::$instance;
		}

		public function Insert(Dados $dados){
			try{
				$sql = "INSERT INTO dados (string, hashmd5, hashsha512) VALUES (:string, :hashmd5, :hashsha512)";

				$p_sql = Conexao::getConexao()->prepare($sql);

				$p_sql->bindValue(":string", $dados->getString());
				$p_sql->bindValue(":hashmd5", $dados->getHashmd5());
				$p_sql->bindValue(":hashsha512", $dados->getHashsha512());

				return $p_sql->execute();
			}catch(Exception $e){
				echo "Falha de execução: " . $e->getMessage();
			}
		}

		public function Buscar($hash){
			try {
				$sql = "SELECT string FROM dados WHERE hashmd5 = :val OR hashsha512 = :val LIMIT 1";

				$p_sql = Conexao::getConexao()->prepare($sql);

				$p_sql->bindValue(":val", $hash);

				$p_sql->execute();
				
				return $p_sql->fetch(PDO::FETCH_ASSOC);
			} catch (Exception $e) {
				echo "Falha de execução: " . $e->getMessage();
			}
		}
	}