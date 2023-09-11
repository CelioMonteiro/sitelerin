//Enviar Estado
jQuery(document).ready(function(){
  // Evento Submit do formulário
$('#filtroEstado').submit(function() {
 
  var dadosForm = jQuery( this ).serialize();
  dadosForm = dadosForm.split('&');

  var dados = new FormData(this);
   
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "https://www.superlerin.com.br/boa/php/FiltroEstado.php",
    data:  dados,
    contentType: false,
    cache: false,
    processData:false,
    success: function(retorno){
      
      var idUser = retorno.idUser
      var idEstado = retorno.idEstado
      var idCidade = retorno.idCidade
     // console.log(idUser)
     window.location.href = 'categoria.html?idUser='+idUser+'&cidade='+idCidade; 
    
    },
      error: function(xhr, status, error) {
      alert(xhr.responseText);
    }

  });
    return false;
});
});

//enviar cidade / estado
jQuery(document).ready(function(){
    // Evento Submit do formulário
  $('#filtroCidade').submit(function() {
   
    var dadosForm = jQuery( this ).serialize();
    dadosForm = dadosForm.split('&');
  
    var dados = new FormData(this);
     
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "https://www.superlerin.com.br/boa/php/filtroCidade.php",
      data:  dados,
      contentType: false,
      cache: false,
      processData:false,
      success: function(retorno){
        
        var idUser = retorno.idUser
        var idCidade = retorno.idCidade
       // console.log(idUser)
        window.location.href = 'filtroCategoria.html?idUser='+idUser+'&cidade='+idCidade;  	
      
      },
        error: function(xhr, status, error) {
        alert(xhr.responseText);
      }

    });
      return false;
  });
});

jQuery(document).ready(function(){
    // Evento Submit do formulário
  $('#editUser').submit(function() {
    var dados = new FormData(this);
    //console.log(dados)
    $.ajax({
      type: "POST",
      url: "https://www.superlerin.com.br/pinn/php/edituser.php",
      data:  dados,
      contentType: false,
      cache: false,
      processData:false,
      success: function(retorno){
        console.log(retorno)
        $('#msgSucess').show();
        $('.login-form').hide();
      },
        error: function(xhr, status, error) {
        $('#msgSucess').hide();
        $('.login-form').hide();
        alert(xhr.responseText);
      }
    });
      return false;
  });
});

//EDITAR CLIENTE
jQuery(document).ready(function(){
  // Evento Submit do formulário
$('#editarCliente').submit(function() {
  var dados = new FormData(this);
  //console.log(dados)
  $.ajax({
    type: "POST",
    url: "http://localhost/Slerin/lerin/php/editar_cliente.php",
    data:  dados,
    contentType: false,
    cache: false,
    processData:false,
    success: function(retorno){
      console.log(retorno)
      alert('dados atualizados com sucesso!')
      window.location.reload()
    },
      error: function(xhr, status, error) {
      
      alert(xhr.responseText);
    }
  });
    return false;
});
});

//EDITAR PRODUTO
jQuery(document).ready(function(){
  // Evento Submit do formulário
$('#editarProduto').submit(function() {
  var dados = new FormData(this);
  //console.log(dados)
  $.ajax({
    type: "POST",
    url: "http://localhost/Slerin/lerin/php/editar_produto.php",
    data:  dados,
    contentType: false,
    cache: false,
    processData:false,
    success: function(retorno){
      console.log(retorno)
      alert('dados atualizados com sucesso!')
      window.location.reload()
    },
      error: function(xhr, status, error) {
      
      alert(xhr.responseText);
    }
  });
    return false;
});
});

//FORM GRAVAR-USER
jQuery(document).ready(function(){
    jQuery('#gravarUser').submit(function(){
      var dados = jQuery( this ).serialize();
      var dados = new FormData(this);
      jQuery.ajax({
        type: "POST",
        url: "http://localhost/Slerin/lerin/php/cadastro_user.php",
        data: dados,
        contentType: false,
        cache: false,
        processData:false,
        success: function( data )
        
        {
         alert('cadastro realizado com sucesso')
         //window.location.replace("login.html")
        },

        error: function(xhr, status, error) {
          //$('#formUser').hide();
          //document.getElementById('msgErro_cadastro').innerHTML = 'OPS! tivemos um erro :(';
          $('#msgSucess_logar').show(); 
            alert(xhr.responseText);
        }
      });
      
      return false;
    });
  });

//FORM GRAVAR-VENDA
jQuery(document).ready(function(){
  jQuery('#gravarVenda').submit(function(){
    var dados = jQuery( this ).serialize();
    var dados = new FormData(this);
    jQuery.ajax({
      type: "POST",
      url: "http://localhost/Slerin/lerin/php/criar_venda.php",
      data: dados,
      contentType: false,
      cache: false,
      processData:false,
      success: function( data )
      
      {
       alert('cadastro realizado com sucesso')
       window.location.reload()
       //window.location.replace("login.html")
      },

      error: function(xhr, status, error) {
        //$('#formUser').hide();
        //document.getElementById('msgErro_cadastro').innerHTML = 'OPS! tivemos um erro :(';
        $('#msgSucess_logar').show(); 
          alert(xhr.responseText);
      }
    });
    
    return false;
  });
});
//FORM GRAVAR-CLIENTE
jQuery(document).ready(function(){
  jQuery('#gravarCliente').submit(function(){
    var dados = jQuery( this ).serialize();
    var dados = new FormData(this);
    jQuery.ajax({
      type: "POST",
      url: "http://localhost/Slerin/lerin/php/criar_cliente.php",
      data: dados,
      contentType: false,
      cache: false,
      processData:false,
      success: function( data )
      
      {
       alert('cadastro realizado com sucesso')
       window.location.reload()
       //window.location.replace("login.html")
      },

      error: function(xhr, status, error) {
        //$('#formUser').hide();
        //document.getElementById('msgErro_cadastro').innerHTML = 'OPS! tivemos um erro :(';
        $('#msgSucess_logar').show(); 
          alert(xhr.responseText);
      }
    });
    
    return false;
  });
});

//FORM GRAVAR-PRODUTO
jQuery(document).ready(function(){
  jQuery('#gravarProduto').submit(function(){
    var dados = jQuery( this ).serialize();
    var dados = new FormData(this);
    jQuery.ajax({
      type: "POST",
      url: "http://localhost/Slerin/lerin/php/criar_produto.php",
      data: dados,
      contentType: false,
      cache: false,
      processData:false,
      success: function( data )
      
      {
       alert('cadastro realizado com sucesso')
       window.location.reload()
       //window.location.replace("login.html")
      },

      error: function(xhr, status, error) {
        //$('#formUser').hide();
        //document.getElementById('msgErro_cadastro').innerHTML = 'OPS! tivemos um erro :(';
        $('#msgSucess_logar').show(); 
          alert(xhr.responseText);
      }
    });
    
    return false;
  });
});

//FORM LOGAR - USER
jQuery(document).ready(function(){
  jQuery('#logarUser').submit(function(){
    var dados = jQuery( this ).serialize();
    jQuery.ajax({
      type: "POST",
      url: "http://localhost/Slerin/lerin/php/logar.php",
      data: dados,
      success: function(data)
      {
        console.log(data)
        var user      = data.split(',');
        var idUser    = user[0];
        var userName  = user[1];
        var userEmail = user[2];
        //alert(idUser)
        if(idUser != 0){
          //console.log(userName)
          alert('Seja Bem Vindo')
          window.location.replace("http://localhost/Slerin/lerin/dashboard/admin/criar_cliente.html?idUser="+idUser)
        }
        else
        {
          console.log(userName)
          alert('Usuário ou Senha inválido')
          location.reload();
        }
    
        

      },
      error: function(xhr, status, error) {
        alert(xhr.responseText);
      }
    });
    
    return false;
  });
});

//FORM LOGAR erro- USER
jQuery(document).ready(function(){
  jQuery('#logarUser-erro').submit(function(){
    var dados = jQuery( this ).serialize();
    jQuery.ajax({
      type: "GET",
      url: "https://www.superlerin.com.br/pinn/php/logar.php",
      data: dados,
      success: function(data)
      {
        var user      = data.split(',');
        var idUser    = user[0];
        var userName  = user[1];
        var userEmail = user[2];
        idUser = idUser.split('>');
        idUser = idUser[1];
        
        if(idUser > 0){
          $('#btnvoltar2').show();
          $('#idUser').val(idUser);
          $('#banner').hide();
  		    $('#sucesso-login').show();
          $('#erro-login').hide();
          setTimeout( function () {window.location.replace("index-limpo.html?idUser="+idUser+"&tipocat=1") }, 3000);
        }else{
          $('#banner').hide();
  		    $('#sucesso-login').hide();
          $('#erro-login').show();
          $('#email').val();
          $('#senha').val();
        }

      },
      error: function(xhr, status, error) {
        alert(xhr.responseText);
      }
    });
    
    return false;
  });
});


//FORM RECUPERAR SENHA - envio de pedido
jQuery(document).ready(function(){
  jQuery('#recuperar_senha').submit(function(){
    var dados = jQuery( this ).serialize();
    var email = dados.split("=");
    var emailuser = email[1];
    emailuser = emailuser.split("%40");
    var emailcompleto = emailuser[0]+'@'+emailuser[1];
    console.log(emailcompleto);
    jQuery.ajax({
      type: "GET",
      url: "https://www.superlerin.com.br/pinn/php/recuperar_senha.php?email="+emailuser,
      data: dados,
      success: function(data)
      {
        $('#perdeu-senha').hide();
        $('#sucesso-pedido-senha').show();
        
        var user      = data.split(',');
        var idUser    = user[0];
        var userName  = user[1];
        var userEmail = user[2];
        idUser = idUser.split('>');
        idUser = idUser[1];
        
        
        
      },
      error: function(xhr, status, error) {
        alert(xhr.responseText);
      }
    });
    
    return false;
  });
});

//FORM RECUPERAR SENHA - troca de senha
jQuery(document).ready(function(){
  jQuery('#recuperar_senha').submit(function(){
    var dados = jQuery( this ).serialize();
    jQuery.ajax({
      type: "POST",
      url: "https://www.superlerin.com.br/pinn/php/trocar_senha.php",
      data: dados,
      success: function(data)
      {
        console.log(data);
        
      },
      error: function(xhr, status, error) {
        alert(xhr.responseText);
      }
    });
    
    return false;
  });
});

//FORM GRAVAR-CLIENTE
jQuery(document).ready(function(){
  
    jQuery.ajax({
      type: "GET",
      url: "http://lerin.com.br/php/acesso.php",
      contentType: false,
      cache: false,
      processData:false,
      success: function( data )
      
      {
       //alert('cadastro realizado com sucesso')
       //window.location.reload()
       //window.location.replace("login.html")
      },

      error: function(xhr, status, error) {
        //$('#formUser').hide();
        //document.getElementById('msgErro_cadastro').innerHTML = 'OPS! tivemos um erro :(';
        $('#msgSucess_logar').show(); 
          alert(xhr.responseText);
      }
    });
    
    
});