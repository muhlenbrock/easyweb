<?php 

//print_r($bd['db.config.host']);
$usuario_ = 'oxidocs_uls';
$password_ = 'oxipassword';
$host_ = 'oxidocs.com';
$db_ = 'oxidocs_uls';

class Conexion
{	

	
    //echo $obj->access_token;
	public $usuario;
	public $password;
	public $host;
	public $db;
	

	function __construct()
	{
		$this->usuario = $GLOBALS['usuario_'];
		$this->password = $GLOBALS['password_'];
		$this->host = $GLOBALS['host_'];
		$this->db = $GLOBALS['db_'];
	}
	
	public function conectar()
	{
		try {
            return $conexion = new PDO("mysql:host=$this->host;dbname=$this->db; port=3306",$this->usuario,$this->password, array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
        }
	}
}

/**
* 
*/
?>