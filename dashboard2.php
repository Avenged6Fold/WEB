<<<<<<< HEAD
<?php
include 'header.php';
include 'db.php';
=======

<?php
include 'header.php';
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
<<<<<<< HEAD
        Daftar User
        <small>user list</small>
=======
        Daftar Siswa
        <small>student list</small>
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<<<<<<< HEAD
      <?php if(isset($_GET['status']) && isset($_GET['message'])): ?>
          <div class="alert alert-<?php echo $_GET['status'] == 'success' ? 'success' : 'danger'; ?> alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo htmlspecialchars($_GET['message']); ?>
          </div>
      <?php endif; ?>
    	<div class="row">
	        <div class="col-lg-6 col-md-12 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3>
                <?php 
                  $result = $pdo->query("SELECT COUNT(*) as total FROM users WHERE role='admin'");
                  echo $result->fetch(PDO::FETCH_ASSOC)['total'];
                ?>
              </h3>
	              <p>TOTAL USER ADMIN</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-user"></i>
=======
    	<div class="row">
	        <div class="col-lg-4 col-md-12 col-xs-4">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3>15</h3>

	              <p>SISWA LAKI-LAKI</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-male"></i>
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
	            </div>
	            <a href="#" class="small-box-footer">
	              More info <i class="fa fa-arrow-circle-right"></i>
	            </a>
	          </div>
	        </div>
<<<<<<< HEAD
=======
	        <!-- ./col -->
	        <div class="col-lg-4 col-md-12 col-xs-4">
	          <!-- small box -->
	          <div class="small-box bg-green">
	            <div class="inner">
	              <h3>50</sup></h3>

	              <p>TOTAL SISWA</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-group"></i>
	            </div>
	            <a href="#" class="small-box-footer">
	              More info <i class="fa fa-arrow-circle-right"></i>
	            </a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-4 col-md-12 col-xs-4">
	          <!-- small box -->
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3>20</h3>

	              <p>SISWA PEREMPUAN</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-female"></i>
	            </div>
	            <a href="#" class="small-box-footer">
	              More info <i class="fa fa-arrow-circle-right"></i>
	            </a>
	          </div>
	        </div>
	        <!-- ./col -->
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
	    </div>
    	
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
<<<<<<< HEAD
          <i class="fa fa-users"></i>
          <h3 class="box-title">Tabel User Admin</h3>

          <div class="box-tools pull-right">
=======
          <i class="fa fa-graduation-cap"></i>
          <h3 class="box-title">Tabel Siswa</h3>

          <div class="box-tools pull-right">
             
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>

<<<<<<< HEAD
            <span class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Admin</span>
=======
                <span class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah siswa</span> 

              <!-- <a href="add.php" class="btn btn-success">Tambah siswa</a> -->

              <!-- <input type="submit" value="Tambah Siswa" name="daftar" class="btn btn-success"/> -->

>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
          </div>
        </div>
        <div id="modal-edit" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="form_edit">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
<<<<<<< HEAD
                  <h4 class="modal-title">Form Edit User Admin</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="edit_id">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="edit_email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="edit_password" placeholder="Password">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password</small>
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="edit_role" required>
                      <option value="admin">Admin</option>
                    </select>
=======
                  <h4 class="modal-title">Form Edit siswa</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="edit_id" placeholder="id">
                  <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control" name="nim" id="edit_nim" placeholder="nim">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="edit_nama" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender: </label>
                     <label><input type="radio" name="gender" value="L"> Laki-laki</label>

                     <label><input type="radio" name="gender" value="P"> Perempuan</label>
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tgl Lahir</label>
                    <input type="text" class="form-control datepicker" name="tgl_lahir" id="edit_tgl_lahir" placeholder="tgl_lahir">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="edit_alamat" placeholder="alamat">
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="button" value="Update" name="update" class="btn btn-success" onclick="update_data()" />
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal -->
<<<<<<< HEAD
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="proses.php?aksi=add" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Form Tambah User Admin</h4>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                          <label for="role">Role</label>
                          <select class="form-control" name="role" id="role" required>
                            <option value="admin">Admin</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <input type="submit" value="Daftar" name="daftar" class="btn btn-success"/>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $stmt = $pdo->query("SELECT * FROM users WHERE role='admin' ORDER BY created_at DESC");
              $id = 0;
              while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
                  $id++;
                  echo "<tr>";
                  echo "<td>".$id."</td>";
                  echo "<td>".$user['email']."</td>";
                  echo "<td>".$user['role']."</td>";
                  echo "<td>".date('d M Y H:i', strtotime($user['created_at']))."</td>";
                  echo "<td>";
                  echo "<a href='proses.php?id=".$user['id']."&aksi=delete' onclick='javascript: return confirm(\"Yakin hapus data ini ?\")' class='btn btn-danger'><i class='fa fa-trash'></i></a> | ";
                  echo "<a href='#' class='btn btn-info edit' onclick='edit(".$user['id'].")'><i class='fa fa-edit'></i></a>";
                  echo "</td></tr>";
              }
            ?>
            </tbody>
          </table>
=======
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

               <div class="modal-content">
                <form action="proses.php?aksi=add" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Form Tambah siswa</h4>
                </div>

                <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                
              <div class="box-body">
                <div class="form-group">
                  <label for="nim">Nim</label>
                  <input type="text" class="form-control" name="nim" id="nim" placeholder="nim" required="">
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                  <label for="gender">Gender: </label>
                   <label><input type="radio" name="gender" value="L" required=""> Laki-laki</label>

                   <label><input type="radio" name="gender" value="P" required=""> Perempuan</label>
                </div>
                <div class="form-group">
                  <label for="tgl_lahir">Tgl Lahir</label>
                  <input type="text" class="form-control datepicker" name="tgl_lahir" id="tgl_lahir" placeholder="tgl_lahir" required="">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat">
                </div>


                 </div>
               
              </div>
          </div>
        </div>

          <div class="modal-footer">
          <input type="submit" value="Daftar" name="daftar" class="btn btn-success"/>
              </div>
            </form>
          </div>
        </div>
      </div>

      


        <div class="box-body">
          	<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>Gender</th>
                  <th>Tgl Lahir</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
	            </thead>
                <tbody>

          <?php
            // $id = 0;
            // $koneksi = $db->list_siswa();
            // foreach ($koneksi as $siswa){
            //   if($siswa['gender']=="L"){
            //     $gender = "Laki-laki";
            //   } else if($siswa['gender']=="P"){
            //     $gender = "Perempuan";
            //   } else {
            //     $gender = "-";
            //   }

            //   echo "<tr>";
            //   $id++;
            //   echo "<td>".$id."</td>";
            //   echo "<td>".$siswa['nim']."</td>";
            //   echo "<td>".$siswa['nama']."</td>";
            //   echo "<td>".$gender."</td>";
            //   echo "<td>".$siswa['tgl_lahir']."</td>";
            //   echo "<td>".$siswa['alamat']."</td>";
            //   echo "<td>";
                     

            // echo "<a href='proses.php?id=".$siswa['id']."&aksi=delete' onclick='javascript: return confirm(\"Yakin hapus data ini ?\")'class='btn btn-danger'><i class='fa fa-trash'></i></a> | ";

            
            // echo "<a href='#' class='btn btn-info edit' id='".$siswa['id']."' onclick='edit(".$siswa['id'].")'><i class='fa fa-edit'></i></a>";
            
            // echo "</tr>";
                    
          // } ?>

	            </tbody>
            </table>
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
<<<<<<< HEAD
    function edit(id){
=======
    // $(document).ready(function(){
    //   $(".edit").click(function(){
    //     var tes = $(this).attr("id");
    //     alert(tes);
    //   });
    // });
    function edit(id){
      // alert(id);
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
      $.ajax({
        url : 'proses.php?aksi=edit&id='+id,
        dataType : 'JSON',
        success : function(result){
<<<<<<< HEAD
          $("#modal-edit").modal('show');
          $("#edit_id").val(result.id);
          $("#edit_email").val(result.email);
          $("#edit_role").val(result.role);
=======
          // alert(result.nama);
          // $("#edit_nama").val(result);
          $("#modal-edit").modal('show');
          $("#edit_id").val(result.id);
          $("#edit_nim").val(result.nim);
          $("#edit_nama").val(result.nama);
          $('input:radio[name=gender][value='+result.gender+']')[0].checked =true;
          $("#edit_tgl_lahir").val(result.tgl_lahir);
          $("#edit_alamat").val(result.alamat);
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
        },
        error : function(data){
          alert("Ada yang error");
        }
      });
    }
<<<<<<< HEAD

    function update_data(){
      $.ajax({
        url : 'proses.php?aksi=update',
=======
    function update_data(){
      $.ajax({
        url : 'proses.php?aksi=update2',
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
        type : 'POST',
        data : $("#form_edit").serialize(),
        success : function(data){
          location.reload(true);
        },
        error : function(data){
          alert("Gagal update");
        } 
      });
    }
<<<<<<< HEAD
=======

>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
  </script>

<?php 
include 'footer.php';
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 3bcafc31d15443fe2bf595253f048f84d179374c
