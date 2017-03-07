<div class="tab-pane <?php if($tab==2) echo "active"; ?>" id="tab_2">

<form class="form-horizontal" method="POST" action="parent_info_add.php">
      <div class="form-group">
          <label class="control-label col-sm-2" for="father">Father Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="father" placeholder="Father Name" name="father" value="<?php if($parent) echo $parent->father ; ?>"  required>
          </div>
        </div> 
         <div class="form-group">
          <label class="control-label col-sm-2" for="mother">Mother Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="mother" placeholder="Mother Name" name="mother" value="<?php if($parent) echo $parent->mother ; ?>"  required>
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-sm-2" for="guardian">Guardian Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="guardian" placeholder="Guardian Name" name="guardian" value="<?php if($parent) echo $parent->guardian ; ?>"  required>
          </div>
          </div>

         <div class="form-group">
          <label class="control-label col-sm-2" for="income">Annual Income</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="income" placeholder="Annual Income" name="income" value="<?php if($parent) echo $parent->income ; ?>"  required>
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-sm-2" for="address">address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="address" placeholder="address" name="address" value="<?php if($parent) echo $parent->address ; ?>"  required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="contact">Contact</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="contact" placeholder="Contact" name="contact" value="<?php if($parent) echo $parent->contact ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="<?php if($parent) echo $parent->email ; ?>"  required>
          </div>
        </div>

         <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Next</button>
          </div>
    </div>

</form>

</div>