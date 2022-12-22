<?php 
class Database{
// Deklarasi Parameter
	private $host = "localhost";
	private	$name = "root";
	private	$pass = "";
	private	$db   = "uts";

// Membuat Method
	public function koneksi() {
		// Konek ke MySql
		$conn = new mysqli($this->host, $this->name, $this->pass, $this->db);

		// Cek Kondisi Terhubung atau Tidak 
		if ($conn->connect_error) {
			echo "Gagal terkoneksi ke Database : (".$conn->connect_error.")";
		}

		// Mengembalikan Nilai Method
		return $conn;
	}
}




?>