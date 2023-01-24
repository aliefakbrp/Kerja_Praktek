<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

      if (in_array($_FILES["file"]["type"], $allowedFileType)) {

            $targetPath = 'uploads/' . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

            $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadSheet = $Reader->load($targetPath);
            $excelSheet = $spreadSheet->getActiveSheet();
            $spreadSheetAry = $excelSheet->toArray();
            $sheetCount = count($spreadSheetAry);

            for ($i = 4; $i <= $sheetCount; $i++) {
                  // $colom = ["Seq", "Lot", "Coil_Number", "Mother_Coil", "Grade", "Finish", "Thickness", "Width", "Material_Processed", "PRIME_SLT", "KW2", "BabyCoil", "Scrap", "SS", "Weighing_Balance", "tanggal"];
                  // for ($u=0; $u < 16; $u++) { 
                  //       $col=$$colom[$u] = '';
                  //       if (isset($spreadSheetAry[$i][$u])) {
                  //             $col = mysqli_real_escape_string($conn, $spreadSheetAry[$i][$u]);
                  //             // die(var_dump($col));
                  //       }
                  // }
                  $Seq = "";
                  if (isset($spreadSheetAry[$i][0])) {
                        $Seq = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  }
                  $Lot = "";
                  if (isset($spreadSheetAry[$i][1])) {
                        $Lot = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }
                  $Coil_Number = "";
                  if (isset($spreadSheetAry[$i][2])) {
                        $Coil_Number = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
                  }
                  $Mother_Coil = "";
                  if (isset($spreadSheetAry[$i][3])) {
                        $Mother_Coil = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
                  }
                  $Grade = "";
                  if (isset($spreadSheetAry[$i][4])) {
                        $Grade = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
                  }
                  $Finish = "";
                  if (isset($spreadSheetAry[$i][5])) {
                        $Finish = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
                  }
                  $Thickness = "";
                  if (isset($spreadSheetAry[$i][6])) {
                        $Thickness = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
                  }
                  $Width = "";
                  if (isset($spreadSheetAry[$i][7])) {
                        $Width = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
                  }
                  $Material_Processed = "";
                  if (isset($spreadSheetAry[$i][8])) {
                        $Material_Processed = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
                        $Material_Processed = preg_replace("/[^0-9]/", "", $Material_Processed);                        
                  }
                  $PRIME_SLT = "";
                  if (isset($spreadSheetAry[$i][9])) {
                        $PRIME_SLT = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
                        $PRIME_SLT = preg_replace("/[^0-9]/", "", $PRIME_SLT);                        
                  }
                  $KW2 = "";
                  if (isset($spreadSheetAry[$i][10])) {
                        $KW2 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]);
                        $KW2 = preg_replace("/[^0-9]/", "", $KW2);                        
                  }
                  $BabyCoil = "";
                  if (isset($spreadSheetAry[$i][11])) {
                        $BabyCoil = mysqli_real_escape_string($conn, $spreadSheetAry[$i][11]);
                        $BabyCoil = preg_replace("/[^0-9]/", "", $BabyCoil);                        
                  }
                  $Scrap = "";
                  if (isset($spreadSheetAry[$i][12])) {
                        $Scrap = mysqli_real_escape_string($conn, $spreadSheetAry[$i][12]);
                        $Scrap = preg_replace("/[^0-9]/", "", $Scrap);                        
                  }
                  $SS = "";
                  if (isset($spreadSheetAry[$i][13])) {
                        $SS = mysqli_real_escape_string($conn, $spreadSheetAry[$i][13]);
                        $SS = preg_replace("/[^0-9]/", "", $SS);                        
                  }
                  $Weighing_Balance = "";
                  if (isset($spreadSheetAry[$i][14])) {
                        $Weighing_Balance = mysqli_real_escape_string($conn, $spreadSheetAry[$i][14]);
                        $Weighing_Balance = preg_replace("/[^0-9]&&[-]/", "", $Weighing_Balance);                        
                  }
                  $tanggal = "";
                  if (isset($spreadSheetAry, $spreadSheetAry[$i][15])) {
                        // $tgl = DateTime::createFromFormat('Y-m-d', $spreadSheetAry[$i][15]);
                        // $tanggal = mysqli_real_escape_string($conn, $tgl);
                        $tanggal = mysqli_real_escape_string($conn, $spreadSheetAry[$i][15]);
                  }

                  if (!empty($Seq)) {                    
                        $query = "INSERT INTO book2(Seq,Lot,Coil_Number,Mother_Coil,Grade,Finish,Thickness,Width,Material_Processed,PRIME_SLT,KW2,BabyCoil,Scrap,SS,Weighing_Balance,tanggal) VALUES('".$Seq."','" .$Lot."','" .$Coil_Number."','" .$Mother_Coil."','" .$Grade."','" .$Finish."','" .$Thickness."','" .$Width."','" .$Material_Processed."','" .$PRIME_SLT."','" .$KW2."','" .$BabyCoil."','" .$Scrap."','" .$SS."','" .$Weighing_Balance."','".$tanggal."')";
                        $result = mysqli_query($conn, $query);
                        if (!empty($result)) {
                              $type = "success";
                              $message = "Excel Data Imported into the Database";
                        } else {
                              $type = "error";
                              $message = "Problem in Importing Excel Data";
                        }
                  }
            }
      }else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>
<div id="wrapper" class="wrapper-content">
      <?php
      include "sidebar1.php";
      include "koneksi.php";
    ?>
      <div id="page-content-wrapper">
            <nav class="navbar navbar-default">
                  <div class="container">
                        <div class="navbar-header">
                              <button class="btn-menu btn btn-toggle-menu" type="button"
                                    style="background :#138D75; color:#E9E8E8;"><i class='fas fa-bars'></i>
                              </button>
                        </div>
                  </div>
            </nav>
            <div class="container">
                  <h1 class="text-center font-weight-bold" style="color: #565757;">Summary Yeild
                        Report Per Month</h1>
                  <br>
            </div>
            <div class="container">
                  <div class="row">
                        <div class="col-lg-12">
                              <h2>Import Excel File into MySQL Database using PHP</h2>

                              <div class="outer-container">
                                    <form action="" method="post" name="frmExcelImport" id="frmExcelImport"
                                          enctype="multipart/form-data">
                                          <div>
                                                <label>Choose Excel
                                                      File</label> <input type="file" name="file" id="file"
                                                      accept=".xls,.xlsx">
                                                <button type="submit" id="submit" name="import"
                                                      class="btn-submit">Import</button>

                                          </div>

                                    </form>

                              </div>
                              <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
                                    <?php if(!empty($message)) { echo $message; } ?>
                              </div>


                              <?php
                              $sqlSelect = "SELECT * FROM book2";
                              $result = $koneksi->query($sqlSelect);
                              if (!empty($result)) { {
                                          ?>

                              <table class='table table-sucess table-striped table-hover table-bordered' border="1">
                                    <thead>
                                          <tr>
                                                <th>Seq</th>
                                                <th>Lot</th>
                                                <th>Coil_Number </th>
                                                <th>Mother_Coil</th>
                                                <th>Grade</th>
                                                <th>Finish</th>
                                                <th>Thickness</th>
                                                <th>Width</th>
                                                <th>Material_Processed</th>
                                                <th>PRIME_SLT</th>
                                                <th>KW2</th>
                                                <th>BabyCoil</th>
                                                <th>Scrap</th>
                                                <th>SS</th>
                                                <th>Weighing Balance</th>

                                          </tr>
                                    </thead>
                                    <?php
                                    foreach ($result as $row) {
                                          ?>
                                    <tbody>
                                          <tr>
                                                <td><?php echo $row['Seq'] ?></td>
                                                <td><?php echo $row['Lot'] ?></td>
                                                <td><?php echo $row['Coil_Number'] ?></td>
                                                <td><?php echo $row['Mother_Coil'] ?></td>
                                                <td><?php echo $row['Grade'] ?></td>
                                                <td><?php echo $row['Finish'] ?></td>
                                                <td><?php echo $row['Thickness'] ?></td>
                                                <td><?php echo $row['Width'] ?></td>
                                                <td><?php echo $row['Material_Processed'] ?></td>
                                                <td><?php echo $row['PRIME_SLT'] ?></td>
                                                <td><?php echo $row['KW2'] ?></td>
                                                <td><?php echo $row['BabyCoil'] ?></td>
                                                <td><?php echo $row['Scrap'] ?></td>
                                                <td><?php echo $row['SS'] ?></td>
                                                <td><?php echo $row['Weighing_Balance'] ?></td>
                                          </tr>
                                          <?php
                                    }
                                    ?>
                                    </tbody>
                              </table>
                              <?php
                                    }
                              }
                              ?>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>