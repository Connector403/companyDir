<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description"
    content="Mobile first web app. Administration page for a company that allows to monitor departments, employees, and location that the employees and departments resides in">
  <meta name="author" content="Hafizullah Karim">
  <title>Company Directory</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Fonts From google -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Company Directory </div>
      <div class="list-group list-group-flush">
        <!-- Employee CRUD Options -->
        <a href="#emp-submenu" class="list-group-item list-group-item-action bg-light nav-link collapsed text-truncate"
          data-toggle="collapse" data-target="#emp-submenu"> <i class="fa fa-user" aria-hidden="true"></i> <span
            class="nav-label">Employee</span></a>
        <div class="collapse" id="emp-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <!-- <i class="fa fa-plus-circle" aria-hidden="true"></i> Add -->
                <button type="button" id="" class="btn btn-secondary add-small" data-toggle="modal"
                  data-target="#addProfileModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                </button>
              </a>

            </li>

          </ul>
        </div>

        <!-- Department CRUD Options -->
        <a class="list-group-item list-group-item-action bg-ligh nav-link collapsed text-truncate" href="#dep-submenu"
          data-toggle="collapse" data-target="#dep-submenu"> <i class="fa fa-building" aria-hidden="true"></i> <span
            class="nav-label">Departments</span> </a>
        <div class="collapse" id="dep-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">

            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <!-- <i class="fa fa-plus-circle" aria-hidden="true"></i> Add -->
                <button type="button" id="" class="btn btn-secondary add-small" data-toggle="modal"
                  data-target="#addDepartmentModal" onclick="toggleAddDepartment()">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                </button>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="" class="btn btn-secondary add-small" data-toggle="modal"
                  data-target="#removeDepartmentModal" onclick="toggleRemoveDepartment()">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Remove
                </button>
            </li>
          </ul>
        </div>

        <!-- Location Crud Options -->
        <a href="#loc-submenu" class="list-group-item list-group-item-action bg-light nav-link collapsed text-truncate"
          data-toggle="collapse" data-target="#loc-submenu"> <i class="fa fa-globe" aria-hidden="true"></i> <span
            class="nav-label">Location</span></a>
        <div class="collapse" id="loc-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">

            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="" class="btn btn-secondary add-small" data-toggle="modal"
                  data-target="#addLocationModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                </button>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="" class="btn btn-secondary add-small" data-toggle="modal"
                  data-target="#deleteLocationModal" onclick="toggleDeleteLocation()">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Remove
                </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light  border-bottom" style="background-color: #e3f2fd;">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <form class="form-inline my-2 my-lg-0">
     
              <select id="selectBy" class="filterSelect form-select-lg  my-sm-0 mr-sm-2">
                  <option value="lastName">Last Name</option>
                  <option value="firstName">First Name</option>
                  <option value="jobTitle">Job Title</option>
                  <option value="department">Department</option>
                  <option value="location">Location</option>
              </select>
 
            <input class="form-control mr-sm-2" type="search" id="search_box" placeholder="Search Profile"
              aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0"
              id="search_button"  onclick="search()" value="Search" type="button">Search</button>
          </form>
        </div>
      </nav>
      <!-- Employee Table -->
      <div id="empTable" class="table-responsive-xs">
        <div class="table-wrapper ">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Manage <b>Employees</b></h2>
              </div>
              <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-target="#addProfileModal"  data-toggle="modal"><i
                    class="material-icons">&#xE147;</i> <span>Add New Employee</span></a> -->
                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                    class="material-icons">&#xE15C;</i> <span>Delete</span></a>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover" id="database">
            <thead>
              <tr>
                <th>Action</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th class="hideCell">jobTitle</th> <!-- hidden on xs screen small (<576px )-->
                <th class="hideCell">Email</th>
                <th class="hideCell">Department</th>
                <th class="hideCell">Location</th>
                
                <th class="hideCell">ID</th>
              </tr>
            </thead>
            <tbody id="empTbody">


            </tbody>
          </table>
          <div class="clearfix">

          </div>
        </div>
      </div>
      <div class="hint-text">Showing <b id="entries"></b> Entries </div>

      <!-- Profile Modal -->
      <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Employee Profile</h5>

            </div>
            <div class="body-scroll">
              <div class="modal-body">
                <div class="profile" id="profile">
                  <div class="row profileTitle" id="displayName">
                    <h2>Hafiz Karim</h2>
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">ID:</h3>
                    <span class="col-7 col-sm-6" id="id"></span>
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">First Name:</h3>
                    <span class="col-7 col-sm-6" id="firstName">Hafiz</span>
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Last Name:</h3>
                    <span class="col-7 col-sm-6" id="lastName">Karim</span>
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Job Title:</h3>
                    <span class="col-7 col-sm-6" id="jobTitle">Software Developer</span>
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Email:</h3>
                    <span class="col-7 col-sm-6" id="email">hafiz-2010@hotmail.co.uk</span>
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Department:</h3>
                    <span class="col-7 col-sm-6" id="department">Development Team</span>
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Location:</h3>
                    <span class="col-7 col-sm-6" id="location">Leeds</span>
                  </div>
                  <div class="row profileRow">
                  
                    <button type="button" class="btn btn-outline-danger" onclick="deleteEmployee()">
                      Delete 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                      </svg>
                  </button>      
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="col d-flex justify-content-center">
                <button id="updateButton" type="button" onclick="toggleProfileUpdate()" class="btn btn-secondary float-left" >Save</button>
              </div>
              <button type="button"  onclick="return location.reload();" class="btn btn-secondary pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>






      <!-- Add Profile Modal -->
      <div class="modal fade" id="addProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Employee Profile</h5>
            </div>
            <div class="body-scroll">
              <div class="modal-body">
                <form id="addProfile" method="POST">
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">First Name:</h3>
                    <input id="addEmployeeFirstName">
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Last Name:</h3>
                    <input id="addEmployeeLastName">
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Job Title:</h3>
                    <input id="addEmployeeJobTitle">
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Email:</h3>
                    <input id="addEmployeeEmail">
                  </div>
                  <div class="row profileRow">
                    <h3 class="col-5 col-sm-6">Department:</h3>
                    <select id="addEmployeeDepartment"></select>
                  </div>

              </div>
            </div>
            <div class="modal-footer">

              <div class="form-group">
                <button class="button orangeButton" onclick="addEmployee()">Add</button>
              </div>
              <br>
              <br>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- Add Department -->
      <div class="modal" id="addDepartmentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Department</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="row profileRow">
                <h3 class="col-5 col-sm-6">Department:</h3>
                <input id="addDepartmentDepartment">
              </div>
              <div class="row profileRow">
                <h3 class="col-5 col-sm-6">Location:</h3>
                <select id="addDepartmentLocation"></select>
              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="addDepartment()">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Remove Departments -->
      <div class="modal" id="removeDepartmentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Remove Department</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="row profileRow">
                <h3 class="col-5 col-sm-6">Department:</h3>
                <select id="removeDepartmentDepartment">
                </select>
              </div>

              <div class="modal-footer">
                <button class="button orangeButton" onclick="deleteDepartment()">Remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Add Location -->

      <div class="modal" id="addLocationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Department</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="row profileRow">
                <h3 class="col-5 col-sm-6">Department:</h3>
                <input id="addLocationLocation">
              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="createLocation()">Create Location</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Remove Location  -->

      <div class="modal" id="deleteLocationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Remove Department</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="row profileRow">
                <h3 class="col-5 col-sm-6">Department:</h3>
                <select id="deleteLocationName">
                </select>
              </div>

              <div class="modal-footer">
                <button class="button orangeButton" onclick="deleteLocation()">Remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>






      <!-- /#page-content-wrapper -->
      <!-- /#wrapper -->
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="js/main.js"></script>
      <!-- Menu Toggle Script -->
      <script>
        $(document).ready(function () {
          // Activate tooltip
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
        });
        $("#menu-toggle").click(function (e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
      </script>
</body>

</html>