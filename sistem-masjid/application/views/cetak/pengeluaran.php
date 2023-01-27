<div class="card">
<div class="card-header border-0">
    <div class="row">
    <div class="col">
        <center><h2 class="mb-0">Daftar Pengeluaran</h2></center>
    </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table  data align-items-center table-bordered" width="100%">
    <thead class="thead-light">
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Pengeluaran</th>
        <th scope="col">Nama Admin</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Total</th>
        <th scope="col">Sisa Saldo</th>
        <th scope="col">Keterangan</th>

        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;  
    $total_uang = 0;
    $sisa_saldo = 0;
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
          Rp.  <?= $all->sisa_saldo; ?>
        </td>
        <td>
            <?= $all->keterangan; ?>
        </td>

        </tr>
        <?php
         $total_uang += $all->total_pengeluaran;
         $sisa_saldo += $all->sisa_saldo;
        endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><strong>Total : Rp <?= $total_uang; ?>,-</strong></th>
            <th scope="col"><strong>Total Saldo : Rp <?= $sisa_saldo; ?>,-</strong></th>
            <th scope="col"></th>
            </tr>
    </tfoot>
    </table>
</div>

      



<script>
	window.print();
</script>