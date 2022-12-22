<?php
require_once "Database.php";

class User{
	private $db;

	function __construct() {
		$this->db = new Database();
	}

	public function view() {
		// Membuka Koneksi Database
		$conn = $this->db->koneksi();
		$sql = "SELECT * FROM lapang ORDER BY id_user ASC";
		$result = $conn->query($sql);
		while ($datas = $result->fetch_assoc()) {
			$hasil[] = $datas;
		}

		// Menutup Koneksi Database
		$conn->close();

		// Nilai Kembalian dalam bentuk Array
		return $hasil;
	}


	public function insert($tanggal, $jammain, $selesai, $lapang, $namatim) {
		$conn = $this->db->koneksi();

		$tanggal = $conn->real_escape_string($tanggal);
		$jammain = $conn->real_escape_string($jammain);
		$selesai = $conn->real_escape_string($selesai);
		$lapang  = $conn->real_escape_string($lapang);
		$namatim = $conn->real_escape_string($namatim);

		// perintah sql untuk menambahkan data list lapangan
		$sql = "INSERT INTO lapang (tanggal, jam_main, selesai, lapang, nama_tim)
				VALUES ('$tanggal', '$jammain', '$selesai', '$lapang', '$namatim')";

		$result = $conn->query($sql);

		// Cek hasil query 
		if ($result) {
			// Jika data berhasil disimpan alihkan ke halaman dashboard (view.php) dan tampilkan pesan = 2
			echo "<script> document.location.href='view.php?alert=2';</script>";
		} else {
			echo "<script> document.location.href='view.php?alert=1';</script>";
		}

		// Menutup Koneksi Database
		$conn->close();
	}


	public function update($tanggal, $jam_main, $selesai, $lapang, $nama_tim, $id) {
		$conn = $this->db->koneksi();

		$tanggal = $conn->real_escape_string($tanggal);
		$jam_main = $conn->real_escape_string($jam_main);
		$selesai = $conn->real_escape_string($selesai);
		$lapang  = $conn->real_escape_string($lapang);
		$nama_tim = $conn->real_escape_string($nama_tim);

		// perintah sql untuk mengupdate data list lapangan
		$sql = "UPDATE lapang SET tanggal  = '$tanggal',
								  jam_main = '$jam_main',
								  selesai  = '$selesai',
								  lapang   = '$lapang',
								  nama_tim = '$nama_tim'
				 WHERE id_user = '$id'";

		$result = $conn->query($sql);

		// Cek hasil query
		if ($result) {
			// Jika data berhasil diubah maka alihkan ke halaman view.php dan tampilkan pesan = 2
			echo "<script> document.location.href= 'view.php?alert=4';</script>";
		} else {
			// Jika data gagal diubah maka alihkan ke halaman view.php dan tampilkan pesan = 1
			echo "<script> document.location.href= 'view.php?alert=1';</script>";
		}

		// Menutup koneksi database
		$conn->close();
	}

	public function get_user($id) {
		$conn = $this->db->koneksi();

		// Perintah sql untuk mengambil data berdasarkan id
		$sql = "SELECT * FROM lapang WHERE id_user='$id'";

		$result = $conn->query($sql);
		$datas = $result->fetch_assoc();

		//menutup koneksi database
		$conn->close();

		// nilai kembalian data
		return $datas;
	}

	public function delete($id) {
		$conn = $this->db->koneksi();

		// perintah sql untuk menghapus data berdasarkan id
		$sql = "DELETE FROM lapang WHERE id_user = '$id'";

		$result = $conn->query($sql);

		// Cek hasil query 
		if ($result) {
			echo "<script> 
					document.location.href= 'view.php?alert=3';
				</script>";
		} else {
			echo header("Location:view.php?alert=1");
		}

		// menutup koneksi database
		$conn->close();
	}
}