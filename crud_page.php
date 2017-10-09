<html ng-app="crud">
<head>
<title>CRUD FUNCTIONS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- Include main CSS -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Include jQuery library -->
<script src="js/jQuery/jquery.min.js"></script>
<!-- Include AngularJS library -->
<script src="lib/angular/angular.min.js"></script>
<!-- Include Bootstrap Javascript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container wrapper" ng-controller="DbController">
<h1 class="text-center">CRUD FUNCTIONS</h1>
<nav class="navbar navbar-default">
<div class="navbar-header">
<div class="alert alert-default navbar-brand search-box">
<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Add User <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
</div>
<div class="alert alert-default input-group search-box">
<span class="input-group-btn">
<input type="text" class="form-control" placeholder="Search Employee Details Into Database..." ng-model="search_query">

</span>
</div>
</div>
<div class="alert alert-default navbar-brand search-box">
<a class="change_color btn btn-danger pull-right" href = "logout.php">LogOut</a>
</div>
</nav>
<div class="col-md-6 col-md-offset-3">

<!-- Include form template which is used to insert data into database -->
<div ng-include src="'templates/form.html'"></div>

<!-- Include form template which is used to edit and update data into database -->
<div ng-include src="'templates/editForm.html'"></div>
</div>
<div class="clearfix"></div>

<!-- Table to show employee detalis -->
<div class="table-responsive">
<table class="table table-hover">
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>


<th>Mobile Number</th>


<th></th>
<th></th>
</tr>
<tr ng-repeat="detail in details| filter:search_query">
<td>
<span>{{detail.user_id}}</span></td>
<td>{{detail.user_firstname}}</td>
<td>{{detail.user_lastname}}</td>
<td>{{detail.user_email}}</td>

<td>{{detail.user_contact}}</td>
<td>
<button class="btn btn-warning" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
</td>
<td>
<button class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
</td>
</tr>
</table>
</div>
</div>
</div>
<!-- Include controller -->
<script src="js/angular-script.js"></script>
</body>
</html>