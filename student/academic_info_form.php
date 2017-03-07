<div class="tab-pane <?php if($tab==3) echo "active"; ?>" id="tab_3">
<form class="form-horizontal" method="POST" action="academic_info_add.php">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">School </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">


      <div class="form-group">
          <label class="control-label col-sm-2" for="s_name">Name of Institution</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="s_name" placeholder="Name of Institution"  name="s_name" value="<?php if($school) echo $school->name ; ?>"  required>
          </div>
        </div> 
         <div class="form-group">
          <label class="control-label col-sm-2" for="s_no">Register No</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="s_no" placeholder="Register No" name="s_no" value="<?php if($school) echo $school->reg_no ; ?>"  required>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="s_board">Name of Board</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="s_board" placeholder="Name of Board" name="s_board" value="<?php if($school) echo $school->board ; ?>"  required>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="s_year">Year</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="s_year" placeholder="Year" name="s_year" value="<?php if($school) echo $school->year ; ?>"  required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="s_mark">Mark</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="s_mark" placeholder="Mark" name="s_mark" value="<?php if($school) echo $school->mark ; ?>"  required>
          </div>
        </div>

    </div>
  </div>

<!-- ----------------------------------------------------------------------------------------------------> 

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">High School </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      
      <div class="form-group">
      <label class="control-label col-sm-2" for="h_name">Name of Institution</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="h_name" placeholder="Name of Institution"  name="h_name" value="<?php if($hschool) echo $hschool->name ; ?>"  required>
          </div>
        </div> 
         <div class="form-group">
          <label class="control-label col-sm-2" for="h_no">Register No</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="h_no" placeholder="Register No" name="h_no" value="<?php if($hschool) echo $hschool->reg_no ; ?>"  required>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="h_board">Name of Board</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="h_board" placeholder="Name of Board" name="h_board" value="<?php if($hschool) echo $hschool->board ; ?>"  required>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="h_year">Year</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="h_year" placeholder="Year" name="h_year" value="<?php if($hschool) echo $hschool->year ; ?>"  required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="h_mark">Mark</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="h_mark" placeholder="Mark" name="h_mark" value="<?php if($hschool) echo $hschool->mark ; ?>"  required>
          </div>
        </div>

      </div>
  </div>

        <?php

        if ($student->graduation == "pg") {
          include("degree_info_form.php"); 
        }

        ?>

       <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Next</button>
          </div>
    </div>

</form>

</div>