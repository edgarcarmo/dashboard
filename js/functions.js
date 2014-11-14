var appDashboard = angular.module("myDashboard", []);

function dashboard($scope, $http, $filter){

	$scope.logout = function() {
	    var resp = confirm('Realmente deseja sair do sistema?'); 
	    if(resp){top.location.href='includes/login/logoff.php';}
	};

  $scope.excluir = function(id, ids, type){
    var resp = confirm("Confirma a exclusão?");
    if(resp){
      $scope.url = "includes/db/remove.php";
      if(id != null){
          $http.post($scope.url, {'id': id, 'type': type}).success(function(data, status){
            $scope.refresh();
          });
      } else if(ids != null){
        for(var i=0; i < ids.length; i++){
          $http.post($scope.url, {'id': ids[i], 'type': type}).success(function(data, status){
            $scope.refresh();
          });
        }
      }
    }
  };

  $scope.refresh = function(){
    $("button[name=refresh]").click();
  }
}

$('#remove-data').click(function () {
    var id = 0;
    var getRows = function () {
        var rows = [];
        for (var i = 0; i < 10; i++) {
            rows.push({
                id: id,
            });
            id++;
        }
        return rows;
    };
    $table = $('#table-methods-table').bootstrapTable({data: getRows()});
    var selects = $table.bootstrapTable('getSelections');
    ids = $.map(selects, function (row) {return row.id;});
    $("#dashboard").scope().excluir(null, ids, "comarcas");
    $table.bootstrapTable('remove', {field: 'id', values: ids});
});