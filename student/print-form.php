
<style type="text/css">
  
  td {
    font-weight: bold;
  }

</style>

<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Personal Info</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-6">
                    <table class="table .table-bordered">

                    <tr>
                    <td>Application No:</td>
                    <td><?php echo ucfirst($student->application_no); ?> </td> 
                    </tr>

                    <tr>
                    <td>Name</td>
                    <td><?php echo ucfirst($student->name); ?> </td> 
                    </tr>

                    <tr>
                    <td>rank</td>
                    <td><?php echo ucfirst($student->rank); ?> </td> 
                    </tr>

                    <tr>
                    <td>course</td>
                    <td><?php echo ucfirst($student->course); ?> </td> 
                    </tr>

                    <tr>
                    <td>Date of Birth</td>
                    <td><?php echo ucfirst($student->dob); ?> </td> 
                    </tr>

                    <tr>
                    <td>Sex</td>
                    <td><?php echo ucfirst($student->sex); ?> </td> 
                    </tr>

                    <tr>
                    <td>House</td>
                    <td><?php echo ucfirst($student->house); ?> </td> 
                    </tr>        

                    <tr>
                    <td>Place</td>
                    <td><?php echo ucfirst($student->place); ?> </td> 
                    </tr>

                    <tr>
                    <td>Post</td>
                    <td><?php echo ucfirst($student->post); ?> </td> 
                    </tr>

                    <tr>
                    <td>District</td>
                    <td><?php echo ucfirst($student->district); ?> </td> 
                    </tr>

                    <tr>
                    <td>State</td>
                    <td><?php echo ucfirst($student->state); ?> </td> 
                    </tr> 

                    <tr>
                    <td>Pin</td>
                    <td><?php echo ucfirst($student->pin); ?> </td> 
                    </tr>

                </table>

            </div>

            <div class="col-md-6">

                <div class="row">

                    <div class="col-md-4">
                    </div>

                    <div class="col-md-4">
                        <img id="student-photo" src="../photos/<?php echo $student->photo; ?>" width="150" alt="your image" />
                    </div>

                    <div class="col-md-4">
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <table class="table .table-striped" style="border: none;">

                        <tr>
                        <td>Category</td>
                        <td><?php echo ucfirst($student->category); ?> </td> 
                        </tr>

                <tr>
                <td>Date of Admission</td>
                <td><?php echo ucfirst($student->date_of_admn); ?> </td> 
                </tr> 
                <tr>
                <td>Adhar No</td>
                <td><?php echo ucfirst($student->adhar_no); ?> </td> 
                </tr>
                <tr>
                <td>contact</td>
                <td><?php echo ucfirst($student->contact); ?> </td> 
                </tr>
                <tr>
                <td>email</td>
                <td><?php echo ucfirst($student->email); ?> </td> 
                </tr>
          </table>
        </div>

      </div>

    </div>
  </div>
</div>

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
<!-- -------------------------------------------------------------------- -->


<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Parent Info</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-6">
                    <table class="table .table-striped" style="border: none;">

                    <tr>
                    <td>Father Name</td>
                    <td><?php echo ucfirst($parent->father); ?> </td> 
                    </tr>

                    <tr>
                    <td>Mother Name</td>
                    <td><?php echo ucfirst($parent->mother); ?> </td> 
                    </tr>

                    <tr>
                    <td>Guardian</td>
                    <td><?php echo ucfirst($parent->guardian); ?> </td> 
                    </tr>

                    </table>

                </div>

                                <div class="col-md-6">
                    <table class="table .table-striped" style="border: none;">

                    <tr>
                    <td>Salary</td>
                    <td><?php echo ucfirst($student->application_no); ?> </td> 
                    </tr>

                    <tr>
                    <td>Contact</td>
                    <td><?php echo ucfirst($parent->contact); ?> </td> 
                    </tr>

                    <tr>
                    <td>Email</td>
                    <td><?php echo ucfirst($parent->email); ?> </td> 
                    </tr>

                    </tr>

                    </table>
                    
                </div>

            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------- -->


<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Academic Info</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-6">
                    <table class="table .table-striped" style="border: none;">

                    <tr>
                    <td>Institution Name</td>
                    <td><?php echo ucfirst($school->name); ?> </td> 
                    </tr>

                    <tr>
                    <td>Register No</td>
                    <td><?php echo ucfirst($school->reg_no); ?> </td> 
                    </tr>

                    <tr>
                    <td>Guardian</td>
                    <td><?php echo ucfirst($school->year); ?> </td> 
                    </tr>

                     <tr>
                    <td>Guardian</td>
                    <td><?php echo ucfirst($school->board); ?> </td> 
                    </tr>
                   


                    </table>

                </div>

                <div class="col-md-6">
                    <table class="table .table-striped" style="border: none;">

                    <tr>
                    <td>Institution Name</td>
                    <td><?php echo ucfirst($hschool->name); ?> </td> 
                    </tr>

                    <tr>
                    <td>Contact</td>
                    <td><?php echo ucfirst($hschool->reg_no); ?> </td> 
                    </tr>

                    <tr>
                    <td>Email</td>
                    <td><?php echo ucfirst($hschool->board); ?> </td> 
                    </tr>

                    </tr>

                    </table>
                    
                </div>

            </div>
        </div>
    </div>
</div>

<form class="form-horizontal" method="POST" action="submit.php">
 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>