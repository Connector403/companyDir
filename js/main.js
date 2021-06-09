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

let tempDeleteID = 0;
let tempFullName = '';
let tempDeleteLocationName = '';

$(document).ready(function () {
    // <!-- Menu Toggle Script -->
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
      if (this.checked) {
        checkbox.each(function () {
          this.checked = true;
        });
      } else {
        checkbox.each(function () {
          this.checked = false;
        });
      }
    });
    checkbox.click(function () {
      if (!this.checked) {
        $("#selectAll").prop("checked", false);
      }
    });

    buildTable();
    getDeparments();
    // getDeparmentsUpdateProfile();

});


$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });




function clearTable() {

    $('#database').html(`
    <tbody>
        <tr id="tableHeader">
            <th scope="col"  >Action</th>
            <th scope="col">Display Name</th>
            <th scope="col" class="hideCell" id="jobTitleHeader">Job Title</th>
            <th scope="col" class="hideCell">Email</th>
            <th scope="col" class="hideCell" id="departmentHeader">Department</th>
            <th scope="col" class="hideCell" id="locationHeader">Location</th>
            <th scope="col" class="hideCell" >ID</th>
       
        </tr>
    </tbody>
    `)
}


// function will be used in to buildTable()
function appendEntry(db, i, filterBy) {

    
    $('#database tbody').append(`
        <tr data-toggle="modal" data-id="${db[i].id}" data-target="#profileModal" onclick="loadProfile(${JSON.stringify(db[i]).split('"').join("&quot;")})">
            <td style='white-space: nowrap'>
            
            <button type="button" id="${db[i].id}" class="btn=btn-secondary"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"> Details
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg> 
            </button> 
                
            </td>
            <td><b> ${db[i].firstName}</b></td>
            <td><b>${db[i].lastName}</b> 
            <td class=${(filterBy == "jobTitle") ? "" : "hideCell"}>${db[i].jobTitle}</td>
            <td class="hideCell">${db[i].email}</td>
            <td class=${(filterBy == "department") ? "" : "hideCell"}>${db[i].department}</td>
            <td class=${(filterBy == "location") ? "" : "hideCell"}>${db[i].location}</td>
           
            <th class="hideCell">${db[i].id}</th>
        </tr>
    `)

}

// 
function buildTable() {

    $.ajax({
        type: 'GET',
        url: 'php/getAll.php',
        dataType: 'json',
        success: function (data) {

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
    tempDeleteID = profile.id;
    tempFullName = `profile.firstName  profile.lastName`;
    $('#profileModal').css("display", "block");
  
   

    $('#displayName').children().text(`${profile.firstName}  ${profile.lastName}`);
    $('#id').text(profile.id);
    $('#firstName').text(profile.firstName);
    $('#lastName').text(profile.lastName);
    $('#jobTitle').text(profile.jobTitle);
    $('#email').text(profile.email);
    $('#department').text(profile.department);
    $('#location').text(profile.location);

    $('.deleteCellROW').html(`
    <button  id="${profile.id}" type="button"  data-toggle="modal" data-target="#deleteEmpModal"class="btn btn-outline-danger deleteCellButton" on-click="toggleDeleteEmp()" data-dismiss="modal">
    Delete record
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
            </svg> 
    </button> `);
 

}
// Start update Profile 

// when update button is pressedn on profile modal 
function toggleProfileUpdate() {

    if ($('#updateButton').text() == "Save") {
        updateProfileInfo();
        $('.alert').hide();
    } else  {

        saveProfile();

    }
}




// 
function updateProfileInfo() {
    $('#updateButton').text("Update");
    $('.alert').hide();

    for (let i = 2; i < 7; i++) {
        // let entryUpdate = $('#profileUpdate').children().eq(i).children().eq(1);
        // let idUpdate = entryUpdate.attr('id');
        let entry = $('#profile').children().eq(i).children().eq(1);
        let entryText = entry.text();
        let id = entry.attr('id');

        profile[id] = entryText;

        if (i < 6) {
            // replace everything other than department and location 
            entry.replaceWith(`<input id='${id}' placeholder='${entryText}'>`);

        } else {
            // update Department and location 
            entry.replaceWith(`<select onchange="updateLocation()" id='${id}'></select>`);

            populateSelectOptions('Department', id);
            $(`#${id}`).append(`<option selected="true">${entryText}</option>`)
        }
    }
}



function updateLocation() {
    $.getJSON(`php/getAllDepartments.php`, function (departments) {
        let locationID = departments.data.filter(dep => dep.name == $('#department').val())[0].locationID

        $.getJSON(`php/getAllLocations.php`, function (locations) {
            let location = locations.data.filter(loc => loc.id == locationID)[0].name
            $('#location').text(location)

        })

    })

}
function saveProfile() {
    $('#updateButton').text("Update")

    for (let i = 2; i < 7; i++) {
        let entryUpdate = $('#profile').children().eq(i).children().eq(1);
        let entryText = entryUpdate.val();
        let id = entryUpdate.attr('id');

        if (entryText) {
            profile[id] = entryText;
        }
        entryUpdate.replaceWith(`<span class='col-7 col-sm-6' id='${id}'>${profile[id]}</span>`);
    }
    $('#displayName').children().text(`${profile.firstName} ${profile.lastName}`)

    loadUpdateProfile();

}

function updateSuccessMessage(){


    

   

}


//submitting data
//submitting data
function loadUpdateProfile() {

    $.getJSON('php/getAllDepartments.php', function (departments) {
        let depID = departments.data.filter(dep => dep.name == profile.department)[0].id;
        console.log(depID);


        $.ajax({
            url: 'php/updateProfile.php',
            dataType: 'json',
            data: {
                'id': parseInt($('#id').text()),
                'firstName': profile.firstName,
                'lastName': profile.lastName,
                'jobTitle': profile.jobTitle,
                'email': profile.email,
                'departmentID': depID

            },
            success: function (data) {

                $('#profile').hide();
                $('#updateButton').hide();
                clearTable();
                buildTable();
                $('#profilemodalBody').html(`<div class="alert alert-success">
                    <h4 class="alert-heading">Successful Update </h4>
                    <p> You have successfully Update the ${profile.firstName} ${profile.lastName}'s record!</p>
                    <hr>
                    <p class="mb-0"> You can now return the menu </p>
                </div>`)
            
            },
            error: function (error) {
                $('#profile').hide();
                $('#updateButton').hide();
                $('#profilemodalBody').html(`<div class="alert alert-success">
                <h4 class="alert-heading">Successful Update </h4>
                <p> You have successfully Update the ${profile.firstName} ${profile.lastName}'s record!</p>
                <hr>
                <p class="mb-0"> You can now return the menu </p>
            </div>`);
                clearTable();
                buildTable();
     
             
               
            }
        })
    })


}
// End Of update Profile





function getDeparments() {

    $.ajax({
        type: 'GET',
        url: 'php/getAllDepartments.php',
        dataType: 'json',
        success: function (data) {

            var db = data.data;

            var option = "";

            // console.log(db);
            for (let i = 0; i < db.length; i++) {
                option +=
                    '<option value"' + db[i].id + '"> ' + db[i].name + '</option>';
            }
            $('#addEmployeeDepartment').append(option).select2();

        }
    })
}

function PrepareDeleteForm(){

    $('#modalTitle').html('Delete Employee');
    $('#yesButton').show();
    $('#noButton').show();
}


function toggleDeleteEmp( ) {
    let empDeleteID = $('.deleteCellButton').attr('id');



    $('#deleteText').html(`Are you sure You would like to delete <strong>${tempFullName}</strong> from the system `);

}

function deleteEmployee() {
    $.ajax({
        url: 'php/deleteEmployee.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'employeeID': tempDeleteID,
        },
        success: function (){ 

            $('#deleteText').html('Employee have been deleted Successfully!');
            $('#deleteCompleteSymbol').show();
            $('#yesButton').hide();
            $('#noButton').html("Close");
            console.log(`employee ${tempFullName} deleted`);
            clearTable();
            buildTable();

        }
    })
}

$('#addEmployButtons').click(function() {
    $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
})

function addEmployee() {

    let departmentName = $('#addEmployeeDepartment').val()
    let firstName =  $('#addEmployeeFirstName').val();
    let lastName = $('#addEmployeeLastName').val();

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
            success: function (data) {
        
      
          


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



function clearTable() {

    $('#database').html(`
    <tbody>
        <tr id="tableHeader">
            <th scope="col" class="hideCell" >Action</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col" class="hideCell" id="jobTitleHeader">Job Title</th>
            <th scope="col" class="hideCell">Email</th>
            <th scope="col" class="hideCell" id="departmentHeader">Department</th>
            <th scope="col" class="hideCell" id="locationHeader">Location</th>
            <th scope="col" class="hideCell" >ID</th>
            
        </tr>
    </tbody>
    `)
}


$('#toggleAddDepartmentButton').click(function(){
    populateSelectOptions('Location', "addDepartmentLocation");
})



$('#toggleRemoveDepartmentButton').click(function(){
    populateSelectOptions('Department', "removeDepartmentDepartment");
})
// function toggleAddDepartment() {
    
// }

// function toggleRemoveDepartment() {
    
// }
// function toggleDeleteLocation() {
 
   
// }

$('#toggleDeleteLocationButton').click(function(){
    populateSelectOptions('Location', 'deleteLocationName');

})

// searcgh
$('#search_button').click(function(){
    search();
})


$('#closeModalProfileButton').click(function(){
    return location.reload();
})
$('#addEmployButtons').click(function(){
    addEmployee();
})

// Delete Profile Modal Confirmatioon
$('#yesButton').click(function(){
    deleteEmployee();
})

// Remove Departments 
$('#toggleDeleteDepartmentConfirmButton').click(function(){
    toggleDeleteDepartmentConfirm();

})

// Confirm Remove Department Modal 
$('#yesButtonDepartment').click(function(){
    deleteDepartment();
})


// add location 
$('#addLocationButton').click(function(){
    createLocation();
})

// remove location 
$('#toggleDeleteLocationConfirmButton').click(function(){
    toggleDeleteLocationConfirm();
})

// confirm Delete Location 

$('#yesButtonLocation').click(function(){
    deleteLocation();
})

$('#toggleAddDepartmentConfirmButton').click(function() {
    $('#addTextDepartment').html("Are you sure you want to add a new dapartment?");
})

// adding Department 
$('#yesButtonAddDepartment').click(function(){
    $('#departmentModalBody').hide();
    let departmentName = $('#addDepartmentDepartment').val();
    let locationName = $('#addDepartmentLocation').val();
    $.getJSON(`php/getAllLocations.php`, function (locations) {
        let locationID = locations.data.filter(loc => loc.name == locationName)[0].id

        
        $.ajax({
            data: {
                'name': departmentName,
                'locationID': locationID,
            },
            url: 'php/insertDepartment.php',
            dataType: 'json',
            success: function (data) {


                clearTable();
                buildTable();
                $('#addTextDepartment').html(`<strong>${departmentName}</strong> at <strong> ${locationName}</strong> has been added successfully`);
                // tempDeleteLocationName = $('#deleteLocationName').val();
                $('#yesButtonAddDepartment').hide();
                $('#noButtonAddeDpartment').html("Close");
               
                $('#addCompleteSymbolDepartment').show();
                console.log(`Location ${departmentName} Added`);
            
           


                $('#removeDepartmentDepartment').find('option:eq(0)').prop('selected', true);
                console.log('Success Delete');

            }
        })
    });

})


function toggleDeleteDepartmentConfirm(){
    $('#deleteTextDepartment').html('Are you sure you want to delete the record from the database?');
    // console.log(tempDeleteLocationName);
    $('.successModalSymbol').hide();
}


function deleteDepartment() {
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
                clearTable();
                buildTable();
                $('#deleteTextDepartment').html(`<strong>${departmentName}</strong> has been deleted successfully`);
                tempDeleteLocationName = $('#deleteLocationName').val();
                $('#yesButtonDepartment').hide();
                $('#noButtonDepartment').html("Close");
               
                $('#deleteCompleteSymbolDepartment').show();
                console.log(`Location ${departmentName} deleted`);
                console.log(departmentName);
           


                $('#removeDepartmentDepartment').find('option:eq(0)').prop('selected', true);
                console.log('Success Delete');
            },
            error: function (dataaaaaaaaaa) {
                console.log(data);
            }

        })

    });
}


$('#addLocationButton').click(function(){
    $('#addLocationBody').hide();
    $('#addLocationButton').hide();
})

function createLocation() {


    let locationName = $('#addLocationLocation').val()
    $.ajax({
        url: 'php/createLocation.php',
        data: {
            'name': locationName
        },
        dataType: 'json',
        success: function (data) {
            $('#addLocationModalBody').html(`<div class="alert alert-success">
            <h4 class="alert-heading">New Location Successfully Created! </h4>
            <p> You have successfully Added the ${locationName}!</p>
            <hr>
            <p class="mb-0"> You can now return the menu </p>
            </div>`);
         
            $('#addLocationButton').hide();
            console.log("Success Location created ");
        }
    })

}

function deleteLocation() {
    let locationName = $('#deleteLocationName').val();
    tempDeleteLocationName 
    $.ajax({
        url: 'php/deleteLocationByID.php',
        dataType: 'json',
        data: {
            'name': locationName
        },
        success: function (data) {
            clearTable();
            buildTable();
            $('#deleteTextLocation').html(`${locationName} has been deleted successfully`);
            tempDeleteLocationName = $('#deleteLocationName').val();
            $('#yesButtonLocation').hide();
            $('#noButtonLocation').html("Close");
           
            $('#deleteCompleteSymbolLocation').show();
            console.log(`Location ${locationName} deleted`);
            console.log(locationName);
       
        }

    })
}

function toggleDeleteLocationConfirm(){

    $('#deleteTextLocation').html('Are you sure you want to delete the record from the database?');
    // console.log(tempDeleteLocationName);
    $('.successModalSymbol').hide();
}





function populateSelectOptions(category, selectID) {
    $(`#${selectID}`).empty();

    $.getJSON(`php/getAll${category}s.php`, function (category) {
        $.each(category.data, function (key, entry) {
            $(`#${selectID}`).append($('<option></option>').attr('value', entry.name).text(entry.name));
        })
    });
}

function contains(db, i, filterBy, searchText) {

    var searchTextArr = searchText.split(' ')

    for (let idx in searchTextArr) {

        if ((db[i][filterBy].toLowerCase()).indexOf(searchTextArr[idx].toLowerCase()) >= 0) {
            appendEntry(db, i, filterBy)
            return 1;
        }
    }
    return 0;
}


function search() {
    clearTable();
    
    var filterBy = $('.filterSelect:first').val()
    var searchText = $('#search_box').val();

    $.ajax({
        type: 'GET',
        url: 'php/getAll.php',
        dataType: 'json',
        success: function(data) {
            let db = data.data;
            let numofEntries = 0;

            for(let i in db) {
                numofEntries += contains(db, i, filterBy, searchText);
            }
            $('#numberOfEntries').html(numofEntries);
            $(`#${filterBy}Header`).removeClass();
        

        }
    })

}
