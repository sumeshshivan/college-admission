<form class="form-horizontal" method="POST" action="school-detail.php">
<div class="row">
    <table class="table">

        <td>Application No:</td>
        <td><?php echo ucfirst($parent->father); ?> </td> 
        </tr>
        <tr>
        <td>Mother:</td>
        <td><?php echo ucfirst($parent->mother); ?> </td> 
        </tr>
         <tr>
        <td>rank</td>
        <td><?php echo ucfirst($parent->guardian); ?> </td> 
        </tr>
        <tr>
        <td>course</td>
        <td><?php echo ucfirst($parent->contact); ?> </td> 
        </tr>
        <tr>
        <td>Date of Birth</td>
        <td><?php echo ucfirst($parent->adress); ?> </td> 
        </tr>
        <tr>
        <td>Sex</td>
        <td><?php echo ucfirst($parent->email); ?> </td> 
        </tr>
       
  </table>
 
  <!-- <button type="button"  class="btn btn-default" onclick="window.print()"/>Print</button></td> -->
</div>

 <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Next</button>
            <!-- <button type="button"  class="btn btn-default" onclick="window.print()"/>Print</button> -->
          </div>
    </div>

</form>