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

jQuery.fn.validacpf = function(){
    this.change(function(){
        CPF = $(this).val();
        if(!CPF){ return false;}
        erro  = new String;
        cpfv  = CPF;
        if(cpfv.length == 14 || cpfv.length == 11){
            cpfv = cpfv.replace('.', '');
            cpfv = cpfv.replace('.', '');
            cpfv = cpfv.replace('-', '');
            var nonNumbers = /\D/;
            if(nonNumbers.test(cpfv)){
                erro = "A verificacao de CPF suporta apenas números!";
            }else{
                if (cpfv == "00000000000" ||
                    cpfv == "11111111111" ||
                    cpfv == "22222222222" ||
                    cpfv == "33333333333" ||
                    cpfv == "44444444444" ||
                    cpfv == "55555555555" ||
                    cpfv == "66666666666" ||
                    cpfv == "77777777777" ||
                    cpfv == "88888888888" ||
                    cpfv == "99999999999") {
                    erro = "Número de CPF inválido!"
                }
                var a = [];
                var b = new Number;
                var c = 11;
                for(i=0; i<11; i++){
                    a[i] = cpfv.charAt(i);
                    if (i < 9) b += (a[i] * --c);
                }
                if((x = b % 11) < 2){
                    a[9] = 0
                }else{
                    a[9] = 11-x
                }
                b = 0;
                c = 11;
                for (y=0; y<10; y++) b += (a[y] * c--);
                if((x = b % 11) < 2){
                    a[10] = 0;
                }else{
                    a[10] = 11-x;
                }
                if((cpfv.charAt(9) != a[9]) || (cpfv.charAt(10) != a[10])){
                    erro = "Número de CPF inválido.";
                }
            }
        }else{
            if(cpfv.length == 0){
                return false;
            }else{
                erro = "Número de CPF inválido.";
            }
        }
        if (erro.length > 0){
            $(this).val('');
            $('#cpf').popover('show');
            setTimeout(function(){$(this).focus();},100);
            return false;
        }
        return $(this);
    });
}