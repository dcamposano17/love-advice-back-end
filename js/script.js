function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete record?");
    if (conf == true) {
        $.post("ajax/delete.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
            }
        );
    }
}

function UpdateRecord() {
    // get values
    var stud_no = $("#update_stud_no").val();
    var lastname = $("#update_last_name").val();
    var firstname = $("#update_first_name").val();
    var middlename = $("#update_middle_name").val();
    var program = $("#update_program").val();
    var gender = $("#update_gender").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/update.php", {
            id: id,
            stud_no: stud_no,
            lastname: lastname,
            firstname: firstname,
            middlename: middlename,
            program: program,
            gender: gender
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
        }
    );
}
function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readuser.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_stud_no").val(user.stud_no);
            $("#update_last_name").val(user.lastname);
            $("#update_first_name").val(user.firstname);
            $("#update_middle_name").val(user.middlename);
            $("#update_program").val(user.program);
            $("#update_gender").val(user.gender);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}
