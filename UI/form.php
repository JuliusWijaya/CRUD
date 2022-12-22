<?php
require "../User.php";
$user = new User();
if (!empty($_GET['id'])) {
    $usr = $user->get_user($_GET['id']);
    //var_dump($user->get_user($_GET['id'])); // hanya untuk menampilkan user 
}

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
        <div class="row">
            <div class="col-6">
                <h2><?php if (!empty($_GET['id'])) {
                        echo "Edit";
                    } else {
                        echo "Add";
                    }
                    ?>
                    Lapangan
                </h2>
            </div>
        </div>

        <!-- Awal Form -->
        <form class="row g-4" method="post">
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal Main</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan Tanggal Main"
                    value="<?php if (!empty($_GET['id'])) { echo $usr['tanggal'];} ?>">
            </div>
            <div class="col-md-6">
                <label for="jammain" class="form-label">Jam Main</label>
                <input type="text" class="form-control" id="jammain" name="jammain" placeholder="Masukan Jam Mulai"
                    value="<?php if (!empty($_GET['id'])) { echo $usr['jam_main'];} ?>" required>
            </div>
            <div class="col-md-6">
                <label for="selesai" class="form-label">Jam Selesai</label>
                <input type="text" class="form-control" id="selesai" name="selesai" placeholder="Masukan Jam Selesai"
                    value="<?php if (!empty($_GET['id'])) { echo $usr['selesai'];} ?>" required>
            </div>
            <div class="col-md-6">
                <label for="lapang" class="form-label">Lapang</label>
                <select id="lapang" name="lapang" class="form-select">
                    <option selected></option>
                    <option value="1" <?php if (!empty($_GET['id'])) {
                                            if ($usr['lapang'] == 1) {
                                                echo "selected";
                                            } else {
                                                echo "";
                                            }
                                        }
                                        ?>>1</option>
                    <option value="2" <?php if (!empty($_GET['id'])) {
                                            if ($usr['lapang'] == 2) {
                                                echo "selected";
                                            } else {
                                                echo "";
                                            }
                                        }
                                        ?>>2</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="namaTim" class="form-label">Nama Tim</label>
                <input type="text" class="form-control" id="namaTim" name="namaTim" placeholder="Masukan Nama Tim"
                    value="<?php if (!empty($_GET['id'])) {echo $usr['nama_tim'];} ?>" required>
            </div>
            <!-- <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div> -->
            <div class="col-6">
                <button type="reset" onclick="history.back()" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-backspace-fill " viewBox="0 0 16 16">
                        <path
                            d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                    </svg>
                    Back
                </button>
                <button type="submit" name="save" id="save" class="btn btn-primary mx-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path
                            d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                    </svg>
                    Save
                </button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="
      sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
if (isset($_POST['save'])) {
    $tanggal = $_POST['tanggal'];
    $jammain = $_POST['jammain'];
    $selesai = $_POST['selesai'];
    $lapang  = $_POST['lapang'];
    $namatim = trim($_POST['namaTim']);

    if (!empty($_GET['id'])) {
        $user->update($tanggal, $jammain, $selesai, $lapang, $namatim, $_GET['id']);
    } else {
        $user->insert($tanggal, $jammain, $selesai, $lapang, $namatim);
    }
}


?>