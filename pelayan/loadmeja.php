<?php
error_reporting(0);
include "../includes/functions.php";
$meja = mysqli_query($conn, "SELECT * FROM `data_meja` ORDER BY `data_meja`.`no_meja` ASC");
while($data = mysqli_fetch_array($meja)){
?>
        
        <div class="col-md-4 mt-3">
            <?php 
            if($data['status'] == 'tersedia'){ ?>
                <a style="color: black; text-decoration: none" href="">
                <div class="card text-black bg-white">
            <?php } else{ ?>
                <a style="color: white; text-decoration: none" href="">
                <div class="card text-white bg-success">
                
            <?php } ?>
                
                <h3 class="my-5">    
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Meja <?php echo $data['no_meja'];?>
                        </label>
                    </div>
                </h3>
                
            </div>
            </a>
        </div>
<?php } ?>      