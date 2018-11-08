<h1>Grupo - Adicionar</h1>

<form method="POST">
	<input type="text"  name="name" placeholder="Digite o nome do grupo de Permissão" /><br/><br/>

	<label>Permissões</label><br/>

	<?php foreach ($permissions_list as $p) :?>
		<div class="p_item">
		<input type="checkbox" name="permissions[]" value="<?php echo $p['id'];?>" id="p_<?php echo $p['id'];?>" />
		<label for="p_<?php echo $p['id'];?>"><?php echo $p['name'];?></label>
		</div>
	<?php endforeach;?>

	<br/>

	<input type="submit" value=" Adicionar " />

</form>