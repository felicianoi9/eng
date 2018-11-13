<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Painel - <?php echo $viewData['company_name'];?></title>
	<link rel="shortcut icon" href="<?php echo BASE;?>assets/images/favicon.ico" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo BASE;?>assets/css/template.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE;?>assets/css/ops.css">
	<script type="text/javascript" src="<?php echo BASE;?>assets/js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" >var BASE='<?php echo BASE;?>'</script>
	<script type="text/javascript" src="<?php echo BASE;?>assets/js/script.js"></script>
</head>
<body>

	<div class="leftmenu">
		<div class="company_name" > <?php echo $viewData['company_name'];?> </div>

		<div class="menuarea">
			<ul>
				<li><a href="<?php echo BASE;?>">Home</a></li>
				<li><a href="<?php echo BASE;?>permissions">Permissões</a></li>	
				<li><a href="<?php echo BASE;?>users">Usuários</a></li>	
				<li><a href="<?php echo BASE;?>clients">Clientes</a></li>
				<li><a href="<?php echo BASE;?>providers">Fornecedor </a></li>	
				<li><a href="<?php echo BASE;?>inventory">Estoque </a></li>	
				<li><a href="<?php echo BASE;?>purchases">Compras</a></li>	
				<li><a href="<?php echo BASE;?>sales">Vendas</a></li>	
				<li><a href="<?php echo BASE;?>reports">Relatórios</a></li>	
				<li><a href="<?php echo BASE;?>financial">Financeiro</a></li>	
				<li><a href="<?php echo BASE;?>site">Gerenciar Site</a></li>
				<li><a href="<?php echo BASE;?>store">Gerenciar Loja</a></li>
				
				
			</ul>

		</div>

	</div>
	<div class="container">

		<div class="top">
			
			<div class="top_right">
				<a href="<?php echo BASE;?>login/logout"><div class="sair">Sair</div></a>
			</div>
			<div class="top_right"> Olá, <?php echo $user_name;?>!</div>
		</div>
		<div class="area">

			<?php $this->loadViewInTemplate($viewName, $viewData);?>
		</div>



		

	</div>

	

</body>
</html>