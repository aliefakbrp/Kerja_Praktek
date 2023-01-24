<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use function PHPSTORM_META\type;

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

            for ($i = 3; $i <= $sheetCount; $i++) {
                  // $coloms = ["LOT", "ITEM_CODE", "MACHINE", "NEXT_PROSES", "SUPPLIER_COIL_NO", "IMR_COIL_NO", "GRADE", "FINISH", "FROM_THICK_MM", "TO_THICK", "ACT_THICK_MIN", "ACT_THICK_MAX", "WIDTH", "WEIGHT", "OUTPUT_WEIGHT","BABY_COIL","SCRAP_SHEET","SALES_CONTRAK","CUSTOMER_NAME","PROSES_CPL","PROSES_MILL","PROSES_BAL","PROSES_SLT","PROSES_CTL","REMARK_PPC","Supplier","Invoice","Date_Invoice","Date_Incoming","Date_Roll","TODAY","WIP_Aging","RM_Aging","Container_no","Heat_No","NET_Weight_Incoming_MT","GROSS_Incoming","NETT_IMR","GROSS_IMR"];
                  // $u = 0;
                  // foreach ($coloms as $colom ){ 
                  //       $colom = '';
                  //       if (isset($spreadSheetAry[$i][$u])) {
                  //             $colom = mysqli_real_escape_string($conn, $spreadSheetAry[$i][$u]);
                  //             $u+=1;
                  //       }
                  //       // die(var_dump($colom));
                  // }
                  $LOT  = '' ;
                  if (isset($spreadSheetAry[$i][ 0 ])) {
                  $LOT  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 0 ]);
                  }
                  $ITEM_CODE  = '' ;
                  if (isset($spreadSheetAry[$i][ 1 ])) {
                  $ITEM_CODE  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 1 ]);
                  }
                  $MACHINE  = '' ;
                  if (isset($spreadSheetAry[$i][ 2 ])) {
                  $MACHINE  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 2 ]);
                  }
                  $NEXT_PROSES  = '' ;
                  if (isset($spreadSheetAry[$i][ 3 ])) {
                  $NEXT_PROSES  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 3 ]);
                  }
                  $SUPPLIER_COIL_NO  = '' ;
                  if (isset($spreadSheetAry[$i][ 4 ])) {
                  $SUPPLIER_COIL_NO  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 4 ]);
                  }
                  $IMR_COIL_NO  = '' ;
                  if (isset($spreadSheetAry[$i][ 5 ])) {
                  $IMR_COIL_NO  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 5 ]);
                  }
                  $GRADE  = '' ;
                  if (isset($spreadSheetAry[$i][ 6 ])) {
                  $GRADE  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 6 ]);
                  }
                  $FINISH  = '' ;
                  if (isset($spreadSheetAry[$i][ 7 ])) {
                  $FINISH  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 7 ]);
                  }
                  $FROM_THICK_MM  = '' ;
                  if (isset($spreadSheetAry[$i][ 8 ])) {
                  $FROM_THICK_MM  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 8 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 8 ]);
                  }
                  $TO_THICK  = '' ;
                  if (isset($spreadSheetAry[$i][ 9 ])) {
                  $TO_THICK  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 9 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 9 ]);
                  }
                  $ACT_THICK_MIN  = '' ;
                  if (isset($spreadSheetAry[$i][ 10 ])) {
                  $ACT_THICK_MIN  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 10 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 10 ]);
                  }
                  $ACT_THICK_MAX  = '' ;
                  if (isset($spreadSheetAry[$i][ 11 ])) {
                  $ACT_THICK_MAX  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 11 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 11 ]);
                  }
                  $WIDTH  = '' ;
                  if (isset($spreadSheetAry[$i][ 12 ])) {
                  $WIDTH  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 12 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 12 ]);
                  }
                  $WEIGHT  = '' ;
                  if (isset($spreadSheetAry[$i][ 13 ])) {
                  $WEIGHT  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 13 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 13 ]);
                  }
                  $OUTPUT_WEIGHT  = '' ;
                  if (isset($spreadSheetAry[$i][ 14 ])) {
                  $OUTPUT_WEIGHT  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 14 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 14 ]);
                  }
                  $SCRAP_TEORITIS  = '' ;
                  if (isset($spreadSheetAry[$i][ 15 ])) {
                  $SCRAP_TEORITIS  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 15 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 15 ]);
                  }
                  $BABY_COIL  = '' ;
                  if (isset($spreadSheetAry[$i][ 16 ])) {
                  $BABY_COIL  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 16 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 16 ]);
                  }
                  $SCRAP_SHEET  = '' ;
                  if (isset($spreadSheetAry[$i][ 17 ])) {
                  $SCRAP_SHEET  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 17 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 17 ]);
                  }
                  $SCRAP_SS_TRIM  = '' ;
                  if (isset($spreadSheetAry[$i][ 18 ])) {
                  $SCRAP_SS_TRIM  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 18 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 18 ]);
                  }
                  $OUTPUT_WIDTH  = '' ;
                  if (isset($spreadSheetAry[$i][ 19 ])) {
                  $OUTPUT_WIDTH  = (mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 19 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 19 ]);
                  }
                  $CUSTOMER_NAME  = '' ;
                  if (isset($spreadSheetAry[$i][ 20 ])) {
                  $CUSTOMER_NAME  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 20 ]);
                  }
                  $CPL  = '' ;
                  if (isset($spreadSheetAry[$i][ 21 ])) {
                  $CPL  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 21 ]);
                  }
                  $MILL  = '' ;
                  if (isset($spreadSheetAry[$i][ 22 ])) {
                  $MILL  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 22 ]);
                  }
                  $BAL  = '' ;
                  if (isset($spreadSheetAry[$i][ 23 ])) {
                  $BAL  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 23 ]);
                  }
                  $SLT  = '' ;
                  if (isset($spreadSheetAry[$i][ 24 ])) {
                  $SLT  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 24 ]);
                  }
                  $CTL  = '' ;
                  if (isset($spreadSheetAry[$i][ 25 ])) {
                  $CTL  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 25 ]);
                  }
                  $REMARK_PPC  = '' ;
                  if (isset($spreadSheetAry[$i][ 26 ])) {
                  $REMARK_PPC  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 26 ]);
                  }
                  $FH_1D  = '' ;
                  if (isset($spreadSheetAry[$i][ 27 ])) {
                  $FH_1D  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 27 ]);
                  }
                  $SUPPLIER  = '' ;
                  if (isset($spreadSheetAry[$i][ 28 ])) {
                  $SUPPLIER  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 28 ]);
                  }
                  $INVOICE  = '' ;
                  if (isset($spreadSheetAry[$i][ 29 ])) {
                  $INVOICE  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 29 ]);
                  }
                  $DATE_INVOICE  = '' ;
                  if (isset($spreadSheetAry[$i][ 30 ])) {
                  $DATE_INVOICE  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 30 ]);
                  }
                  $DATE_INCOMING  = '' ;
                  if (isset($spreadSheetAry[$i][ 31 ])) {
                  $DATE_INCOMING  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 31 ]);
                  }
                  $CONTAINER_NO  = '' ;
                  if (isset($spreadSheetAry[$i][ 32 ])) {
                  $CONTAINER_NO  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 32 ]);
                  }
                  $HEAT_NO  = '' ;
                  if (isset($spreadSheetAry[$i][ 33 ])) {
                  $HEAT_NO  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 33 ]);
                  }
                  $NET_WEIGHT_INCOMING  = '' ;
                  if (isset($spreadSheetAry[$i][ 34 ])) {
                  $NET_WEIGHT_INCOMING  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 34 ]);
                  }
                  $GROSS_INCOMING  = '' ;
                  if (isset($spreadSheetAry[$i][ 35 ])) {
                  $GROSS_INCOMING  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 35 ]);
                  }
                  $NETT_IMR  = '' ;
                  if (isset($spreadSheetAry[$i][ 36 ])) {
                  $NETT_IMR  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 36 ]);
                  }
                  $GROSS_IMR  = '' ;
                  if (isset($spreadSheetAry[$i][ 37 ])) {
                  $GROSS_IMR  = mysqli_real_escape_string($conn, $spreadSheetAry[$i][ 37 ]);
                  }                  
                  // die(var_dump($LOT));
                  $query = "INSERT INTO slt(LOT,ITEM_CODE,MACHINE,NEXT_PROSES,SUPPLIER_COIL_NO,IMR_COIL_NO,GRADE,FINISH,FROM_THICK_MM,TO_THICK,ACT_THICK_MIN,ACT_THICK_MAX,WIDTH,WEIGHT,OUTPUT_WEIGHT,SCRAP_TEORITIS,BABY_COIL,SCRAP_SHEET,SCRAP_SS_TRIM,OUTPUT_WIDTH,CUSTOMER_NAME,CPL,MILL,BAL,SLT,CTL,REMARK_PPC,FH_1D,SUPPLIER,INVOICE,DATE_INVOICE,DATE_INCOMING,CONTAINER_NO,HEAT_NO,NET_WEIGHT_INCOMING,GROSS_INCOMING,NETT_IMR,GROSS_IMR) VALUES('".$LOT."','".$ITEM_CODE."','".$MACHINE."','".$NEXT_PROSES."','".$SUPPLIER_COIL_NO."','".$IMR_COIL_NO."','".$GRADE."','".$FINISH."','".$FROM_THICK_MM."','".$TO_THICK."','".$ACT_THICK_MIN."','".$ACT_THICK_MAX."','".$WIDTH."','".$WEIGHT."','".$OUTPUT_WEIGHT."','".$SCRAP_TEORITIS."','".$BABY_COIL."','".$SCRAP_SHEET."','".$SCRAP_SS_TRIM."','".$OUTPUT_WIDTH."','".$CUSTOMER_NAME."','".$CPL."','".$MILL."','".$BAL."','".$SLT."','".$CTL."','".$REMARK_PPC."','".$FH_1D."','".$SUPPLIER."','".$INVOICE."','".$DATE_INVOICE."','".$DATE_INCOMING."','".$CONTAINER_NO."','".$HEAT_NO."','".$NET_WEIGHT_INCOMING."','".$GROSS_INCOMING."','".$NETT_IMR."','".$GROSS_IMR."')";
                  $result = mysqli_query($conn, $query);
                         
                  if (!empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                  } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
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
                              $sqlSelect = "SELECT * FROM slt";
                              $result = $koneksi->query($sqlSelect);
                              if (!empty($result)) { {
                                          ?>

                              <table class='table table-sucess table-striped table-hover table-bordered' border="1">
                                    <thead>
                                          <tr>
                                                <th>Seq</th>
                                                <th>LOT</th>
                                                <th>Coil_Number </th>
                                                <th>Mother_Coil</th>
                                                <th>GRADE</th>
                                                <th>FINISH</th>
                                                <th>Thickness</th>
                                                <th>Width</th>
                                                <th>Material_Processed</th>
                                                <th>PRIME_SLT</th>
                                                <th>KW2</th>
                                                <th>BabyCoil</th>
                                                <th>Scrap</th>
                                                <th>SS</th>
                                                <th>Weighing sltance</th>

                                          </tr>
                                    </thead>
                                    <?php
                                    foreach ($result as $row) {
                                          ?>
                                    <tbody>
                                          <tr>
                                                <td><?php echo $row['Seq'] ?></td>
                                                <td><?php echo $row['LOT'] ?></td>
                                                <td><?php echo $row['Coil_Number'] ?></td>
                                                <td><?php echo $row['Mother_Coil'] ?></td>
                                                <td><?php echo $row['GRADE'] ?></td>
                                                <td><?php echo $row['FINISH'] ?></td>
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