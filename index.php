<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Mobile first web app. Administration page for a company that allows to monitor departments, employees, and location that the employees and departments resides in">
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
          <a href="#emp-submenu" class="list-group-item list-group-item-action bg-light nav-link collapsed text-truncate" data-toggle="collapse" data-target="#emp-submenu"> <i class="fa fa-user" aria-hidden="true"></i> <span class="nav-label">Employee</span></a>
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
          <a class="list-group-item list-group-item-action bg-ligh nav-link collapsed text-truncate" href="#dep-submenu" data-toggle="collapse" data-target="#dep-submenu" > <i class="fa fa-home"></i> <span class="nav-label">Departments</span> </a> 
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
         
    
          <a href="#loc-submenu" class="list-group-item list-group-item-action bg-light nav-link collapsed text-truncate" data-toggle="collapse" data-target="#loc-submenu"> <i  class="fa fa-globe" aria-hidden="true"></i> <span class="nav-label">Employee</span></a>
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
        <nav class="navbar navbar-expand-lg navbar-light  border-bottom"  style="background-color: #e3f2fd;">
          <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" id="search_box" placeholder="Search Profile" aria-label="Search">
                <button class="btn btn-secondary my-2 my-sm-0" data-toggle="modal" data-target="#profileModal" id="search_button" value="Search" type="button">Search</button>
              </form>
            </div>
          </nav>
            <!-- Employee Table -->
            <!-- <div class="container" id="mainContent">
              <div class="container-table" id="mainTable">
                <table class="table">
                  <thead style="position: sticky; top: 0" class="header">
                      <tr>
                        <th class="header dont-show1" scope="col">Last Name </th>
                        <th class="header dont-show2" scope="col">First Name </th>
                        <th class="header dont-show3" scope="col">Deparment  </th>
                        <th class="header dont-show4" scope="col">Location </th>
                        <th class="header dont-show5" scope="col">Location </th>
                        <th class="header dont-show6" scope="col">Profile</th>
                        <th class="header dont-show7" scope="col">
                          <button type="button" id="" class="btn btn-secondary add-small" data-toggle="modal" data-target="#addProfileModal">+</button>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="tableData" class="read">
                      <!-- Data will be implemented with jquery/ajax -->
                 
                    <!-- </tbody> -->
                  <!-- </table> -->
              <!-- </div> -->
          <!-- </div> --> 
          <div class="table-responsive-xs">
            <div class="table-wrapper ">
              <div class="table-title">
                <div class="row">
                  <div class="col-sm-6">
                    <h2>Manage <b>Employees</b></h2>
                  </div>
                  <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                  </div>
                </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                      </span>
                    </th>
                    <th >Name</th>
                    <th class="hidden-xs-up">Email</th>  <!-- hidden on xs screen small (<576px )-->
                    <th >Department</th>
                    <th>Location</th>
                    <th >Actions</th>
                  </tr>
                </thead>
                <tbody id="database">
                  
                 
                </tbody>
              </table>
              <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                  <li class="page-item disabled"><a href="#">Previous</a></li>
                  <li class="page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item active"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">4</a></li>
                  <li class="page-item"><a href="#" class="page-link">5</a></li>
                  <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
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
      $(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
</body>
</html>