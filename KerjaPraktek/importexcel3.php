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
                  $Seq = "";
                  if (isset($spreadSheetAry[$i][1])) {
                        $Seq = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  }
                  $Lot = "";
                  if (isset($spreadSheetAry[$i][2])) {
                        $Lot = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }
                  $Coil_Number = "";
                  if (isset($spreadSheetAry[$i][3])) {
                        $Coil_Number = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  }
                  $Mother_Coil = "";
                  if (isset($spreadSheetAry[$i][4])) {
                        $Mother_Coil = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }
                  $Grade = "";
                  if (isset($spreadSheetAry[$i][5])) {
                        $Grade = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  }
                  $Finish = "";
                  if (isset($spreadSheetAry[$i][6])) {
                        $Finish = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }
                  $Thickness = "";
                  if (isset($spreadSheetAry[$i][7])) {
                        $Thickness = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  }
                  $Width = "";
                  if (isset($spreadSheetAry[$i][8])) {
                        $Width = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }
                  $Material_Processed = "";
                  if (isset($spreadSheetAry[$i][9])) {
                        $Material_Processed = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  }
                  $PRIME_SLT = "";
                  if (isset($spreadSheetAry[$i][10])) {
                        $PRIME_SLT = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }
                  $KW2 = "";
                  if (isset($spreadSheetAry[$i][11])) {
                        $KW2 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  }
                  $BabyCoil = "";
                  if (isset($spreadSheetAry[$i][12])) {
                        $BabyCoil = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }
                  $Scrap = "";
                  if (isset($spreadSheetAry[$i][13])) {
                        $Scrap = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }
                  $SS = "";
                  if (isset($spreadSheetAry[$i][14])) {
                        $SS = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                  }
                  $Weighing_Balance = "";
                  if (isset($spreadSheetAry[$i][15])) {
                        $Weighing_Balance = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                  }

                  if (!empty($Seq)) {
                        // $query = "insert into book2(Seq,Lot,Coil_Number,Mother_Coil,Grade,Finish,Thicknessed,Width,Material_Process,Prime_SLT,KW2,BabyCoil,Scrap,SS,Weighing_Balance) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        // $paramType = "ss";
                        // $paramArray = array(
                        //       $Seq,
                        //       $Lot,
                        //       $Coil_Number,
                        //       $Mother_Coil,
                        //       $Grade,
                        //       $Finish,
                        //       $Thickness,
                        //       $Width,
                        //       $Material_Processed,
                        //       $PRIME_SLT,
                        //       $KW2,
                        //       $BabyCoil,
                        //       $Scrap,
                        //       $SS,
                        //       $Weighing_Balance
                        // );
                        // $insertId = $db->insert($query, $paramType, $paramArray);
                        // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                        $query = "INSERT INTO book2(Seq,Lot,Coil_Number,Mother_Coil,Grade,Finish,Thickness,Width,Material_Processed,PRIME_SLT,KW2,BabyCoil,Scrap,SS,Weighing_Balance) VALUES('".$Seq."','" .$Lot."','" .$Coil_Number."','" .$Mother_Coil."','" .$Grade."','" .$Finish."','" .$Thickness."','" .$Width."','" .$Material_Processed."','" .$PRIME_SLT."','" .$KW2."','" .$BabyCoil."','" .$Scrap."','" .$SS."','" .$Weighing_Balance."')";
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

<!DOCTYPE html>
<html>

<head>
      <style>
      body {
            font-family: Arial;
            width: 550px;
      }

      .outer-container {
            background: #F0F0F0;
            border: #e0dfdf 1px solid;
            padding: 40px 20px;
            border-radius: 2px;
      }

      .btn-submit {
            background: #333;
            border: #1d1d1d 1px solid;
            border-radius: 2px;
            color: #f0f0f0;
            cursor: pointer;
            padding: 5px 20px;
            font-size: 0.9em;
      }

      .tutorial-table {
            margin-top: 40px;
            font-size: 0.8em;
            border-collapse: collapse;
            width: 100%;
      }

      .tutorial-table th {
            background: #f0f0f0;
            border-bottom: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
      }

      .tutorial-table td {
            background: #FFF;
            border-bottom: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
      }

      #response {
            padding: 10px;
            margin-top: 10px;
            border-radius: 2px;
            display: none;
      }

      .success {
            background: #c7efd9;
            border: #bbe2cd 1px solid;
      }

      .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
      }

      div#response.display-block {
            display: block;
      }
      </style>
</head>

<body>
      <h2>Import Excel File into MySQL Database using PHP</h2>

      <div class="outer-container">
            <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                  <div>
                        <label>Choose Excel File</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                        <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                  </div>

            </form>

      </div>
      <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
            <?php if(!empty($message)) { echo $message; } ?></div>


      <?php
$sqlSelect = "SELECT * FROM book2";
$result = $db->select($sqlSelect);
if (! empty($result)) {
    ?>

      <table class='tutorial-table'>
            <thead>
                  <tr>
                        <th>Name</th>
                        <th>Description</th>

                  </tr>
            </thead>
            <?php
    foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
        ?>
            <tbody>
                  <tr>
                        <td><?php  echo $row['Seq']; ?></td>
                  </tr>
                  <?php
    }
    ?>
            </tbody>
      </table>
      <?php
}
?>

</body>

</html>