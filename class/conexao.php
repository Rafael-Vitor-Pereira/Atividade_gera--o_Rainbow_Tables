<?php
class Conexao
{
  public static $conexao;

  public static function getConexao()
  {
    $host = "localhost";
    $banco = "rainbow_tables";
    $usuario = "root";
    $senha = "";
  
    if (!isset(self::$conexao)) {
      try {
        self::$conexao = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
  
        self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo "Falha de conexão: " . $e->getMessage();
      }
    }
    return self::$conexao;
  }
}
?>