<h1>Usuário - Editar</h1>

<form method="POST">
	<input type="text"  name="name" value="<?php echo $user_info['name'];?>" required /><br/><br/>
	<input type="text"  name="name" value="<?php echo $user_info['email'] ;?>" disabled /><br/><br/>
	<input type="password"  name="password" placeholder="Nova senha"  /><br/><br/>

	<label>Grupo de Permissões</label><br/><br/>

	<?php foreach ($permissions_group_list as $p) :?>
		<div class="p_item">
		<input type="checkbox" name="group" value="<?php echo $p['id'];?>" id="p_<?php echo $p['id'];?>"  <?php echo ($p['id']==$user_info['id_group'])?'checked="checked"':'';?> />
		<label for="p_<?php echo $p['id'];?>"><?php echo $p['group_name'];?></label>
		</div>
	<?php endforeach;?>

	<br/>

	<input type="submit" value="Editar" />

</form>