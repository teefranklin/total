<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php



$query ="SELECT * FROM tasks ORDER by due_date asc";
$statement = $connect->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();

?>
    <section id="main-content">
        <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-tasks"></i>Tasks</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="icon_document_alt"></i>To Do</li>
                            <li><i class="fa fa-tasks"></i><a href="tasks.php">My Tasks</a></li>
                        </ol>
                    </div>
                </div>
                <div class="my-tasks container">
                    <div class="row">
                        <div class="action-buttons col-md-10">
                        
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success" data-toggle="modal" data-target="#user_create_task">New Task &nbsp;<span class="fa fa-plus"></span></button>
                        </div>
                    </div>
                    <br>
                    <!---Personal Tasks-->
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><i class="fa fa-tasks red"></i><strong>Personal Tasks</strong></h2>
                            <div class="panel-actions">
                            <a href="tasks.php" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="tasks_data" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th>Task ID</th>
                                        <th>Description</th>
                                        <th>Date Created</th>
                                        <th>Due Date</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $row) : ?>
                                    <?php if ($row['assigned_to']==$_SESSION['user_id'] && $row['assigned_by'] ==$_SESSION['user_id']) : ?>
                                        <tr>
                                            <td><?php  echo $row['task_id']; ?></td>
                                            <td><?php  echo $row['description']; ?></td>
                                            <td><?php  echo $row['start_date']; ?></td>
                                            <td><?php  echo $row['due_date']; ?></td>
                                            <td><span class="progress-bar" role="progressbar" aria-valuenow="<?php  echo $row['progress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><?php  echo $row['progress'].'%'; ?></span></td>
                                            
                                            <?php
                                                $ouput='';

                                                if($row['status']=='waiting'){
                                                    $ouput.="<td><span class='label label-warning'>".$row['status']."</span></td>";
                                                }else if($row['status']=='done'){
                                                    $ouput.="<td><span class='label label-success'>".$row['status']."</span></td>";
                                                }else{
                                                    $ouput.="<td><span class='label label-danger'>".$row['status']."</span></td>";
                                                }
                                            ?>
                                            <?php echo $ouput; ?>
                                            
                                            <td>
                                                <a href="includes/mark_as_done.php?task_id=<?php echo $row['task_id']; ?>" class="label label-success">Mark As Done</a>
                                                <a href="includes/delete_task.php?task_id=<?php echo $row['task_id']; ?>" class="label label-danger" >Delete</a>
                                               
                                        </tr>
                                    <?php endif ; ?>
                                <?php endforeach ; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>

                    <?php if($_SESSION['role']!='admin') : ?>
                                                <!---Assigned Tasks-->
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><i class="fa fa-tasks red"></i><strong>My Assignments</strong></h2>
                            <div class="panel-actions">
                            <a href="tasks.php" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="tasks_data_assigned" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th>Task ID</th>
                                        <th>Description</th>
                                        <th>Date Assigned</th>
                                        <th>Due Date</th>
                                        <th>Assigned By</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Supporting Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $row) : ?>
                                    <?php if ($row['assigned_to']==$_SESSION['user_id'] && $row['assigned_by'] !=$_SESSION['user_id']) : ?>
                                        <tr>
                                            <td><?php  echo $row['task_id']; ?></td>
                                            <td><?php  echo $row['description']; ?></td>
                                            <td><?php  echo $row['start_date']; ?></td>
                                            <td><?php  echo $row['due_date']; ?></td>
                                            <!--Get Assigner Name-->
                                            <?php  
                                                $query ="SELECT * FROM personal_information where user_id ='".$row['assigned_by']."'";
    
    
                                                $statement = $connect->prepare($query);
                                                $statement->execute();
                                                $count= $statement -> rowCount();
                                                $people = $statement->fetchAll();
                                                $zita='';
                                                foreach($people as $person){
                                                    $zita = $person['firstname']. " ". $person['lastname'];
                                                    
                                                }
                                                
                                            ?>
                                            <td><?php  echo $zita; ?></td>
                                            <td><span class="progress-bar" role="progressbar" aria-valuenow="<?php  echo $row['progress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><?php  echo $row['progress'].'%'; ?></span></td>
                                            
                                            <?php
                                                $ouput='';

                                                if($row['status']=='waiting'){
                                                    $ouput.="<td><span class='label label-warning'>".$row['status']."</span></td>";
                                                }else if($row['status']=='done'){
                                                    $ouput.="<td><span class='label label-success'>".$row['status']."</span></td>";
                                                }else{
                                                    $ouput.="<td><span class='label label-danger'>".$row['status']."</span></td>";
                                                }
                                            ?>
                                            <?php echo $ouput; ?>
                                            <?php if($row['supporting_document'] != "")    : ?>
                                                <td><a href="resources/tasks/<?php  echo $row['supporting_document']; ?>">Click To View</td>
                                            <?php else: ?>
                                                <td></td>
                                            <?php endif ; ?>
                                            <td>
                                                <a href="includes/mark_as_done.php?task_id=<?php echo $row['task_id']; ?>" class="label label-success">Mark As Done</a>
                                                
                                               
                                        </tr>
                                    <?php endif ; ?>
                                <?php endforeach ; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($_SESSION['role'] =='admin') : ?>
                                                <!---Assigned Tasks-->
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><i class="fa fa-tasks red"></i><strong>Assigned Tasks</strong></h2>
                            <div class="panel-actions">
                            <a href="tasks.php" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="tasks_data_assigns" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th>Task ID</th>
                                        <th>Description</th>
                                        <th>Date Assigned</th>
                                        <th>Due Date</th>
                                        <th>Assigned To</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Supporting Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $row) : ?>
                                    <?php if ($row['assigned_to']!=$_SESSION['user_id'] && $row['assigned_by'] ==$_SESSION['user_id']) : ?>
                                        <tr>
                                            <td><?php  echo $row['task_id']; ?></td>
                                            <td><?php  echo $row['description']; ?></td>
                                            <td><?php  echo $row['start_date']; ?></td>
                                            <td><?php  echo $row['due_date']; ?></td>
                                            <!--Get Assigner Name-->
                                            <?php  
                                                $query ="SELECT * FROM personal_information where user_id ='".$row['assigned_to']."'";
    
    
                                                $statement = $connect->prepare($query);
                                                $statement->execute();
                                                $count= $statement -> rowCount();
                                                $people = $statement->fetchAll();
                                                $zita='';
                                                foreach($people as $person){
                                                    $zita = $person['firstname']. " ". $person['lastname'];
                                                    
                                                }
                                                
                                            ?>
                                            <td><?php  echo $zita; ?></td>
                                            <td><span class="progress-bar" role="progressbar" aria-valuenow="<?php  echo $row['progress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><?php  echo $row['progress'].'%'; ?></span></td>
                                            
                                            <?php
                                                $ouput='';

                                                if($row['status']=='waiting'){
                                                    $ouput.="<td><span class='label label-warning'>".$row['status']."</span></td>";
                                                }else if($row['status']=='done'){
                                                    $ouput.="<td><span class='label label-success'>".$row['status']."</span></td>";
                                                }else{
                                                    $ouput.="<td><span class='label label-danger'>".$row['status']."</span></td>";
                                                }
                                            ?>
                                            <?php echo $ouput; ?>
                                            <?php if($row['supporting_document'] != "")    : ?>
                                                <td><a href="resources/tasks/<?php  echo $row['supporting_document']; ?>">Click To View</td>
                                            <?php else: ?>
                                                <td></td>
                                            <?php endif ; ?>
                                            <td>
                                                <a href="includes/mark_as_done.php?task_id=<?php echo $row['task_id']; ?>" class="label label-success">Mark As Done</a>
                                                <a href="includes/delete_task.php?task_id=<?php echo $row['task_id']; ?>" class="label label-danger" >Delete</a>
                                                
                                            </td>
                                        </tr>
                                    <?php endif ; ?>
                                <?php endforeach ; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <?php endif; ?>
                   
                </div>
        </section>
    </section>
</section>
<?php include 'includes/footer.php'; ?>