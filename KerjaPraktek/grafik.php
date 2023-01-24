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
                        <div class="container">
                              <div class="row my-3">
                                    <div class="col">
                                          <h4>Bootstrap 5 Chart.js</h4>
                                    </div>
                              </div>
                              <div class="row my-2">
                                    <div class="col-md-6 py-1">
                                          <div class="card">
                                                <div class="card-body">
                                                      <canvas id="chLine"></canvas>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6 py-1">
                                          <div class="card">
                                                <div class="card-body">
                                                      <canvas id="chBar"></canvas>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="row py-2">
                                    <div class="col-md-4 py-1">
                                          <div class="card">
                                                <div class="card-body">
                                                      <canvas id="chDonut1"></canvas>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-4 py-1">
                                          <div class="card">
                                                <div class="card-body">
                                                      <canvas id="chDonut2"></canvas>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-4 py-1">
                                          <div class="card">
                                                <div class="card-body">
                                                      <canvas id="chDonut3"></canvas>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>