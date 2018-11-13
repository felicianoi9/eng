<style type="text/css">
th { text-align: left;}
body {font-family: arial;}

</style>
<h1>Relatório de Estoque</h1>
<fieldset>
	
</fieldset>
<br/>
<table border="0" width="100%">
	<tr>
		<th>Nome</th>
		<th>Pço. Compra (R$)</th>
		<th>Pço. Venda (R$)</th>
		<th>Quant.</th>
		<th>Quant. Mínima</th>
		<th>Quant. a Repor</th>
		
	</tr>
	<?php foreach($inventory_list as $is):?>

	
	
	<tr>
		<td><?php echo $is['name']; ?>	</td>
		<td name='price'> <?php    echo  number_format($is['purchase_price'], 2,',','.');  ?></td>
		<td name='price'> <?php    echo  number_format($is['price'], 2,',','.');  ?></td>
		<td ><?php echo $is['quant']; ?>	</td>
		<td ><?php 
			if($is['min_quant']>$is['quant']){
				echo '<span style="color:red">'.($is['min_quant']).'</span>'; 
			}else{
			echo '<span style="color:blue">'.($is['min_quant']).'</span>';} ?>	
		
		</td>
		<td><?php echo $is['dif']; ?></td>
		
	</tr>
	<?php endforeach;?>
</table>
