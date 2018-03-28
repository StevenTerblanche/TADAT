<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	$tbl = 'par_section_'.$section_id;
	$par_id = _get_par_table_id_by_mission_id($mission_id, $tbl);
	$arrParData = null;
	if($par_id){$arrParData = _get_par_table_data_by_mission_id($par_id, $tbl, $section_id);}

	$arrMission = _get_par_mission_details_by_id($mission_id);
?>

<div class="col-md-12">
	<div class="par-heading-full-width-div"><h1>I. Introduction</h1></div>
	<div class="col-md-6" id="introduction-div">
		<p>This report documents the results of the TADAT assessment conducted in <?php echo $arrMission['country'].' ('.$arrMission['region'].')';?> during the period <?php echo  date("j F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateStart'))));?> to <?php echo  date("j F Y", strtotime(_get_fields_by_id('Missions', 'id', $mission_id, array('dateEnd'))));?> and subsequently reviewed by the TADAT Secretariat.</p>
		<p>The report is structured around the TADAT framework of nine POAs and 28 high level indicators critical to tax administration performance that is linked to the POAs. Forty-seven measurement dimensions are taken into account in arriving at each indicator score. </p>
		<p>A four-point 'ABCD' scale is used to score each dimension and indicator: </p>
		<ul class="fa-ul">
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>'A' denotes performance that meets or exceeds international good practice. In this regard, for TADAT purposes, a good practice is taken to be a tested and proven approach applied by a majority of leading tax administrations. It should be noted, however, that for a process to be considered 'good practice', it does not need to be at the very forefront or vanguard of technological and other developments. Given the dynamic nature of tax administration, the good practices described throughout the field guide can be expected to evolve over time as technology advances and innovative approaches are tested and gain wide acceptance.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>'B' represents sound performance (i.e. a healthy level of performance but a rung below international good practice).</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>'C' means weak performance relative to international good practice.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>'D' denotes inadequate performance, and is applied when the requirements for a 'C' rating or higher are not met. Furthermore, a 'D' score is given in certain situations where there is insufficient information available to assessors to determine and score the level of performance. For example, where a tax administration is unable to produce basic numerical data for purposes of assessing operational performance (e.g., in areas of filing, payment, and refund processing) a 'D' score is given. The underlying rationale is that the inability of the tax administration to provide the required data is indicative of deficiencies in its management information systems and performance monitoring practices.</li>
		</ul>
		<p>For further details on the TADAT framework, see Attachment I.</p>
	</div>
	<div class="col-md-6" id="introduction-div">
		<p>Some points to note about the TADAT diagnostic approach are:</p>
		<ul class="fa-ul">
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>TADAT assesses the performance outcomes achieved in the administration of the major direct and indirect taxes critical to central government revenues, specifically corporate income tax (CIT), personal income tax (PIT), value added tax (VAT), and Pay As You Earn (PAYE) amounts withheld by employers (which, strictly speaking, are remittances of PIT). By assessing outcomes in relation to administration of these core taxes, a picture can be developed of the relative strengths and weaknesses of a country's tax administration.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>TADAT assessments are evidence based (see Attachment V for the sources of evidence applicable to the assessment of <?php echo $arrMission['country'];?> ).</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>TADAT is not designed to assess special tax regimes, such as those applying in the natural resource sector. Nor does it assess customs administration.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>TADAT provides an assessment within the existing revenue policy framework in a country, with assessments highlighting performance issues that may be best dealt with by a mix of administrative and policy responses. </li>
		</ul>
		<p>The aim of TADAT is to provide an objective assessment of the health of key components of the system of tax administration, the extent of reform required, and the relative priorities for attention.</p>
		<p>TADAT assessments are particularly helpful in:</p>
		<ul class="fa-ul">
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Identifying the relative strengths and weaknesses in tax administration.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Facilitating a shared view among all stakeholders (country authorities, international organizations, donor countries, and technical assistance providers).</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Setting the reform agenda (objectives, priorities, reform initiatives, and implementation sequencing). </li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Facilitating management and coordination of external support for reforms, and achieving faster and more efficient implementation.</li>
			<li><i style="color:#1175ba !important" class="fa-li fa fa-square"></i>Monitoring and evaluating reform progress by way of subsequent repeat assessments.</li>
		</ul>
	</div>
</div>

		<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button><button style="width:175px !important; margin-left:25px !important" type="submit" id="id_save_button" class="btn btn-success white-text"><i class="fa  fa-save mr5"></i>Submit Changes</button></div>