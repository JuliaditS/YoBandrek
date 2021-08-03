<?php
error_reporting(0);
include "../includes/functions.php";
$meja = mysqli_query($conn, "SELECT * FROM `data_meja` ORDER BY `data_meja`.`no_meja` ASC");
$daftar= array();
while($data = mysqli_fetch_array($meja)){
?>
        
        <div class="col-md-4 mt-3">
            <?php 
            if($data['status'] == 'tersedia'){ ?>
                <p style="color: black; text-decoration: none">
                <div class="card text-black bg-white">
            <?php } else{ ?>
                <?php
                $nomejapemesanan= $data['no_meja']." "."$data['no_pemesanan']";
                $angka = substr($nomejapemesanan, 3);
                array_push($nomejapemesanan); 
                for ($i=0; $i <sizeof($daftar) ; $i++) { 
                     if ($daftar[i]!=$data['no_pemesanan']) {
                         
                     }
                 } 
                switch ($angka) {
                    case '1':
                        ?>
                        <p style="color: white; text-decoration: none">
                        <div class="card text-white bg-success">
                        <?php
                        break;
                    case '2':
                        ?>
                        <p style="color: white; text-decoration: none">
                        <div class="card text-white bg-primary">
                        <?php
                        break;
                    case '3':
                        ?>
                        <p style="color: white; text-decoration: none">
                        <div class="card text-white bg-secondary">
                        <?php
                        break;
                    case '4':
                        ?>
                        <p style="color: white; text-decoration: none">
                        <div class="card text-white bg-danger">
                        <?php
                        break;
                    case '5':
                        ?>
                        <p style="color: white; text-decoration: none">
                        <div class="card text-white bg-warning">
                        <?php
                        break;
                    case '6':
                        ?>
                        <p style="color: white; text-decoration: none">
                        <div class="card text-white bg-info">
                        <?php
                        break;
                    case '7':
                        ?>
                        <p style="color: dark; text-decoration: none">
                        <div class="card text-dark bg-light">
                        <?php
                        break;
                    case '8':
                        ?>
                        <p style="color: white; text-decoration: none">
                        <div class="card text-white bg-dark">
                        <?php
                        break;
                    default:
                        ?>
                        <p style="color: white; text-decoration: none">
                        <div class="card text-white bg-mute">
                        <?php
                        break;
                }

                 ?>
                
            <?php } ?>
                
                <h3 class="my-5">    
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" value="" name="nomeja" id="<?php echo $data['no_pemesanan'] ?>" onchange="myfunction(this)">
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
<?php } ?>      