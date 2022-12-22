<?php
require "../User.php";
$User = new User();
$listUser = $User->view();

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center my-3">Aplikasi Sederhana!</h1>
    <div class="container">
        <?php
        if (empty($_GET['alert'])) {
            echo "";
        } elseif ($_GET['alert'] == 2) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  					 <strong>Success</strong> Data Berhasil Disimpan.
  					 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>';
        } elseif ($_GET['alert'] == 1) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						<strong>Failed!</strong> Data Gagal Disimpan !!!
  						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				 </div>';
        } elseif ($_GET['alert'] == 3) {
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Success</strong> Data Berhasil DiHapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }elseif($_GET['alert'] == 4) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Success</strong> Data Berhasil DiUbah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
        }
        ?>
        <div class="row">
            <div class="col-6">
                <h2>List Reservasi Lapangan</h2>
            </div>
            <div class="col-6 text-end">
                <a href="form.php" class="btn btn-primary" role="button" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor"
                        class="bi bi-person-plus-fill" viewBox="0 0 18 18">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                    Add User
                </a>
            </div>
        </div>
        <table class="table table-striped my-3">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam Main</th>
                    <th scope="col">Selesai</th>
                    <th scope="col">Lapang</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUser as $key => $cuy) : ?>
                <tr>
                    <th scope="row"><?= $key + 1; ?></th>
                    <td><?= $cuy['tanggal']; ?></td>
                    <td><?= $cuy['jam_main']; ?></td>
                    <td><?= $cuy['selesai']; ?></td>
                    <td>
                        <?php if ($cuy['lapang'] == 1) {
                                echo "Indoor";
                            } elseif ($cuy['lapang'] == 2) {
                                echo "Outdoor";
                            } else {
                                echo "Not Found";
                            }
                            ?>
                    </td>
                    <td><?= $cuy['nama_tim']; ?></td>
                    <td>
                        <a href="form.php?id=<?= $cuy['id_user']; ?>>" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                            Edit
                        </a>
                        <a href="view.php?id=<?= $cuy['id_user']; ?>" class="btn btn-danger"
                            onclick="return confirm ('Apakah anda yakin ingin menghapus data ini? <?= $cuy['nama_tim']; ?> ?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                            Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
if (!empty($_GET['id'])) {
    $User->delete($_GET['id']);
}

?>