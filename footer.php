<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © UPT | CV 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!--scripts to log out and destroy session -->
  <script>
    $( document ).ready(function() {
      $('#deconectare').on('click', function(){
        var an_studiu = this.value; // get the selection value
        $.ajax({
          type: "POST",  // method of sending data
          url: "distruge_sesiunea.php", // name of PHP script
          data:'deconectare=true', // parameter name and value
          success: function(result){ // deal with the results
            window.location.replace("login.php");
          }
        });
      });
    });
  </script>
  <!-- end of scripts -->
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Doresti sa te deconectezi?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Alege "Deconectare" daca doresti sa inchei sesiunea curenta</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Anulare</button>
            <a class="btn btn-primary" id="deconectare" href="#">Deconectare</a>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</body>

</html>