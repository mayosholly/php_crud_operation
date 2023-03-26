<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Crud</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <script src="assets/bootstrap.bundle.min.js"></script>
    <script src="assets/jquery.js"></script>


</head>

<body>
    <!-- Add new user modal -->
    <div class="modal fade" id="addNewUserModal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate>
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="fname" class="form-control
                                form-control-lg" placeholder="Enter first name" required>
                                <div class="invalid-feedback"> First Name is required </div>
                            </div>

                            <div class="col">
                                <input type="text" name="lname" class="form-control
                                form-control-lg" placeholder="Enter Last name" required>
                                <div class="invalid-feedback"> Last Name is required </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control
                                form-control-lg" placeholder="Enter Email name" required>
                            <div class="invalid-feedback"> Email is required </div>
                        </div>
                        <div class="mb-3">
                            <input type="number" name="phone" class="form-control
                                form-control-lg" placeholder="Enter Phone Number" required>
                            <div class="invalid-feedback"> Phone Number is required </div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Add User" id="add-user-btn" class="btn btn-primary btn-block btn-lg">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end -->

    <!-- Edit  user modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" class="p-2" novalidate>
                        <input type="hidden" name="id" id="id">
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="fname" id="fname" class="form-control
                                form-control-lg" placeholder="Enter first name" required>
                                <div class="invalid-feedback"> First Name is required </div>
                            </div>

                            <div class="col">
                                <input type="text" name="lname" id="lname" class="form-control
                                form-control-lg" placeholder="Enter Last name" required>
                                <div class="invalid-feedback"> Last Name is required </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control
                                form-control-lg" placeholder="Enter Email name" required>
                            <div class="invalid-feedback"> Email is required </div>
                        </div>
                        <div class="mb-3">
                            <input type="number" name="phone" id="phone" class="form-control
                                form-control-lg" placeholder="Enter Phone Number" required>
                            <div class="invalid-feedback"> Phone Number is required </div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Update User" id="edit-user-btn" class="btn btn-primary btn-block btn-lg">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end -->

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-primary">All users in the database</h4>
                </div>
                <div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addNewUserModal">Add New User</button>
                    <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addNewUserModal"><i class="bi-plus-circle me-2"></i>Add New Employee</button> -->
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <class class="table-responsive">
                    <table class="table table-striped table-borderd text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </class>
            </div>
        </div>
    </div>
    <script src="js/main.js"> </script>


</body>

</html>