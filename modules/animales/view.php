<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Ganado
    <a class="btn btn-success btn-social pull-right" href="?module=form_animales&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-edit fa-fw"></i> Registrar Ganado
    </a>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php  
      if (empty($_GET['alert'])) {echo "";} 

      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check-circle'></i> Exito!</h4>
              Nuevos datos de animal han sido  almacenado correctamente.
              </div>";
            }
            elseif ($_GET['alert'] == 2) {
              echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Datos del animal modificados correcamente.
              </div>";
            }
            elseif ($_GET['alert'] == 3) {
              echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Se eliminaron los datos del Animal
              </div>";
            }?>

      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th width='20' class="center">Codigo</th>
                <th width='80'class="center">Nombre</th>
                <th width='80'class="center">Sexo</th>
                <th width='80'class="center">fecha nac</th>
                <th width='80'class="center">tipo propo</th>
                <th width='80'class="center">Raza</th>
                <th width='80'class="center">$ Venta</th>
                <th width='80'class="center">Color</th>
                <th width='80'class="center">Procedencia</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $query = mysqli_query($mysqli, "SELECT id,nombre,sexo,estado,propietario,registro,fecha_nac,fecha_dest,peso_nac,peso_dest,raza,color,marca_oreja,marca_hierro,tipo_propo,procedencia,precio_venta FROM animal ORDER BY id DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $precio_venta = format_rupiah($data['precio_venta']);
           
              echo "<tr>
                      <td width='20' class='center'>$data[id]</td>
                      <td width='80' class='center'>$data[nombre]</td>
                      <td width='80' class='center'>$data[sexo]</td>
                      <td width='80' class='center'>$data[fecha_nac]</td>
                      <td width='80' class='center'>$data[tipo_propo]</td>
                      <td width='80' class='center'>$data[raza]</td>
                      <td width='80' class='center'>$data[precio_venta]</td>
                      <td width='80' class='center'>$data[color]</td>
                      <td width='80' class='center'>$data[procedencia]</td>
                      <td width='80' class='center'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_animales&form=edit&id=$data[id]'>
                          <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/animales/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('estas seguro de eliminar el animal <?php echo $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>

            <?php
            echo " </div>
            </td>
            </tr>";
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content