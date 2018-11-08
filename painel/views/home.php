<div class="db-row row1 ">
	<div class="grid-1">
		<div class="db-grid-area">
			<div class="db-grid-area-count"><?php echo $products_sold;?></div>
			<div class="db-grid-area-legend"><?php echo ($products_sold<2)?'Produto Vendido':'Produtos Vendidos';?> <small>(Últimos 30 dias)</small></div>
		</div>
	</div>
	<div class="grid-1">
		<div class="db-grid-area">
			<div class="db-grid-area-count values_rd">R$ <?php echo $revenue;?></div>
			<div class="db-grid-area-legend">Receitas <small>(Últimos 30 dias)</small></div>
		</div>
	</div>
	<div class="grid-1">
		<div class="db-grid-area">
			<div class="db-grid-area-count .values_rd'">R$ <?php echo $expense;?></div>
			<div class="db-grid-area-legend">Despesas <small>(Últimos 30 dias)</small></div>

		</div>
	</div>

</div>
<div class="db-row row2 " >
	<div class="grid-2">
		<div class="db-info">
			<div class="db-info-title">Receitas e Despesas <small>(Últimos 30 dias)</small> </small></div>
			<div class="db-info-body" style="height:340px">
				<canvas id="rel1" ></canvas>

			</div>
		</div>
		
	</div>
	<div class="grid-1">
		<div class="db-info">
			<div class="db-info-title">Status de Pagamento <small>(Últimos 30 dias)</small></div>
			<div class="db-info-body" style="height:340px">
				<canvas id="rel2"  height="300px" ></canvas>
				
				
			</div>
		</div>
		
	</div>
	

</div>
<div class="db-row">
	<div class="grid-3">
		...
	</div>
</div>
<script type="text/javascript" >
var days_list = <?php echo json_encode($days_list); ?>;
var revenue_list = <?php echo json_encode(array_values($revenue_list)); ?>;
var expense_list = <?php echo json_encode(array_values($expense_list)); ?>;
var status_name_list = <?php echo json_encode(array_values($statuses)); ?>;
var status_list = <?php echo json_encode(array_values($status_list)); ?>;

</script>
<script type="text/javascript" src="<?php echo BASE;?>assets/js/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo BASE;?>assets/js/script_home.js"></script>
