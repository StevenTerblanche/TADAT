<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	if(isset($this->action) && ($this->action === 'update' || $this->action === 'save' || $this->action === 'completed')){
		foreach($get_record_by_id as $field => $value){$$field = $value;}
		$readonly = "";
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
		$readonly = "";
	}else{
		foreach($get_fields as $field){$$field = '';}
		$readonly = "readonly";
	}
	if(isset($this->action) && $this->action === 'completed'){
		$strFieldsetStatus = 'disabled="disabled"';
	}else{
		$strFieldsetStatus = '';
	}
	$periods = explode("/", $get_missions[0]['period']);
?>
<div class="col-md-12 pl0 pr0 ml0 mr0">
<fieldset <?php echo $strFieldsetStatus; ?>>
<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'form-submit')); ?>
	<table class="table table-striped pmq-table" style="width:98% !important">
		<tr class="dark-blue">
			<td class="bld wp-55"><p>IN LOCAL CURRENCY</p></td>
			<td class="center bld wp-15"><?php echo $periods[0];?></td>
			<td class="center bld wp-15"><?php echo $periods[1];?></td>
			<td class="center bld wp-15"><?php echo $periods[2];?></td>
		</tr>
		<tr>
			<td><b>Nominal GDP in local currency</b></td>
			<td class="center"><?php echo form_input(array('name'=>'a_gdp', 'value'=>$a_gdp, 'class'=>'form-control checkPastedValue pmq-decimal-input center column-a-gdp', 'required'=>'', 'id'=>'id_gdp_a', 'tabindex'=>'1'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_gdp', 'value'=>$b_gdp, 'class'=>'form-control checkPastedValue pmq-decimal-input center column-b-gdp', 'required'=>'', 'id'=>'id_gdp_b', 'tabindex'=>'12'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_gdp', 'value'=>$c_gdp, 'class'=>'form-control checkPastedValue pmq-decimal-input center column-c-gdp', 'required'=>'', 'id'=>'id_gdp_c', 'tabindex'=>'23'));?></td>
		</tr>
		<tr class="du">
			<td><b>Budgeted tax revenue target in local currency</b><sup>2</sup></td>
			<td class="center"><?php echo form_input(array('name'=>'a_budgeted_revenue', 'value'=>$a_budgeted_revenue, 'class'=>'form-control checkPastedValue center column-a-budget', 'id'=>'id_budget_a', 'required'=>'', 'tabindex'=>'2'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_budgeted_revenue', 'value'=>$b_budgeted_revenue, 'class'=>'form-control checkPastedValue center column-b-budget', 'id'=>'id_budget_b', 'required'=>'', 'tabindex'=>'13'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_budgeted_revenue', 'value'=>$c_budgeted_revenue, 'class'=>'form-control checkPastedValue center column-c-budget', 'id'=>'id_budget_c', 'required'=>'', 'tabindex'=>'24'));?></td>
		</tr>
		<tr>
			<td>1.1.1 Corporate Income Tax (CIT)</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_1_1', 'value'=>$a_1_1_1, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'3'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_1_1', 'value'=>$b_1_1_1, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'14'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_1_1', 'value'=>$c_1_1_1, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'25'));?></td>	
		</tr>
		<tr>
			<td>1.1.2 Personal Income Tax (PIT)</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_1_2', 'value'=>$a_1_1_2, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'4'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_1_2', 'value'=>$b_1_1_2, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'15'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_1_2', 'value'=>$c_1_1_2, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'26'));?></td>	
		</tr>		
		<tr>
			<td>1.1.3 Value-Added Tax (VAT) - gross domestic collections</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_1_3', 'value'=>$a_1_1_3, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'5'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_1_3', 'value'=>$b_1_1_3, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'16'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_1_3', 'value'=>$c_1_1_3, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'27'));?></td>	
		</tr>
		<tr>
			<td>1.1.4 Value-Added Tax (VAT) - collected on imports</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_1_4', 'value'=>$a_1_1_4, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'6'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_1_4', 'value'=>$b_1_1_4, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'17'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_1_4', 'value'=>$c_1_1_4, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'28'));?></td>
		</tr>
		<tr>
			<td>1.1.5 Value-Added Tax (VAT) - refunds approved and paid</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_1_5', 'value'=>$a_1_1_5, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'7'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_1_5', 'value'=>$b_1_1_5, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'18'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_1_5', 'value'=>$c_1_1_5, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'29'));?></td>
		</tr>
		<tr>
			<td>1.1.6 Excises on domestic transactions</td>			
			<td class="center"><?php echo form_input(array('name'=>'a_1_1_6', 'value'=>$a_1_1_6, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'8'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_1_6', 'value'=>$b_1_1_6, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'19'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_1_6', 'value'=>$c_1_1_6, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'30'));?></td>	
		</tr>
		<tr>
			<td>1.1.7 Excises - collected on imports</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_1_7', 'value'=>$a_1_1_7, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'9'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_1_7', 'value'=>$b_1_1_7, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'20'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_1_7', 'value'=>$c_1_1_7, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'31'));?></td>		
		</tr>
		<tr>
			<td>1.1.8 Social contribution collections</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_1_8', 'value'=>$a_1_1_8, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'10'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_1_8', 'value'=>$b_1_1_8, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'21'));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_1_8', 'value'=>$c_1_1_8, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'32'));?></td>		
		</tr>
		<tr>
			<td class="du">1.1.9 Other domestic taxes<sup>3</sup></td>
			<td class="center du"><?php echo form_input(array('name'=>'a_1_1_9', 'value'=>$a_1_1_9, 'class'=>'form-control checkPastedValue center column-input-a', 'required'=>'', 'tabindex'=>'11', 'id'=>'a_end'));?></td>
			<td class="center du"><?php echo form_input(array('name'=>'b_1_1_9', 'value'=>$b_1_1_9, 'class'=>'form-control checkPastedValue center column-input-b', 'required'=>'', 'tabindex'=>'22', 'id'=>'b_end'));?></td>
			<td class="center du"><?php echo form_input(array('name'=>'c_1_1_9', 'value'=>$c_1_1_9, 'class'=>'form-control checkPastedValue center column-input-c', 'required'=>'', 'tabindex'=>'33', 'id'=>'c_end'));?></td>
		</tr>
	
		<tr>
			<td align="right"><b>Total tax revenue collections in local currency</b></td>
			<td class="center"><?php echo form_input(array('name'=>'a_total_revenue_collections', 'value'=>$a_total_revenue_collections, 'class'=>'form-control center column-a-total', 'required'=>'', 'id'=>'id_a_total_revenue_collections', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_total_revenue_collections', 'value'=>$b_total_revenue_collections, 'class'=>'form-control center column-b-total', 'required'=>'', 'id'=>'id_b_total_revenue_collections', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_total_revenue_collections', 'value'=>$c_total_revenue_collections, 'class'=>'form-control center column-c-total', 'required'=>'', 'id'=>'id_c_total_revenue_collections', 'readonly'=>$readonly));?></td>
		</tr>
		<tr class="dark-blue">
			<td class="bld wp-55"><p>IN PERCENT OF TOTAL TAX REVENUE COLLECTIONS</p></td>
			<td class="center bld wp-15"><?php echo $periods[0];?></td>
			<td class="center bld wp-15"><?php echo $periods[1];?></td>
			<td class="center bld wp-15"><?php echo $periods[2];?></td>
		</tr>
		<tr>
			<td>1.2.1 Corporate Income Tax (CIT)</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_2_1', 'value'=>$a_1_2_1, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_2_1', 'value'=>$b_1_2_1, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_2_1', 'value'=>$c_1_2_1, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.2.2 Personal Income Tax (PIT)</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_2_2', 'value'=>$a_1_2_2, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_2_2', 'value'=>$b_1_2_2, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_2_2', 'value'=>$c_1_2_2, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.2.3 Value-Added Tax (VAT) - gross domestic collections</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_2_3', 'value'=>$a_1_2_3, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_2_3', 'value'=>$b_1_2_3, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_2_3', 'value'=>$c_1_2_3, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.2.4 Value-Added Tax (VAT) - collected on imports</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_2_4', 'value'=>$a_1_2_4, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_2_4', 'value'=>$b_1_2_4, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_2_4', 'value'=>$c_1_2_4, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.2.5 Value-Added Tax (VAT) - refunds approved and paid</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_2_5', 'value'=>$a_1_2_5, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_2_5', 'value'=>$b_1_2_5, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_2_5', 'value'=>$c_1_2_5, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.2.6 Excises on domestic transactions</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_2_6', 'value'=>$a_1_2_6, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_2_6', 'value'=>$b_1_2_6, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_2_6', 'value'=>$c_1_2_6, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.2.7 Excises - collected on imports</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_2_7', 'value'=>$a_1_2_7, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_2_7', 'value'=>$b_1_2_7, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_2_7', 'value'=>$c_1_2_7, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.2.8 Social contribution collections</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_2_8', 'value'=>$a_1_2_8, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_2_8', 'value'=>$b_1_2_8, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_2_8', 'value'=>$c_1_2_8, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		
		<tr>
			<td class="du">1.2.9 Other domestic taxes <sup>3</sup></td>
			<td class="center du"><?php echo form_input(array('name'=>'a_1_2_9', 'value'=>$a_1_2_9, 'class'=>'form-control pmq-percentage-input center column-revenue-a', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center du"><?php echo form_input(array('name'=>'b_1_2_9', 'value'=>$b_1_2_9, 'class'=>'form-control pmq-percentage-input center column-revenue-b', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center du"><?php echo form_input(array('name'=>'c_1_2_9', 'value'=>$c_1_2_9, 'class'=>'form-control pmq-percentage-input center column-revenue-c', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		
		<tr>
			<td align="right"><b>Total tax revenue collections in percent</b></td>
			<td class="center"><?php echo form_input(array('name'=>'a_total_revenue_collections_percentage', 'value'=>$a_total_revenue_collections_percentage, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'id'=>'id_a_total_revenue_collections_percentage', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_total_revenue_collections_percentage', 'value'=>$b_total_revenue_collections_percentage, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'id'=>'id_b_total_revenue_collections_percentage', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_total_revenue_collections_percentage', 'value'=>$c_total_revenue_collections_percentage, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'id'=>'id_c_total_revenue_collections_percentage', 'readonly'=>$readonly));?></td>
		</tr>

		<tr class="dark-blue">
			<td class="bld wp-55"><p>IN PERCENT OF GDP</p></td>
			<td class="center bld wp-15"><?php echo $periods[0];?></td>
			<td class="center bld wp-15"><?php echo $periods[1];?></td>
			<td class="center bld wp-15"><?php echo $periods[2];?></td>
		</tr>
		<tr>
			<td>1.3.1 Corporate Income Tax (CIT)</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_3_1', 'value'=>$a_1_3_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_3_1', 'value'=>$b_1_3_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_3_1', 'value'=>$c_1_3_1, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.3.2 Personal Income Tax (PIT)</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_3_2', 'value'=>$a_1_3_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_3_2', 'value'=>$b_1_3_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_3_2', 'value'=>$c_1_3_2, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.3.3 Value-Added Tax (VAT) - gross domestic collections</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_3_3', 'value'=>$a_1_3_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_3_3', 'value'=>$b_1_3_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_3_3', 'value'=>$c_1_3_3, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.3.4 Value-Added Tax (VAT) - collected on imports</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_3_4', 'value'=>$a_1_3_4, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_3_4', 'value'=>$b_1_3_4, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_3_4', 'value'=>$c_1_3_4, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.3.5 Value-Added Tax (VAT) - refunds approved and paid</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_3_5', 'value'=>$a_1_3_5, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_3_5', 'value'=>$b_1_3_5, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_3_5', 'value'=>$c_1_3_5, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.3.6 Excises on domestic transactions</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_3_6', 'value'=>$a_1_3_6, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_3_6', 'value'=>$b_1_3_6, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_3_6', 'value'=>$c_1_3_6, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.3.7 Excises - collected on imports</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_3_7', 'value'=>$a_1_3_7, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_3_7', 'value'=>$b_1_3_7, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_3_7', 'value'=>$c_1_3_7, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td>1.3.8 Social contribution collections</td>
			<td class="center"><?php echo form_input(array('name'=>'a_1_3_8', 'value'=>$a_1_3_8, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_1_3_8', 'value'=>$b_1_3_8, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_1_3_8', 'value'=>$c_1_3_8, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		
		<tr>
			<td class="du">1.3.9 Other domestic taxes<sup>3</sup></td>
			<td class="center du"><?php echo form_input(array('name'=>'a_1_3_9', 'value'=>$a_1_3_9, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center du"><?php echo form_input(array('name'=>'b_1_3_9', 'value'=>$b_1_3_9, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
			<td class="center du"><?php echo form_input(array('name'=>'c_1_3_9', 'value'=>$c_1_3_9, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'readonly'=>$readonly));?></td>
		</tr>
		
		<tr>
			<td align="right"><b> Total tax revenue collections in percent of GDP</b></td>
			<td class="center"><?php echo form_input(array('name'=>'a_total_revenue_collections_percentage_gdp', 'value'=>$a_total_revenue_collections_percentage_gdp, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'id'=>'id_a_total_revenue_collections_percentage_gdp', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'b_total_revenue_collections_percentage_gdp', 'value'=>$b_total_revenue_collections_percentage_gdp, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'id'=>'id_b_total_revenue_collections_percentage_gdp', 'readonly'=>$readonly));?></td>
			<td class="center"><?php echo form_input(array('name'=>'c_total_revenue_collections_percentage_gdp', 'value'=>$c_total_revenue_collections_percentage_gdp, 'class'=>'form-control pmq-percentage-input center', 'required'=>'', 'id'=>'id_c_total_revenue_collections_percentage_gdp', 'readonly'=>$readonly));?></td>
		</tr>
		<tr>
			<td colspan="4">
				<p><b>Explanatory notes:</b></p><p><sup>1</sup>This table gathers data for three fiscal years in respect of all domestic tax revenues collected by the tax administration at the national level, plus VAT and Excise tax collected on imports by the customs and/or other agency.</p>
				<p><sup>2</sup>This forecast is normally set by the Ministry of Finance (or equivalent) with input from the tax administration and, for purposes of this table, should only cover the taxes listed in the table. The final budgeted forecast, as adjusted through any mid-year review process, should be used.</p>
				<p><sup>3</sup>'Other domestic taxes collected at the national level by the tax administration include, for example, property taxes, financial transaction taxes, and environment taxes.</p>
			</td>
		</tr>

<?php if($this->action !== 'completed'){?>
		<tr><td colspan="4">
			<div class="form-group mt15">
				<div class="col-xs-12" style="text-align:center !important;">
					<button type="button" id="save_button" class="btn btn-success white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $save_button; ?></button>
					<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
				
				</div>
			</div>
		</td></tr>
<?php }?>		
	</table>
					
	<?php 
	echo form_hidden('fkidMission', $get_missions[0]['MissionId']);
	echo form_hidden('period_year_1', $periods[0]);
	echo form_hidden('period_year_2', $periods[1]);
	echo form_hidden('period_year_3', $periods[2]);		
	echo form_close(); ?>
</fieldset>
</div>