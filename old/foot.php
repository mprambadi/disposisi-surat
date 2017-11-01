    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-calx-sample-2.0.0.min.js"></script>    
    <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap3-wysihtml5.js" type="text/javascript"></script>
    <script src="assets/js/docs.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/bootstrap-select.js"></script>

    <script>
    $(document).ready(function() {
        $('#trks').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
        $('#trds').dataTable(); 
        $('#tibs').dataTable(); 
        $('#tibd').dataTable();
        $('#tuse').dataTable();
        $('#slct').selectpicker({
          style:'btn-success'
        });
        $('#slct2').selectpicker({
          style:'btn-success'

        });
        $('#slct3').selectpicker({
          style:'btn-primary'

        });
        $('.textarea').wysihtml5();
        $('#tgl').datepicker({
          setDate:new Date(),
          autoclose:"true"
        });
        $('#tgl_terus').datepicker();

        var calc  = $('#sheet2').calx();
        var sheet = calc.calx('getSheet');
        var range = sheet.getCellRange('B2', 'C2');

        // for(var a in range){
        //     range[a].setValue(Math.random(10, 1000)*100);
        //     range[a].renderComputedValue();
        // }

        sheet.calculate();

    } );
    </script>
    <script>
    
    </script>
  </body>

</html>