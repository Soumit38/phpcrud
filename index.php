<?php
session_start();
include('header.php');
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">PHP POPUP MODAL CRUD Part-I
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Insert Data
                        </button>
                    </h4>

                </div>
                <div class="card-body">

                    <?php
                    if(isset($_SESSION['status']) && $_SESSION['status']!=''){
                        ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Good Evening ! </strong> <?php echo $_SESSION['status']  ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php  unset($_SESSION['status']);
                     }
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="post.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Email address</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter name: ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter email: ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone_no" class="form-label">Email phone no.</label>
                                            <input type="number" class="form-control" name="phone_no" placeholder="Enter number: ">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="save_data" class="btn btn-primary">Save Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table  class="table table-striped table-hover table-bordered caption-top">
                        <caption>Data fetched from server</caption>
                        <thead>
                        <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $connection = mysqli_connect('localhost', 'root', '', 'tutorials');

                        $select_query = "select * from test";
                        $select_query_run = mysqli_query($connection, $select_query);

                        if (mysqli_num_rows($select_query_run) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($select_query_run)) {


                        ?>
                        <tr>
                            <td class="user_id" scope="row"><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['mobile']?></td>
                            <td><a href="" class="btn btn-info btn-sm view_data"> View-data</a> </td>
                            <td><a href="" class="btn btn-success btn-sm edit_data"> Edit-data</a> </td>
                            <td><a href="" class="btn btn-danger btn-sm delete_data"> Delete-data</a> </td>

                        </tr>

                        <?php
                            }
                        }

                        ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
<script>
    $(document).ready(function (){
       $('.view_data').click(function (e){
           e.preventDefault();

           var user_id = $(this).closest('tr').find('.user_id').text();
           // console.log(user_id);
           $.ajax({
              method: "POST",
              url: "post.php",
              data:{
                  'click_view_btn':true,
                  'user_id': user_id,
              },
               success: function (response){
                  console.log(response);
               }
           });
       });
    });
</script>
