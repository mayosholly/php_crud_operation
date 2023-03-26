<?php
require_once('../classes/users.php');
require_once('../classes/util.php');
$user = new User();
$util = new Util();
if (isset($_POST['add'])) {
    // print_r($_POST);
    $firstname = $util->testInput($_POST['fname']);
    $lastname = $util->testInput($_POST['lname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);

    $user->setFirstname($firstname);
    $user->setLastname($lastname);
    $user->setEmail($email);
    $user->setPhone($phone);
    if ($user->insertData()) {
        echo $util->showMessage('primary', 'User Inserted Successfully');
    } else {
        echo $util->showMessage('danger', 'Something went Wrong');
    }
}

//fetch all
if (isset($_GET['read'])) {
    // echo 'success';
    $users = $user->fetchAll();
    // print_r($users);
    $output = '';
    if ($users) {
        foreach ($users as $row) {
            $output .= ' <tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['first_name'] . '</td>
            <td>' . $row['last_name'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['phone'] . '</td>
            <td>
                <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" 
                data-bs-toggle="modal" data-bs-target="#editUserModal" >Edit</a>
                <a href="#"  id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink"
                >Delete</a>
            </td>
        </tr>';
        }
        echo $output;
    } else {
        echo '
        <tr>
            <td colspan="6">No user found</id
        </tr>
        ';
    }
}

// handle edit
if (isset($_GET['edit'])) {
    // echo json_encode(['message' => 'success']);
    $id = $_GET['id'];
    $user->setId($id);
    $user->fetchOne();
    echo json_encode($user->fetchOne());
}


//handle update user ajax request
if (isset($_POST['update'])) {
    // print_r($_POST);
    $id = $util->testInput($_POST['id']);
    $firstname = $util->testInput($_POST['fname']);
    $lastname = $util->testInput($_POST['lname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);

    $user->setId($id);
    $user->setFirstname($firstname);
    $user->setLastname($lastname);
    $user->setEmail($email);
    $user->setPhone($phone);
    $update = $user->update();
    if ($update) {
        echo $util->showMessage('primary', 'User Updated Successfully');
    } else {
        echo $util->showMessage('danger', 'Something went Wrong');
    }
}

//delete users
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $user->setId($id);
    if ($user->delete()) {
        echo $util->showMessage('primary', 'User Deleted Successfully');
    } else {
        echo $util->showMessage('danger', 'Something went Wrong');
    }
}
