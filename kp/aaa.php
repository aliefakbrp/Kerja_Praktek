<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use function PHPSTORM_META\type;

include "koneksi.php";
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
die(var_dump($_POST));
if (isset($_POST["import"])) {      
      $allowedFileType = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      ];
      
      if (in_array($_FILES["file"]["type"], $allowedFileType)) {
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