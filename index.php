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
        <a href="#emp-submenu" class="list-group-item list-group-item-action bg-light nav-link collapsed text-truncate"
          data-toggle="collapse" data-target="#emp-submenu"> <i class="fa fa-user" aria-hidden="true"></i> <span
            class="nav-label">Employee</span></a>
        <div class="collapse" id="emp-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <i class="fa fa-fw fa-bar-chart"></i> Edit </a>
            </li>
          </ul>
        </div>
        <a class="list-group-item list-group-item-action bg-ligh nav-link collapsed text-truncate" href="#dep-submenu"
          data-toggle="collapse" data-target="#dep-submenu"> <i class="fa fa-home"></i> <span
            class="nav-label">Departments</span> </a>
        <div class="collapse" id="dep-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">

            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <i class="fa fa-fw fa-bar-chart"></i> Edit </a>
            </li>
          </ul>
        </div>


        <a href="#loc-submenu" class="list-group-item list-group-item-action bg-light nav-link collapsed text-truncate"
          data-toggle="collapse" data-target="#loc-submenu"> <i class="fa fa-globe" aria-hidden="true"></i> <span
            class="nav-label">Employee</span></a>
        <div class="collapse" id="loc-submenu" aria-expanded="false">
          <ul class="flex-column pl-2 nav">

            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">
                <i class="fa fa-fw fa-bar-chart"></i> Edit </a>
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
            <input class="form-control mr-sm-2" type="search" id="search_box" placeholder="Search Profile"
              aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" data-toggle="modal" data-target="#profileModal"
              id="search_button" value="Search" type="button">Search</button>
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
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                    class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                    class="material-icons">&#xE15C;</i> <span>Delete</span></a>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover" id="database">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th class="hideCell">jobTitle</th> <!-- hidden on xs screen small (<576px )-->
                <th class="hideCell">Email</th>
                <th class="hideCell">Department</th>
                <th class="hideCell">Location</th>
                <th>Profile</th>
              </tr>
            </thead>
            <tbody id="empTbody">


            </tbody>
          </table>
          <div class="clearfix">
            <div class="hint-text">Showing <b id="entries"></b> Entries </div>

          </div>
        </div>
      </div>

      <!-- Profile Modal -->
      <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Employee Profile</h5>
            </div>
            <div class="body-scroll">
              <div class="modal-body">
                <div class="">
                  <form method="post">
                    <div id="profile-head" class="emp-profile">

                      ...
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="profile-head">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile-body-001"
                                role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Additional Info</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                          <div class="tab-pane fade show active emp-profile" id="profile-body-001" role="tabpanel"
                            aria-labelledby="home-tab">

                            ...
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-pane fade show active emp-profile" id="profile-body-002" role="tabpanel"
                              aria-labelledby="home-tab">

                              ...
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
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>





    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
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