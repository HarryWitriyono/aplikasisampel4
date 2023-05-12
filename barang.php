<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
 <div class="row">
  <div class="col-sm-4">
   <h2>Form Tabel Barang</h2>
  </div>
  <div class="col-sm-8">
   <form method="post" class="input-group">
    <input type="text" name="kCari" placeholder="Ketik kode barang" class="form-control">
	<input type="submit" name="bCari" value="Go" class="btn btn-success">
   </form>
  </div>
 </div>
 <div class="row">
  <form action="" method="post" class="col-sm-5">
    <div class="mb-3 mt-3">
      <label for="kodebarang">Kode barang:</label>
      <input type="text" class="form-control" id="kodebarang" placeholder="Enter kode barang" name="kodebarang">
    </div>
    <div class="mb-3">
      <label for="namabarang">Nama barang:</label>
      <input type="text" class="form-control" id="namabarang" placeholder="Enter nama barang" name="namabarang">
    </div>
    <div class="mb-3 mt-3">
      <label for="harga">Harga barang:</label>
      <input type="text" class="form-control" id="harga" placeholder="Enter harga" name="harga">
    </div>
	<div class="mb-3 mt-3">
      <label for="satuan">Satuan barang:</label>
      <input type="text" class="form-control" id="satuan" placeholder="Enter satuan barang" name="satuan">
    </div>
	<div class="mb-3 mt-3">
      <label for="tanggalbeli">Tanggal beli barang:</label>
      <input type="date" class="form-control" id="tanggalbeli" title="Enter tanggal beli" name="tanggalbeli">
    </div>
	<div class="mb-3 mt-3">
      <label for="kondisi">Kondisi barang:</label>
      <input type="text" class="form-control" id="kondisi" placeholder="Enter kondisi barang" name="kondisi">
    </div>
    <button type="submit" class="btn btn-primary" name="tombolSimpan">Simpan</button>
  </form>
  <div class="col-sm-7">
   <?php
   if (isset($_POST['bCari'])) {
	   $kCari=$_POST['kCari'];
	   $sqlcari="select * from barang where kodebarang like '%".$kCari."%'";
	   $kon=mysqli_connect("localhost","root","","aplikasisampel4");
	   $qcari=mysqli_query($kon,$sqlcari);
	   $r=mysqli_fetch_array($qcari);
	   
   ?>
   <h2>Daftar barang yang ditemukan : </h2>
   <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
		<th>Satuan</th>
		<th>Tanggal Beli</th>
		<th>Kondisi</th>
		<th>Aksi Rekord</th>
      </tr>
    </thead>
    <tbody>
	  <?php do { ?>
      <tr>
        <td><?php echo $r['kodebarang'];?></td>
        <td><?php echo $r['namabarang'];?></td>
        <td><?php echo $r['harga'];?></td>
		<td><?php echo $r['satuan'];?></td>
        <td><?php echo $r['tanggalbeli'];?></td>
        <td><?php echo $r['kondisi'];?></td>
		<td><a href="koreksibarang.php" target="frmutama" class="btn btn-primary">Koreksi</a>
		    <a href="hapusbarang.php" target="frmutama" class="btn btn-danger">Hapus</a>
		</td>
      </tr>
	  <?php } while($r=mysqli_fetch_array($qcari)); ?>
    </tbody>
</table>
<?php } //end if isset bCari ?>
  </div>
 </div>
  <?php if (isset($_POST['tombolSimpan'])) {
	  $kon=mysqli_connect("localhost","root","","aplikasisampel4");
	  $kodebarang=$_POST['kodebarang'];
	  $namabarang=$_POST['namabarang'];
	  $harga=$_POST['harga'];
	  $satuan=$_POST['satuan'];
	  $tanggalbeli=$_POST['tanggalbeli'];
	  $kondisi=$_POST['kondisi'];
	  $sql="insert into barang (kodebarang,namabarang,harga,satuan,tanggalbeli,kondisi) values ('".$kodebarang."','".$namabarang."','".$harga."','".$satuan."','".$tanggalbeli."','".$kondisi."')";
	  $q=mysqli_query($kon,$sql);
  }
  ?>
</div>

</body>
</html>