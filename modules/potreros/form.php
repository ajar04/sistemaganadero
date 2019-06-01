 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Registrar Potrero
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=animales"> Ganado </a></li>
      <li class="active"> Potrero </li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/potreros/proses.php?act=insert" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre Potrero</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Area</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="area" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coordenadas</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="coordenadas" autocomplete="off" >
                </div>
              </div>

              <div class="form-group row">
                    <label class="col-sm-2 control-label">Dias Entrada Animales</label>
                    <div class="col-sm-4">
                      <select class="chosen-select" name="dias_ent_anim" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value=""></option>
                        <option value="Lunes-Martes">Lunes-Martes</option>
                        <option value="Lunes-Miercoles">Lunes-Miercoles</option>
                        <option value="Lunes-Viernes">Lunes-Viernes</option>
                        <option value="Martes">Martes</option>
                        <option value="Martes-Jueves">Martes-Jueves</option>
                        <option value="Miercoles-Viernes">Miercoles-Viernes</option>
                        <option value="Miercoles-Jueves">Miercoles-Jueves</option>
                        <option value="Jueves-Viernes">Jueves-Viernes</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Estado Cerca</label>
                    <div class="col-sm-4">
                      <select class="chosen-select" name="est_cerca" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value=""></option>
                        <option value="Cercado">Cercado</option>
                        <option value="Cerca Electrica">Cerca Electrica</option>
                        <option value="Cerca Puas">Cerca Puas</option>
                        <option value="No Encercado">No Encercado</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Ganado</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <span class="input-group-addon">Cap.</span>
                        <input type="text" class="form-control" id="cap_ganado" name="cap_ganado" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                      </div>
                    </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Observacion</label>
                    <textarea rows="6" cols="50" class="span8" name="observacion" id="observacion" style="margin: 0px; width: 426px; height: 137px;">  
                    </textarea><span class="help-inline error" id="observacion" style="display: none"></span>
                    <span class="help-inline error" id="observacion" style="display: none"></span>
                  </div>


            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=potreros" class="btn btn-danger btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT * FROM potrero WHERE id='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Potrero
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=animales"> Ganado </a></li>
      <li class="active"> Modificar Potrero </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/potreros/proses.php?act=update" method="POST">
            <div class="box-body">
              
               <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Area</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="area" autocomplete="off" value="<?php echo $data['area']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Coordenadas</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="coordenadas" autocomplete="off" value="<?php echo $data['coordenadas']; ?>" required>
                </div>
              </div>

              <div class="form-group row">
                    <label class="col-sm-2 control-label">Dias Entrada Animales</label>
                    <div class="col-sm-4">
                      <select class="chosen-select" name="dias_ent_anim" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value="<?php echo $data['dias_ent_anim']; ?>"><?php echo $data['dias_ent_anim']; ?></option>
                        <option value="Lunes-Martes">Lunes-Martes</option>
                        <option value="Lunes-Miercoles">Lunes-Miercoles</option>
                        <option value="Lunes-Viernes">Lunes-Viernes</option>
                        <option value="Martes">Martes</option>
                        <option value="Martes-Jueves">Martes-Jueves</option>
                        <option value="Miercoles-Viernes">Miercoles-Viernes</option>
                        <option value="Miercoles-Jueves">Miercoles-Jueves</option>
                        <option value="Jueves-Viernes">Jueves-Viernes</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Estado Cerca</label>
                    <div class="col-sm-4">
                      <select class="chosen-select" name="est_cerca" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value="<?php echo $data['est_cerca']; ?>"><?php echo $data['est_cerca']; ?></option>
                        <option value="Cercado">Cercado</option>
                        <option value="Cerca Electrica">Cerca Electrica</option>
                        <option value="Cerca Puas">Cerca Puas</option>
                        <option value="No Encercado">No Encercado</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Ganado</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <span class="input-group-addon">Cap.</span>
                        <input type="text" class="form-control" id="cap_ganado" name="cap_ganado" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah($data['cap_ganado']); ?>" required>
                      </div>
                    </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Observacion</label>
                    <textarea rows="6" cols="50" class="span8" name="observacion" id="observacion" style="margin: 0px; width: 426px; height: 137px;" value="<?php echo format_rupiah($data['peso_nac']); ?>">  
                    </textarea><span class="help-inline error" id="observacion" style="display: none"></span>
                    <span class="help-inline error" id="observacion" style="display: none"></span>
                  </div>
             

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=potreros" class="btn btn-danger btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>