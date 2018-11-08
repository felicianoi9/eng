<h1>Conta a Pagar - Editar</h1>

<?php // print_r($topay_info);exit;?>

<strong>Nome do Cliente:</strong></br>
<?php echo $topay_info['description'];?></br></br>

<strong>Data:</strong></br>
<?php echo date('d/m/y', strtotime($topay_info['date_topay']));?></br></br>

<strong>Venciamento:</strong></br>
<?php echo date('d/m/y', strtotime($topay_info['maturity']));?></br></br>

<strong>Valor da Parcela:</strong></br>
R$ <?php echo number_format($topay_info['price'],2,',','.');?></br></br>

<strong>Status:</strong></br>
<?php if($permission_edit): ?>
<form method="POST">
	<select name="status">
		<?php foreach($statuses as $statusKey => $statusValue): ?>
		<option value="<?php echo $statusKey; ?>" <?php echo ($statusKey == $topay_info['status'])?'selected="selected"':''; ?>><?php echo $statusValue; ?></option>
		<?php endforeach; ?>
	</select><br/><br/>
	<input type="submit" value="Salvar" />
</form>
<?php else: ?>
<?php echo $statuses[$topay_info['status']]; ?>
<?php endif; ?>
<br/><br/>
<hr>

