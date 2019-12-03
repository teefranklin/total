  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <form action="includes/process.php" method="post" data-remote="true" accept-charset="UTF-8">
        <div class="modal-body">
           
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="detail">Old Password :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" name="old_password" id="" class="form-control" placeholder="Old Password" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="detail">New Password :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="detail">Confirm New Password :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" placeholder="Confirm New Password" required>
                    </div>
                </div>
                <br>
                <span class="label label-danger" id="warn_me"></span> <span id="result"></span>
        </div>
        <div class="modal-footer">
            <input type="submit" name="update_password" class="btn btn-primary"  value="Update Password" >
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

<?php if($_SESSION['role']=='admin') : ?>
<!---Admin Change Password Modal-->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <form action="../includes/process.php?id=<?php echo $id ?>" method="post" data-remote="true" accept-charset="UTF-8">
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="detail">New Password :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="detail">Confirm New Password :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" placeholder="Confirm New Password" required>
                    </div>
                </div>
                <br>
                <span class="label label-danger" id="warn_me"></span> <span id="result"></span>
        </div>
        <div class="modal-footer">
            <input type="submit" name="admin_update_password" class="btn btn-primary"  value="Update Password" >
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<?php endif; ?>
  <!---User Create Task-->
<div class="modal fade" id="user_create_task" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Task</h4>
        </div>
        <form action="includes/process.php" method="post" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3">
                    <label for=""><b>Task Name:</b></label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="description" id="" placeholder="Enter Task Name Here" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for=""><b>Due Date:</b></label>
                </div>
                <div class="col-md-7">
                    <input type="date" name="due_date" id="" placeholder="Set Due Date" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for=""><b>Assign To:</b></label>
                </div>
                <div class="col-md-7">
                   <select name="assign_to" id=""  class="form-control">
                        <option value="myself">myself</option>
                        <?php if($_SESSION['role']=='admin') : ?>
                            <option value="other">Other</option>
                        <?php endif ; ?>
                   </select>
                </div>
            </div>
            <br>
            <?php if($_SESSION['role']=='admin') : ?>
                <div class="row">
                    <div class="col-md-3">
                        <label for=""><b>Choose User:</b></label>
                    </div>
                    <div class="col-md-7">
                    <?php
                        $query ="SELECT * FROM personal_information";
        
        
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $count= $statement -> rowCount();
                        $result = $statement->fetchAll();

                    ?>
                    
                    <select name="assign_to_user_id" id=""  class="form-control">
                        <?php foreach($result as $row) : ?>
                            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['firstname']. " ".$row['lastname'] ; ?></option>
                        <?php endforeach ; ?>    
                    </select>

                    </div>
                </div>
            <?php endif ; ?>
        </div>
        <div class="modal-footer">
            <input type="submit" name="create_task" class="btn btn-success"  value="Create Task" >
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>


  <!---User Edit Tasks-->
  <div class="modal fade" id="user_edit_task" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Task</h4>
        </div>
        <form action="includes/process.php" method="post" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3">
                    <label for=""><b>Task Name:</b></label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="description" id="" placeholder="Enter Task Name Here" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for=""><b>Due Date:</b></label>
                </div>
                <div class="col-md-7">
                    <input type="date" name="due_date" id="" placeholder="Set Due Date" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for=""><b>Assign To:</b></label>
                </div>
                <div class="col-md-7">
                   <select name="assign_to" id=""  class="form-control">
                        <option value="myself">myself</option>
                        <?php if($_SESSION['role']=='admin') : ?>
                            <option value="other">Other</option>
                        <?php endif ; ?>
                   </select>
                </div>
            </div>
            <br>
            <?php if($_SESSION['role']=='admin') : ?>
                <div class="row">
                    <div class="col-md-3">
                        <label for=""><b>Choose User:</b></label>
                    </div>
                    <div class="col-md-7">
                    <?php
                        $query ="SELECT * FROM personal_information";
        
        
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $count= $statement -> rowCount();
                        $result = $statement->fetchAll();

                    ?>
                    
                    <select name="assign_to_user_id" id=""  class="form-control">
                        <?php foreach($result as $row) : ?>
                            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['firstname']. " ".$row['lastname'] ; ?></option>
                        <?php endforeach ; ?>    
                    </select>

                    </div>
                </div>
            <?php endif ; ?>
        </div>
        <div class="modal-footer">
            <input type="submit" name="create_task" class="btn btn-success"  value="Create Task" >
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<!-- 
<div class="footer">
    <p class="footer-text">Design by Tee Franklin</p>
</div>
-->
<!-- javascripts -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/chart.js"></script>
<!--custome script for all page-->
<script src="js/scripts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
     $(function() {
                $('#toggleButton').click( function() {
                    $('#chapter1').toggle('15000', function(){
                        if ($('#chapter1').is(':visible')) {
                             $('#plus').val('-') 
                        } else {
                            $('#plus').val('+') 
                        }
                    });
                });
                $('#toggleButton2').click( function() {
                    $('#chapter2').toggle('15000', function(){
                        if ($('#chapter2').is(':visible')) {
                             $('#plus2').val('-') 
                        } else {
                            $('#plus2').val('+') 
                        }
                    });
                });
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#avatar')
                            .attr('src', e.target.result)
                            .width(300)
                            .height(400);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(document).ready(function() {
                $('#tasks_data').DataTable({
                    "columnDefs": [
                        { "searchable": false, "targets": 6 }
                    ]
                });
                $('#tasks_data_assigned').DataTable({
                    "columnDefs": [
                        { "searchable": false, "targets": 7 }
                    ]
                });
                $('#tasks_data_assigns').DataTable();
                $('#all_users').DataTable(
                    {
                    "columnDefs": [
                        { "searchable": false, "targets": 5 }
                    ]
                });
                $('#tasks_data_homepage').DataTable();
                $('#archived_tender_responses').DataTable();
                $('#document_archive').DataTable();
                $('#leads_table').DataTable();
                $('#confirm_new_password').keyup(function() {  
                    var p=$('#new_password').val();
                    var cp=$('#confirm_new_password').val();
                    if(!p.includes(cp)){
                        $("#warn_me").html("Passwords Do Not Match !");
                    }else{
                        $("#warn_me").html("");
                    }
                    
                    $('#result').html(checkStrength($('#new_password').val()))
                });
                $('#new_password').keyup(function() {  
                    $('#result').html(checkStrength($('#new_password').val()))
                });
                function checkStrength(password) {
                    var strength = 0
                    if (password.length < 6) {
                        $('#result').removeClass()
                        $('#result').addClass('label label-danger')
                        return 'Too short'
                    }
                    if (password.length > 7) strength += 1
                    // If password contains both lower and uppercase characters, increase strength value.
                    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
                    // If it has numbers and characters, increase strength value.
                    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
                    // If it has one special character, increase strength value.
                    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                    // If it has two special characters, increase strength value.
                    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                    // Calculated strength value, we can return messages
                    // If value is less than 2
                    if (strength < 2) {
                        $('#result').removeClass()
                        $('#result').addClass('label label-danger')
                        return 'Weak'
                    } else if (strength == 2) {
                        $('#result').removeClass()
                        $('#result').addClass('label label-warning')
                        return 'Good'
                    } else {
                        $('#result').removeClass()
                        $('#result').addClass('label label-success')
                        return 'Strong'
                    }
                }
                function fetch_user(){
                    $.ajax({
                        url:"search_users.php",
                        method:"POST",
                        success:function(data){
                            $('.search_info').html(data);
                        }
                    })
                } 
            });       
           
</script>
</body>

</html>