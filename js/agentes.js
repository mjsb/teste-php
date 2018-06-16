$(document).ready(function () {
  
  $("#txtTelefone").mask("(99) 9999-9999?9");

  $(".btn-novo").click( function () {

    $(this).css("display","none");
    $(".mensagem").css("display","none");
    $("#frmCadastraAg").css("display","block");

  });

  $(".btn-listar").click( function () {

    $(window.document.location).attr("href","listar.php");

  });

  /* Attach a submit handler to the form */
  $("#frmCadastraAg").submit(function(event) {

    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $(".mensagem").html('');         

    if( validaSenha() == true ) {
      /* Get some values from elements on the page: */
      var values = $(this).serialize();

      /* Send the data using post and put the results in a div */
      $.ajax({

        url: "../usuario/xt_cadastrar.php",
        type: "post",
        data: values,
        success: function(data) { 

            switch(data) {

               case "0":
                  $(".mensagem").html("<h5>Ocorreu um erro!<br>Por favor tente novamente mais tarde.</h5>");
                  $(".mensagem").css("display","block");
                  break;

               case "1":
                  $(".mensagem").html("<h5>Cadastro realizado com sucesso!</h5>");
                  openModal();
                  $("#frmCadastraAg")[0].reset();
                  break;
            } 
             
        },
        error:function() {
           //alert("failure");
           $(".mensagem").html("<h5>Um erro ocorreu, por favor tente novamente mais tarde.</h5>");
        }    

      });

    } else {

        $(".mensagem").html("<h5>As senhas não conferem!</h5>");
        $("#txtSenha").focus();
        openModal();

    }

  });

  /* Attach a submit handler to the form */
  $("#frmEditaAg").submit(function(event) {

      /* Stop form from submitting normally */
      event.preventDefault();

      /* Clear result div*/
      $(".mensagem").html('');         

      /* Get some values from elements on the page: */
      var values = $(this).serialize();

      /* Send the data using post and put the results in a div */
      $.ajax({

         url: "../usuario/xt_editar.php",
         type: "post",
         data: values,
         success: function(data) {

            switch(data) {

             case "0":
                $(".mensagem").html("<h5>Ocorreu um erro!<br>Por favor tente novamente mais tarde.</h5>");
                openModal();
                break;

             case "1":
                $(".mensagem").html("<h5>Alteração realizada com sucesso!</h5>");
                openModal();
                break;
          } 
             
         },
         error:function() {
             //alert("failure");
             $(".mensagem").html("<h5>Um erro ocorreu, por favor tente novamente mais tarde.</h5>");
         }

      });

  });

  /* Attach a submit handler to the form */
  $("#frmAlteraSenha").submit(function(event) {

      /* Stop form from submitting normally */
      event.preventDefault();

      /* Clear result div*/
      $(".mensagem").html('');
      $(".senha-atual").removeClass("has-error");
      $(".nova-senha").removeClass("has-error");
      $(".nova-senha").removeClass("has-error");


      if( $("#txtSenhaNova").val() != $("#txtSenhaNova2").val() ) {

      $(".mensagem").html("<h5>Nova senha e confirma nova senha não conferem!</h5>");
      $(".nova-senha").addClass("has-error");
      $(".nova-senha").addClass("has-error");

      } else {

          /* Get some values from elements on the page: */
          var values = $(this).serialize();

          /* Send the data using post and put the results in a div */
          $.ajax({

             url: "../usuario/xt_alterarSenha.php",
             type: "post",
             data: values,
             success: function(data) {

                switch(data) {

                   case "0":
                      $(".mensagem").html("<h5>A senha atual esta incorreta!</h5>");
                      openModal();
                      break;

                   case "1":
                      $(".mensagem").html("<h5>Ocorreu um erro!<br>Por favor tente novamente mais tarde.</h5>");
                      openModal();
                      break;

                   case "2":
                      $(".mensagem").html("<h5>Sua senha foi alterada com sucesso!</h5>");
                      openModal();
                      $("#frmAlteraSenha")[0].reset();
                      $("#labelSenha").html("");
                      $(".btn-success").attr('disabled', 'disabled');
                      break;

                } 
                 
             },
             error:function() {

                 $(".mensagem").html("<h5>Um erro ocorreu, por favor tente novamente mais tarde.</h5>");
             }

          });

      }

  });

});

function selectAction(varId, varCmb) {

  var vAcao = $("#cmbAcao"+varCmb).val();

  if (vAcao == "editar") {

    $(window.document.location).attr("href","editar.php?id="+varId);

  } else if (vAcao == "excluir") {

    excluir(varId);

  } else if (vAcao == "reativar") {

    reativar(varId);

  } else if (vAcao == "desativar") {

    desativar(varId);

  }

}

function excluir(varId) {

    var varTr = document.getElementById('tr_'+varId);
    varBgOld = varTr.style.backgroundColor;
    varTr.style.backgroundColor = '#FFFF99';

    if (confirm('Deseja realmente excluir esse usuário?')) {

        with(document.forms[0]) {
          acao.value='excluir';
          id.value=varId;
          submit();
        }

    } else {
          varTr.style.backgroundColor = varBgOld;
    }

}

function desativar(varId) {

    var varTr = document.getElementById('tr_'+varId);
    varBgOld = varTr.style.backgroundColor;
    varTr.style.backgroundColor = '#FFFF99';

    if (confirm('Deseja realmente desativar esse usuário?')) {

        with(document.forms[0]) {
          acao.value='desativar';
          id.value=varId;
          submit();
        }

    } else {

     varTr.style.backgroundColor = varBgOld;

    }

} 

function reativar(varId) {

    with(document.forms[0]){
      acao.value='reativar';
      id.value=varId;
      submit();
    }

 }

function editar (varId) {

  window.open('editAuction.php?idAuction=' + varId);

}

function enviarCadastro(objForm) {

   var bolValida = true;

   bolValida = validarTxt(objForm.txtNome, "Por favor informe o nome do usuário");
   if (!bolValida)
     return false;

   bolValida = validarTxt(objForm.txtSobrenome, "Por favor informe o sobrenome do usuário");
   if (!bolValida)
     return false;

   bolValida = validarTxt(objForm.txtEmail, "Por favor informe o e-mail do usuário");
   if (!bolValida)
     return false;

   bolValida = validarTxt(objForm.txtLogin, "Por favor informe o login do usuário");
   if (!bolValida)
     return false;

   bolValida = validarTxt(objForm.txtSenha, "Por favor informe uma senha para o usuário");
   if (!bolValida)
     return false;

   return bolValida;

}

function enviarTrocaSenha(objForm) {

   var bolValida = true;

   bolValida = validarTxt(objForm.txtSenhaAtual, "Por favor informe sua senha atual");
   if (!bolValida)
     return false;

   bolValida = validarTxt(objForm.txtSenhaNova, "Por favor informe a nova senha");
   if (!bolValida)
     return false;

   bolValida = validarTxt(objForm.txtSenhaNova2, "Por favor informe repita a nova senha");
   if (!bolValida)
     return false;

   if (objForm.txtSenhaNova.value != objForm.txtSenhaNova2.value) {

       alert ('As senhas n? coincidem. Por favor corrija.');
       objForm.txtSenhaNova2.focus();
       return false;
   }

   return bolValida;

}

function comparaNovaSenha() {

  if($("#txtSenhaAlt").val() != "") {

    if($("#txtSenhaAlt").val() != $("#txtConfSenhaAlt").val()) {

      $("#labelSenha").html("<p class='label label-danger'>AS SENHAS NÃO SÃO IGUAIS!</p>");
      $(".btn-success").attr('disabled', 'disabled');

    } else {

      $("#labelSenha").html("<p class='label label-success'>SENHAS OK!</p>");
      $(".btn-success").removeAttr('disabled');

    }

  } 

}

function validaSenha() {

  var validaSenha = true;

  if($('#txtSenha').val() != $('#txtSenhaConf').val()) {
    validaSenha = false;
  } else {
    validaSenha = true;
  }

  return validaSenha;

}

function openModal() {

    //cancela o comportamento padrão do link
    //e.preventDefault();
    //armazena o atributo href do link
    //var id = $(this).attr('href');

    var id = '#mensagem';

    //armazena a largura e a altura da tela

    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    //Define largura e altura do div#mask iguais ás dimensões da tela

    $('#mask').css({'width':maskWidth,'height':maskHeight});

    //efeito de transição

    $('#mask').fadeIn(1000);
    $('#mask').fadeTo("slow",0.8);

    //armazena a largura e a altura da janela

    var winH = $(window).height();
    var winW = $(window).width();

    //centraliza na tela a janela popup

    $(id).css('top', (winH/2-$(id).height()/2)-200);
    $(id).css('left', winW/2-$(id).width()/2);

    //efeito de transição

    $(id).fadeIn(2000);

    $('html, body').animate({ scrollTop: 0 }, 'slow');

    $(id).fadeTo(2000, 500).slideUp(500, function(){
        $(id).slideUp(500);
        $("#mask").slideUp(530);
    });

}       

$(function() {

    $(".calendario").datepicker();
      
});