<?php
include 'header.php';
include 'db.php';
?>

<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <i class="fa fa-map-marker"></i>
        <h3 class="box-title">Tabel Wisata</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i>
          </button>
          <span class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Wisata</span>
        </div>
      </div>

      <!-- Modal for Add Wisata -->
      <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
          <form action="proses2.php?aksi=tambah_wisata" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Form Tambah Wisata</h4>
            </div>
            <div class="modal-body">
              <!-- Existing Fields -->
              <div class="form-group">
                <label for="nama_wisata">Nama Wisata</label>
                <input type="text" class="form-control" name="nama_wisata" required>
              </div>
              <div class="form-group">
                <label for="alamat_wisata">Alamat Wisata</label>
                <input type="text" class="form-control" name="alamat_wisata" required>
              </div>
              <div class="form-group">
                <label for="deskripsi_wisata">Deskripsi Wisata</label>
                <textarea class="form-control" name="deskripsi_wisata" required></textarea>
              </div>
              <div class="form-group">
                <label for="operasional">Jam Operasional</label>
                <input type="text" class="form-control" name="operasional" required>
              </div>
              <div class="form-group">
                <label for="harga_tiket">Harga Tiket</label>
                <input type="number" class="form-control" name="harga_tiket" required>
              </div>
              <!-- New Image Field -->
              <div class="form-group">
                <label for="gambar">Upload Gambar</label>
                <input type="file" class="form-control" name="gambar" accept="image/*" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Daftar" name="daftar" class="btn btn-success"/>
            </div>
          </form>
          </div>
        </div>
      </div>

      <!-- Existing code for displaying wisata data -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nama Wisata</th>
              <th>Alamat Wisata</th>
              <th>Deskripsi</th>
              <th>Jam Operasional</th>
              <th>Harga Tiket</th>
              <th>Gambar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            // Fetch and display data with image
            $query = "SELECT * FROM wisata";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $wisataData = $stmt->fetchAll();

            foreach ($wisataData as $wisata) {
              echo "<tr>";
              echo "<td>{$wisata['id']}</td>";
              echo "<td>{$wisata['nama_wisata']}</td>";
              echo "<td>{$wisata['alamat_wisata']}</td>";
              echo "<td>{$wisata['deskripsi_wisata']}</td>";
              echo "<td>{$wisata['operasional']}</td>";
              echo "<td>{$wisata['harga_tiket']}</td>";
              echo "<td><img src='uploads/{$wisata['gambar']}' width='100'></td>";
              echo "<td>
                      <a href='#' class='btn btn-info edit' onclick='edit_wisata({$wisata['id']})'><i class='fa fa-edit'></i></a> |
                      <a href='proses2.php?aksi=delete_wisata&id={$wisata['id']}' class='btn btn-danger' onclick='return confirm(\"Yakin hapus data ini?\")'><i class='fa fa-trash'></i></a>
                    </td>";
              echo "</tr>";
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>
