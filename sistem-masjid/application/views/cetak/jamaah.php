<div class="card">
<div class="card-header border-0">
    <div class="row">
    <div class="col">
        <center><h2 class="mb-0">Daftar Jamaah</h2></center>
    </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table  data align-items-center table-bordered" width="100%">
    <thead class="thead-light">
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Status</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Kelas</th>
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
            <?= $all->kelas; ?>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>

      



<script>
	window.print();
</script>