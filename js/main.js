



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

            console.log(db);
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
                '<h5>' + profile.department+ '</h5> ' +
            '</div>'+
        '</div>'+
      '</div>'

    );

    $('#profile-body-001').html(
        '<div class="row">' +
            '<div class="col-md-12 text-right"' +
                '<form>' +
                    '<input type="number" id="profileId" name="id" value="' + profile.id + ' style="display:none"> </input>' +
                    '<button type="button" id="edit" class="btn btn-secondary small" data-dismiss="modal" data-toggle="modal" data-target="#updateProfileModal"> Edit </button> ' +
                '</form>'+
            '</div'+
        '</div>'+ 
        '<div class="row">'+
            '<div class="col-md-4"'+
                '<label> First Name: </label>'+
            '</div>'+
            '<div class="col-md-8">'+
                '<p>'+ profile.firstName+ '</p>'+
            '</div>'+
        '</div>'+
        '<hr>'+
        '<div class="row">'+
            '<div class="col-md-4">'+
                '<label> Last Name: </label>'+
            '</div>'+
            '<div class="col-md-8"> '+
                '<p>'+ profile.lastName + '</p>'+
            '</div>'+
        '</div>' +
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-4">' +
                '<label>Email:</label>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<p>' + profile.email + '</p>' +
            '</div>' +
        '</div>' +
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-4">' +
            
                '<label>Department:</label>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<p>' + profile.department + '</p>' +
            '</div>' +
        '</div>' +
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-4">' +
                '<label>Location:</label>' +
            '</div>' +
            '<div class="col-md-4">' +
                '<p>' + profile.location +
            '</div>' +
        '</div>' +
        '<div class="row">' +
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
                    '<input type="number" id="profileId" name="id" value= "' + profile.jobTitle+ '" style="display: none"></input>' +
                    '<button type="button" id="edit"  class="btn btn-secondary small" data-dismiss="modal" data-toggle="modal" data-target="#updateProfileModal">Edit</button>' +
                '</form>' +
            '</div>' +
        '</div>' +
        '<div class="row">' +
            '<div class="col-md-4">' +
                '<label>Job Title:</label>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<p>' + rowArray[i][6] + '</p>' +
            '</div>' +
        '</div>' +
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-4">' +
                '<label>Website:</label>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<p>' + rowArray[i][7] + '</p>' +
            '</div>' +
        '</div>' +
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-4">' +
                '<label>Address:</label>' +
            '</div>' +
            '<div class="col-md-8">' +
                '<p>' + rowArray[i][8] + '</p>' +
            '</div>' +
        '</div>' +
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-4">' +
                '<label>Note:</label>' +
            '</div>' +
            '<div class="col-md-4">' +
                '<p>' + rowArray[i][9] + '</p>' +
            '</div>' +
        '</div'
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