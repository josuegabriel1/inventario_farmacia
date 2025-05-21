<?php 
class Connection {

	protected $isConn;
	protected $datab;
	protected $transaction;

	// Constructor
	public function __construct($username = "root", $password = "", $host = "localhost", $dbname = "inventario_farmacia", $options = []) {
		$this->isConn = TRUE;
		try {
			$this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->transaction = $this->datab;
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			// echo 'Connected Successfully!!!';
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}

	// Obtener conexión externa
	public function getConnection() {
		return $this->transaction;
	}

	// Desconectar
	public function Disconnect() {
		$this->datab = NULL; // cerrar conexión
		$this->isConn = FALSE;
	}
}
?>
