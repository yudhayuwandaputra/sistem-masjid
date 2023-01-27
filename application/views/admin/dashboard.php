<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row mb-2">
            <div class="col-xl-12 col">
              <div class="card card-stats mb-3 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Zakat</h5>
                      <?php foreach($zakat as $all ) :?>
                      <span class="h2 font-weight-bold mb-0">Beras <?= $all->jumlah_berat; ?> Kg | Uang Rp. <?= $all->jumlah_nominal; ?>,-</span>
                      <?php endforeach ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="ni ni-basket"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Jama'ah</h5>
                      <?php foreach($jumlah as $all ) :?>
                      <span class="h2 font-weight-bold mb-0"><?= $all->total; ?> Orang</span>
                      <?php endforeach ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Infaq</h5>
                      <?php foreach($infaq as $all ) :?>
                      <span class="h2 font-weight-bold mb-0">Rp. <?= $all->total_infaq; ?>,-</span>
                      <?php endforeach ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="ni ni-money-coins "></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Pengeluaran</h5>
                      <?php foreach($pengeluaran as $all ) :?>
                      <span class="h2 font-weight-bold mb-0">Rp. <?= $all->jumlah_pengeluaran; ?>,-</span>
                      <?php endforeach ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="ni ni-credit-card"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--9">
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-4">List Zakat Fitrah</h3>
                </div>
                <div class="col-sm-10 text-right">
                  <form action="<?= base_url('dashboard'); ?>" method="post">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <input class="form-control" placeholder="Search" type="text" autocomplete="off" autofocus name="keyword">
                      </div>
                      <div class="col-sm-0">
                        <input type="submit" class="btn btn-success" name="submit">
                      </div>
                    </div>
                 </form>
                </div>
             </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table  data align-items-center table-flush" width="100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jamaah</th>
                    <th scope="col">Tanggal Zakat</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1; 
                  $total_berat = 0;
                  $total_uang = 0;
                  foreach($zakat_jamaah as $all) : ?>
                  <tr>
                    <th scope="row" width="1%">
                       <?= $no++;?>
                    </th>
                    <td>
                       <?= $all->nama; ?>
                    </td>
                    <td>
                       <?= $all->tanggal_zakat; ?>
                    </td>
                    <td>
                       <?=$all->berat; ?> Kg
                    </td>
                    <td>
                       Rp <?= $all->nominal; ?>,-
                    </td>
                  </tr>
                  <?php 
                    $total_berat += $all->berat;
                    $total_uang += $all->nominal;
                  endforeach ?>
                </tbody>
                  <tfoot>
                    <tr>
                      <th scope="col"></th>
                      <?php foreach($jumlah_muzaki as $all ) :?>
                      <th scope="col"><strong>Total Muzaki : <?= $all->total; ?> orang</strong></th>
                      <?php endforeach ?>
                      <th scope="col"></th>
                      <th scope="col"><strong>Total Beras : <?= $total_berat; ?> Kg</strong></th>
                      <th scope="col"><strong>Total Uang : Rp <?= $total_uang; ?>,-</strong></th>
                      <th scope="col"></th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    