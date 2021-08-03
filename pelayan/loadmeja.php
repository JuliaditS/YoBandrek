<?php
error_reporting(0);
include "../includes/functions.php";
$meja = mysqli_query($conn, "SELECT * FROM `data_meja` ORDER BY `data_meja`.`no_meja` ASC");
$meja1 = mysqli_query($conn, "SELECT * FROM `data_meja` ORDER BY `data_meja`.`no_meja` ASC");
$daftar= array();
function acak($panjang)
{
    $karakter= 'ABCDEabcde123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter)-1);
    $string .= $karakter{$pos};
    }
    return $string;
}
while($data2 = mysqli_fetch_array($meja1)){
    $daftar[$data2['no_pemesanan']][]=acak(6);
}
$no=1;
while($data = mysqli_fetch_array($meja)){
?>
        
        <div class="col-md-4 mt-3">
            <?php 
            if($data['status'] == 'tersedia'){ ?>
                <p style="color: black; text-decoration: none">
                <div class="card text-black bg-white">
            <?php } else{ ?>
                <p style="color: white; text-decoration: none">
                <div class="card text-white" style="background-color: #<?php echo $daftar[$data['no_pemesanan']][0]; ?>;">
                <?php
                

                $nomejapemesanan= $data['no_meja']." ".$data['no_pemesanan'];
                $angka = substr($data['no_pemesanan'], -1);
                
                // for ($i=0; $i <= sizeof($daftar); $i++) { 
                //     if ($daftar[$i]!=$data['no_pemesanan']) {
                //         if ($angka==substr($daftar[$i], -1)) {
                //             $angka++;
                //         }
                //     }
                // }
                // array_push($nomejapemesanan); 
                // for ($i=0; $i <sizeof($daftar) ; $i++) { 
                //      if (substr($daftar[i], 3)!=substr($nomejapemesanan, 3)) {
                //          if (substr(substr($nomejapemesanan, 3), -1)==substr(substr($daftar[i], 3), -1)) {
                //              array_push($nomejapemesanan);
                //          }
                //      }
                //  } 
                

                 ?>
                
            <?php } ?>
                
                <h3 class="my-5">    
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" value="<?php echo $data['no_pemesanan'] ?>" name="nomeja[]" id="<?php echo $no; ?>" onchange="myfunction(this)">
                        <input type="hidden" id="status<?php echo $data['no_pemesanan'] ?>" value="<?php echo $data['status']; ?>">
                        <input type="hidden" id="nopemesanan<?php echo $data['no_pemesanan'] ?>" value="<?php echo $data['no_pemesanan'] ?>">
                        <label class="form-check-label" for="defaultCheck1">
                            Meja <?php echo $data['no_meja'];?> <br>
                            Jumlah kursi <?php echo $data['jumlah_kursi'] ?>
                        </label>
                    </div>
                </h3>
                
            </div>
            </a>
        </div>
        <?php $no++; ?>

<?php } ?>   
<input type="hidden" id="no" value="<?php echo $no; ?>">   