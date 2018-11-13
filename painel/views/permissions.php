<h1>Permissões</h1>
<div class="tabarea" >
	<div class="tabitem activetab">Grupo de Permissões</div>

	<div class="tabitem">Permissões</div>

</div>

<div class="tabcontent">

	<div class="tabbody"  style="display:block">
		<div class="button"><a  href="<?php echo BASE;?>permissions/add_group">Adicionar Grupo de Permissão</a></div>
		<table width="100%" border="0">
			<tr>
				<th>Nome do Grupo de Permissões</th>
				<th width="240">Ações</th>
			</tr>
			<?php foreach ($permissions_group_list as $p):?>
				<tr>
					<td><?php echo $p['group_name']?> </td>
					<td>
						<div class="button button_small" ><a href="<?php echo BASE;?>permissions/edit_group/<?php echo $p['id'];?>" onclick="return confirm('Tem certeza que quer editar? ')">Editar</a></div>

						<div class="button button_small" ><a href="<?php echo BASE;?>permissions/delete_group/<?php echo $p['id'];?>" onclick="return confirm('Tem certeza que quer deletar a permissão? ')">Delete</a></div>
					</td>
				</tr>
				


			<?php endforeach;?>

		</table>

	</div>

	<div class="tabbody">
		<div class="button"><a  href="<?php echo BASE;?>permissions/add">Adicionar Permissão</a></div>
		<table width="100%" border="0">
			<tr>
				<th>Nome da Permissão</th>
				<th width="50px">Ações</th>
			</tr>
			<?php foreach ($permissions_list as $p):?>
				<tr>
					<td><?php echo $p['name']?> </td>
					<td><div class="button button_small" ><a href="<?php echo BASE;?>permissions/delete/<?php echo $p['id'];?>" onclick="return confirm('Tem certeza que quer deletar a permissão? ')">Delete</a></div></td>
				</tr>
				


			<?php endforeach;?>

		</table>

	</div>


</div>