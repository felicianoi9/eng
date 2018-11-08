<h1>Produtos - Editar</h1>

<?php //print_r($inventory_info);exit;?>

<?php if(isset($error_msg) && !empty($error_msg)): ?>
	<div class="warning"><?php echo $error_msg; ?></div>
<?php endif; ?>	

<form method="POST">
	<label for="name">Nome </label><br/>
	<input type="text" name="name" value="<?php echo $inventory_info['name'];?>" required /><br/><br/>

	<label for="purchase_price">Preço de Compra</label><br/>
	<input type="text" disabled="disabled" name="purchase_price" value="<?php echo number_format($inventory_info['purchase_price'],2);?>" required /><br/><br/>

	<label for="price">Preço de Venda</label><br/>
	<input type="text" name="price" value="<?php echo number_format($inventory_info['price'],2);?>" required /><br/><br/>

	<label for="quant">Quantidade em Estoque</label><br/>
	<input type="number" name="quant"  value="<?php echo $inventory_info['quant'];?>" required /><br/><br/>

	<label for="min_quant">Quantidade Mínima em Estoque</label><br/>
	<input type="number" name="min_quant" value="<?php echo $inventory_info['min_quant'];?>" required /><br/><br/>

	

	<input type="submit" value="Salvar" />

</form>
<script type="text/javascript" src="<?php echo BASE;?>/assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE;?>/assets/js/script_inventory_add.js"></script>
