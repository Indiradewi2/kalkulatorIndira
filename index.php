<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKK Paket 1 | Indira Dewi</title>
    <!-- link boostrap css, font awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style type="text/css">
        .btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- container utama -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- form kalkulator -->
                <form method="POST" class="p-2 border rounded bg-primary-subtle">
                    <h3 class="text-center">Mini Kalkulator</h3>
                    <!-- input angka -->
                    <input type="text" step="any" name="num1" class="form-control mb-3" autocomplete="off" placeholder="Masukkan Angka Pertama">
                    <input type="text" step="any" name="num2" class="form-control mb-3" autocomplete="off" placeholder="Masukkan Angka Kedua">
                    <!-- tombol operasi & reset -->
                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <button type="submit" class="btn btn-outline-secondary" name="operator" value="+" title="Tambah"><i class="fas fa-plus"></i></button>
                        <button type="submit" class="btn btn-outline-secondary" name="operator" value="-" title="Kurang"><i class="fas fa-minus"></i></button>
                        <button type="submit" class="btn btn-outline-secondary" name="operator" value="*" title="Kali"><i class="fas fa-xmark"></i></button>
                        <button type="submit" class="btn btn-outline-secondary" name="operator" value="/" title="Bagi"><i class="fas fa-divide"></i></button>
                        <button type="submit" class="btn btn-outline-secondary" name="operator" value="%" title="Persen"><i class="fas fa-percent"></i></button>
                        <button type="reset" class="btn btn-outline-secondary" name="reset" value="reset" title="Clear Entry">CE</button>
                    </div>
                </form>

                <!-- form hasil kalkulasi -->
                <div class="p-2 border rounded bg-light">
                    <h4 class="text-center">
                        <?php
                        //apakah tombol operator ditekan
                        if (isset($_POST['operator'])) {
                            //ambil input angka dan operator dari form
                            $num1 = $_POST['num1'];
                            $num2 = $_POST['num2'];
                            $operator = $_POST['operator'];

                            // validasi jika input kosong 
                            //if (empty($num1) || empty($num2)) {
                            //    echo "<script>alert('Input tidak boleh kosong')</script>";
                            //}
                            // validasi jika input berisi huruf 
                            if (!is_numeric($num1) || !is_numeric($num2)) { 
                                echo "<script>alert('Input harus berupa angka')</script>";
                            } 
                            // validasi jika terjadi pembagian dengan 0
                            elseif ($operator == '/' && $num2 == 0) {
                                echo "<script>alert('Tidak Dapat Membagi Dengan NOL')</script>";
                            } else {
                                // logika perhitungan
                                switch ($operator) {
                                    case '+':
                                        $hasil = $num1 + $num2;
                                        break;
                                    case '-':
                                        $hasil = $num1 - $num2;
                                        break;
                                    case '*':
                                        $hasil = $num1 * $num2;
                                        break;
                                    case '/':
                                        $hasil = $num1 / $num2;
                                        break;
                                    case '%':
                                        $hasil = ($num1 / 100) * $num2;
                                        break;

                                    default:
                                        echo "Operator tidak valid";
                                        break;
                                }
                                // hasil dari perhitungan
                                echo "$num1 $operator $num2 = $hasil";
                            }
                            // jika belum ada hasil, maka tampil placeholder HASIL
                        } else {
                            echo "Hasil :";     //
                        }
                        ?>
                    </h4>

                    <!-- tombol MC -->
                    <div class="row">
                            <?php if (isset($hasil) && $hasil !== null): ?>
                                <form method="POST">
                                    <button type="submit" name="resetHasil" class="btn btn-danger" title="Memory Clear">MC</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center">&copy; UKK 2025 | Indira Dewi | XII RPL A</p>
    
    <!-- script boostrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body> 
</html>