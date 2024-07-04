<?php

// Fungsi untuk menghitung angsuran bulanan
function calculateInstallment($loanAmount, $annualInterestRate, $downPayment, $loanTerm)
{
    $monthlyInterestRate = $annualInterestRate / 12 / 100;
    $loanAmountAfterDownPayment = $loanAmount - ($loanAmount * $downPayment / 100);
    $numerator = $loanAmountAfterDownPayment * $monthlyInterestRate;
    $denominator = 1 - pow(1 + $monthlyInterestRate, -$loanTerm);
    $monthlyPayment = $numerator / $denominator;
    return $monthlyPayment;
}

// Fungsi untuk membuat tabel angsuran
function generatePaymentSchedule($loanAmount, $annualInterestRate, $downPayment, $loanTerm)
{
    // Mengonversi tenor dari tahun ke bulan
    $loanTermMonths = $loanTerm * 12;

    // Menghitung pinjaman sebenarnya setelah dikurangi uang muka
    $actualLoanAmount = $loanAmount - ($loanAmount * $downPayment / 100);

    // Menghitung angsuran pokok tetap setiap bulan
    $monthlyPrincipal = $actualLoanAmount / $loanTermMonths;

    // Menghitung bunga tetap setiap bulan berdasarkan pinjaman awal
    $monthlyInterest = ($actualLoanAmount * $annualInterestRate / 100) / 12;

    // Menghitung total pembayaran bulanan (angsuran pokok + bunga)
    $installment = $monthlyPrincipal + $monthlyInterest;

    $paymentSchedule = [];
    $remainingBalance = $actualLoanAmount;
    $totalPrincipal = 0;
    $totalInterest = 0;
    $totalPayment = 0;

    for ($i = 1; $i <= $loanTermMonths; $i++) {
        // Memasukkan data pembayaran ke dalam array
        $paymentSchedule[] = [
            'Month' => $i,
            'Principal' => $monthlyPrincipal,
            'Interest' => $monthlyInterest,
            'TotalPayment' => $installment,
            'Balance' => $remainingBalance -= $monthlyPrincipal, // Mengurangi sisa pinjaman dengan pembayaran pokok
        ];

        // Menghitung total pembayaran
        $totalPrincipal += $monthlyPrincipal;
        $totalInterest += $monthlyInterest;
        $totalPayment += $installment;
    }

    return [
        'paymentSchedule' => $paymentSchedule,
        'totalPrincipal' => $totalPrincipal,
        'totalInterest' => $totalInterest,
        'totalPayment' => $totalPayment,
        'remainingBalance' => $remainingBalance // Sisa pinjaman berdasarkan total angsuran pokok yang sudah dibayarkan
    ];
}


// Mengambil nilai dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hargaProduk = $_POST['hargaBarang'];
    $bungaPinjaman = $_POST['bungaPinjaman'];
    $uangMuka = $_POST['uangMuka'];
    $jangkaWaktu = $_POST['jangkaWaktu'];

    // Perhitungan
    $pinjamanFlat = $hargaProduk * ($bungaPinjaman / 100);
    $totalPinjaman = $hargaProduk + $pinjamanFlat;
    $uangMukaAmount = $hargaProduk * ($uangMuka / 100);
    $sisaPinjaman = $totalPinjaman - $uangMukaAmount;

    // Tabel Angsuran
    $result = generatePaymentSchedule($hargaProduk, $bungaPinjaman, $uangMuka, $jangkaWaktu);
    $paymentSchedule = $result['paymentSchedule'];
    $totalPrincipal = $result['totalPrincipal'];
    $totalInterest = $result['totalInterest'];
    $totalPayment = $result['totalPayment'];
    $remainingBalance = $result['remainingBalance'];
}

?>

<!-- content start  -->
<div class="database tabel-data-anda">
    <table class="table table-striped table-dark table-hover mb-5">
        <thead>
            <tr>
                <th scope="col" colspan="2"><h3 class="fw-bold">Data Anda</h3></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-end">Harga Barang :</td>
                <td class="text-start">Rp <?php echo number_format($hargaProduk, 2); ?></td>
            </tr>
            <tr>
                <td class="text-end">Uang Muka :</td>
                <td class="text-start">Rp <?php echo number_format($uangMukaAmount, 2); ?> <br> (<?php echo $uangMuka; ?>%)</td>
            </tr>
            <tr>
                <td class="text-end">Jangka Waktu :</td>
                <td class="text-start"><?php echo $jangkaWaktu; ?> Tahun <br>(<?php echo $jangkaWaktu * 12; ?> bulan)</td>
            </tr>
            <tr>
                <td class="text-end">Bunga Pinjaman :</td>
                <td class="text-start"><?php echo $bungaPinjaman; ?> %</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="database tabel-angsuran">
    <h2>Hasil Simulasi Kredit</h2>
    <table class="table table-striped table-dark table-hover mb-5">
        <thead>
            <tr>
                <th scope="col">Bulan</th>
                <th scope="col">Angsuran Pokok</th>
                <th scope="col">Bunga</th>
                <th scope="col">Total Angsuran</th>
                <th scope="col">Sisa Pinjaman</th>
            </tr>
        </thead>
        <tbody>
    <!-- Menambahkan bulan 0 dengan sisa pinjaman saja -->
    <tr>
        <td>0</td>
        <td>Rp 0,00</td>
        <td>Rp 0,00</td>
        <td>Rp 0,00</td>
        <td>Rp <?php echo number_format($hargaProduk-$uangMukaAmount, 2); ?></td>
    </tr>

    <!-- Loop untuk tabel angsuran -->
    <?php foreach ($paymentSchedule as $payment): ?>
    <tr>
        <td><?php echo $payment['Month']; ?></td>
        <td>Rp <?php echo number_format($payment['Principal'], 2); ?></td>
        <td>Rp <?php echo number_format($payment['Interest'], 2); ?></td>
        <td>Rp <?php echo number_format($payment['TotalPayment'], 2); ?></td>
        <td>Rp <?php echo number_format($payment['Balance'], 2); ?></td>
    </tr>
    <?php endforeach; ?>

    <!-- Menambahkan total -->
    <tr>
        <td><strong>Total</strong></td>
        <td><strong>Rp <?php echo number_format($totalPrincipal, 2); ?></strong></td>
        <td><strong>Rp <?php echo number_format($totalInterest, 2); ?></strong></td>
        <td><strong>Rp <?php echo number_format($totalPayment, 2); ?></strong></td>
        <td><strong>Rp <?php echo number_format($remainingBalance, 2); ?></strong></td>
    </tr>
</tbody>
    </table>
</div>
