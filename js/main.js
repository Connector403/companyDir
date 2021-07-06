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



let firstNameHeader = '';
let lastNameHeader = '';
let jobTitleHeader = '';
let departmentIDHeader = '';
let emailHeader = '';

$(document).ready(function () {

    //Preloader
    preloaderFadeOutTime = 500;
    function hidePreloader() {
        var preloader = $('.spinner-wrapper');
        preloader.fadeOut(preloaderFadeOutTime);
    }
    hidePreloader();
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



$(window).scroll(function () {
    var scrollTop = $(this).scrollTop();

    $('th').css({
        opacity: function () {
            var elementHeight = $(this).height(),
                opacity = ((1 - (elementHeight - scrollTop) / elementHeight) * 0.8) + 0.2;

            return opacity;
        }
    });
});


function clearTable() {

    $('#database').html(`
    <tbody>
        <tr id="tableHeader">
            <th scope="col"  >Action</th>
            <th scope="col">First Name</th>
            <th scope="col">Second Name</th>
            <th scope="col" class="hideCell" id="jobTitleHeader">Job Title</th>
            <th scope="col" class="hideCell">Email</th>
            <th scope="col" class="hideCell" id="departmentHeader">Department</th>
            <th scope="col" class="hideCell" id="locationHeader">Location</th>
          
       
        </tr>
    </tbody>
    `)
}


// data-toggle="modal" data-id="${db[i].id}" data-target="#profileModal" onclick="loadProfile(${JSON.stringify(db[i]).split('"').join("&quot;")})"
var regExName = /^([a-zA-Z _-]+)$/;
var regExEmail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;



//display alert function
function displayAlert(id, message) {
    $(id).html(message);
    $(id).css("display", "block");
    //setInterval(function(){$(id).fadeOut();}, 3000);
    $(id).delay(6200).fadeOut(300);
}

// function will be used in to buildTable()
function appendEntry(db, i, filterBy) {
    var fullDelName = ` ${db[i].firstName}-${db[i].lastName}`
    $('#database tbody').append(`
        <tr>
            <td class="tile_div"> 
                <div class="center"> 
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#persProfileModal" id="${db[i].id}" onclick="showPerson(event, ${JSON.stringify(db[i]).split('"').join("&quot;")})">
                    <img src="img/person-lines-fill.svg">
                    </button> 

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPersModal"  id="${db[i].id}"   onclick="editPerson(event, ${JSON.stringify(db[i]).split('"').join("&quot;")})"> 
                    <img src="css/pen.svg">
                    </button>
                    
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"  data-target="#deletePersModal"   id="${fullDelName}"  onclick="deletePerson(event, ${db[i].id})">
                    <img src="img/trash-fill.svg"  >
                    </button>
                </div>

         

         
            </td>
            <td><b> ${db[i].firstName}</b></td>
            <td><b>${db[i].lastName}</b> 
            <td class=${(filterBy == "jobTitle") ? "" : "hideCell"}>${db[i].jobTitle}</td>
            <td class="hideCell">${db[i].email}</td>
            <td class=${(filterBy == "department") ? "" : "hideCell"}>${db[i].department}</td>
            <td class=${(filterBy == "location") ? "" : "hideCell"}>${db[i].location}</td>
           
            
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

function checkForEmployees(departmentID) {
    return $.ajax({
        url: "php/check-emp.php",
        method: "POST",
        dataType: 'json',
        data: {
            'depID': departmentID
        },
        success: function (data) {
            // console.log(data)
            return data
        }
    });
}


// Employee Profile Modal

function showPerson(e, profile) {
    $('#displayProfileNameHead').html(`${profile.firstName}  ${profile.lastName}`);
    $('#jobTitleHead').html(profile.department);
    $('#firstNameShow').html(`${profile.firstName}  ${profile.lastName}`);
    $('#emailShow').html(profile.email);
    $('#departmentShow').html(profile.department);
    $('#jobTitleShow').html(profile.jobTitle);
    $('#locationShow').html(profile.location);

}

//Add Employee
$('.addPersButton').on('click', function () {
    populateDep();
})


$("#addPersonnel").submit(function (e) {

    if ($('#depDropdown-add').val() == null) {
        e.preventDefault();
        displayAlert('#addAlertPers', 'Please select a department!');
    } else if ($('#firstname').val() == "" || $('#lastname').val() == "" || $('#email').val() == "") {
        e.preventDefault();
        displayAlert('#addAlertPers', 'Please complete all fields!');
    } else if (!regExName.test($('#firstname').val()) || !regExName.test($('#lastname').val())) {
        e.preventDefault();
        displayAlert('#addAlertPers', 'Please only use letters, spaces, dashes or underscores for names!');
    } else {

        e.preventDefault();

        var form = $(this);
        console.log(form);

        $.ajax({
            type: "POST",
            url: "php/addProfile.php",
            data: form.serialize(),
            success: function (data) {
                console.log(form.serialize());
                populateDep();
                clearTable();
                buildTable();
                setTimeout(function () {

                    $('#addProfileModal').modal('hide');
                }, 1000);
            }
        });
        displayAlert('#addAlertPers', 'Person added successfully!');
        $('#firstname').val('');
        $('#lastname').val('');
        $('#email').val('');
        $('#jobTitle').val('');
    }

});


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
            $('#depDropdown-add').append(option).select2();

        }
    })
}


// Start Update Employee

function editPerson(e, profile) {
    document.forms['editPersonnel']['id-edit'].value = profile.id;
    $('#firstname-edit').val(profile.firstName);
    $('#lastname-edit').val(profile.lastName);
    // $('#jobTitle-edit').val(profile.jobTitle);
    $('#email-edit').val(profile.email);
    let dropdownEdit = $('#depDropdown-edit');

    dropdownEdit.empty();
    $.ajax({
        type: 'GET',
        url: "php/getAllDepartments.php",
        success: function (response) {

            // console.log(response);
            //get data for department dropdown
            var result = response['data'].filter(obj => {
                return obj.name === profile.department;
            })[0]

            // console.log(result);

            //populate edit department dropdown
            if (response) {
                for (let item of response['data']) {
                    if (result.id == item.id) {
                        dropdownEdit.append($('<option selected="true"></option>').attr('value', item.id).text(item.name));
                    } else {
                        dropdownEdit.append($('<option></option>').attr('value', item.id).text(item.name));
                    }
                }
            }


        },
    }).fail(function () {
        console.log("Error encountered!")
    });


}

// update form submit
$("#editPersonnel").submit(function (e) {
    if ($('#firstname-edit').val() == "" || $('#lastname-edit').val() == "" || $('#email-edit').val() == "") {
        e.preventDefault();
        displayAlert('#editAlertPers', 'Please complete all fields!');
    } else if (!regExName.test($('#firstname-edit').val()) || !regExName.test($('#lastname-edit').val())) {
        e.preventDefault();
        displayAlert('#editAlertPers', 'Please only use letters, spaces, dashes or underscores for names!');
    } else {

        e.preventDefault();
        //$('#editPersModal').modal('hide');

        var form = $(this);

        $.ajax({
            type: "POST",
            url: "php/updateProfile.php",
            data: form.serialize(),
            success: function (data) {
                // console.log(data);
                console.log("HAPYY DAYS");
                console.log(form);
                clearTable();
                buildTable();

                setTimeout(function () { $('#forgot-form').modal('hide'); }, 4000);
                displayAlert('#editAlertPers', 'Person updated successfully!');

            },
            error: function (err) {
                console.log("ERROR uPDATE employee!")
                console.log(err);
            }
        });

    }

});
// End Of update Profile


// delete Employee
function deletePerson(e, id) {

    var event = e;
    document.forms['deletePerson']['persDelID'].value = id;
    $('#deletePerson').submit(function (e) {
        // event.parentNode.parentNode.parentNode.removeChild(event.parentNode.parentNode);
        e.preventDefault();
        $('#deletePerson').unbind();
        var form = $(this);
        $.ajax({
            url: 'php/deleteEmployee.php',
            type: 'POST',
            data: form.serialize(),
            success: function () {

                console.log(id);
                // clearTable();
                // buildTable();

            }
        }).fail(function () {
            console.log("erorr on delete!")
        });
        displayAlert('#delAlertPers', 'Person Delete Successfully');
    })
}

// populate location select on department adding 

$('#toggleAddDepartmentButton').click(function () {
    populateLoc();
})


// Delete department populate select drop down
$('#delDepModal').click(function () {
    populateSelectOptions('Department', "removeDepartmentDepartment");
})




// searcgh
$('#search_button').click(function () {
    search();
})

// Delete Profile Modal Confirmatioon
$('#yesButton').click(function () {
    deleteEmployee();
})



// add location 
$('#addLocationButton').click(function () {
    createLocation();
})

// delete4 location 
$('#toggleDeleteLocationConfirmButton').click(function () {
    toggleDeleteLocationConfirm();
})

// confirm deltete Location 

$('#yesButtonLocation').click(function () {
    deleteLocation();
})


//Add department
$("#createDep").submit(function (e) {

    if ($('#dep-location-add').val() == null) {
        e.preventDefault();
        displayAlert('#addAlertDep', "Please select a location!");
    } else if ($('#dep-add-name').val() == "") {
        e.preventDefault();
        displayAlert('#addAlertDep', 'Please complete all fields!');
    } else if (!regExName.test($('#dep-add-name').val())) {
        e.preventDefault();
        displayAlert('#addAlertDep', 'Please only use letters, spaces, dashes or underscores for names!');
    } else {
        e.preventDefault();

        var form = $(this);

        $.ajax({
            type: "POST",
            url: "php/createDep.php",
            data: form.serialize(),
            success: function (response) {
                console.log(response);
                if (response['data'].length != 0) {
                    displayAlert('#addAlertDep', "Department already present!");
                }
                populateDep();
                populateLoc();
                clearTable();
                buildTable();
            }
        }).fail(function (data) {
            console.log("Error encountered!" + data)
        });

        displayAlert('#addAlertDep', "Department added successfully!");
        $('#dep-add-name').val('');
        setTimeout(function () { $('addDepartmentModal').modal('hide') }, 3000);
    }


});


//Populate the location select list
function populateLoc() {
    let dropdownAddLocation = $('.locDropdown');

    dropdownAddLocation.empty();
    dropdownAddLocation.append('<option selected="true" value="dummy" disabled>Choose location</option>');
    dropdownAddLocation.prop('selectedIndex', 0);

    $.ajax({
        type: 'GET',
        url: "php/getAllLocations.php",
        success: function (response) {

            //console.log(response);

            response['data'].sort((a, b) => (a.name > b.name) ? 1 : ((b.name > a.name) ? -1 : 0));

            if (response) {
                for (let item of response['data']) {
                    dropdownAddLocation.append($('<option></option>').attr('value', item.id).text(item.name));
                }
            }


        },
    }).fail(function () {
        console.log("Error encountered!")
    });
}


$('#toggleRemoveDepartment').on('click', function () {
    populateDep();
})

//Delete department

function checkDep(depID) {
    return $.ajax({
        url: 'php/depCheck.php',
        method: 'POST',
        dataType: 'json',
        data: {
            depID: depID
        },
        success: function (resp) {
            // console.log(resp);
            return resp;
        }
    })
}

$('#delDepBtn').on('click', function () {
    var form = $('#deleteDep').serialize();
    var res = 0;
    checkDep(form.substr(8)).then(function (resp) {
        // console.log(resp.data[0]['COUNT(departmentID)']);
        res = resp.data[0]['COUNT(departmentID)'];
        if (res != 0) {
            // displayAlert('#delAlertDep', `Department contains <strong> ${res} </strong> other records! <strong> Cannot </strong> Delete the Department!`);
            displayAlert('#delAlertDep', `Please Select A Department without any employee! This Department contains <strong>${res} </strong> Employees!`);

        } else {

            $('#delAlertDep').html('Are you sure you want to delete the department?');
            $('#delAlertDep').css("display", "block");
            $('#delDepBtn').hide();
            $('#delDepCnfBtn').show();
        }

    })
});

$("#deleteDep").submit(function (e) {

    e.preventDefault();
    var form = $(this);
    var x = form.serialize();
    var count = 0;
    count = checkDep(x.substr(8));

    // console.log(x.substr(8));
    // checkDep(x.substr(8)).then(function(resp){
    //     console.log(resp.data[0]['COUNT(departmentID)']);
    // })

    $.ajax({
        type: "POST",
        url: "php/deleteDepartmentByID.php",
        data: form.serialize(),
        success: function (response) {
            // console.log(response);
            if (response['data'].length != 0) {
                // displayAlert('#delAlertDep', "Department field contains other records!");
                $('#delDepBtn').show();
                $('#delDepCnfBtn').hide();
            }
            populateDep();
            clearTable();
            buildTable();
        }
    });
    displayAlert('#delAlertDep', "Department deleted successfully!");
    $('#delDepBtn').show();
    $('#delDepCnfBtn').hide();


}

);

$('#addLocationButton').click(function () {
    $('#addLocationBody').hide();
    $('#addLocationButton').hide();
})


// edit Department 

//Update location
$('#toggleEditDep').on('click', function () {
    populateDep();
    populateLoc();
})


//Update department
$("#dep-edit").change(function () {
    $('#dep-edit-name').val($(this).children(':selected').text());
    var option = $('option:selected', this).attr('data-loc');
    $('#dep-location-edit').val(option);
});


$("#editDep").submit(function (e) {

    if ($('#dep-edit').val() == null) {
        e.preventDefault();
        displayAlert('#editAlertDep', "Please select a department!");
    } else if ($('#dep-location-edit').val() == null) {
        e.preventDefault();
        displayAlert('#editAlertDep', "Please select a location!");
    } else if ($('#dep-edit-name').val() == "") {
        e.preventDefault();
        displayAlert('#editAlertDep', 'Please complete all fields!');
    } else if (!regExName.test($('#dep-edit-name').val())) {
        e.preventDefault();
        displayAlert('#editAlertDep', 'Please only use letters, spaces, dashes or underscores for names!');
    } else {

        e.preventDefault();


        var form = $(this);

        $.ajax({
            type: "POST",
            url: "php/updateDepartment.php",
            data: form.serialize(),
            success: function (response) {
                //console.log(response);
                if (response['data'].length != 0) {
                    displayAlert('#editAlertDep', "Department already exists!");
                }
                populateDep();
                populateLoc();
                clearTable();
                buildTable();
            }
        });
        displayAlert('#editAlertDep', "Department updated successfully!");
        $('#dep-edit-name').val('');

    }

});

/// add location 
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

// edit location 
$('#toggleEditLocation').on('click', function () {
    populateLoc();
})

$("#loc-select-edit").change(function () {
    $('#loc-name-edit').val($(this).children(':selected').text());
});

$("#editLoc").submit(function (e) {

    if ($('#loc-select-edit').val() == null) {
        e.preventDefault();
        displayAlert('#editAlertLoc', "Please select a location!");
    } else if ($('#loc-name-edit').val() == "") {
        e.preventDefault();
        displayAlert('#editAlertLoc', 'Please complete all fields!');
    } else if (!regExName.test($('#loc-name-edit').val())) {
        e.preventDefault();
        displayAlert('#editAlertLoc', 'Please only use letters, spaces, dashes or underscores for names!');
    } else {

        e.preventDefault();


        var form = $(this);

        $.ajax({
            type: "POST",
            url: "php/updateLocation.php",
            data: form.serialize(),
            success: function (response) {
                //console.log(response);
                if (response['data'].length != 0) {
                    displayAlert('#editAlertLoc', "Location already exists!");
                }
                populateLoc();
                clearTable();
                buildTable();
            }
        });
        displayAlert('#editAlertLoc', "Location updated successfully!");
        $('#loc-name-edit').val('');

    }

});


$('#toggleDeleteLocationButton').click(function () {
    // populateSelectOptions('Location', 'deleteLocationName');
    populateLoc();

})

//Delete location
//Delete department

function checkLoc(locID) {
    return $.ajax({
        url: 'php/locCheck.php',
        method: 'POST',
        dataType: 'json',
        data: {
            locID: locID
        },
        success: function (resp) {
            // console.log(resp);
            return resp;
        }
    })
}


$('#delLocBtn').on('click', function () {
    var form = $('#deleteLoc').serialize();
    var res = 0;
    checkLoc(form.substr(8)).then(function (data) {
        res = data.data[0]['COUNT(locationID)'];
        console.log(res);
        if ($('#loc-del').val() == null) {
            displayAlert('#delAlertLoc', 'You must choose a location first!');

        } else if (res != 0) {
            displayAlert('#delAlertLoc', `Selected Location is associated with <strong> ${res} </strong> department!`);
        }
        else {
            $('#delAlertLoc').html('Are you sure you want to delete the Location?');
            $('#delAlertLoc').css("display", "block");
            $('#delLocBtn').hide();
            $('#delLocCnfBtn').show();
        }
    })

})


$("#deleteLoc").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        type: "POST",
        url: "php/deleteLocationByID.php",
        data: form.serialize(),
        success: function (response) {
            // console.log(response);

            if (response['data'].length != 0) {
                displayAlert('#delAlertLoc', "Location field contains other records!");
                $('#delLocBtn').show();
                $('#delLocCnfBtn').hide();
            }
            populateLoc();
            clearTable();
            buildTable();
        }
    });
    displayAlert('#delAlertLoc', "Location deleted successfully!");
    $('#delLocBtn').show();
    $('#delLocCnfBtn').hide();

}
);

// end delete location


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
        success: function (data) {
            let db = data.data;
            let numofEntries = 0;

            for (let i in db) {
                numofEntries += contains(db, i, filterBy, searchText);
            }
            $('#numberOfEntries').html(numofEntries);
            $(`#${filterBy}Header`).removeClass();


        }
    })

}

//Populate the departments select list
function populateDep() {
    let dropdownAdd = $('.depDropdown');

    dropdownAdd.empty();
    dropdownAdd.append('<option selected="true" value="dummy" disabled>Choose department</option>');
    dropdownAdd.prop('selectedIndex', 0);

    $.ajax({
        type: 'GET',
        url: "php/getAllDepartments.php",
        success: function (response) {

            // console.log(response);

            response['data'].sort((a, b) => (a.name > b.name) ? 1 : ((b.name > a.name) ? -1 : 0));

            //console.log(response['data']);

            if (response) {
                for (let item of response['data']) {
                    dropdownAdd.append($('<option></option>').attr({ 'value': item.id, 'data-loc': item.locationID }).text(item.name));
                }
            }


        },
    }).fail(function () {
        console.log("Error encountered!")
    });
}


