<?php
include('authenticate.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config/dbcon.php');

?>

<!-- Modal -->
<!-- Modal -->
    <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <form action="categorycode.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Trending</label>
                            <input type="checkbox" name="trending"> Trending
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="checkbox" name="status"> Status
                        </div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="category_save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    include('messages/message2.php');
                ?> 
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Gift Category
                            <a href="#" data-toggle="modal" data-target="#CategoryModal" class="btn btn-primary btn-sm float-right">Add</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Trending</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $categoryquery = "SELECT * FROM categories";
                                        $result = mysqli_query($conn, $categoryquery);

                                        foreach($result as $row){
                                            ?>
                                            <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['description'] ?></td>
                                            <td> <input type="checkbox"
                                                <?php echo $row['trending'] == '1' ? 'checked':'' ?> readonly />
                                            </td>
                                            <td> <input type="checkbox"
                                                <?php echo $row['status'] == '1' ? 'checked':'' ?> readonly />
                                            </td>
                                            <td><?php echo $row['created_at'] ?></td>
                                            <td>
                                            <a href='category-edit.php?id=<?php echo $row['id']?>' class="btn btn-info btn-sm">Edit</a>
                                            <a href='categorycode.php?id=<?php echo $row['id'] ?>' class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>   
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

<?php
include('includes/footer.php');
?>