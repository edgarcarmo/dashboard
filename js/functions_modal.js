$('#myModal').on('hidden.bs.modal', function () {
      $(this).removeData('bs.modal');
      $("#dashboard").scope().refresh();
  });

$(document).ready(function(){
    $('.mask_cep').mask('99999-999');
    $('.mask_cpf').mask('999.999.999-99');
    $(".mask_phone").mask("(99) 9999-9999?9").ready(function(event) {
      var target, phone, element;
      target = (event.currentTarget) ? event.currentTarget : event.srcElement;
      phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    });
});

