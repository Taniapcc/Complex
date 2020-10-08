<!-- Modal -->
<div class="modal fade" id="modalFormRol" name = "modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormRolTitulo">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="card-header">
                <h3 class="card-title">Nuevo Rol</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="formRol" name ="formRol">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNombre">Nombre</label>
                    <input type="text" id="txtNombre" name ="txtNombre" class="form-control"  placeholder="Nombre del rol" required>
                  </div> 
                  <div class="form-group">
                    <label for="textareaDescripcion">Descripción</label>
                    <textarea class ="form-control" id="txtDescripcion" name ="txtDescripcion" rows="2" placeholder="Descripción del rol" required></textarea>                    
                  </div>                   
                </div>
                <!-- select -->
                <div class="form-group">
                  <label for= "listEstado">Estado</label>
                  <select class="form-control" id="listEstado" name="listEstado" required ="">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="Submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
      </div>     
    </div>
  </div>
</div>