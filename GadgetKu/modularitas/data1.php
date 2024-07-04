<div class="database">
        <h2>Database Service</h2>
        <table class="table table-striped table-dark table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Email</th>
              <th scope="col">Merek</th>
              <th scope="col">Tanggal Beli</th>
              <th scope="col">Masalah</th>
              <th scope="col">Pernah Mengalami</th>
              <th scope="col">Garansi</th>
              <th scope="col">Kwitansi</th>
              <th scope="col">Catatan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td><?php $nama = $_POST["name"]; echo "$nama"; ?></td>
              <td><?php $noTelepon = $_POST["number"]; echo "$noTelepon"; ?></td>
              <td><?php $email =$_POST["email"]; echo "$email"; ?></td>
              <td><?php $selectOption = $_POST['memType']; echo "$selectOption"; ?></td>
              <td><?php $buyDate = $_POST["buyDate"]; echo "$buyDate"; ?></td>
              <td><?php $complaint = $_POST["complaint"]; echo "$complaint"; ?></td>
              <td><?php 
                    if(isset($_POST['experience'])) {
                    $name = $_POST['experience'];
                    $firstExperienceDisplayed = false; // Variabel untuk melacak apakah $experience pertama sudah ditampilkan
                    foreach ($name as $experience) {
                        if ($firstExperienceDisplayed) {
                            echo ", ".$experience;
                        } else {
                            echo $experience; // Menampilkan $experience pertama tanpa <br/>
                            $firstExperienceDisplayed = true; // Mengubah status $experience pertama menjadi sudah ditampilkan
                        }
                    }
                    } else {
                    echo "NULL";
                    } 
                  ?>
              </td>
              <td><?php $garansi = $_POST["garansi"]; echo "$garansi"; ?></td>
              <td><?php
$uploadDir = 'upload/';
$uploadFile = $uploadDir . basename($_FILES['receipt']['name']);

if (move_uploaded_file($_FILES['receipt']['tmp_name'], $uploadFile)) {
    echo '<img src="' . $uploadFile . '" alt="">';
} else {
    echo 'File gagal diupload <br/>';
}
?>
</td>
              <td><?php $note = $_POST["note"]; echo "$note"; ?></td>
            </tr>
          </tbody>
        </table>
      </div>