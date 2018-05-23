  <?php include('header.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Acasa</a>
        </li>
        <li class="breadcrumb-item active">Inscriere Student Disciplina</li>
      </ol>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <form class="form-horizontal">
          <fieldset>

          <legend>Inscriere Student Disciplina</legend>

          <div class="form-group">
            <label class="col-md-4 control-label" for="c">Alege anul de studiu</label>
            <div class="col-md-4">
              <select id="c" name="c" class="form-control">
                <option value="an_1_licenta">Anul 1 Licenta</option>
                <option value="an_2_licenta">Anul 2 Licenta</option>
                <option value="an_3_licenta">Anul 3 Licenta</option>
                <option value="an_4_licenta">Anul 4 Licenta</option>
                <option value="an_1_master">Anul 1 Master</option>
                <option value="an_2_master">Anul 2 Master</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="c">Alege Student</label>
            <div class="col-md-4">
              <select id="c" name="c" class="form-control">
                <option value="an_1_licenta">Popescu Ion</option>
                <option value="an_2_licenta">Vasile Maria</option>
                <option value="an_3_licenta">Victoria Popescu</option>
                <option value="an_4_licenta">Zaharie Radu</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Alege Materia</label>
            <div class="col-md-4">
              <select id="selectbasic" name="selectbasic" class="form-control">
                <option value="radiocomunicatii">Radiocomunicatii</option>
                <option value="programare_orientata_pe_obiecte">Programare Orientata pe Obiecte</option>
                <option value="fizica">Fizica</option>
                <option value="analiza_matematica">Analiza Matematica</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Inscrie Student</button>
            </div>
          </div>

          </fieldset>
        </form>


        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
