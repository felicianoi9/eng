<h1>Usuário - Adicionar</h1>
<?php if(isset($error_msg) && !empty($error_msg)):?>
	<div class="warn"><?php echo $error_msg;?></div>
<?php endif;?>

<form method="POST">
	<input type="text"  name="name" placeholder="Digite o nome do usuário" required /><br/><br/>
	<input type="email"  name="email" placeholder="Digite o e-mail" required /><br/><br/>
	<input type="password"  name="password" placeholder="Digite uma senha"  required /><br/><br/>

	<label>Grupo de Permissões</label><br/><br/>

	<?php foreach ($permissions_group_list as $p) :?>
		<div class="p_item">
		<input type="checkbox" name="group" value="<?php echo $p['id'];?>" id="p_<?php echo $p['id'];?>" />
		<label for="p_<?php echo $p['id'];?>"><?php echo $p['group_name'];?></label>
		</div>
	<?php endforeach;?>

	<br/>

	<input type="submit" value=" Adicionar " />

</form>