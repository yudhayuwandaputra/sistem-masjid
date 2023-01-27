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
                  <h3 class="mb-4">List Jamaah</h3>
                </div>
                <div class="col-md-10 text-right">
                  <form action="<?= base_url('jamaah'); ?>" method="post">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <input class="form-control" placeholder="Search" type="text" autocomplete="off" autofocus name="keyword">
                      </div>
                      <div class="col-sm-0">
                        <input type="submit" class="btn btn-success" name="submit">
                      </div>
                      <div class="col-sm-2">
                        <a href="<?= base_url() ?>jamaah/cetak" class="btn btn-info" target="_BLANK"><i class="ni ni-archive-2 text-white"></i> Cetak</a>
                      </div>
                      <div class="col-sm-0">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Jamaah</button>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kelas</th> 
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($jamaah as $all) : ?>
                  <tr>
                    <th scope="row" width="1%">
                       <?= $no++;?>
                    </th>
                    <td>
                       <?= $all->nama; ?>
                    </td>
                    <td>
                       <?= $all->status; ?>
                    </td>
                    <td>
                       <?= $all->jenis_kelamin; ?>
                    </td>
                    <td>
                       <?= $all->kelas; ?> <?= $all->jurusan; ?>
                    </td>
                    <td width="10%">
                    <button type="button" data-id='<?= $all->id ?>' class="btn btn-warning btn-sm btn-edit">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm btn-del" data-url="jamaah/hapus_jamaah/" data-refresh="jamaah/" onclick="deleteData(<?= $all->id; ?>)">Hapus</button>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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
              <h5 class="modal-title" id="exampleModalLabel"><?= $name; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form role="form" method="POST" action="<?= base_url() ?>jamaah/tambah_jamaah">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input list="data-nama" class="form-control" placeholder="Nama" type="text" name="nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    <select class="form-control"  name="status" required>
                      <option>Status</option>
                      <option value="Siswa">Siswa</option>
                      <option value="Guru">Guru</option>
                      <option value="Karyawan">Karyawan</option>
                      <option value="Umum">Umum</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-favourite-28"></i></span>
                    </div>
                    <select class="form-control" id="gen" name="gender" required>
                      <option selected>Jenis Kelamin</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-chart-bar-32"></i></span>
                    </div>
                    <select class="form-control" name="kelas" required>
                      <option value="-">Kelas</option>
                      <option value="X">X</option>
                      <option value="XI">XI</option>
                      <option value="XII">XII</option>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-tie-bow"></i></span>
                    </div>
                    <select class="form-control" name="jurusan" required>
                      <option value="-">Jurusan</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                      <option value="Perbankan Syariah">Perbankan Syariah</option>
                      <option value="Pemasaran">Pemasaran</option>
                      <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                      <option value="Teknik Komputer & Jaringan">Teknik Komputer & Jaringan</option>
                      <option value="Multimedia">Multimedia</option>
                    </select>
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
       <div class="modal mdl-edt  fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Jamaah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form role="form" method="POST" action="<?= base_url() ?>jamaah/update_jamaah">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input type="hidden" name="id" id="id">
                    <input class="form-control" placeholder="Nama" type="text" id='nama' name="nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    <select class="form-control" id="status" name="status" required>
                      <option>Status</option>
                      <option value="Siswa">Siswa</option>
                      <option value="Guru">Guru</option>
                      <option value="Karyawan">Karyawan</option>
                      <option value="Umum">Umum</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-favourite-28"></i></span>
                    </div>
                    <select class="form-control" id="gender" name="gender" required>
                      <option>Jenis Kelamin</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-chart-bar-32"></i></span>
                    </div>
                    <select class="form-control" id="kelas" name="kelas" required>
                      <option value="-">Kelas</option>
                      <option value="X">X</option>
                      <option value="XI">XI</option>
                      <option value="XII">XII</option>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-tie-bow"></i></span>
                    </div>
                    <select class="form-control" id="jurusan" name="jurusan" required>
                      <option value="-">Jurusan</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                      <option value="Perbankan Syariah">Perbankan Syariah</option>
                      <option value="Pemasaran">Pemasaran</option>
                      <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                      <option value="Teknik Komputer & Jaringan">Teknik Komputer & Jaringan</option>
                      <option value="Multimedia">Multimedia</option>
                    </select>
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

      <script type="text/javascript">
        $(document).ready(function(){
            $(".btn-edit").click(function(){
                var id = $(this).data("id");
                $('.mdl-edt').modal('show');
                $.ajax({
                    url: "<?= base_url()?>jamaah/edit_jamaah",
                    data:{id : id},
                    method: "get",
                    dataType: "json",
                    success: function(data) {
                      console.log(data);
                      $('#id').val(data.id_jamaah);
                      $('#nama').val(data.nama);
                      $('#status').val(data.status);
                      $('#gender').val(data.jenis_kelamin);
                      $('#jurusan').val(data.jurusan);
                      $('#kelas').val(data.kelas);
                    }
                });
            });
        });
    </script>