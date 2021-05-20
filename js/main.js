



// Global Variables

let employeeID;

let profile = {
    firstName: "",
    lastName: "",
    jobTitle: "",
    email: "",
    department: "",
    location: ""
}

$(document).ready(function() {
    buildTable();
    getDeparments();
    getDeparmentsUpdateProfile();

    $('#addSubmit').submit(function(){
        add_personnel_data();
        
    });

   

    $('#updateProfile').submit(function(){
        editProfile();
      
        buildTable();
    });


    $('#updateProfileModal').on('shown.bs.modal', function() { 
      
 
        load_update_profile_data();
      
        buildTable();
    });



})



function clearTable() {

    $('#database').html(`
    <tbody>
        <tr id="tableHeader">
            <th scope="col" class="hideCell" >ID</th>
            <th scope="col">Display Name</th>
            <th scope="col" class="hideCell" id="jobTitleHeader">Job Title</th>
            <th scope="col" class="hideCell">Email</th>
            <th scope="col" class="hideCell" id="departmentHeader">Department</th>
            <th scope="col" class="hideCell" id="locationHeader">Location</th>
       
        </tr>
    </tbody>
    `)
}

function appendEntry(db, i, filterBy) {

    $('#database tbody').append(`
        <tr data-toggle="modal" data-id="${db[i].id}" data-target="#profileModal" onclick="loadProfile(${JSON.stringify(db[i]).split('"').join("&quot;")})">
            <th class="hideCell">${db[i].id}</th>
            <td><b> ${db[i].firstName}</b></td>
            <td><b>${db[i].lastName}</b> 
            <td class=${(filterBy == "jobTitle") ? "" : "hideCell"}>${db[i].jobTitle}</td>
            <td class="hideCell">${db[i].email}</td>
            <td class=${(filterBy == "department") ? "" : "hideCell"}>${db[i].department}</td>
            <td class=${(filterBy == "location") ? "" : "hideCell"}>${db[i].location}</td>
            <td><button type="button" id="${db[i].id}" class="btn=btn-secondary table-btn" data-toggle="modal"
            data-target="#profileModal"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
            </svg></button>
            <td><button style="visibility: hidden"></button></td>'
            </td>
        </tr>
    `)

}
function buildTable() {

    $.ajax({
        type: 'GET',
        url: 'php/getAll.php', 
        dataType: 'json',
        success: function(data) {

            var db = data.data;

            var numberOfEntries = 0;

            // console.log(db);
            for (let i in db) {
                appendEntry(db, i)
                numberOfEntries++
            }

            $('#entries').html(numberOfEntries)

        }
    })
}
function loadProfile(profile) {
    // $('#profileModal').css("display", "block")
    $('#profile-head').html(
      '<div class="row">' +
        '<div class="col-md-6 col-sm-6 col-sx-6">' +
            '<div class="profile-head">' +
                '<h5>' +profile.firstName + ' ' + profile.lastName + '</h5>'+
                
            '</div>'+
        '</div>'+
      '</div>'

    );

    $('#profile-body-001').html(
        '<div class="row">' +
        '<div class="col-md-12 text-right">' +
            '<form>' +
                '<input type="number" id="profileId" name="id" value= "' + profile.id + '" style="display: none"></input>' +
                '<button type="button" id="edit"  class="btn btn-secondary small" data-dismiss="modal" data-toggle="modal" data-target="#updateProfileModal">Edit</button>' +
                
            '</form>' +
        '</div>' +
    '</div>' +
        '<div class="row profileRow">'+
            '<h3 class="col-5 col-sm-6"> First Name: </h3>'+          
            '<span class="col-7 col-sm-6" id="firstName">'+ profile.firstName+  '</span>'+
        '</div>'+
        '<div class="row profileRow">'+
            '<h3 class="col-5 col-sm-6"> Second Name: </h3>'+          
            '<span class="col-7 col-sm-6" id="lastName">'+ profile.lastName+  '</span>'+
        '</div>'+
        '<div class="row profileRow">'+
            '<h3 class="col-5 col-sm-6"> Job Title: </h3>'+          
            '<span class="col-7 col-sm-6" id="jobTitle">'+ profile.jobTitle+  '</span>'+
        '</div>'+
        '<div class="row profileRow">'+
            '<h3 class="col-5 col-sm-6"> Department: </h3>'+          
            '<span class="col-7 col-sm-6" id="department">'+ profile.department+  '</span>'+
        '</div>'+
        '<div class="row profileRow">'+
            '<h3 class="col-5 col-sm-6"> Location : </h3>'+          
            '<span class="col-7 col-sm-6" id="location">'+ profile.location+  '</span>'+
        '</div>'+
        
       
        '<div class="row profileRow">' +
            '<div class="col-md-4">' +
            '</div>' +
            '<div class="col-md-4">' +
            '</div>' +
        '</div>' 
    );

    $('#profile-body-002').html(
        '<div class="row">' +
            '<div class="col-md-12 text-right">' +
                '<form>' +
                    '<input type="number" id="profileId" name="id" value= "' + profile.id + '" style="display: none"></input>' +
                    '<button type="button" id="edit"  class="btn btn-secondary small" data-dismiss="modal" data-toggle="modal" data-target="#updateProfileModal">Edit</button>' +
                '</form>' +
            '</div>' +
        '</div>' +
        '<div class="row">' +
            '<div class="col-md-4">' +
                '<label>Job Title:</label>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<p>' + profile.jobTitle + '</p>' +
            '</div>' +
        '</div>' +
        '<hr>'
    )

  


    $('#displayName').children().text(`${profile.firstName}  ${profile.lastName}`)
    $('#id').text(profile.id)
    $('#firstName').text(profile.firstName)
    $('#lastName').text(profile.lastName)
    $('#jobTitle').text(profile.jobTitle)
    $('#email').text(profile.email)
    $('#department').text(profile.department)
    $('#location').text(profile.location)

    if ($('#editModeToggle').prop('checked') == true) {
        updateProfile()
    }
    
}


function getDeparments() {

    $.ajax({
        type: 'GET',
        url: 'php/getAllDepartments.php', 
        dataType: 'json',
        success: function(data) {

            var db = data.data;

            var option = "";

            // console.log(db);
            for (let i = 0; i < db.length; i++) {
                option +=
                    '<option value"' + db[i].id + '"> ' + db[i].name + '</option>';
            }
            $('#addEmployeeDepartment').append(option).select2();
          
            // for (let i in db) {
            //     appendEntry(db, i)
            //     numberOfEntries++
            // }

            // $('#entries').html(numberOfEntries)

        }
    })
}


function getDeparmentsUpdateProfile() {

    $.ajax({
        type: 'GET',
        url: 'php/getAllDepartments.php', 
        dataType: 'json',
        success: function(data) {

            var db = data.data;

            var option = "";

            // console.log(db);
            for (let i = 0; i < db.length; i++) {
                option +=
                    '<option value"' + db[i].id + '"> ' + db[i].name + '</option>';
            }
            $('#addEmployeeDepartment2').append(option).select2();
          
            // for (let i in db) {
            //     appendEntry(db, i)
            //     numberOfEntries++
            // }

            // $('#entries').html(numberOfEntries)

        }
    })
}







function addEmployee() {

    let departmentName = $('#addEmployeeDepartment').val()

    $.getJSON(`php/getAllDepartments.php`, function (departments) {
        let departmentID = departments.data.filter(dep => dep.name == departmentName)[0].id

        $.ajax({
            data: {
                'firstName': $('#addEmployeeFirstName').val(),
                'lastName': $('#addEmployeeLastName').val(),
                'jobTitle': $('#addEmployeeJobTitle').val(),
                'email': $('#addEmployeeEmail').val(),
                'departmentID': departmentID
            },
            url: 'php/addProfile.php', 
            dataType: 'json',
            success: function(data) {
                
                clearTable()

                $('#addEmployeeFirstName').val("")
                $('#addEmployeeLastName').val("")
                $('#addEmployeeJobTitle').val("")
                $('#addEmployeeEmail').val("")
                $('#addEmployeeDepartment').find('option:eq(0)').prop('selected', true);

                $.when($.ajax(
                    buildTable()
                ))

    
            }
        })

    })
    
}


function toggleAddDepartment() {
    populateSelectOptions('Location',"addDepartmentLocation")
}

function toggleRemoveDepartment() {
    populateSelectOptions('Department',"removeDepartmentDepartment")  
}



function addDepartment() {

    let departmentName = $('#addDepartmentDepartment').val()
    let locationName = $('#addDepartmentLocation').val()

    $.getJSON(`php/getAllLocations.php`, function (locations) {
        let locationID = locations.data.filter(loc => loc.name == locationName)[0].id
       



        $.ajax({
            data: {
                'name': departmentName,
                'locationID': locationID,
            },
            url: 'php/insertDepartment.php', 
            dataType: 'json',
            success: function(data) {

                $('#addDepartmentDepartment').val("")
                $('#addDepartmentLocation').find('option:eq(0)').prop('selected', true);
                console.log("success Add Department");
    
            }
        })
    }); 

}


function deleteDepartment () {
    let departmentName = $('#removeDepartmentDepartment').val();

     $.getJSON(`php/getAllDepartments.php`, function (departments) {
         let departmentID = departments.data.filter(dep => dep.name == departmentName)[0].id;
         console.log(departmentID);

        $.ajax({
            url: 'php/deleteDepartmentByID.php',
            data: {
                'id': departmentID,

            },
            dataType: 'json',
            success: function (data) {
                $('#removeDepartmentDepartment').find('option:eq(0)').prop('selected', true);
                console.log('Success Delete');
            },
             error: function (dataaaaaaaaaa) {
                 console.log(data);
             }

        })

    });
}




function populateSelectOptions(category, selectID) {
    $(`#${selectID}`).empty();

    $.getJSON(`php/getAll${category}s.php`, function (category) {
        $.each(category.data , function (key, entry) {
            $(`#${selectID}`).append($('<option></option>').attr('value', entry.name).text(entry.name));
        })
    }); 
}