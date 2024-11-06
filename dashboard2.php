
<?php
include 'header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Siswa
        <small>student list</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
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
	            </div>
	            <a href="#" class="small-box-footer">
	              More info <i class="fa fa-arrow-circle-right"></i>
	            </a>
	          </div>
	        </div>
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
	    </div>
    	
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <i class="fa fa-graduation-cap"></i>
          <h3 class="box-title">Tabel Siswa</h3>

          <div class="box-tools pull-right">
             
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>

                <span class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah siswa</span> 

              <!-- <a href="add.php" class="btn btn-success">Tambah siswa</a> -->

              <!-- <input type="submit" value="Tambah Siswa" name="daftar" class="btn btn-success"/> -->

          </div>
        </div>
        <div id="modal-edit" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="form_edit">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
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
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    // $(document).ready(function(){
    //   $(".edit").click(function(){
    //     var tes = $(this).attr("id");
    //     alert(tes);
    //   });
    // });
    function edit(id){
      // alert(id);
      $.ajax({
        url : 'proses.php?aksi=edit&id='+id,
        dataType : 'JSON',
        success : function(result){
          // alert(result.nama);
          // $("#edit_nama").val(result);
          $("#modal-edit").modal('show');
          $("#edit_id").val(result.id);
          $("#edit_nim").val(result.nim);
          $("#edit_nama").val(result.nama);
          $('input:radio[name=gender][value='+result.gender+']')[0].checked =true;
          $("#edit_tgl_lahir").val(result.tgl_lahir);
          $("#edit_alamat").val(result.alamat);
        },
        error : function(data){
          alert("Ada yang error");
        }
      });
    }
    function update_data(){
      $.ajax({
        url : 'proses.php?aksi=update2',
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

  </script>

<?php 
include 'footer.php';
?>
