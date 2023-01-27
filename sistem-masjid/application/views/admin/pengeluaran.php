<!-- Header -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      
    </div>
    <div class="container-fluid mt--9">
      <div class="row mt-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-4">List Pengeluaran</h3>
                </div>
                <div class="col-sm-10 text-right">
                  <form action="<?= base_url('pengeluaran'); ?>" method="post">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <input class="form-control" placeholder="Search" type="text" autocomplete="off" autofocus name="keyword">
                      </div>
                      <div class="col-sm-0">
                        <input type="submit" class="btn btn-success" name="submit">
                      </div>
                      <div class="col-sm-2">
                        <a href="<?= base_url() ?>pengeluaran/cetak" class="btn btn-info" target="_BLANK"><i class="ni ni-archive-2 text-white"></i> Cetak</a>
                      </div>
                      <div class="col-sm-0">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Pengeluaran</button>
                      </div>
                    </div>
                 </form>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              
              <table id="data" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pengeluaran</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>       
                <?php $no = 1; 
                $total_uang = 0;
                foreach($pengeluaran as $all) : ?>
                  <tr>
                    <th scope="row" width="1%">
                       <?= $no++;?>
                    </th>
                     
                    <td>
                       <?= $all->nama_pengeluaran; ?>
                    </td>

                    <td>
                       <?= $all->nama_admin; ?>
                    </td>
                    <td>
                       <?= $all->tanggal; ?>
                    </td>
                    <td>
                      Rp. <?= $all->total_pengeluaran; ?>
                    </td>
                    <td>
                       <?= $all->keterangan; ?>
                    </td>
                    <td width="10%">
                    <button type="button" data-id="<?=$all->id;?>" class="btn btn-warning btn-sm btn-edit">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm btn-del" data-url="pengeluaran/hapus_pengeluaran/" data-refresh="pengeluaran/" onclick="deleteData(<?= $all->id; ?>)">Hapus</button>
                    </td>
                  </tr>
                  <?php
                   $total_uang += $all->total_pengeluaran;
                   endforeach ?>
                </tbody>
            <tfoot>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"><strong></strong></th>
                    <th scope="col"><strong>Total : Rp <?= $total_uang; ?>,-</strong></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </tfoot>
                </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input Pengeluaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form role="form" method="POST" action="<?= base_url() ?>index.php/pengeluaran/tambah_pengeluaran">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                    </div>
                    <input class="form-control" name="nama_pengeluaran" required placeholder="Nama Pengeluaran" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" name="nama_admin" required placeholder="Nama Admin" type="text">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" id="tanggal"  name="tanggal" placeholder="Select date" type="text" value="<?= date('m/d/Y');?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i>Rp.</i></span>
                    </div>
                    <input class="form-control" name="total_pengeluaran" required placeholder="Total" type="number">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-collection"></i></span>
                    </div>
                    <textarea class="form-control" placeholder="Keterangan" name="keterangan" required></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

       <!-- Modal -->
       <div class="modal mdl-edt fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Pengeluaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form role="form" method="POST" action="<?= base_url() ?>index.php/pengeluaran/update_pengeluaran">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                    </div>
                    <input id="id" name="id" type="hidden">
                    <input class="form-control" name="nama_pengeluaran" id="nama" required placeholder="Nama Pengeluaran" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" name="nama_admin" id="admin" required placeholder="Nama Admin" type="text">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" id="tanggal"  name="tanggal" placeholder="Select date" type="text" value="<?= date('m/d/Y');?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i>Rp.</i></span>
                    </div>
                    <input class="form-control" name="total_pengeluaran" id="total" required placeholder="Total" type="number">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-collection"></i></span>
                    </div>
                    <input class="form-control" name="keterangan" id="ket" required placeholder="Keterangan" type="text">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
            $(".btn-edit").click(function(){
                var id = $(this).data("id");
                $('.mdl-edt').modal('show');
                    $.ajax({
                    url: "<?= base_url()?>pengeluaran/edit_pengeluaran",
                    data:{id : id},
                    method: "get",
                    dataType: "json",
                    success: function(data) {
                      $('#id').val(data.id);
                      $('#nama').val(data.nama_pengeluaran);
                      $('#admin').val(data.nama_admin);
                      $('#tgl').val(data.tanggal);
                      $('#total').val(data.total_pengeluaran);
                      $('#saldo').val(data.sisa_saldo);
                      $('#ket').val(data.keterangan);
                     
                  }
                });
            });
        });
        </script>