<?php
session_start();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data'])){
      $fileName = $_FILES['import_file']['name'];
      $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
      $allowedType = ['xls', 'xlsx', 'csv'];
      if(in_array($fileExt,$allowedType)){
            $inputFileNamePath = $_FILES['import_file']['tmp_name'];            
            $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
            $data=$spreadsheet->getActiveSheet()->toArray();
            foreach($data as $row){
                  $Seq=$row['0'];
                  $Lot=$row['1'];
                  $Coil_Number=$row['2'];
                  $Mother_Coil=$row['3'];
                  $Grade=$row['4'];
                  $Finish=$row['5'];
                  $Thicknessed=$row['6'];
                  $Width=$row['7'];
                  $Material_Process=$row['8'];
                  $Prime_STL=$row['9'];
                  $KW2=$row['10'];
                  $BabyCoil=$row['11'];
                  $Scarp=$row['12'];
                  $SS=$row['13'];
                  $Weighing_Balance=$row['14'];
                  $tanggal=$row['15'];
                  $query = "INSERT INTO book2 (Seq,Lot,Coil_Number,Mother_Coil,Grade,Finish,Thicknessed,Width,Material_Process,Prime_STL,KW2,BabyCoil,Scarp,SS,Weighing_Balance,tanggal) VALUES ($Seq,$Lot,$Coil_Number,$Mother_Coil,$Grade,$Finish,$Thicknessed,$Width,$Material_Process,$Prime_STL,$KW2,$BabyCoil,$Scarp,$SS,$Weighing_Balance,$tanggal)";
                  $result = mysqli_query($koneksi, $query);
                  $msg = true;
            }
      }else{
            $_SESSION['message'] = "invalid file";
            header('location:importexcel2.php');
            exit(0);
      }
}
?>