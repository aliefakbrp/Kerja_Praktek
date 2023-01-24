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
                  <h1 class="text-center font-weight-bold" style="color: #565757;">Summary Yeild
                        Report Per Month</h1>
                  <br>
            </div>
            <div class="container">
                  <div class="row">
                        <div class="col-lg-12">
                              <form class="row g-4" method="GET" action="">
                                    <div class="col-auto">
                                          <select class="form-control" name="tahun">
                                                <option value="">Tahun</option>
                                                <?php
                                    $mulai= date('Y') - 10;
                                    for($i = $mulai;$i<$mulai + 20;$i++){
                                        #$sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                          </select>
                                    </div>
                                    <div class="col-auto">
                                          <input class="form-control btn btn-primary" type="submit" value="Cari">
                                    </div>
                                    <div class="col-auto">
                                          <a href="data-report.php"><button
                                                      class="form-control btn btn-secondary">Reset</button></a>
                                    </div>
                              </form>
                              <br>
                              <table class="table table-hover">
                                    <thead class="thead-light">
                                          <tr class="bg-secondary text-white">
                                                <th></th>
                                                <th>RM/Incoming</th>
                                                <th>PRIME_SLT</th>
                                                <th>Secondary </th>
                                                <th>BabyCoil</th>
                                                <th>Scrap</th>
                                                <th>SS</th>
                                                <th>Weighing Balance</th>
                                                <th>Yeild</th>
                                          </tr>
                                    </thead>

                                    <tbody>
                                          <?php
                                    include "koneksi.php";                                    
                                    $tahun    = (isset($_GET['tahun']))? $_GET['tahun'] : "";
                                    $jmp=[];
                                    $jpslt=[];
                                    $jkw2=[];
                                    $jbc=[];
                                    $js=[];
                                    $jss=[];
                                    $jwb=[];
                                    ($tahun == "")?$total = mysqli_query($koneksi, "SELECT * FROM book2"):$total = mysqli_query($koneksi, "SELECT * FROM book2 WHERE (year(tanggal) = $tahun)");
                                    while ($ttampil = mysqli_fetch_array($total)){
                                          $jmp[]=$ttampil["Material_Processed"];
                                          $jpslt[]=$ttampil["PRIME_SLT"];
                                          $jkw2[]=$ttampil["KW2"];
                                          $jbc[]=$ttampil["BabyCoil"];
                                          $js[]=$ttampil["Scrap"];
                                          $jss[]=$ttampil["SS"];
                                          $jwb[]=$ttampil["Weighing_Balance"];
                                    }
                                    $tjmp=($jmp==[])? 0: array_sum($jmp);
                                    $tjpslt=($jpslt==[])? 0: array_sum($jpslt);
                                    $tjkw2=($jkw2==[])? 0: array_sum($jkw2);
                                    $tjbc=($jbc==[])? 0: array_sum($jbc);
                                    $tjs=($js==[])? 0: array_sum($js);
                                    $tjss=($jss==[])? 0: array_sum($jss);
                                    $tjwb=($jwb==[])? 0: array_sum($jwb);
                                    echo '
                                    <tr>
                                    <th>total</th>
                                    <td>'.$tjmp.'</td>
                                    <td>'.$tjpslt.'</td>
                                    <td>'.$tjkw2.'</td>
                                    <td>'.$tjbc.'</td>
                                    <td>'.$tjs.'</td>
                                    <td>'.$tjss.'</td>
                                    <td>'.$tjwb.'</td>
                                    <td>'.(($tjpslt==0)?0:$tjpslt/$tjmp*100).'%</td>
                                    </tr>';
                                    
                                    ($tahun == "")?$total304 = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = '304'"):$total304 = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = '304' AND (year(tanggal) = $tahun)");
                                    $jmp304=[];
                                    $jpslt304=[];
                                    $jkw304=[];
                                    $jbc304=[];
                                    $js304=[];
                                    $jss304=[];
                                    $jwb304=[];
                                    while ($h304 = mysqli_fetch_array($total304)){
                                          $jmp304[]=$h304["Material_Processed"];
                                          $jpslt304[]=$h304["PRIME_SLT"];
                                          $jkw304[]=$h304["KW2"];
                                          $jbc304[]=$h304["BabyCoil"];
                                          $js304[]=$h304["Scrap"];
                                          $jss304[]=$h304["SS"];
                                          $jwb304[]=$h304["Weighing_Balance"];
                                    }
                                    $tjmp304=($jmp304==[])? 0: array_sum($jmp304);
                                    $tjpslt304=($jpslt304==[])? 0: array_sum($jpslt304);
                                    $tjkw304=($jkw304==[])? 0: array_sum($jkw304);
                                    $tjbc304=($jbc304==[])? 0: array_sum($jbc304);
                                    $tjs304=($js304==[])? 0: array_sum($js304);
                                    $tjss304=($jss304==[])? 0: array_sum($jss304);
                                    $tjwb304=($jwb304==[])? 0: array_sum($jwb304);
                                                                                      
                                    echo '
                                    <tr>
                                    <th>304</th>
                                    <td>'.$tjmp304.'</td>
                                    <td>'.$tjpslt304.'</td>
                                    <td>'.$tjkw304.'</td>
                                    <td>'.$tjbc304.'</td>
                                    <td>'.$tjs304.'</td>
                                    <td>'.$tjss304.'</td>
                                    <td>'.$tjwb304.'</td>
                                    <td>'.(($tjpslt304==0)?0:$tjpslt304/$tjmp304*100).'%</td>
                                    </tr>';

                                    ($tahun == "")?$total304L = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = '304L'"):$total304L = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = '304L' AND (year(tanggal) = $tahun)");
                                    $jmp304L=[];
                                    $jpslt304L=[];
                                    $jkw304L=[];
                                    $jbc304L=[];
                                    $js304L=[];
                                    $jss304L=[];
                                    $jwb304L=[];
                                    while ($h304L = mysqli_fetch_array($total304L)){
                                          $jmp304L[]=$h304L["Material_Processed"];
                                          $jpslt304L[]=$h304L["PRIME_SLT"];
                                          $jkw304L[]=$h304L["KW2"];
                                          $jbc304L[]=$h304L["BabyCoil"];
                                          $js304L[]=$h304L["Scrap"];
                                          $jss304L[]=$h304L["SS"];
                                          $jwb304L[]=$h304L["Weighing_Balance"];
                                    }
                                    $tjmp304L=($jmp304L==[])? 0: array_sum($jmp304L);
                                    $tjpslt304L=($jpslt304L==[])? 0: array_sum($jpslt304L);
                                    $tjkw304L=($jkw304L==[])? 0: array_sum($jkw304L);
                                    $tjbc304L=($jbc304L==[])? 0: array_sum($jbc304L);
                                    $tjs304L=($js304L==[])? 0: array_sum($js304L);
                                    $tjss304L=($jss304L==[])? 0: array_sum($jss304L);
                                    $tjwb304L=($jwb304L==[])? 0: array_sum($jwb304L);
                                    echo '
                                    <tr>
                                    <th>304L</th>
                                    <td>'.$tjmp304L.'</td>
                                    <td>'.$tjpslt304L.'</td>
                                    <td>'.$tjkw304L.'</td>
                                    <td>'.$tjbc304L.'</td>
                                    <td>'.$tjs304L.'</td>
                                    <td>'.$tjss304L.'</td>
                                    <td>'.$tjwb304L.'</td>
                                    <td>'.(($tjpslt304L==0)?0:$tjpslt304L/$tjmp304L*100).'%</td>
                                    </tr>';
                                    ($tahun == "")?$total304304L = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = '304/304L'"):$total304304L = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = '304/304L' AND (year(tanggal) = $tahun)");
                                    $jmp304304L=[];
                                    $jpslt304304L=[];
                                    $jkw304304L=[];
                                    $jbc304304L=[];
                                    $js304304L=[];
                                    $jss304304L=[];
                                    $jwb304304L=[];
                                    while ($h304304L = mysqli_fetch_array($total304304L)){
                                          $jmp304304L[]=$h304304L["Material_Processed"];
                                          $jpslt304304L[]=$h304304L["PRIME_SLT"];
                                          $jkw304304L[]=$h304304L["KW2"];
                                          $jbc304304L[]=$h304304L["BabyCoil"];
                                          $js304304L[]=$h304304L["Scrap"];
                                          $jss304304L[]=$h304304L["SS"];
                                          $jwb304304L[]=$h304304L["Weighing_Balance"];
                                    }
                                    $tjmp304304L=($jmp304304L==[])? 0: array_sum($jmp304304L);
                                    $tjpslt304304L=($jpslt304304L==[])? 0: array_sum($jpslt304304L);
                                    $tjkw304304L=($jkw304304L==[])? 0: array_sum($jkw304304L);
                                    $tjbc304304L=($jbc304304L==[])? 0: array_sum($jbc304304L);
                                    $tjs304304L=($js304304L==[])? 0: array_sum($js304304L);
                                    $tjss304304L=($jss304304L==[])? 0: array_sum($jss304304L);
                                    $tjwb304304L=($jwb304304L==[])? 0: array_sum($jwb304304L);
                                    echo '
                                    <tr>
                                    <th>304/304L</th>
                                    <td>'.$tjmp304304L.'</td>
                                    <td>'.$tjpslt304304L.'</td>
                                    <td>'.$tjkw304304L.'</td>
                                    <td>'.$tjbc304304L.'</td>
                                    <td>'.$tjs304304L.'</td>
                                    <td>'.$tjss304304L.'</td>
                                    <td>'.$tjwb304304L.'</td>
                                    <td>'.(($tjpslt304304L==0)?0:$tjpslt304304L/$tjmp304304L*100).'%</td>
                                    </tr>';

                                    ($tahun == "")?$totalJ1 = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = 'J1'"):$totalJ1 = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = 'J1' AND (year(tanggal) = $tahun)");
                                    $jmpJ1=[];
                                    $jpsltJ1=[];
                                    $jkwJ1=[];
                                    $jbcJ1=[];
                                    $jsJ1=[];
                                    $jssJ1=[];
                                    $jwbJ1=[];
                                    while ($hJ1 = mysqli_fetch_array($totalJ1)){
                                          $jmpJ1[]=$hJ1["Material_Processed"];
                                          $jpsltJ1[]=$hJ1["PRIME_SLT"];
                                          $jkwJ1[]=$hJ1["KW2"];
                                          $jbcJ1[]=$hJ1["BabyCoil"];
                                          $jsJ1[]=$hJ1["Scrap"];
                                          $jssJ1[]=$hJ1["SS"];
                                          $jwbJ1[]=$hJ1["Weighing_Balance"];
                                    }
                                    $tjmpJ1=($jmpJ1==[])? 0: array_sum($jmpJ1);
                                    $tjpsltJ1=($jpsltJ1==[])? 0: array_sum($jpsltJ1);
                                    $tjkwJ1=($jkwJ1==[])? 0: array_sum($jkwJ1);
                                    $tjbcJ1=($jbcJ1==[])? 0: array_sum($jbcJ1);
                                    $tjsJ1=($jsJ1==[])? 0: array_sum($jsJ1);
                                    $tjssJ1=($jssJ1==[])? 0: array_sum($jssJ1);
                                    $tjwbJ1=($jwbJ1==[])? 0: array_sum($jwbJ1);
                                    echo '
                                    <tr>
                                    <th>J1</th>
                                    <td>'.$tjmpJ1.'</td>
                                    <td>'.$tjpsltJ1.'</td>
                                    <td>'.$tjkwJ1.'</td>
                                    <td>'.$tjbcJ1.'</td>
                                    <td>'.$tjsJ1.'</td>
                                    <td>'.$tjssJ1.'</td>
                                    <td>'.$tjwbJ1.'</td>
                                    <td>'.(($tjpsltJ1==0)?0:$tjpsltJ1/$tjmpJ1*100).'%</td>
                                    </tr>';

                                    ($tahun == "")?$totalJ3 = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = 'J3'"):$totalJ3 = mysqli_query($koneksi, "SELECT * FROM book2 where Grade = 'J3' AND (year(tanggal) = $tahun)");
                                    $jmpJ3=[];
                                    $jpsltJ3=[];
                                    $jkwJ3=[];
                                    $jbcJ3=[];
                                    $jsJ3=[];
                                    $jssJ3=[];
                                    $jwbJ3=[];
                                    while ($hJ3 = mysqli_fetch_array($totalJ3)){
                                          $jmpJ3[]=$hJ3["Material_Processed"];
                                          $jpsltJ3[]=$hJ3["PRIME_SLT"];
                                          $jkwJ3[]=$hJ3["KW2"];
                                          $jbcJ3[]=$hJ3["BabyCoil"];
                                          $jsJ3[]=$hJ3["Scrap"];
                                          $jssJ3[]=$hJ3["SS"];
                                          $jwbJ3[]=$hJ3["Weighing_Balance"];
                                    }
                                    $tjmpJ3=($jmpJ3==[])? 0: array_sum($jmpJ3);
                                    $tjpsltJ3=($jpsltJ3==[])? 0: array_sum($jpsltJ3);
                                    $tjkwJ3=($jkwJ3==[])? 0: array_sum($jkwJ3);
                                    $tjbcJ3=($jbcJ3==[])? 0: array_sum($jbcJ3);
                                    $tjsJ3=($jsJ3==[])? 0: array_sum($jsJ3);
                                    $tjssJ3=($jssJ3==[])? 0: array_sum($jssJ3);
                                    $tjwbJ3=($jwbJ3==[])? 0: array_sum($jwbJ3);
                                          echo '
                                    <tr>
                                    <th>J3</th>
                                    <td>' . $tjmpJ3 . '</td>
                                    <td>' . $tjpsltJ3 . '</td>
                                    <td>' . $tjkwJ3 . '</td>
                                    <td>' . $tjbcJ3 . '</td>
                                    <td>' . $tjsJ3 . '</td>
                                    <td>' . $tjssJ3 . '</td>
                                    <td>' . $tjwbJ3 . '</td>
                                    <td>'.(($tjpsltJ3==0)?0:$tjpsltJ3/$tjmpJ3*100).'%</td>                                    
                                    </tr>'
                                          ;                          
                                    ?>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>