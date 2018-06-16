$(document).ready(function () {

  $("#frmProdutos").submit(function(event) {

      event.preventDefault();

      $(".mensagem").html('');         

      var form_data = $(this).serialize();

      $.ajax({

         url: "../produtos/xt_form.php",
         type: "post",
         data: form_data,
         success: function(data) {

            switch(data) {

             case "0":
                $(".mensagem").html("<h5>Ocorreu um erro!<br>Por favor tente novamente mais tarde.</h5>");
                openModal('#mensagem',1);
                break;

             case "1":
                $(".mensagem").html("<h5>Produto editado com sucesso!</h5>");
                openModal('#mensagem',1);
                $(window.document.location).attr("href","listar.php");
                break;

             case "2":
                $(".mensagem").html("<h5>Produto cadastrado com sucesso!</h5>");
                openModal('#mensagem',1);
                $("#frmProdutos")[0].reset();
                break;
          } 
             
         },
         error:function() {

             $("#mensagem").html("<h5>Um erro ocorreu, por favor tente novamente mais tarde.</h5>");
             openModal('#mensagem',1);
         }

      });

  });

});

function listaProdutos(varAcao,varId){

  $.ajax({

     url: "../produtos/xt_listar.php",
     type: "post",
     data: {acao:varAcao, id:varId},
     success: function(result) {

        $('#listaProdutos').html(result);     
         
     },
     error:function() {

         $(".mensagem").html("<h5>Um erro ocorreu, por favor tente novamente mais tarde.</h5>");
     }

  });

}

function openDetalhes(varId){

	openModal("#modal"+varId,0);
}

function excluir(varId) {

    var varTr = document.getElementById('tr_'+varId);
    varBgOld = varTr.style.backgroundColor;
    varTr.style.backgroundColor = '#FFFF99';

    if (confirm('Deseja realmente excluir esse prduto?')) {

    	var varAcao = "excluir";

        $.ajax({

			url: "../produtos/xt_listar.php",
			type: "post",
			data: {acao:varAcao, id:varId},
			success: function(result) {

				$('#listaProdutos').html(result);     
			 
			},
			error:function() {

				$(".mensagem").html("<h5>Um erro ocorreu, por favor tente novamente mais tarde.</h5>");
			}

		});

    } else {
          varTr.style.backgroundColor = varBgOld;
    }

}

function editar(varId) {

  $(window.document.location).attr("href","form.php?id="+ varId);

}

function cadastrar() {

  $(window.document.location).attr("href","form.php");

}

function openModal(varId,varFade) {

    var id = varId;

    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    $('#mask').css({'width':maskWidth,'height':maskHeight});

    $('#mask').fadeIn(1000);
    $('#mask').fadeTo("slow",0.8);

    var winH = $(window).height();
    var winW = $(window).width();

    $(id).css('top', (winH/2-$(id).height()/2)-200);
    $(id).css('left', winW/2-$(id).width()/2);

    $(id).fadeIn(2000);

    $('html, body').animate({ scrollTop: 0 }, 'slow');

    if(varFade == 1){
	    $(id).fadeTo(2000, 500).slideUp(500, function(){
	        $(id).slideUp(500);
	        $("#mask").slideUp(530);
	    });
    }

}   