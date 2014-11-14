var appDashboard = angular.module("myDashboard", []);

function dashboard($scope, $http, $filter){

	$scope.logout = function() {
	    var resp = confirm('Realmente deseja sair do sistema?'); 
	    if(resp){top.location.href='includes/login/logoff.php';}
	};
	
}



function operateFormatter(value, row, index) {
  return [
      '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
          '<i class="glyphicon glyphicon-edit"></i>',
      '</a>',
      '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
          '<i class="glyphicon glyphicon-remove"></i>',
      '</a>'
  ].join('');
}

window.operateEvents = {
  'click .edit': function (e, value, row, index) {
      alert('You click edit icon, row: ' + JSON.stringify(row));
      console.log(value, row, index);
  },
  'click .remove': function (e, value, row, index) {
      alert('You click remove icon, row: ' + JSON.stringify(row));
      console.log(value, row, index);
  }
};
