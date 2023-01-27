<div class="card">
<div class="card-header border-0">
    <div class="row">
    <div class="col">
        <center><h2 class="mb-0">Daftar Zakat   </h2></center>
    </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table  data align-items-center table-bordered" width="100%">
    <thead class="thead-light">
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Jamaah</th>
        <th scope="col">Tanggal Zakat</th>
        <th scope="col">Berat</th>
        <th scope="col">Nominal</th>
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
            <?= $all->berat; ?> Kg
        </td>
        <td>
           Rp. <?= $all->nominal; ?>
        </td>
        </tr>
        <?php 
        $total_berat += $all->berat;
        $total_uang += $all->nominal;
        endforeach ?>
    </tbody>
    <tfoots>
        <tr>
            <th scope="col"></th>
            <?php
            foreach($jumlah_muzaki as $all ) :?>
            <th scope="col"><strong>Total Muzaki : <?= $all->total; ?> orang</strong></th>
            <?php endforeach ?>
            <th scope="col"></th>
            <th scope="col"><strong>Total Beras : <?= $total_berat; ?> Kg</strong></th>
            <th scope="col"><strong>Total Uang : Rp <?= $total_uang; ?>,-</strong></th>
        </tr>
        </tfoot>
    </table>


                  
</div>
   



<script>
	window.print();
</script>