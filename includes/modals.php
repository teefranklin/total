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
              <input type="password" name="new_password" id="new_password" class="form-control"
                placeholder="New Password" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-3">
              <label for="" class="detail">Confirm New Password :</label>
            </div>
            <div class="col-md-8">
              <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control"
                placeholder="Confirm New Password" required>
            </div>
          </div>
          <br>
          <span class="label label-danger" id="warn_me"></span> <span id="result"></span>
        </div>
        <div class="modal-footer">
          <input type="submit" name="update_password" class="btn btn-primary" value="Update Password">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>
  <!---User Create Task-->
  <div class="modal fade" id="user_create_task" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Task</h4>
        </div>
        <form action="includes/process.php" method="post" enctype="multipart/form-data">
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
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label for="" class="detail">Choose Document :</label>
                  </div>
                  <div class="col-md-8">
                    <input type="file" id="file" name="file" class="upload_document" />
                    <label for="file"><span class="fa fa-upload"></span> Upload Document</label>
                  </div>
                </div>
            <?php endif ; ?>

        </div>
        <div class="modal-footer">
            <input type="submit" name="create_task" class="btn btn-success"  id="task_btn" value="Create Task" >
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>


<!-- Add Lead -->
<div class="modal fade" id="add_lead" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Lead</h4>
      </div>
      <form action="includes/add_lead.php" method="post" data-remote="true" accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="row">
            <div class="col-md-3">
              <label for=""><b>Company Name:</b></label>
            </div>
            <div class="col-md-8">
              <input type="text" name="company_name" id="company_name" class="form-control" placeholder="e.g. Total Zimbabwe"
                required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-3">
              <label for=""><b>Lead Approacher:</b></label>
            </div>
            <div class="col-md-8">
              <select name="lead_approacher" id="lead_approacher" class="form-control">
                <option value="myself">myself</option>
                <?php if($_SESSION['role']=='admin') : ?>
                <option value="other">Other</option>
                <?php endif ; ?>
              </select>
            </div>
          </div>
          <?php if($_SESSION['role']=='admin') : ?>
          <br>
          <div class="row">
            <div class="col-md-3">
              <label for=""><b>Choose User:</b></label>
            </div>
            <div class="col-md-8">
              <?php
                        $query ="SELECT * FROM personal_information where user_id !='".$_SESSION['user_id']."'";
        
        
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $count= $statement -> rowCount();
                        $result = $statement->fetchAll();

                    ?>

              <select name="assign_to_user_id" id="assign_to_user_id" class="form-control">
                <?php foreach($result as $row) : ?>
                <option value="<?php echo $row['user_id']; ?>"><?php echo $row['firstname']. " ".$row['lastname'] ; ?>
                </option>
                <?php endforeach ; ?>
              </select>

            </div>
          </div>
          <?php endif ; ?>
          <br>
          <div class="row">
            <div class="col-md-3">
              <label for=""><b>Date Started:</b></label>
            </div>
            <div class="col-md-8">
              <input type="date" name="start_date" id="" class="form-control" placeholder="e.g. Total Zimbabwe"
                required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-3">
              <label for=""><b>Stage:</b></label>
            </div>
            <div class="col-md-8">
              <input type="text" name="stage" id="stage" class="form-control" placeholder="e.g. Proof Of Concept" required>
            </div>
          </div>

          <div class="modal-footer">
            <input type="submit" name="add_lead" class="btn btn-primary" value="Add Lead">
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
      <form action="../includes/process.php?id=<?php echo $id ?>" method="post" data-remote="true"
        accept-charset="UTF-8">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <label for="" class="detail">New Password :</label>
            </div>
            <div class="col-md-8">
              <input type="password" name="new_password" id="new_password" class="form-control"
                placeholder="New Password" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-3">
              <label for="" class="detail">Confirm New Password :</label>
            </div>
            <div class="col-md-8">
              <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control"
                placeholder="Confirm New Password" required>
            </div>
          </div>
          <br>
          <span class="label label-danger" id="warn_me"></span> <span id="result"></span>
        </div>
        <div class="modal-footer">
          <input type="submit" name="admin_update_password" class="btn btn-primary" value="Update Password">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>
<?php endif; ?>

