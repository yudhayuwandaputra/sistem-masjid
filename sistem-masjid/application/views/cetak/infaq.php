<div class="card">
<div class="card-header border-0">
    <div class="row">
    <div class="col">
        <center><h2 class="mb-0">Laporan Infaq</h2></center>
    </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table  data align-items-center table-bordered" width="100%">
    <thead class="thead-light">
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Admin</th>
        <th scope="col">Nama Infaq</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Total Infaq</th>
        <th scope="col">Keterangan</th>

        </tr>
    </thead>
    <tbody>
    <?php $no = 1;
      $total_uang = 0; 
    foreach($infaq as $all) : ?>
        <tr>
        <th scope="row" width="1%">
            <?= $no++;?>
        </th>
        <td>
            <?= $all->nama_admin; ?>
        </td>
        <td>
            <?= $all->nama_infaq; ?>
        </td>
        <td>
            <?= $all->tanggal; ?>
        </td>
        <td>
         Rp.   <?= $all->total; ?>
        </td>
        <td>
            <?= $all->keterangan; ?>
        </td>

        </tr>
        <?php
         $total_uang += $all->total;
          endforeach ?>
    </tbody>

    <tfoot>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"><strong>Total Uang : Rp <?= $total_uang; ?>,-</strong></th>
                    <th scope="col"></th>
                  </tr>
                </tfoot>
    </table>
</div>

      



<script>
	window.print();
</script>