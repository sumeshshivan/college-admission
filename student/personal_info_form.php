
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="personal_info_add.php">
    
    <div class="form-group">
        <label class="control-label col-sm-2" for="application_no">Application No:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="application_no" placeholder="Application No" value="<?php echo $student->application_no; ?>" readonly name="application_no">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="rank">Entrance Rank:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="rank" placeholder="Enter Entrance Rank"  value="<?php echo $student->rank; ?>"  readonly name="rank">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="<?php echo $student->dob; ?>"  readonly name="dob">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Enter Full Name"  value="<?php echo $student->name; ?>" readonly name="name">
        </div>
    </div>

        <div class="form-group">
              <label class="control-label col-sm-2" for="sex">Sex:</label>
              <div class="col-sm-10">
              <input class="form-control " id="sex" value="<?php echo $student->sex; ?>" readonly name="sex">
              </div>
        </div>

        <div class="form-group">
              <label class="control-label col-sm-2" for="category">Category:</label>
              <div class="col-sm-10">
              <input class="form-control " id="category" value="<?php echo $student->category; ?>"  readonly name="category">
               </div>
         </div>

         <div class="form-group">
              <label class="control-label col-sm-2" for="course">Course:</label>
              <div class="col-sm-10">
              <input type="" name="" class="form-control " id="course" value="<?php echo $student->course; ?>" readonly name="course">
                
              </div>
         </div>

         <div class="form-group">
          <label class="control-label col-sm-2" for="house">House:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="house" placeholder="house" name="house" value="<?php if($student) echo $student->house ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="place">Place:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="place" placeholder="Place" name="place" value="<?php if($student) echo $student->place ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="post">Post:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="post" placeholder="Post" name="post" value="<?php if($student) echo $student->post ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="district">District:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="district" placeholder="District" name="district" value="<?php if($student) echo $student->district ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="state">State:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="state" placeholder="State" name="state" value="<?php if($student) echo $student->state ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pin">Pin:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pin" placeholder="Pin" name="pin" value="<?php if($student) echo $student->pin ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="adhar_no">Adhar No:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="adhar_no" placeholder="Adhar No" name="adhar_no" value="<?php if($student) echo $student->adhar_no ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="contact">Contact:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="contact" placeholder="Contact" name="contact" value="<?php if($student) echo $student->contact ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php if($student) echo $student->email ; ?>"  required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="date_of_admn">Date of Admission:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly name="date_of_admn">
          </div>
        </div>

        <div class="form-group">

          <label class="control-label col-sm-2" for="photo">Preview:</label>
          <div class="col-sm-10">
            <img id="student-photo" src="../photos/<?php echo $student->photo; ?>" width="200" alt="your image" />
          </div>
           
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="photo">Photo:</label>
          <div class="col-sm-10">
            <input type="hidden" name="MAX_FILE_SIZE" value="4000000"/>
            <input type="file" class="form-control" name="photo" onchange="readURL(this);" class="form-control"/>
          </div>
        </div>

         <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">submit</button>
          </div>
    </div>

</form>

<script type="text/javascript">
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#student-photo')
                    .attr('src', e.target.result)
                    .width(200)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>