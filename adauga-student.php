  <?php include('header.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Acasa</a>
        </li>
        <li class="breadcrumb-item active">Adauga Student</li>
      </ol>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal">
            <fieldset>

            <!-- Form Name -->
            <legend>Adauga Student</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Nume</label>  
              <div class="col-md-4">
              <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Prenume</label>  
              <div class="col-md-4">
              <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Adresa e-mail</label>  
              <div class="col-md-4">
              <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="passwordinput">Parola</label>
              <div class="col-md-4">
                <input id="passwordinput" name="passwordinput" type="password" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="selectbasic">Alege anul de studiu</label>
              <div class="col-md-4">
                <select id="selectbasic" name="selectbasic" class="form-control">
                  <option value="an_1_licenta">Anul 1 Licenta</option>
                  <option value="an_2_licenta">Anul 2 Licenta</option>
                  <option value="an_3_licenta">Anul 3 Licenta</option>
                  <option value="an_4_licenta">Anul 4 Licenta</option>
                  <option value="an_1_master">Anul 1 Master</option>
                  <option value="an_2_master">Anul 2 Master</option>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Specializarea</label>  
              <div class="col-md-4">
              <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Adauga Student</button>
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
