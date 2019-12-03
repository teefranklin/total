<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php
include 'connection/database.php';



    $query ="SELECT * FROM personal_information where user_id !='".$_SESSION['user_id']."'";
    
    
    $statement = $connect->prepare($query);
    $statement->execute();
    $count= $statement -> rowCount();
    $result = $statement->fetchAll();

    
		
?>
    <section id="main-content">
        <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-users"></i>Users</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="fa fa-users"></i><a href="users.php">All Users</a></li>
                        </ol>
                    </div>
                </div>
                <div class="my-tasks container">
                    <div class="row">
                        <div class="action-buttons col-md-8">
                           
                        </div>
                        
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <a href="admin/add_user.php" class="btn btn-success">New User &nbsp;<span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <br>
                    <!---All Users-->
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><i class="fa fa-users red"></i><strong>All Users</strong></h2>
                            <div class="panel-actions">
                            <a href="users.php" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="all_users" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Role(s)</th>
                                        <th>Status</th>
                                        <th align="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="search_into">
                                <?php foreach($result as $row) : ?>
                                <?php 
                                    $query ="SELECT * FROM login where user_id='".$row['user_id']."'";
                                    
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $login_info = $statement->fetchAll();
                                ?>
                                    <tr>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['lastname']; ?></td>
                                        <?php foreach($login_info as $data) : ?>
                                            <td><?php echo $data['role']; ?></td>
                                            <?php if($data['status']=='active'): ?>
                                                <td><span class="label label-success"><?php echo $data['status']; ?></span></td>
                                            <?php else: ?>
                                                <td><span class="label label-danger"><?php echo $data['status']; ?></span></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>  
                                        <td>
                                        <?php if($data['status']=='active'): ?>
                                            <a href="admin/deactivate_user.php?id=<?php echo $row['user_id']; ?>" class="label label-warning">Deactivate</a>
                                        <?php else : ?>
                                            <a href="admin/deactivate_user.php?id=<?php echo $row['user_id']; ?>" class="label label-success">Activate</a>
                                        <?php endif; ?>
                                            <a href="admin/edit_user.php?id=<?php echo $row['user_id']; ?>" class="label label-info">Edit</a>
                                            <?php if($_SESSION['role']=='admin') : ?>
                                                <a href="admin/delete_user.php?id=<?php echo $row['user_id']; ?>" class="label label-danger">Delete</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr> 
                                <?php endforeach; ?>  
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer panel-height">
                                
                        </div>
                    </div>
        </section>
    </section>
</section>
<?php include 'includes/footer.php'; ?>