<h1>Usuários</h1>



	
		<div class="button"><a  href="<?php echo BASE;?>users/add">Adicionar Usuário</a></div>
		<table width="100%" border="0">
			<tr>
				<th width="25%">Nome do Usário</th>
				<th width="30%">E-Mail</th>
				<th width="20%">Grupo de Permissões</th>
				<th width="25%">Ações</th>
			</tr>
			<?php foreach ($users_list as $u):?>
				<tr>
					<td><?php echo $u['name'];?> </td>
					<td><?php echo $u['email'];?></td>
					<td><?php echo $u['group_name'];?></td>
					<td>
						<div class="button button_small" ><a href="<?php echo BASE;?>users/edit/<?php echo $u['id'];?>" onclick="return confirm('Tem certeza que quer editar? ')">Editar</a></div>

						<div class="button button_small" ><a href="<?php echo BASE;?>users/delete/<?php echo $u['id'];?>" onclick="return confirm('Tem certeza que quer deletar a permissão? ')">Delete</a></div>
					</td>
				</tr>
				
			<?php endforeach;?>

		</table>

	




