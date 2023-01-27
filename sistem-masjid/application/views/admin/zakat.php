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
                  <h3 class="mb-4">List Zakat Fitrah</h3>
                </div>
                 <div class="col-sm-10 text-right">
                  <form action="<?= base_url('zakat'); ?>" method="post">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <input class="form-control" placeholder="Search" type="text" autocomplete="off" autofocus name="keyword">
                      </div>
                      <div class="col-sm-0">
                        <input type="submit" class="btn btn-success" name="submit">
                      </div>
                      <div class="col-sm-2">
                        <a href="<?= base_url() ?>zakat/cetak" class="btn btn-info" target="_BLANK"><i class="ni ni-archive-2 text-white"></i> Cetak</a>
                      </div>
                      <div class="col-sm-0">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Zakat</button>
                      </div>
                    </div>
                 </form>
                </div>
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
                  foreach($zakat as $all) : ?>
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
                    <td width="10%">
                    <button type="button" data-id='<?= $all->id_zakat; ?>' class="btn btn-warning btn-sm btn-edit">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm btn-del" data-url="zakat/hapus_zakat/" data-refresh="zakat/" onclick="deleteData(<?= $all->id_zakat; ?>)">Hapus</button>
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

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Zakat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form role="form" method="POST" action="<?= base_url() ?>zakat/tambah_zakat">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input type="text" list="dataname" class="form-control"  name="nama" required placeholder="Cari Jamaah">
                      <datalist id="dataname">
                        <?php foreach($jamaah as $all) :?>
                        <option value="<?= $all->nama; ?>">
                        <?php endforeach ?>
                      </datalist>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" name="tanggal" placeholder="Select date" type="text" value="<?= date('m/d/Y');?>">
                  </div>
                </div>
                <div class="form-group">
                  <div for="option" class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-basket"></i></span>
                    </div>
                    <select id="option" class="form-control" name="zakat" required>
                      <option value="Beras">Beras</option>
                      <option value="Uang">Uang</option>
                    </select>
                  </div>
                </div>
                <div class="form-group" id="uangDiv">
                  <div class="input-group input-group-alternative" for="uangField">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-money-coins"> Rp. </i></span>
                    </div>
                    <input class="form-control" placeholder="Nominal" type="number" value="" name="uang" id="uangField" required>
                  </div>
                </div>
              <div class="form-group" id="berasDiv">
                  <div class="input-group input-group-alternative" for="berasField">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-compass-04"> Kg. </i></span>
                    </div>
                    <input class="form-control" placeholder="Berat" value="" type="number" name="beras" id="berasField" step=".01" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Simpan</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Edit Zakat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form role="form" method="POST" action="<?= base_url() ?>zakat/update_zakat">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span> 
                    </div>
                    <input type="hidden" id="id" name="id">
                    <input id="name" class="form-control" name="nama" required disabled>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" name="tanggal" placeholder="Select date" type="text" value="<?= date('m/d/Y');?>">
                  </div>
                </div>
                <div class="form-group">
                  <div for="optionedt" class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-basket"></i></span>
                    </div>
                    <select id="optionedt" class="form-control jenis" name="zakat" required>
                      <option value="Beras">Beras</option>
                      <option value="Uang">Uang</option>
                    </select>
                  </div>
                </div>
                <div class="form-group" id="uangDivnya">
                  <div class="input-group input-group-alternative" for="uangFieldedt">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i> Rp. </i></span>
                    </div>
                    <input class="form-control" placeholder="Nominal" type="number" name="uang" id="uangFieldedt" required>
                  </div>
                </div>
              <div class="form-group" id="berasDivnya">
                  <div class="input-group input-group-alternative" for="berasFieldedt">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i> Kg. </i></span>
                    </div>
                    <input class="form-control" placeholder="Berat" type="number" name="beras" id="berasFieldedt" step=".01" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script>
         // edit zakat js
          $(document).ready(function(){
              $(".btn-edit").click(function(){
                  var id = $(this).data("id");
                  $('.mdl-edt').modal('show');
                      $.ajax({
                      url: "<?=base_url();?>zakat/edit_zakat",
                      data:{id : id},
                      method: "get",
                      dataType: "json",
                      success: function(data) { 
                        $('#id').val(data.id_zakat);
                        $('#name').val(data.nama);
                        $('#date').val(data.tanggal_zakat);
                        $('.jenis').val(data.jenis_zakat);
                    }
                  });
              });
          });
      </script>
      <script>
        // hide show tambah data
        $("#option").change(function() {
            if ($(this).val() == "Uang") {
            $('#uangDiv').show();
            $('#uangField').attr('required', '');
            $('#uangField').attr('data-error', 'This field is required.');
            $('#uangField').val('25000');
            $('#berasDiv').hide();
            $('#berasField').removeAttr('required');
            $('#berasField').removeAttr('data-error');
            $('#berasField').val('');
          } else {
            $('#uangDiv').hide();
            $('#uangField').removeAttr('required');
            $('#uangField').removeAttr('data-error');
            $('#uangField').val('');
            $('#berasDiv').show();
            $('#berasField').attr('number', '');
            $('#berasField').attr('data-error', 'This field is required.');
            $('#berasField').val('2.5');
          }
        });
        $("#option").trigger("change");
      </script>
    

