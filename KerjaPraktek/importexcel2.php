<div id="wrapper" class="wrapper-content">
      <?php
        include "sidebar1.php"
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
                  <?php
                  if(isset($_SESSION['message'])){
                        echo "<h4>".$_SESSION['message']."</h4>";
                        unset($_SESSION['message']);
                  }
                  ?>
                  <h1 class="text-center font-weight-bold" style="color: #565757;">Input Excel</h1>
                  <br>
            </div>
            <div class="container">
                  <div class="row">
                        <div class="col-lg-12">
                              <form action="code.php">
                                    <input type="file" name="import_file" id="import_file" class="form-control" />
                                    <button type="submit" class="btn btn-primary" name="save_excel_data">import</button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>