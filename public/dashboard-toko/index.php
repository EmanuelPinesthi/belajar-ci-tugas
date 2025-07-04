<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    function curl(){ 
        $curl = curl_init(); 
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:8080/api",
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_CUSTOMREQUEST => "GET", 
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "Key: random123678abcghi",
            ),
        ));
            
        $output = curl_exec($curl); 	
        curl_close($curl);      
        
        $data = json_decode($output);   
        
        return $data;
    } 

    // //test webservice
    // $send1 = curl();
    // echo "<pre>";
    // print_r($send1);
    // echo "</pre>"; 
    
    ?>
    <div class="p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Dashboard - TOKO</h1>
        <p class="fs-5 text-body-secondary"><?= date("l, d-m-Y") ?> <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span></p>
    </div> 
    <hr>
    <!-- tampilkan data disini -->
    <div class="table-responsive card m-5 p-5">
        <table class="table text-center">
            <thead>
                <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 10%;">Username</th>
                <th style="width: 25%;">Alamat</th>
                <th style="width: 10%;">Total Harga</th>
                <th style="width: 10%;">Ongkir</th>
                <th style="width: 10%;">Jumlah Item</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 20%;">Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $send1 = curl();

                    if(!empty($send1)){
                        $hasil1 = $send1->results;
                        $i = 1; 

                        if(!empty($hasil1)){
                            foreach($hasil1 as $item1){ 
                                ?>
                                <tr>
                                    <td scope="row" class="text-start"><?= $i++ ?></td>
                                    <td>
                                        <?= $item1->username; ?>
                                    </td>
                                    <td>
                                        <?= $item1->alamat; ?>
                                    </td>
                                    <td>
                                        <?= number_format($item1->total_harga, 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <?= number_format($item1->ongkir, 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary"><?= $item1->total_items; ?> items</span>
                                    </td>
                                    <td>
                                        <?php if($item1->status == 1): ?>
                                            <span class="badge bg-success">Selesai</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= date('d-m-Y H:i:s', strtotime($item1->created_at)); ?>
                                    </td>
                                </tr> 
                                <?php
                            } 
                        }
                    }
                    ?> 
            </tbody>
        </table>
    </div> 

    <script>
        // Simple clock function
        function updateClock() {
            const now = new Date();
            document.getElementById('jam').textContent = String(now.getHours()).padStart(2, '0');
            document.getElementById('menit').textContent = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('detik').textContent = String(now.getSeconds()).padStart(2, '0');
        }
        
        setInterval(updateClock, 1000);
        updateClock(); // Initial call
    </script>
  </body>
</html>