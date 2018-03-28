<?php defined('BASEPATH') OR exit('No direct script access allowed'); 


class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('TADAT Secretariat');
    $pdf->SetTitle('PERFORMANCE ASSESSMENT REPORT');
    $pdf->SetSubject('TADAT DRAFT PAR');
    $pdf->SetKeywords('TADAT, PAR');   
  
    // set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, 210, '', '', array(255,255,255), array(255,255,255));
    $pdf->setFooterData(array(255,255,255), array(255,255,255)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(0, PDF_MARGIN_TOP, 0);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
  
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
  
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
  
 
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('dejavusans', '', 10, '', true);   
  
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
  

	$html = <<<EOD_HTML
	<style>
	.par-full-width-div{
		width:915px !important;
		clear: left !important;
	}
	
	.par-heading-half-width-div{
		width:450px !important;
		margin-top:0px !important;
		margin-bottom:10px !important;
		float:none !important;	
	}
	
	.par-heading-full-width-div{
		width:915px !important;
		margin-top:5px !important;
		margin-bottom:5px !important;
		display:block !important;
		float:none !important;	
	}

	.par-heading-full-width-div p{
	
	}
	
	.par-heading-full-width-div h1{
		font-size:22px !important;
		margin-top:0px !important;
		color:#1075ba !important;
		padding:0px !important;
		font-weight:bold !important;
	}
	.par-heading-full-width-div h2{
		font-size:14px !important;
		color:#1075ba !important;
		margin-top:8px !important;
		margin-bottom:0px !important;
		padding:0px !important;
		padding-top:5px !important;		
		font-weight:bold !important;
	}
	
	.par-heading-half-width-div h1{
		font-size:14px !important;
		color:#1075ba !important;
		padding:8px !important;
		padding-left:0px !important;
		padding-top:20px !important;
		margin:0px !important;
		font-weight:bold !important;
	}
	.par-heading-half-width-div h2{
		font-size:14px !important;
		color:#1075ba !important;
		padding:8px !important;
		padding-left:0px !important;		
		padding-top:20px !important;
		margin:0px !important;
		font-weight:bold !important;
	}

</style>	
<div style="width:200px !important; background-color:#666">sss</div>
<div style="float:right !important"><img src="/public_assets/reporting/images/tadat_wheel.jpg" width="350" height="350" /></div>
	<div class="par-heading-half-width-div"><h1>Attachment I. TADAT Framework</h1></div>
<div class="par-heading-half-width-div"><h2>Performance outcome areas</h2></div>

<p>TADAT assesses the performance of a country's tax administration system by reference to nine outcome areas:</p>
<ol>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Integrity of the registered taxpayer base:</b></span> Registration of taxpayers and maintenance of a complete and accurate taxpayer database is fundamental to effective tax administration.</li>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Effective risk management:</b></span> Performance improves when risks to revenue and tax administration operations are identified and systematically managed.</li>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Support given to taxpayers to help them comply:</b></span> Usually, most taxpayers will meet their tax obligations if they are given the necessary information and support to enable them to comply voluntarily.</li>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> On-time filing of declarations:</b></span> Timely filing is essential because the filing of a tax declaration is a principal means by which a taxpayer"s tax liability is established and becomes due and payable.</li>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> On-time payment of taxes:</b></span> Non-payment and late payment of taxes can have a detrimental effect on government budgets and cash management. Collection of tax arrears is costly and time consuming.</li>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Accuracy of information reported in tax declarations:</b></span> Tax systems rely heavily on complete and accurate reporting of information in tax declarations. Audit and other verification activities, and proactive initiatives of taxpayer assistance, promote accurate reporting and mitigate tax fraud.</li>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Adequacy of dispute resolution processes:</b></span> Independent, accessible, and efficient review mechanisms safeguard a taxpayer"s right to challenge a tax assessment and get a fair hearing in a timely manner.</li>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Efficient revenue management:</b></span> Tax revenue collections must be fully accounted for, monitored against budget expectations, and analyzed to inform government revenue forecasting. Legitimate tax refunds to individuals and businesses must be paid promptly.</li>
		<li style="color:#333 !important; padding-bottom:8px !important"><span style="color:#1075ba"><b> Accountability and transparency:</b></span> As public institutions, tax administrations are answerable for the way they use public resources and exercise authority. Community confidence and trust are enhanced when there is open accountability for administrative actions within a framework of responsibility to the minister, legislature, and general community.</li>
</ol>
<div class="par-heading-half-width-div"><h2>Indicators and associated measurement dimensions</h2></div>
<p>A set of 28 high-level indicators critical to tax administration performance are linked to the performance outcome areas. It is these indicators that are scored and reported on. A total of 47 measurement dimensions are taken into account in arriving at the indicator scores. Each indicator has between one and four measurement dimensions.</p>
<p>The indicators are oriented towards assessing performance outcomes, although in some cases outputs are used as proxies for outcomes. As far as possible, TADAT avoids measuring inputs and enabling factors that contribute to outcomes (e.g., organizational structures, human resources, administrative budgets, information technology (IT), and legislation).</p>
<p>Repeated assessments will provide information on the extent to which a country"s tax administration is improving.</p>
<div class="par-heading-half-width-div"><h2>Scoring methodology</h2></div>
<p>The assessment of indicators follows the same approach followed in the Public Expenditure and Financial Accountability (PEFA) diagnostic tool so as to aid comparability where both tools are used.</p>
<p>Each of TADAT"s 47 measurement dimensions is assessed separately. The overall score for an indicator is based on the assessment of the individual dimensions of the indicator. Combining the scores for dimensions into an overall score for an indicator is done using one of two methods: Method 1 (M1) or Method 2 (M2). For both M1 and M2, the four-point "ABCD" scale is used to score each dimension and indicator.</p>
<p><b>Method M1</b> is used for all single dimensional indicators and for multi-dimensional indicators where poor performance on one dimension of the indicator is likely to undermine the impact of good performance on other dimensions of the same indicator (in other words, by the weakest link in the connected dimensions of the indicator).		</p>
<p><b>Method M2</b> is based on averaging the scores for individual dimensions of an indicator. It is used for selectedmulti-dimensional indicators where a low score on one dimension of the indicator does not necessarily undermine the impact of higher scores on other dimensions for the same indicator.</p>
EOD_HTML;

  
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
	$pdf->Output('example_001.pdf', 'I');
?>

