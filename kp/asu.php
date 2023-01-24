<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use function PHPSTORM_META\type;

include "koneksi.php";
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["import"])) {      
      $allowedFileType = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      ];
      
      if (in_array($_FILES["file"]["type"], $allowedFileType)) {
            // die(var_dump($_FILES));
            $dir='uploads1/';
            $file_name=$_FILES['file']['name'];
            $size=$_FILES['file']['size'];
            $tmp_file_name=$_FILES['file']['tmp_name'];
            move_uploaded_file($tmp_file_name,$dir.$file_name);
            require_once "Classes/PHPExcel.php";
            $path="uploads1/slt.xlsx";            
            $reader= PHPExcel_IOFactory::createReaderForFile($path);
            // SLT
            $excel_Obj = $reader->load($path);
            $worksheetslt=$excel_Obj->getSheet('1');
            $colomncountslt = $worksheetslt->getHighestDataColumn();
            $rowcountslt = $worksheetslt->getHighestRow();
            $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncountslt);
            $spreadSheetAryslt = $worksheetslt->toArray();
            $sheetCountslt = count($spreadSheetAryslt);
            
            for ($i = 1; $i <= $sheetCountslt; $i++) {
                  $LOT  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 0 ])) {
                        $LOT  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 0 ]);
                  }
                  $ITEM_CODE  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 1 ])) {
                        // die(var_dump($spreadSheetAryslt[$i][ 1 ]));
                        $ITEM_CODE  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 1 ]);
                  }
                  $MACHINE  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 2 ])) {
                        $MACHINE  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 2 ]);
                  }
                  $NEXT_PROSES  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 3 ])) {
                        $NEXT_PROSES  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 3 ]);
                  }
                  $SUPPLIER_COIL_NO  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 4 ])) {
                        $SUPPLIER_COIL_NO  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 4 ]);
                  }
                  $IMR_COIL_NO  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 5 ])) {
                        $IMR_COIL_NO  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 5 ]);
                  }
                  $GRADE  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 6 ])) {
                        $GRADE  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 6 ]);
                  }
                  $FINISH  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 7 ])) {
                        $FINISH  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 7 ]);
                  }
                  $FROM_THICK_MM  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 8 ])) {
                        $FROM_THICK_MM  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 8 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 8 ]);
                  }
                  $TO_THICK  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 9 ])) {
                        $TO_THICK  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 9 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 9 ]);
                  }
                  $ACT_THICK_MIN  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 10 ])) {
                        $ACT_THICK_MIN  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 10 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 10 ]);
                  }
                  $ACT_THICK_MAX  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 11 ])) {
                        $ACT_THICK_MAX  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 11 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 11 ]);
                  }
                  $WIDTH  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 12 ])) {
                        $WIDTH  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 12 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 12 ]);
                  }
                  $WEIGHT  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 13 ])) {
                        $WEIGHT  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 13 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 13 ]);
                  }
                  $OUTPUT_WEIGHT  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 14 ])) {
                        $OUTPUT_WEIGHT  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 14 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 14 ]);
                  }
                  $SCRAP_TEORITIS  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 15 ])) {
                        $SCRAP_TEORITIS  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 15 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 15 ]);
                  }
                  $BABY_COIL  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 16 ])) {
                        $BABY_COIL  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 16 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 16 ]);
                  }
                  $SCRAP_SHEET  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 17 ])) {
                        $SCRAP_SHEET  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 17 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 17 ]);
                  }
                  $SCRAP_SS_TRIM  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 18 ])) {
                        $SCRAP_SS_TRIM  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 18 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 18 ]);
                  }
                  $OUTPUT_WIDTH  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 19 ])) {
                        $OUTPUT_WIDTH  = (mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 19 ])=='')?0:mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 19 ]);
                  }
                  $CUSTOMER_NAME  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 20 ])) {
                        $CUSTOMER_NAME  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 20 ]);
                  }
                  $CPL  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 21 ])) {
                        $CPL  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 21 ]);
                  }
                  $MILL  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 22 ])) {
                        $MILL  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 22 ]);
                  }
                  $BAL  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 23 ])) {
                        $BAL  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 23 ]);
                  }
                  $SLT  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 24 ])) {
                        $SLT  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 24 ]);
                  }
                  $CTL  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 25 ])) {
                        $CTL  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 25 ]);
                  }
                  $REMARK_PPC  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 26 ])) {
                        $REMARK_PPC  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 26 ]);
                  }
                  $FH_1D  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 27 ])) {
                        $FH_1D  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 27 ]);
                  }
                  $SUPPLIER  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 28 ])) {
                        $SUPPLIER  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 28 ]);
                  }
                  $INVOICE  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 29 ])) {
                        $INVOICE  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 29 ]);
                  }
                  $DATE_INVOICE  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 30 ])) {
                        $DATE_INVOICE  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 30 ]);
                        // $dta
                  }
                  $DATE_INCOMING  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 31 ])) {
                        $date  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 31 ]);
                        // die(var_dump($DATE_INCOMING));
                        $DATE_INCOMING = date('Y-m-d', strtotime($date));
                  }
                  $CONTAINER_NO  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 32 ])) {
                        $CONTAINER_NO  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 32 ]);
                  }
                  $HEAT_NO  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 33 ])) {
                        $HEAT_NO  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 33 ]);
                  }
                  $NET_WEIGHT_INCOMING  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 34 ])) {
                        $NET_WEIGHT_INCOMING  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 34 ]);
                  }
                  $GROSS_INCOMING  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 35 ])) {
                        $GROSS_INCOMING  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 35 ]);
                  }
                  $NETT_IMR  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 36 ])) {
                        $NETT_IMR  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 36 ]);
                  }
                  $GROSS_IMR  = '' ;
                  if (isset($spreadSheetAryslt[$i][ 37 ])) {
                        $GROSS_IMR  = mysqli_real_escape_string($conn, $spreadSheetAryslt[$i][ 37 ]);
                  }                  
                  // die(var_dump($LOT));
                  $queryslt = "INSERT INTO slt(LOT,ITEM_CODE,MACHINE,NEXT_PROSES,SUPPLIER_COIL_NO,IMR_COIL_NO,GRADE,FINISH,FROM_THICK_MM,TO_THICK,ACT_THICK_MIN,ACT_THICK_MAX,WIDTH,WEIGHT,OUTPUT_WEIGHT,SCRAP_TEORITIS,BABY_COIL,SCRAP_SHEET,SCRAP_SS_TRIM,OUTPUT_WIDTH,CUSTOMER_NAME,CPL,MILL,BAL,SLT,CTL,REMARK_PPC,FH_1D,SUPPLIER,INVOICE,DATE_INVOICE,DATE_INCOMING,CONTAINER_NO,HEAT_NO,NET_WEIGHT_INCOMING,GROSS_INCOMING,NETT_IMR,GROSS_IMR) VALUES('".$LOT."','".$ITEM_CODE."','".$MACHINE."','".$NEXT_PROSES."','".$SUPPLIER_COIL_NO."','".$IMR_COIL_NO."','".$GRADE."','".$FINISH."','".$FROM_THICK_MM."','".$TO_THICK."','".$ACT_THICK_MIN."','".$ACT_THICK_MAX."','".$WIDTH."','".$WEIGHT."','".$OUTPUT_WEIGHT."','".$SCRAP_TEORITIS."','".$BABY_COIL."','".$SCRAP_SHEET."','".$SCRAP_SS_TRIM."','".$OUTPUT_WIDTH."','".$CUSTOMER_NAME."','".$CPL."','".$MILL."','".$BAL."','".$SLT."','".$CTL."','".$REMARK_PPC."','".$FH_1D."','".$SUPPLIER."','".$INVOICE."','".$DATE_INVOICE."','".$DATE_INCOMING."','".$CONTAINER_NO."','".$HEAT_NO."','".$NET_WEIGHT_INCOMING."','".$GROSS_INCOMING."','".$NETT_IMR."','".$GROSS_IMR."')";
                  $resultslt = mysqli_query($conn, $queryslt);
                  // die(var_dump($_FILES));
                  
                  // if (!empty($result)) {
                  // echo "<form action='aaa.php' method='post' name='frmExcelImport' id='frmExcelImport'enctype='multipart/form-data'><div> <input type='file' name='file' id='file' accept='.xls,.xlsx' value='$_FILES'><script></script><button type='submit' id='submit' name='import' class='btn-submit'>Import</button></div></form>";
                  echo "<form id='jsform' action='aaa.php' method='post' name='frmExcelImport' id='frmExcelImport' enctype='multipart/form-data'><input type='file' name='file' id='file' accept='.xls,.xlsx' value='$_FILES'></form><script type='text/javascript'>document.getElementById('jsform').submit();</script>";
                  echo "<script>document.location='aaa.php';</script>";
                  //       $type = "success";
                  //       $message = "Excel Data Imported into the Database";
                  //       echo "<script>document.location='slt.php';</script>";
                  // } else {
                  //       $type = "error";
                  //       $message = "Problem in Importing Excel Data";
                  // }
                  
            }
            $worksheetball=$excel_Obj->getSheet('2');
            $colomncountball = $worksheetball->getHighestDataColumn();
            $rowcountball = $worksheetball->getHighestRow();
            $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncountball);
            $spreadSheetAryball = $worksheetball->toArray();
            $sheetCountball = count($spreadSheetAryball);
            for ($i=1; $i < $sheetCountball; $i++) { 
                  $LOT  = '' ;
                  if (isset($spreadSheetAryball[$i][ 0 ])) {
                  $LOT  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 0 ]);
                  }
                  $ITEM_CODE  = '' ;
                  if (isset($spreadSheetAryball[$i][ 1 ])) {
                  $ITEM_CODE  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 1 ]);
                  }
                  $MACHINE  = '' ;
                  if (isset($spreadSheetAryball[$i][ 2 ])) {
                  $MACHINE  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 2 ]);
                  }
                  $NEXT_PROSES  = '' ;
                  if (isset($spreadSheetAryball[$i][ 3 ])) {
                  $NEXT_PROSES  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 3 ]);
                  }
                  $SUPPLIER_COIL_NO  = '' ;
                  if (isset($spreadSheetAryball[$i][ 4 ])) {
                  $SUPPLIER_COIL_NO  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 4 ]);
                  }
                  $IMR_COIL_NO  = '' ;
                  if (isset($spreadSheetAryball[$i][ 5 ])) {
                  $IMR_COIL_NO  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 5 ]);
                  }
                  $GRADE  = '' ;
                  if (isset($spreadSheetAryball[$i][ 6 ])) {
                  $GRADE  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 6 ]);
                  }
                  $FINISH  = '' ;
                  if (isset($spreadSheetAryball[$i][ 7 ])) {
                  $FINISH  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 7 ]);
                  }
                  $FROM_THICK  = '' ;
                  if (isset($spreadSheetAryball[$i][ 8 ])) {
                  $FROM_THICK  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 8 ]);
                  }
                  $TO_THICK  = '' ;
                  if (isset($spreadSheetAryball[$i][ 9 ])) {
                  $TO_THICK  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 9 ]);
                  }
                  $ACT_THICK_MIN  = '' ;
                  if (isset($spreadSheetAryball[$i][ 10 ])) {
                  $ACT_THICK_MIN  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 10 ]);
                  }
                  $ACT_THICK_MAX  = '' ;
                  if (isset($spreadSheetAryball[$i][ 11 ])) {
                  $ACT_THICK_MAX  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 11 ]);
                  }
                  $WIDTH  = '' ;
                  if (isset($spreadSheetAryball[$i][ 12 ])) {
                  $WIDTH  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 12 ]);
                  }
                  $WEIGHT  = '' ;
                  if (isset($spreadSheetAryball[$i][ 13 ])) {
                  $WEIGHT  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 13 ]);
                  }
                  $OUTPUT_WEIGHT  = '' ;
                  if (isset($spreadSheetAryball[$i][ 14 ])) {
                  $OUTPUT_WEIGHT  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 14 ]);
                  }
                  $BABY_COIL  = '' ;
                  if (isset($spreadSheetAryball[$i][ 15 ])) {
                  $BABY_COIL  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 15 ]);
                  }
                  $SCRAP_SHEET  = '' ;
                  if (isset($spreadSheetAryball[$i][ 16 ])) {
                  $SCRAP_SHEET  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 16 ]);
                  }
                  $SALES_CONTRAK  = '' ;
                  if (isset($spreadSheetAryball[$i][ 17 ])) {
                  $SALES_CONTRAK  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 17 ]);
                  }
                  $CUSTOMER_NAME  = '' ;
                  if (isset($spreadSheetAryball[$i][ 18 ])) {
                  $CUSTOMER_NAME  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 18 ]);
                  }
                  $PROSES_CPL  = '' ;
                  if (isset($spreadSheetAryball[$i][ 19 ])) {
                  $PROSES_CPL  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 19 ]);
                  }
                  $PROSES_MILL  = '' ;
                  if (isset($spreadSheetAryball[$i][ 20 ])) {
                  $PROSES_MILL  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 20 ]);
                  }
                  $PROSES_BAL  = '' ;
                  if (isset($spreadSheetAryball[$i][ 21 ])) {
                  $PROSES_BAL  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 21 ]);
                  }
                  $PROSES_SLT  = '' ;
                  if (isset($spreadSheetAryball[$i][ 22 ])) {
                  $PROSES_SLT  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 22 ]);
                  }
                  $PROSES_CTL  = '' ;
                  if (isset($spreadSheetAryball[$i][ 23 ])) {
                  $PROSES_CTL  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 23 ]);
                  }
                  $REMARK_PPC  = '' ;
                  if (isset($spreadSheetAryball[$i][ 24 ])) {
                  $REMARK_PPC  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 24 ]);
                  }
                  $SUPPLIER  = '' ;
                  if (isset($spreadSheetAryball[$i][ 25 ])) {
                  $SUPPLIER  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 25 ]);
                  }
                  $INVOICE  = '' ;
                  if (isset($spreadSheetAryball[$i][ 26 ])) {
                  $INVOICE  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 26 ]);
                  }
                  $DATE_INVOICE  = '' ;
                  if (isset($spreadSheetAryball[$i][ 27 ])) {
                  $DATE_INVOICE  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 27 ]);
                  }
                  $DATE_INCOMING  = '' ;
                  if (isset($spreadSheetAryball[$i][ 28 ])) {
                  $DATE_INCOMING  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 28 ]);
                  }
                  $DATE_ROLL  = '' ;
                  if (isset($spreadSheetAryball[$i][ 29 ])) {
                  $DATE_ROLL  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 29 ]);
                  }
                  $TODAY  = '' ;
                  if (isset($spreadSheetAryball[$i][ 30 ])) {
                  $TODAY  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 30 ]);
                  }
                  $WIP_AGING  = '' ;
                  if (isset($spreadSheetAryball[$i][ 31 ])) {
                  $WIP_AGING  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 31 ]);
                  }
                  $RM_AGING  = '' ;
                  if (isset($spreadSheetAryball[$i][ 32 ])) {
                  $RM_AGING  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 32 ]);
                  }
                  $CONTAINER_NO  = '' ;
                  if (isset($spreadSheetAryball[$i][ 33 ])) {
                  $CONTAINER_NO  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 33 ]);
                  }
                  $HEAT_NO  = '' ;
                  if (isset($spreadSheetAryball[$i][ 34 ])) {
                  $HEAT_NO  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 34 ]);
                  }
                  $NET_WEIGHT_INCOMING  = '' ;
                  if (isset($spreadSheetAryball[$i][ 35 ])) {
                  $NET_WEIGHT_INCOMING  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 35 ]);
                  }
                  $GROSS_INCOMING  = '' ;
                  if (isset($spreadSheetAryball[$i][ 36 ])) {
                  $GROSS_INCOMING  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 36 ]);
                  }
                  $NETT_IMR  = '' ;
                  if (isset($spreadSheetAryball[$i][ 37 ])) {
                  $NETT_IMR  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 37 ]);
                  }
                  $GROSS_IMR  = '' ;
                  if (isset($spreadSheetAryball[$i][ 38 ])) {
                  $GROSS_IMR  = mysqli_real_escape_string($conn, $spreadSheetAryball[$i][ 38 ]);
                  }
            }
            $queryball = "INSERT INTO ball('LOT,ITEM_CODE,MACHINE,NEXT_PROSES,SUPPLIER_COIL_NO,IMR_COIL_NO,GRADE,FINISH,FROM_THICK,TO_THICK,ACT_THICK_MIN,ACT_THICK_MAX,WIDTH,WEIGHT,OUTPUT_WEIGHT,BABY_COIL,SCRAP_SHEET,SALES_CONTRAK,CUSTOMER_NAME,PROSES_CPL,PROSES_MILL,PROSES_BAL,PROSES_SLT,PROSES_CTL,REMARK_PPC,SUPPLIER,INVOICE,DATE_INVOICE,DATE_INCOMING,DATE_ROLL,TODAY,WIP_AGING,RM_AGING,CONTAINER_NO,HEAT_NO,NET_WEIGHT_INCOMING,GROSS_INCOMING,NETT_IMR,GROSS_IMR') VALUES('".$LOT."','".$ITEM_CODE."','".$MACHINE."','".$NEXT_PROSES."','".$SUPPLIER_COIL_NO."','".$IMR_COIL_NO."','".$GRADE."','".$FINISH."','".$FROM_THICK."','".$TO_THICK."','".$ACT_THICK_MIN."','".$ACT_THICK_MAX."','".$WIDTH."','".$WEIGHT."','".$OUTPUT_WEIGHT."','".$BABY_COIL."','".$SCRAP_SHEET."','".$SALES_CONTRAK."','".$CUSTOMER_NAME."','".$PROSES_CPL."','".$PROSES_MILL."','".$PROSES_BAL."','".$PROSES_SLT."','".$PROSES_CTL."','".$REMARK_PPC."','".$SUPPLIER."','".$INVOICE."','".$DATE_INVOICE."','".$DATE_INCOMING."','".$DATE_ROLL."','".$TODAY."','".$WIP_AGING."','".$RM_AGING."','".$CONTAINER_NO."','".$HEAT_NO."','".$NET_WEIGHT_INCOMING."','".$GROSS_INCOMING."','".$NETT_IMR."','".$GROSS_IMR."')";
            $resultball = mysqli_query($conn, $queryball);
            if ((!empty($resultslt))&&(!empty($resultball))) {
                  echo "<script>document.location='slt.php';</script>";
                  $type = "success";
                  $message = "Excel Data Imported into the Database";
                  echo "<script>document.location='slt.php';</script>";
            } else {
                  $type = "error";
                  $message = "Problem in Importing Excel Data";
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


                              <div style="overflow-x:auto;">
                                    <?php
                              $sqlSelect = "SELECT * FROM slt";
                              $result = $koneksi->query($sqlSelect);
                              if (!empty($result)) { {
                                          ?>
                                    <table class='table table-sucess table-striped table-hover table-bordered'
                                          border="1">
                                          <thead>
                                                <tr>
                                                      <th> LOT </th>
                                                      <th> ITEM_CODE </th>
                                                      <th> MACHINE </th>
                                                      <th> NEXT_PROSES </th>
                                                      <th> SUPPLIER_COIL_NO </th>
                                                      <th> IMR_COIL_NO </th>
                                                      <th> GRADE </th>
                                                      <th> FINISH </th>
                                                      <th> FROM_THICK_MM </th>
                                                      <th> TO_THICK </th>
                                                      <th> ACT_THICK_MIN </th>
                                                      <th> ACT_THICK_MAX </th>
                                                      <th> WIDTH </th>
                                                      <th> WEIGHT </th>
                                                      <th> OUTPUT_WEIGHT </th>
                                                      <th> SCRAP_TEORITIS </th>
                                                      <th> BABY_COIL </th>
                                                      <th> SCRAP_SHEET </th>
                                                      <th> SCRAP_SS_TRIM </th>
                                                      <th> OUTPUT_WIDTH </th>
                                                      <th> CUSTOMER_NAME </th>
                                                      <th> CPL </th>
                                                      <th> MILL </th>
                                                      <th> BAL </th>
                                                      <th> SLT </th>
                                                      <th> CTL </th>
                                                      <th> REMARK_PPC </th>
                                                      <th> FH_1D </th>
                                                      <th> SUPPLIER </th>
                                                      <th> INVOICE </th>
                                                      <th> DATE_INVOICE </th>
                                                      <th> DATE_INCOMING </th>
                                                      <th> CONTAINER_NO </th>
                                                      <th> HEAT_NO </th>
                                                      <th> NET_WEIGHT_INCOMING </th>
                                                      <th> GROSS_INCOMING </th>
                                                      <th> NETT_IMR </th>
                                                      <th> GROSS_IMR </th>
                                                </tr>
                                          </thead>
                                          <?php
                                    foreach ($result as $row) {
                                          ?>
                                          <tbody>
                                                <tr>
                                                      <td><?php echo $row['LOT'] ?></td>
                                                      <td><?php echo $row['ITEM_CODE'] ?></td>
                                                      <td><?php echo $row['MACHINE'] ?></td>
                                                      <td><?php echo $row['NEXT_PROSES'] ?></td>
                                                      <td><?php echo $row['SUPPLIER_COIL_NO'] ?></td>
                                                      <td><?php echo $row['IMR_COIL_NO'] ?></td>
                                                      <td><?php echo $row['GRADE'] ?></td>
                                                      <td><?php echo $row['FINISH'] ?></td>
                                                      <td><?php echo $row['FROM_THICK_MM'] ?></td>
                                                      <td><?php echo $row['TO_THICK'] ?></td>
                                                      <td><?php echo $row['ACT_THICK_MIN'] ?></td>
                                                      <td><?php echo $row['ACT_THICK_MAX'] ?></td>
                                                      <td><?php echo $row['WIDTH'] ?></td>
                                                      <td><?php echo $row['WEIGHT'] ?></td>
                                                      <td><?php echo $row['OUTPUT_WEIGHT'] ?></td>
                                                      <td><?php echo $row['SCRAP_TEORITIS'] ?></td>
                                                      <td><?php echo $row['BABY_COIL'] ?></td>
                                                      <td><?php echo $row['SCRAP_SHEET'] ?></td>
                                                      <td><?php echo $row['SCRAP_SS_TRIM'] ?></td>
                                                      <td><?php echo $row['OUTPUT_WIDTH'] ?></td>
                                                      <td><?php echo $row['CUSTOMER_NAME'] ?></td>
                                                      <td><?php echo $row['CPL'] ?></td>
                                                      <td><?php echo $row['MILL'] ?></td>
                                                      <td><?php echo $row['BAL'] ?></td>
                                                      <td><?php echo $row['SLT'] ?></td>
                                                      <td><?php echo $row['CTL'] ?></td>
                                                      <td><?php echo $row['REMARK_PPC'] ?></td>
                                                      <td><?php echo $row['FH_1D'] ?></td>
                                                      <td><?php echo $row['SUPPLIER'] ?></td>
                                                      <td><?php echo $row['INVOICE'] ?></td>
                                                      <td><?php echo $row['DATE_INVOICE'] ?></td>
                                                      <td><?php echo $row['DATE_INCOMING'] ?></td>
                                                      <td><?php echo $row['CONTAINER_NO'] ?></td>
                                                      <td><?php echo $row['HEAT_NO'] ?></td>
                                                      <td><?php echo $row['NET_WEIGHT_INCOMING'] ?></td>
                                                      <td><?php echo $row['GROSS_INCOMING'] ?></td>
                                                      <td><?php echo $row['NETT_IMR'] ?></td>
                                                      <td><?php echo $row['GROSS_IMR'] ?></td>
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
</div>