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
    $("#dashboard").scope().excluir(null, ids, $("#typeRemove").val());
    $table.bootstrapTable('remove', {field: 'id', values: ids});
});

function rowStyle(row, index) {
    var classes = ['active'];

    if (index % 2 === 0 && index / 2 < classes.length) {
        return {
            classes: classes[index / 2]
        };
    }
    return {};
}


function replaceAll(str, de, para){
    var pos = str.indexOf(de);
    while (pos > -1){
    str = str.replace(de, para);
    pos = str.indexOf(de);
  }
    return (str);
}

function consultarCEP(cep) {
  cep = replaceAll(cep, "-", "");
  if (cep != null || cep != "") {
      var $modal = $('.js-loading-bar'), $bar = $modal.find('.progress-bar');
      $("#search").removeClass("glyphicon-search").addClass("glyphicon-refresh glyphicon-refresh-animate");
      $("#textSearch").empty().append("&#160;Buscando...");
      $.ajax({
        dataType: 'json',
        url: 'http://cep.correiocontrol.com.br/'+cep+'.json',
        success: function(data){
          $("#search").removeClass("glyphicon-refresh glyphicon-refresh-animate").addClass("glyphicon-search");
          $("#textSearch").empty().append("&#160;Buscar&#160;&#160;&#160;&#160;&#160;");
          $('#address').val(data.logradouro);
          $('#neighborhood').val(data.bairro);
          $('#city').val(data.localidade);
          $('#state').val(data.uf);
          $('#number').focus();
        },
        error: function(msg) {
          $("#search").removeClass("glyphicon-refresh glyphicon-refresh-animate").addClass("glyphicon-search");
          $("#textSearch").empty().append("&#160;Buscar&#160;&#160;&#160;&#160;&#160;");
          $('#address').val("");
          $('#neighborhood').val("");
          $('#city').val("");
          $('#state').val("");
          $('#address').focus();
          alert("CEP não encontrado!");
        }
      });
  }
}