<h1>Grupo - Editar Grupo de Permissões</h1>

<form method="POST">
	<input type="text"  name="name" value="<?php echo $group_info['group_name'];?>" /><br/><br/>

	<label>Permissões</label><br/>

	<?php foreach ($permissions_list as $p) :?>
		<div class="p_item">
		<input type="checkbox" name="permissions[]" value="<?php echo $p['id'];?>" id="p_<?php echo $p['id'];?>" <?php echo (in_array($p['id'],$group_info['params']))?'checked="checked"':'';?> />
		<label for="p_<?php echo $p['id'];?>"><?php echo $p['name'];?></label>
		</div>
	<?php endforeach;?>

	<br/>

	<input type="submit" value="Alterar" />

</form>