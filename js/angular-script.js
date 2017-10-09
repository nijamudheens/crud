// Application module
var crudApp = angular.module('crud',[]);
crudApp.controller("DbController",['$scope','$http', function($scope,$http){
	
 //contact validate
	  $scope.ph_numbr = /^\+?\d{10}$/;
        $scope.eml_add = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/; 

// Function to get user details from the database
getInfo();
function getInfo(){
// Sending request to UserDetails.php files 
$http.post('databaseFiles/userDetails.php').success(function(data){
// Stored the returned data into scope 
$scope.details = data;
});
}


// Enabling show_form variable to enable Add user button
$scope.show_form = true;
// Function to add toggle behaviour to form
$scope.formToggle =function(){
$('#userForm').slideToggle();
$('#editForm').css('display', 'none');
}
$scope.insertInfo = function(info){
$http.post('databaseFiles/insertDetails.php',{"firstname":info.firstname,"lastname":info.lastname,"email":info.email,"contact":info.contact}).success(function(data){
if (data == true) {
getInfo();
$('#userForm').css('display', 'none');
}
});
}
$scope.deleteInfo = function(info){
$http.post('databaseFiles/deleteDetails.php',{"del_id":info.user_id}).success(function(data){
if (data == true) {
getInfo();
}
});
}
$scope.currentUser = {};
$scope.editInfo = function(info){
$scope.currentUser = info;
$('#userForm').slideUp();
$('#editForm').slideToggle();
}
$scope.UpdateInfo = function(info){
$http.post('databaseFiles/updateDetails.php',{"id":info.user_id,"firstname":info.firstname,"lastname":info.lastname,"email":info.email,"contact":info.contact}).success(function(data){
$scope.show_form = true;
if (data == true) {
getInfo();
}
});
}
$scope.updateMsg = function(user_id){
$('#editForm').css('display', 'none');
}
}]);


