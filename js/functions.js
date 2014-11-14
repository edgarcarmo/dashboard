var appDashboard = angular.module("myDashboard", []);

function dashboard($scope, $http, $filter){

	$scope.logout = function() {
	    var resp = confirm('Realmente deseja sair do sistema?'); 
	    if(resp){top.location.href='includes/login/logoff.php';}
	};

  $scope.excluir = function(id, type){
    if(id != null){
      var resp = confirm("Confirma a exclusão?");
      if(resp){
        $scope.url = "includes/db/remove.php";
        $http.post($scope.url, {'id': id, 'type': type}).success(function(data, status){
          $scope.refresh();
        });
      }
    }
  };

  $scope.refresh = function(){
    $("button[name=refresh]").click();
  }
}