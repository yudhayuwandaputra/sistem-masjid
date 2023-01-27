
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?= base_url(); ?>">Dashboard</a>
        <!-- User -->
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(<?= base_url(); ?>public/assets/img/sampul/islam.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Ath-Tholibin</h1>
            <p class="text-white mt-0 mb-5">Adalah masjid di sebuah sekolah ternama di bantul yaitu SMK N 1 Bantul. Website ini masih dalam proses pengembangan.</p>
            <a href="#!" class="btn btn-info">Kegiatan</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mb-2">
        <div class="col-xl-6 col">
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
        <div class="col-xl-6 col-lg-6">
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
      </div>
      <div class="row">
        <div class="col-xl-12 order-xl-4 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="mb-2">Nama Jamaah</h3>
              </div>
              <div class="col-mb-12 text-right">
                  <form action="<?= base_url('user'); ?>" method="post">
                    <div class="row">
                      <div class="col form-group">
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
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas/Jurusan</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($jamaah as $all) : ?>
                  <tr>
                    <th width="1%">
                       <?= $no++;?>
                    </th>
                    <td>
                       <?= $all->nama; ?>
                    </td>
                    <td>
                       <?= $all->jenis_kelamin; ?>
                    </td>
                    <td>
                       <?= $all->kelas; ?> <?= $all->jurusan; ?>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>