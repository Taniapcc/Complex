 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title Aside</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->  
  
  <!-- Main Footer -->
  <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020-2020 <a href="https://adminlte.io">Ecolac.com</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
   <script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/dist/js/adminlte.min.js"></script>

    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('#example2').DataTable({
      
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).ready(function (){
        $('#registros').DataTable({
         
        "paging": true,
          "pageLength": 5, 
          "lengthMenu": [5, 10, 25, 75, 100],   
                
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "responsive": true,
          "language" :{
            paginate:{
              next:'Siguiente',
              previous: 'Anterior',
              last:"Ultimo",
              first:"Primero",
              },
            info :'Mostrando _START_ a _END_ de _TOTAL_ registros ',
            emptyTable : "No hay registros",
            infoEmpty : "0 registros",
            search : "Buscar"
          },
          
        });
      });
  });
</script>







</body>
</html>