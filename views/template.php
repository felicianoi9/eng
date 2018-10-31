<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no"  />
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style_carousel.css">
  <title>Prime Engenharia</title>
</head>
<body>
<!-- navbar topo -->  
<div class="barra-top">
  
    <!-- navbar cores bg-dark, bg-light, bg-warning, ... -->
    <nav   class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
      <a href="#" class="navbar-brand"><img src="<?php echo BASE;?>assets/images/logo.jpg" width="100"></a>
      <button class="navbar-toggler bg-light " data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse " id="navbarMenu">
        <div class="navbar-nav">
          <a href="#top" class="nav-item nav-link  ">Home</a>
          <a href="#servicos" class="nav-item nav-link  ">Seviços</a>
          <a href="#produtos" class="nav-item nav-link">Produtos</a>
          <a href="#empresa" class="nav-item nav-link">Empresa</a>
          <a href="#contato" class="nav-item nav-link" data-toggle="modal" data-target="#contato">Contato</a>
          <a href="#mapa" class="nav-item nav-link" data-toggle="modal" data-target="#mapa">Onde Estamos</a>
        </div>
      </div>
      
      <form method="POST" class="form-inline">
        <input type="text" class="form-control" placeholder="Pesquisar..." name="">
        
      </form> 

      <!-- botão Login MODAL  -->
      <a href="" class="nav-item nav-link login" data-toggle="modal" data-target="#login"><span> Entrar</span></a>  
      <!-- FIM botão Login MODAL  --> 
    </nav>  
    <!-- FIM NAVBAR TOP  -->  
</div>  
<!-- Slide Show -->

<div  id="top-30" class="apresenta">  
  <div id="slideShow" class="slide carousel">
    <ol class="carousel-indicators">
      <li data-target="#slideShow" data-slide-to="0" class="active"></li>
      <li data-target="#slideShow" data-slide-to="1"></li>
      <li data-target="#slideShow" data-slide-to="2"></li>
      <li data-target="#slideShow" data-slide-to="3"></li>
      
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" src="<?php echo BASE;?>assets/images/image1.jpg" >
        <div class="carousel-caption d-none d-md-block">
            <h5>Alguma Legenda</h5>
            <p>alguma Sublegenda blabla</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="<?php echo BASE;?>assets/images/image2.jpg"  >
        <div class="carousel-caption d-none d-md-block">
            <h5>Alguma Legenda</h5>
            <p>alguma Sublegenda blabla</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="<?php echo BASE;?>assets/images/image3.jpg"   >
        <div class="carousel-caption d-none d-md-block">
            <h5>Alguma Legenda</h5>
            <p>alguma Sublegenda blabla</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="<?php echo BASE;?>assets/images/image4.jpg"  >
        <div class="carousel-caption d-none d-md-block">
            <h5>Alguma Legenda</h5>
            <p>alguma Sublegenda blabla</p>
        </div>
      </div>
    </div>  
    <a class="carousel-control-prev" href="#slideShow" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slideShow" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>  
  </div>
</div>

<!-- FIM Slide Show -->

<!-- Contato MODAL  -->
    <div class="modal fade" id="contato">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Contato</h3>
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="form-group">
                
                <input type="text" name="asssunto" placeholder="Assunto" class="form-control">
              </div>
              <div class="form-group">
                
                <input type="email" name="email" placeholder="E-Mail" class="form-control">
              </div>
              <div class="form-group">
                
                <textarea placeholder="Mensagem" class="form-control"></textarea>
              </div>
              <div class="form-group">
                
                <input  type="submit" value="Enviar" class="btn  form-control enviar">
              </div>
              
            </form>
          </div>
          <div class="modal-footer">

            <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
            
          </div>

        </div>
        
      </div>
    </div>  

  <!-- Fim - Contato MODAL  --> 

  <!-- Mapa MODAL  -->
    <div class="modal fade" id="mapa">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Onde Estamos</h5>
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
          <div class="modal-body">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.1648891655286!2d-40.30089711246609!3d-20.258234289858464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb8187273031e31%3A0x19ce919c401d037e!2sAv.+Jer%C3%B4nimo+Vervloet%2C+796+-+Maria+Ortiz%2C+Vit%C3%B3ria+-+ES%2C+29070-350!5e0!3m2!1spt-BR!2sbr!4v1540996029023" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            
          </div>
          <div class="modal-footer">

            <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
            
          </div>

        </div>
        
      </div>
    </div>  

  <!-- Fim - Mapa MODAL  -->




  <!-- Login MODAL  -->
    <div class="modal fade" id="login">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Login</h3>
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="form-group">
                
                <input type="email" name="email" placeholder="E-Mail" class="form-control">
              </div>
              <div class="form-group">
                
                <input type="password" name="password" placeholder="Senha" class="form-control">
              </div>
              <div class="form-group">
                
                <input  type="submit" value="Entrar" class="btn  form-control enviar">
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">Esqueci a Senha</button>
            <button class="btn btn-success" data-dismiss="modal">Cadastrar</button>
            <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
            
          </div>

        </div>
        
      </div>
    </div>  

  <!-- Serviços -->
  <div  id="servicos" class="container-fluid">


    
  </div>
  
  <!-- fim - Servicos --> 

  <!-- produtos -->
  <div  id="produtos" class="container-fluid">
    
  </div>
  
  <!-- fim - produtos -->

  <!-- empresa -->
  <div  id="empresa" class="container-fluid">
    
  </div>
  
  <!-- fim - empresa -->  
  

  <!-- contato e Mapa -->
  <div  id="contato" class="container-fluid">
    
  </div>
  
  <!-- fim - contato e Mapa --> 

  <div class="footer  fixed-bottom">  

    <div class="container-fluid">
    
    <div class="row">
      <div class="col-sm-6">
        <p>Av. Jerônimo Vervloet, nº 276 - Maria Ortiz - Vitória ES </p>
      </div>
    <div class="col-sm-6" >
        <p>(27) 3026-0864</p>
    </div>
  </div>
</div>
      

    
  </div>
  

  
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>