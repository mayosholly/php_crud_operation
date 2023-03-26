const addForm = document.getElementById('add-user-form');
const updateForm = document.getElementById('edit-user-form');
const showAlert = document.getElementById("showAlert");
const addModal = new bootstrap.Modal(document.getElementById("addNewUserModal"));
const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
const tbody = document.querySelector('tbody');
//Add new user ajax request
addForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(addForm);
    formData.append("add", 1);

    if(addForm.checkValidity() === false){
        e.preventDefault();
        e.stopPropagation();
        addForm.classList.add('was-validated');
        return false;
    }else{
        document.getElementById('add-user-btn').value = 'Please wait.. ';
        const data = await fetch('includes/action.php', {
            method: 'POST',
            body: formData,
        });    
        const response = await data.text();
        // console.log(response);
        showAlert.innerHTML = response;      
        document.getElementById('add-user-btn').value = 'Add User';
        addForm.reset();
        addForm.classList.remove('was-validated');
        addModal.hide();
        fetchAllUsers();
    }
});

//fetch all users
const fetchAllUsers = async() => {
    const data = await fetch("includes/action.php?read=1", {
        method: "GET",
    });
    const response = await data.text();
    // console.log(response);
    tbody.innerHTML = response;
};
fetchAllUsers();

//edit user
tbody.addEventListener("click", (e) => {
    if(e.target && e.target.matches("a.editLink")){
        e.preventDefault();
        let id = e.target.getAttribute("id");
        // console.log(id);
        editUser(id);
    }
});

const editUser = async (id) => {
    const data = await fetch(`includes/action.php?edit=1&id=${id}`, {
        method: 'GET'
    });
    const response = await data.json();
    // console.log(response[0]);
    document.getElementById("id").value = response[0].id;
    document.getElementById("fname").value = response[0].first_name;
    document.getElementById("lname").value = response[0].last_name;
    document.getElementById("email").value = response[0].email;
    document.getElementById("phone").value = response[0].phone;
}


//update user request
updateForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(updateForm);
    formData.append("update", 1);

    if(updateForm.checkValidity() === false){
        e.preventDefault();
        e.stopPropagation();
        updateForm.classList.add('was-validated');
        return false;
    }else{
        document.getElementById('edit-user-btn').value = 'Please wait.. ';
        const data = await fetch('includes/action.php', {
            method: 'POST',
            body: formData,
        });    
        const response = await data.text();
        // console.log(response);
        showAlert.innerHTML = response;      
        document.getElementById('edit-user-btn').value = 'Edit User';
        updateForm.reset();
        updateForm.classList.remove('was-validated');
        editModal.hide();
        fetchAllUsers();
    }
});

//delete user
tbody.addEventListener("click", (e) => {
    if(e.target && e.target.matches("a.deleteLink")){
        e.preventDefault();
        let id = e.target.getAttribute("id");
        // console.log(id);
        if(confirm(`Are you sure you want to delete?`))
        deleteUser(id);
    }
});

const deleteUser = async(id) => {
    const data = await fetch(`includes/action.php?delete=1&id=${id}`, {
        method: 'GET'
    });
    const response = await data.text();
    // console.log(response);
    showAlert.innerHTML = response;
    fetchAllUsers();
}