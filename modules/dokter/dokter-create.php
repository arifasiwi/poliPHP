<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=dokter-create?">Home</a></li>
  <li class="disabled">Data Biaya</li>
</ul>
</nav>
<form>
  
  <!-- field id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="id" class="text-right middle">No</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="id" placeholder="">
    </div>
  </div>
  
  <!-- field kode -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">kode</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="kode" placeholder="kode">
    </div>
  </div>

  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="nama" placeholder="Nama">
    </div>
  </div>

  <!-- field alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="alamat" placeholder="alamat">
    </div>
  </div>
  <!-- field telp -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="telp" class="text-right middle">telp</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="telp" placeholder="telp">
    </div>
  </div>
  <!-- field jk -->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
      <label for="nama" class="text-right middle">Jenis Kelamin</label>
    </div>
    <div class="small-6 cell">
      <input type="radio" name="jk" value="L" id="jk" required><label for="jkL">L</label>
      <input type="radio" name="jk" value="P" id="jk"><label for="jkP">P</label>
    </div>
  </div>
  <!-- field poli_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="poli_id" class="text-right middle">poli_id</label>
    </div>
    <div class="small-6 cell">
      <input type="text" id="poli_id" placeholder="poli_id">
    </div>
  </div>
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
		<div class="small button-group">
  <a class="button">Simpan</a>
  <a class="button">Reset</a>
  <a class="button">Kembali</a>
</div>
    </div>
  </div>
</form>