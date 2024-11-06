
<?php
include 'header.php';
include 'db.php';
// $db = new config();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <i class="fa fa-graduation-cap"></i>
          <h3 class="box-title">Tabel Guru</h3>

          <div class="box-tools pull-right">
             
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>

                <span class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Guru</span> 

              <!-- <a href="add.php" class="btn btn-success">Tambah guru</a> -->

              <!-- <input type="submit" value="Tambah guru" name="daftar" class="btn btn-success"/> -->

          </div>
        </div>
        <div id="modal-edit" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="form_edit">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Form Edit Guru</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="edit_id" placeholder="nim">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="edit_nama" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis kelamin: </label>
                     <label><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label>

                     <label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="edit_alamat" placeholder="alamat">
                  </div>
                  <div class="form-group">
                    <label for="tgl_masuk">Tgl Masuk</label>
                    <input type="text" class="form-control datepicker" name="tgl_masuk" id="edit_tgl_masuk" placeholder="tgl_masuk">
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <input type="button" value="Update" name="update" class="btn btn-success" onclick="update_guru()" />
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

               <div class="modal-content">
                <form action="proses.php?aksi=tambah_guru" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Form Tambah Guru</h4>
                </div>

                <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                  <label for="jenis_kelamin">Jenis kelamin: </label>
                   <label><input type="radio" name="jenis_kelamin" value="L" required=""> Laki-laki</label>

                   <label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" required="">
                </div>
                <div class="form-group">
                  <label for="tgl_masuk">Tgl Masuk</label>
                  <input type="text" class="form-control datepicker" name="tgl_masuk" id="tgl_masuk" placeholder="tgl_masuk" required="">
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
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Jenis kelamin</th>
                  <th>Alamat</th>
                  <th>Tgl Masuk</th>
                  <th>Action</th>
                </tr>
	            </thead>
                <tbody>

          <?php
          //   $id = 0;
          //   $koneksi = $db->list_guru();
          //   foreach ($koneksi as $guru){
          //     if($guru['jenis_kelamin']=="L"){
          //       $jenis_kelamin = "Laki-laki";
          //     } else if($guru['jenis_kelamin']=="P"){
          //       $jenis_kelamin = "Perempuan";
          //     } else {
          //       $jenis_kelamin = "-";
          //     }

          //     echo "<tr>";
          //     $id++;
          //     echo "<td>".$id."</td>";
          //     echo "<td>".$guru['nama']."</td>";
          //     echo "<td>".$jenis_kelamin."</td>";
          //     echo "<td>".$guru['alamat']."</td>";
          //     echo "<td>".$guru['tgl_masuk']."</td>";
              
          //     echo "<td>";
          //             // <a href="edit.php?id='.$guru['id'].'" class="btn btn-success"><i class="fa fa-pencil"></i></a>
          //             // <a href="proses.php?aksi=delete&id='.$guru['id'].'" class="btn btn-danger" onclick="javascript: return confirm(\'Yakin hapus data ini ?\')"><i class="fa fa-trash" ></i></a>

          //   echo "<a href='proses.php?id=".$guru['id']."&aksi=delete_guru' onclick='javascript: return confirm(\"Yakin hapus data ini ?\")'class='btn btn-danger'><i class='fa fa-trash'></i></a> | ";

          //   // echo "<a href='edit.php?id=".$guru['id']."'class='btn btn-info'><i class='fa fa-edit'></i></a>";
          //   echo "<a href='#' class='btn btn-info edit' id='".$guru['id']."' onclick='update3(".$guru['id'].")'><i class='fa fa-edit'></i></a>";
          //   // echo "<a href='#' class='btn btn-info edit' id='".$guru['id']."'><i class='fa fa-edit'></i></a>";
          //   // echo "</td>";
          //   echo "</tr>";
                    
          // }
           ?>

	            </tbody>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    <!-- </section> -->
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
    function update3(id){
      // alert(id);
      $.ajax({
        url : 'proses.php?aksi=edit_data_guru&id='+id,
        dataType : 'JSON',
        success : function(result){
          // alert(result.nama);
          // $("#edit_nama").val(result);
          $("#modal-edit").modal('show');
          $("#edit_id").val(result.id);
          $("#edit_nama").val(result.nama);
          $('input:radio[name=jenis_kelamin][value='+result.jenis_kelamin+']')[0].checked =true;
          $("#edit_alamat").val(result.alamat);
          $("#edit_tgl_masuk").val(result.tgl_masuk);
        },
        error : function(data){
          alert("Ada yang error");
        }
      });
    }
    function update_guru(){
      $.ajax({
        url : 'proses.php?aksi=update3',
        type : 'POST',
        data : $("#form_edit").serialize(),
        success : function(res){
        	if(res=="1"){
        		location.reload(true);
        	} else {
				alert("Gaal update data");        		
        	}
          
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
