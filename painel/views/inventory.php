<h1>Estoque</h1>

<?php if($add_permission):?>
<div class="button"><a href="<?php echo BASE;?>inventory/add">Adicionar Produto</a></div>
<?php endif;?>
<input type="text" id="busca" data-type="searchProducts" />
<table border="0" width="100%">
	<tr>
		<th>Nome</th>
		<th>Pço. Compra (R$)</th>
		<th>Pço. Venda (R$)</th>
		<th>Quant.</th>
		<th>Quant. Mínima</th>
		<th >Ações</th>
	</tr>
	<?php foreach($inventory_list as $is):?>

	
	
	<tr>
		<td><?php echo $is['name']; ?>	</td>
		<td style="text-align:right" name='price'> <?php    echo  number_format($is['purchase_price'], 2,',','.');  ?></td>
		<td style="text-align:right" name='price'> <?php    echo  number_format($is['price'], 2,',','.');  ?></td>
		<td style="text-align:center" ><?php echo $is['quant']; ?>	</td>
		<td style="text-align:center"><?php 
		if($is['min_quant']>$is['quant']){
			echo '<span style="color:red">'.($is['min_quant']).'</span>'; 
		}else{
		echo '<span style="color:blue">'.($is['min_quant']).'</span>';} ?>	
		
			</td>
		
		<td width="240" style="text-align:center">

			<?php if($edit_permission):?>
				<div class="button button_small"><a href="<?php echo BASE;?>inventory/edit/<?php echo $is['id'];?>" >Editar</a></div>

				<div class="button button_small"><a href="<?php echo BASE;?>inventory/delete/<?php echo $is['id'];?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
		
			

			<?php endif;?>	

			</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="pagination">
<?php for($q=1;$q<=$p_count;$q++): ?>
	<div class="pag_item <?php echo ($q==$p)?'pag_ativo':'';?>"><a href="<?php echo BASE;?>inventory?p=<?php echo $q;?>"><?php echo $q;?></a></div>
<?php endfor; ?>
<div style="clear:both"></div>
</div>
