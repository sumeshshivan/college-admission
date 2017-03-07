 <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Degree </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      
      <div class="form-group">
      <label class="control-label col-sm-2" for="d_name">Name of Institution</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="d_name" placeholder="Name of Institution"  name="d_name" value="<?php if($degree) echo $degree->name ; ?>"  required>
          </div>
        </div> 
         <div class="form-group">
          <label class="control-label col-sm-2" for="d_no">Register No</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="d_no" placeholder="Register No" name="d_no" value="<?php if($degree) echo $degree->reg_no ; ?>"  required>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="d_board">Name of University</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="d_board" placeholder="Name of Board" name="d_board" value="<?php if($degree) echo $degree->board ; ?>"  required>
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="d_year">Year</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="d_year" placeholder="Year" name="d_year" value="<?php if($degree) echo $degree->year ; ?>"  required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="d_mark">Mark</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="d_mark" placeholder="Mark" name="d_mark" value="<?php if($degree) echo $degree->mark ; ?>"  required>
          </div>
        </div>

      </div>
  </div>