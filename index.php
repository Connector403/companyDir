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
  <link href="css/bootstrapCSS/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Fonts From google -->
  <link rel="stylesheet" href="css/bootstrapCSS/robot.css">
  <link rel="stylesheet" href="css/bootstrapCSS/icons.css">
  <link rel="stylesheet" href="css/bootstrapCSS/fontawesome.css">
</head>

<body>

  <!--CSS Spinner-->
  <div class="spinner-wrapper">
    <div class="spinner"></div>
  </div>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Company Directory </div>
      <div class="list-group list-group-flush">
        <!-- Employee dropdown Menu-->
        <a href="#emp-submenu" class="list-group-item list-group-item-action bg-light nav-link collapsed text-truncate"
          data-toggle="collapse" data-target="#emp-submenu"> <img src="img/people-fill.svg"><span
            class="nav-label">Employee</span></a>
        <div class="collapse" id="emp-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" class="btn btn-outline-success btn-sm addPersButton" data-toggle="modal"
                  data-target="#addProfileModal">
                  Add
                </button>
              </a>
            </li>
          </ul>
        </div>

        <!-- Department DropDown Menu  -->
        <a class="list-group-item list-group-item-action bg-ligh nav-link collapsed text-truncate" href="#dep-submenu"
          data-toggle="collapse" data-target="#dep-submenu"> <img src="img/building.svg"> <span
            class="nav-label">Departments</span> </a>
        <div class="collapse" id="dep-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="toggleAddDepartmentButton" class="btn  btn-outline-success btn-sm"
                  data-toggle="modal" data-target="#addDepartmentModal">
                  Add
                </button>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="toggleEditDep" class="btn btn-outline-danger btn-sm  " data-toggle="modal"
                  data-target="#editDepModal">
                  Edit
                </button>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="toggleRemoveDepartment" class="btn btn-outline-danger btn-sm  "
                  data-toggle="modal" data-target="#delDepModal">
                  Delete
                </button>
            </li>
          </ul>
        </div>

        <!-- Location Crud Options -->
        <a href="#loc-submenu" class="list-group-item list-group-item-action bg-light nav-link collapsed text-truncate"
          data-toggle="collapse" data-target="#loc-submenu"> <img src="img/geo-alt-fill.svg"> <span
            class="nav-label">Location</span></a>
        <div class="collapse" id="loc-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">

            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="" class="btn btn-outline-success btn-sm" data-toggle="modal"
                  data-target="#addLocationModal">
                  Add
                </button>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="toggleEditLocation" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                  data-target="#editLocationModal">
                  Edit
                </button>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <button type="button" id="toggleDeleteLocationButton" class="btn btn-outline-danger btn-sm"
                  data-toggle="modal" data-target="#delLocModal">
                  Delete
                </button>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <!-- Top Navbar -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light  border-bottom" style="background-color: #e3f2fd;">
        <button class="btn btn-primary" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- find search icon  -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" class="bi bi-search"
            viewBox="0 0 16 16">
            <path
              d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>

          <form class="form-group form-inline my-2 my-lg-0">
            <label for="selectBy">Filter By </label>
            <select id="selectBy" class="form-control filterSelect form-select-lg  my-sm-0 mr-sm-2">
              <option value="lastName">Last Name</option>
              <option value="firstName">First Name</option>
              <option value="jobTitle">Job Title</option>
              <option value="department">Department</option>
              <option value="location">Location</option>
            </select>
            <!-- Search Bar -->
            <input class="form-control mr-sm-2" type="search" id="search_box" placeholder="Search Profile"
              aria-label="Search">
            <button class="btn btn-primary" id="search_button" value="Search" type="button">Search</button>

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
                <a class="btn btn-success addPersButton" i data-target="#addProfileModal" data-toggle="modal"><i
                    class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>

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
      <div class="modal fade bd-example-modal-sm" id="persProfileModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="modal-dil">
          <div class="modal-content" id="modal-cont">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Employee Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="body-scroll">
              <div class="modal-body" id="profilemodalBody">
                <div class="container emp-profile">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="profile-img">
                          <img class="rounded-circle img-thumbnail" src="img/avatar3.png" alt="fake-profile-avatar" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="profile-head">
                          <h5 id="displayProfileNameHead">
                            Kshiti Ghelani
                          </h5>
                          <h6 id="jobTitleHead">
                            Web Developer and Designer
                          </h6>

                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                              <div class="col-md-6">
                                <label>Name</label>
                              </div>
                              <div class="col-md-6">
                                <p id="firstNameShow">Kshiti Ghelani</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Email</label>
                              </div>
                              <div class="col-md-6">
                                <p id="emailShow">kshitighelani@gmail.com</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Department</label>
                              </div>
                              <div class="col-md-6">
                                <p id="departmentShow">Tech</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Profession</label>
                              </div>
                              <div class="col-md-6">
                                <p></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Location</label>
                              </div>
                              <div class="col-md-6">
                                <p id="locationShow">Leeds</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="closeModalProfileButton" class="btn btn-secondary pull-right"
                data-dismiss="modal">Close</button>
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
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="body-scroll">
              <div class="modal-body" id="addProfileBody">
                <!-- <form method="post" action="#" id="addPersonnel">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="firstname">First Name</label>
                      <input type="text" name="firstname" id="firstname" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="lastname">Last Name</label>
                      <input type="text" name="lastname" id="lastname" class="form-control">
                    </div>
                  </div>
                  <div class="form-group"> 
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control">
                  </div>
                  <div class="form-group"> 
                    <label for="depDropdown-add">Department</label>
                    <select id="depDropdown-add" name="department" class="form-control depDropdown">
                    </select>
                  </div>
                </form> -->
                <form method="post" action="#" id="addPersonnel">
                  <label for="firstname" >First Name</label>
                  <input type="text" name="firstname" id="firstname" class="form-control">
                  <label for="lastname">Last Name</label>
                  <input type="text" name="lastname" id="lastname" class="form-control">
                  <label for="jobTitle" >Job Title</label>
                  <input type="text" name="jobTitle" id="jobTitle" class="form-control">
                  <label for="email" >Email Address</label>
                  <input type="email" name="email" id="email" class="form-control">
                  
                  <label for="depDropdown-add">Department</label>
                  <select id="depDropdown-add" name="department" class="form-control depDropdown">
                  </select>
              </form>
                <span id="addAlertPers" class="alert"></span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" value="Save" form="addPersonnel" id="addEmployButtons" class="btn btn-primary">
            </div>
          </div>
        </div>
      </div>


      <!-- Delete profile modal -->
      <div class="modal" id="deletePersModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modaltitle">Delete Employee </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="deleteText"> Please Confirm You want to Delete this Employee!</p>
              <form method="post" action="#" id="deletePerson">
                <input type="hidden" name="persDelID" id="persDelID" class="form-control">
              </form>
              <span id="delAlertPers" class="alert"></span>


            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" value="Delete" form="deletePerson" class="btn btn-danger">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>


      <!-- Update Profile Modal -->
      <!-- Modal Edit Personnel-->
      <div class="modal fade" id="editPersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit personnel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="#" id="editPersonnel">
                <input type="hidden" name="id-edit" id="id-edit" class="form-control">
                <label for="firstname-edit" class="form-label">First Name</label>
                <input type="text" name="firstname" id="firstname-edit" class="form-control">
                <label for="lastname-edit" class="form-label">Last Name</label>
                <input type="text" name="lastname" id="lastname-edit" class="form-control">
                <label for="jobTitle-edit">Job Title</label>]
                <input type="text" class="form-control" id="jobTitle-edit">
                <label for="email-edit" class="form-label">Email Address</label>
                <input type="email" name="email" id="email-edit" class="form-control">
                <label for="depDropdown-edit" class="form-label">Department</label>
                <select id="depDropdown-edit" name="department" class="form-control">
                </select>
              </form>
              <span id="editAlertPers" class="alert"></span>
            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" value="Save" form="editPersonnel" class="btn btn-primary">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
            <div class="modal-body" id="addDepartmentBody">
              <div class="departmentModalBody">
                <form method="post" accept="#" id="addDepartment">
                  <div class="form-row">
                    <lable for="addDepartmentDepartment">Department</lable>
                    <input type="text" class="form-control" id="addDepartmentDepartment">
                  </div>
                  <div class="form-row">
                    <label class="addDepartmentLocation"> Location</label>
                    <select class="form-control" id="addDepartmentLocation"></select>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button id="closeDepartment" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button id="toggleAddDepartmentConfirmButton" class="btn btn-primary" data-dismiss="modal"
                data-toggle="modal" data-target="#confirmAddDepartmentModal">Create</button>
            </div>
          </div>
        </div>
      </div>


      <!-- Confirm add Department  -->
      <div class="modal" id="confirmAddDepartmentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Department Confirmation </h5>
            </div>
            <div class="modal-body">
              <p id="addTextDepartment"></p>
              <i class="material-icons successModalSymbol" id="addCompleteSymbolDepartment">check_circle</i>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="noButtonAddeDpartment" data-dismiss="modal"><i
                  class="material-icons" id="cross">cancel</i> No</button>
              <button type="button" class="btn btn-outline-danger" id="yesButtonAddDepartment"><i class="material-icons"
                  id="tick">done</i> Yes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Department -->
      <div class="modal fade" id="editDepModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit department</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="post" action="#" id="editDep">
                <label for="dep-edit">Department</label>
                <select id="dep-edit" name="dep-edit" class="form-control depDropdown">
                </select>
                <label for="dep-edit-name">New department name</label>
                <input type="text" name="dep-edit-name" id="dep-edit-name" class="form-control">
                <label for="dep-location-edit">Location</label>
                <select id="dep-location-edit" name="dep-location-edit" class="form-control locDropdown">
                </select>
              </form>
              <span id="editAlertDep" class="alert"></span>
            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" value="Save" form="editDep" class="btn btn-primary">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete Departments -->
      <div class="modal fade" id="delDepModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete department</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="#" id="deleteDep">
                <label for="dep-del">Department</label>
                <select id="dep-del" name="dep-del" class="form-control depDropdown">
                </select>
              </form>
              <span id="delAlertDep" class="alert"></span>
            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" value="Yes" form="deleteDep" class="btn btn-danger" id="delDepCnfBtn">
              <button type="button" class="btn btn-danger" id="delDepBtn">Delete</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>



      <!-- Add Location -->

      <div class="modal" id="addLocationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Location</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="addLocationBody">
              <div class="modal-body" id="addLocationModalBody">
                <form method="POST" accept="#" id="addLocation">
                  <div class="form-row">
                    <label for="addLocationLocation"> Location Name</label>
                    <input type="text" class="form-control" id="addLocationLocation">
                  </div>
                </form>
              </div>

            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button id="addLocationButton" type="button" class="btn btn-primary">Create</button>
            </div>
          </div>
        </div>
      </div>


      <!-- Edit Location  -->
      <div class="modal fade" id="editLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit location</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form action="post" action="#" id="editLoc">
                <label for="loc-select-edit">Location</label>
                <select id="loc-select-edit" name="loc-select-edit" class="form-control locDropdown">
                </select>
                <label for="loc-name-edit">New location name</label>
                <input type="text" name="loc-name-edit" id="loc-name-edit" class="form-control">

              </form>
              <span id="editAlertLoc" class="alert"></span>

            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" value="Save" form="editLoc" class="btn btn-primary">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Remove Location  -->

      <div class="modal fade" id="delLocModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete location</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="post" action="#" id="deleteLoc">
                <label for="loc-del">Location</label>
                <select id="loc-del" name="loc-del" class="form-control locDropdown">
                </select>

              </form>
              <span id="delAlertLoc" class="alert"></span>

            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" value="Yes" form="deleteLoc" class="btn btn-danger" id="delLocCnfBtn">
              <button type="button" class="btn btn-danger" class="col-form-label-lg" id="delLocBtn">Delete</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Hafiz Karim</span>
          </div>
        </div>
      </footer>






      <!-- /#page-content-wrapper -->
      <!-- /#wrapper -->
      <!-- Bootstrap core JavaScript -->
      <script src="js/jquery/jquery.min.js"></script>
      <script src="js/selec2.js"></script>

      <script src="js/bootstrapJS/bootstrap.bundle.min.js"></script>
      <script src="js/main.js"></script>


</body>

</html>