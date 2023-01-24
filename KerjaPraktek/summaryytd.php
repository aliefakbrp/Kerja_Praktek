<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Yield Data Report</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="IMR_ARC_STEEL3.png" type="image/png">
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
      <div id="wrapper" class="wrapper-content">
            <?php
        include "sidebar1.php"
    ?>
            <div id="page-content-wrapper">
                  <nav class="navbar navbar-default">
                        <div class="container">
                              <div class="navbar-header">
                                    <button class="btn-menu btn btn-toggle-menu" type="button"
                                          style="background :#466d69; color:#E9E8E8;"><i class='fas fa-bars'></i>
                                    </button>
                              </div>
                        </div>
                  </nav>
                  <div class="container">
                        <div class="row">
                              <div class="col-lg-12">
                                    <div class="container">
                                          <h1 class="text-center font-weight-bold" style="color: #565757;">Yield
                                                Performance of 2022</h1>
                                          <br>
                                          <form class="row g-4" action="" method="GET">
                                                <div class="col-auto">
                                                      <select class="form-control" name="tahun">
                                                            <option value="">Tahun</option>
                                                            <?php
                                        $mulai= date('Y') - 50;
                                        for($i = $mulai;$i<$mulai + 100;$i++){
                                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                                            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                        }
                                    ?>
                                                      </select>
                                                </div>
                                                <div class="col-auto">
                                                      <input class="form-control btn btn-primary" type="submit"
                                                            name="submit" value="Cari">
                                                </div>
                                          </form>
                                          <?php
                            include 'koneksi.php';
                        ?>
                                          <div class="row justify-content-center">
                                                <div class="col-11">
                                                      <div class="card mt-3">
                                                            <br>
                                                            <table>
                                                                  <tr>
                                                                        <th class="text-center">Chart of Total Prime and
                                                                              Incoming RM</th>
                                                                        <th class="text-center">Chart of Total Yield
                                                                        </th>
                                                                  </tr>
                                                                  <tr>
                                                                        <td><canvas id="myChart" width="500"
                                                                                    height="300"></canvas></td>
                                                                        <td align="center"><canvas id="myChart1"
                                                                                    width="400" height="200">Yield</td>
                                                                  </tr>
                                                            </table>
                                                      </div>
                                                </div>
                                          </div>
                                          <br>
                                          <div>
                                                <table class="table table-hover table-bordered border-secondary">
                                                      <thead class="thead-light">
                                                            <tr class="bg-secondary text-white">
                                                                  <th></th>
                                                                  <th></th>
                                                                  <th>Average</th>
                                                                  <th>Budget</th>
                                                                  <th>January</th>
                                                                  <th>February</th>
                                                                  <th>March</th>
                                                                  <th>April</th>
                                                                  <th>May</th>
                                                                  <th>June</th>
                                                                  <th>July</th>
                                                                  <th>Agustus</th>
                                                                  <th>September</th>
                                                                  <th>Oktober</th>
                                                                  <th>November</th>
                                                                  <th>Desember</th>
                                                                  <th>Acumulation Year To Date</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>

                                                            <tr>
                                                            <tr>
                                                                  <th rowspan="4">304</th>
                                                                  <th>Prime</th>
                                                                  <td></td>
                                                                  <td rowspan="3"></td>
                                                                  <?php
                                                                  $tahun = "2023";
                                                                  $months = ["01","02","03","04","05","06","07","08","09","10","11","12"];
                                                                  $grades = ["304","304L","304/304L","J1","J3"];
                                                                  $kategories = ["Prime","Incoming","Yield","Rolling"];
                                                                  foreach ($months as $month ) {
                                                                    // ($tahun == "")?$total = mysqli_query($koneksi, "SELECT * FROM book2"):$total = mysqli_query($koneksi, "SELECT * FROM book2 WHERE (year(tanggal) = $tahun)");
                                                                    // $query=mysqli_query($koneksi, "SELECT PRIME_SLT FROM book2 WHERE Grade ='304' AND (month(tanggal)=$month AND year(tanggal) = $tahun)");
                                                                    $query=mysqli_query($koneksi, "SELECT * FROM book2 WHERE Grade ='304' AND (month(tanggal)=$month AND year(tanggal) = $tahun);");
                                                                    $hq = [];
                                                                    while($hasil = mysqli_fetch_array($query)){
                                                                        //   die(var_dump($hasil["PRIME_SLT"]));
                                                                          $hq[] = $hasil["PRIME_SLT"];
                                                                        }
                                                                        $hslt=($hq==[])? 0: array_sum($hq);                                                                    
                                                                      echo "<td>".$hslt."</td>";
                                                                  }
                                                                ?>

                                                            </tr>
                                                            <tr>
                                                                  <th>Incoming RM</th>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                            </tr>
                                                            <tr>
                                                                  <th>Yield</th>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                            </tr>
                                                            <tr>
                                                                  <th> % Rerolling</th>
                                                            </tr>
                                                            </tr>

                                                      </tbody>
                                                </table>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script>
      const data = {
            labels: [
                  <?php
                include 'koneksi.php';
                $sql_pendapatan = "SELECT Grade, SUM(PRIME_SLT) AS 'PRIME', SUM(Material_Processed) AS 'IncomingRM', (SUM(PRIME_SLT)/SUM(Material_Processed)*100) AS 'Yield' FROM `book2` GROUP BY (Grade)";
                $hasil_pendapatan = mysqli_query($koneksi, $sql_pendapatan);
                if ($hasil_pendapatan == false){
                    echo("Error description: ". mysqli_error($koneksi));die;
                }
                if (mysqli_num_rows($hasil_pendapatan) > 0){
                    while ($row_pendapatan = mysqli_fetch_assoc($hasil_pendapatan)){
                        echo "'".str_replace("'", "", $row_pendapatan['Grade'])."',";
                    }
                }      
            ?>
            ],
            datasets: [{
                        type: 'line',
                        label: 'PRIME',
                        data: [
                              <?php
                    $hasil_pendapatan = mysqli_query($koneksi, $sql_pendapatan);
                    if ($hasil_pendapatan == false){
                        echo("Error description: ". mysqli_error($koneksi));die;
                    }
                    if (mysqli_num_rows($hasil_pendapatan) > 0){
                        while ($row_pendapatan = mysqli_fetch_assoc($hasil_pendapatan)){
                            echo "'".$row_pendapatan['PRIME']."',";
                        }
                    }      
                ?>
                        ],
                        fill: false,
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1
                  },
                  {
                        type: 'line',
                        label: 'Incoming RM',
                        data: [
                              <?php
                    $hasil_pendapatan = mysqli_query($koneksi, $sql_pendapatan);
                    if ($hasil_pendapatan == false){
                        echo("Error description: ". mysqli_error($koneksi));die;
                    }
                    if (mysqli_num_rows($hasil_pendapatan) > 0){
                        while ($row_pendapatan = mysqli_fetch_assoc($hasil_pendapatan)){
                            echo "'".$row_pendapatan['IncomingRM']."',";
                        }
                    }      
                ?>
                        ],
                        borderColor: 'rgb(54, 162, 235)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                  }
            ]
      };

      const config = {
            type: 'scatter',
            data: data,
            options: {
                  scales: {
                        y: {
                              beginAtZero: true
                        }
                  }
            }
      };

      const datayield = {
            labels: [
                  <?php
                include 'koneksi.php';
                $sql_pendapatan = "SELECT Grade, SUM(PRIME_SLT) AS 'PRIME', SUM(Material_Processed) AS 'IncomingRM', (SUM(PRIME_SLT)/SUM(Material_Processed)*100) AS 'Yield' FROM `book2` GROUP BY (Grade)";
                $hasil_pendapatan = mysqli_query($koneksi, $sql_pendapatan);
                if ($hasil_pendapatan == false){
                    echo("Error description: ". mysqli_error($koneksi));die;
                }
                if (mysqli_num_rows($hasil_pendapatan) > 0){
                    while ($row_pendapatan = mysqli_fetch_assoc($hasil_pendapatan)){
                        echo "'".str_replace("'", "", $row_pendapatan['Grade'])."',";
                    }
                }      
            ?>
            ],
            datasets: [{
                  label: 'Yield',
                  data: [
                        <?php
                    $hasil_pendapatan = mysqli_query($koneksi, $sql_pendapatan);
                    if ($hasil_pendapatan == false){
                        echo("Error description: ". mysqli_error($koneksi));die;
                    }
                    if (mysqli_num_rows($hasil_pendapatan) > 0){
                        while ($row_pendapatan = mysqli_fetch_assoc($hasil_pendapatan)){
                            echo "'".$row_pendapatan['Yield']."',";
                        }
                    }      
                ?>
                  ],
                  hoverOffset: 4
            }]
      };

      const configyield = {
            type: 'doughnut',
            data: datayield
      };

      const myChart = new Chart(document.getElementById('myChart'), config);
      const myChart1 = new Chart(document.getElementById('myChart1'), configyield);
      </script>
</body>

</html>