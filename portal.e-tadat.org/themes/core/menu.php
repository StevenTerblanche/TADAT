<?php 	defined('BASEPATH') OR exit('No direct script access allowed');

$UserRole = $this->user->fkidUserRole;
	/* 
		STATUS    = IN-PROGRESS
		LANGUAGE  = IN-PROGRESS
		NORMALISE = IN-PROGRESS
		COMMENTS  = IN-PROGRESS
	 */
 # This <div id="wrapper"> closes in content.php
 ?>
<div id="wrapper">
	<aside id="sidebar" class="page-sidebar hidden-md hidden-sm hidden-xs">
			<div class="sidebar-inner">
					<div class="sidebar-scrollarea">
							<div class="side-nav">
									<ul class="nav" style="background-color:#125b8c !important;">
											<li><a class="pl12 <?php echo (uri_string() == 'dashboard' || uri_string() == '') ? '' : ''; ?>" href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span class="txt"><?php echo lang('dashboard'); ?></span></a></li>
											<?php
//											_show_array($this->user);
										/* This is revised levels of Authority in Ascending order of importance
											1 = Developers / TADAT Secretariat
											2 = TADAT Secretariat
											4 = Mission Team Leader (three roles)
											5 = IMF Appointed Assessor	
											6 = Revenue Authority Admin
											7 = Revenue Authority Counterpart
											8 = Role with custom access permissions.
										*/
										// Enter pages in this array for menu specific options.
/*
		if (_groupMembership('Workshops',null)){ 
										## START WORKSHOPS
										$arrMission = array('missions/list', 'missions/create', 'missions/update', 'missions/profile');	
										echo '<li class="hasSub ',(in_array(uri_string(), $arrMission)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $arrMission)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $arrMission)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $arrMission)) ? 'active ' : '','fa fa-globe fs24"></i>'; 
										echo '<span class="txt">'.lang('manage_').lang('workshops').'</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $arrMission)) ? 'show' : '','">';
												if (_groupMembership('Workshops','Read')) echo '<li><a style="margin-left:0px !important;" href="'.base_url('/missions/create').'"><span class="txt">'.lang('create_').lang('mission').'</span></a></li>';
												echo '<li class="last"><a href="'.base_url('/missions/list').'"><span class="txt">'.lang('view_').lang('missions').'</span></a></li>';
											echo '</ul></li>';
		}

*/

if ( $UserRole == 100 || $UserRole == 200 || $UserRole == 400){
										## START MENU SECTION
if ($UserRole == 100 || $UserRole == 200){
										$arrRa = array('authorities/list', 'authorities/create', 'authorities/update', 'authorities/profile');
										echo '<li class="hasSub ',(in_array(uri_string(), $arrRa)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $arrRa)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $arrRa)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $arrRa)) ? 'active ' : '','fa fa-bank fs18"></i>'; 
										echo '<span class="txt">'.lang('manage_').lang('revenue_authorities').'</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $arrRa)) ? 'show' : '','">';
													echo '<li><a href="'.base_url('/authorities/create').'"><span class="txt">'.lang('create_').lang('revenue_authority').'</span></a></li>';
													echo '<li class="last"><a href="'.base_url('/authorities/list').'"><span class="txt">'.lang('view_').lang('revenue_authorities').'</span></a></li>';
											echo '</ul></li>';
										## START MISSIONS
										$arrMission = array('missions/list', 'missions/create', 'missions/update', 'missions/profile');	
										echo '<li class="hasSub ',(in_array(uri_string(), $arrMission)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $arrMission)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $arrMission)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $arrMission)) ? 'active ' : '','fa fa-globe fs24"></i>'; 
										echo '<span class="txt">'.lang('manage_').lang('missions').'</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $arrMission)) ? 'show' : '','">';
												echo '<li><a style="margin-left:0px !important;" href="'.base_url('/missions/create').'"><span class="txt">'.lang('create_').lang('mission').'</span></a></li>';
												echo '<li class="last"><a href="'.base_url('/missions/list').'"><span class="txt">'.lang('view_').lang('missions').'</span></a></li>';
											echo '</ul></li>';
}
										## START USERS
										$arrUsers = array('users/list', 'users/create', 'users/update', 'users/profile');
										echo '<li class="hasSub ',(in_array(uri_string(), $arrUsers)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $arrUsers)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $arrUsers)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $arrUsers)) ? 'active ' : '','fa fa-users"></i>'; 
										$strMenuDisplayUsers = ($UserRole != 4)? lang('users'):lang('assessors');
										echo '<span class="txt">'.lang('manage_').$strMenuDisplayUsers.'</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $arrUsers)) ? 'show' : '','">';
												echo '<li><a href="'.base_url('/users/create').'"><span class="txt">'.lang('create_').$strMenuDisplayUsers.'</span></a></li>';
												echo '<li class="last"><a href="'.base_url('/users/list').'"><span class="txt">'.lang('view_').$strMenuDisplayUsers.'</span></a></li>';			
											echo '</ul></li>';


if(isset($this->user->assignedTa) || isset($this->user->assignedMission)){
										## START ASSIGNMENTS
										$assignments = array('assignments/list', 'update', 'assignments/create');
										$ass = array('ajax');				
										$ust = uri_string();
										echo '<li class="hasSub ',(in_array(uri_string(), $assignments)) ? 'highlight-menu' : '','">';
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $assignments)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $assignments)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $assignments)) ? 'active ' : '','fa fa-briefcase"></i>'; 
										echo '<span class="txt">'.lang('manage_').lang('assignments').'</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $assignments)) ? 'show' : '','">';
													echo '<li><a href="'.base_url('/assignments/create').'"><span class="txt">Create User Assignment</span></a></li>';
													echo '<li class="last"><a href="'.base_url('/assignments/list').'"><span class="txt">View User Assignments</span></a></li>';													
											echo '</ul></li>';
										## END
}

if ($UserRole == 100 || $UserRole == 200){
//*************************************  CHANGE BACK WHEN IN PRODUCTION  ******************************************************** 

										## START PERFORMANCE OUTCOME AREAS
										$poa = array('poa/list', 'poa/create', 'poa/update', '/poa/create');
										echo '<li class="hasSub ',(in_array(uri_string(), $poa)) ? 'highlight-menu' : '','">'; 
										echo '<a style="padding-left:13px !important;" class="pr0 ', (in_array(uri_string(), $poa)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $poa)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $poa)) ? 'active ' : '','fa fa-sliders"></i>'; 
										echo '<span class="txt">Performance Outcome Areas</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $poa)) ? 'show' : '','">';
													echo '<li><a href="'.base_url('/poa/create').'"><span class="txt">Create Outcome Area</span></a></li>';
													echo '<li><a class="last" href="'.base_url('/poa/list').'"><span class="txt">View Outcome Areas</span></a></li>';													
											echo '</ul></li>';
										## END

										## START PERFORMANCE INDICATORS
										$pi = array('pi/list', 'pi/create', 'pi/update', '/pi/create');
										echo '<li class="hasSub ',(in_array(uri_string(), $pi)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $pi)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $pi)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $pi)) ? 'active ' : '','fa fa-list"></i>'; 
										echo '<span class="txt">High-level Indicators</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $pi)) ? 'show' : '','">';
													echo '<li><a href="'.base_url('/pi/create').'"><span class="txt">Create Indicator</span></a></li>';
													echo '<li class="last"><a href="'.base_url('/pi/list').'"><span class="txt">View Indicators</span></a></li>';													
											echo '</ul></li>';
										## END							
										## START MEASUREMENT DIMENSIONS
										$md = array('md/list', 'md/create', 'md/update', '/md/create');
										echo '<li class="hasSub ',(in_array(uri_string(), $md)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $md)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $md)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $md)) ? 'active ' : '','fa fa-random"></i>'; 
										echo '<span class="txt">Measurement Dimensions</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $md)) ? 'show' : '','">';
													echo '<li><a href="'.base_url('/md/create').'"><span class="txt">Create Dimension</span></a></li>';
													echo '<li class="last"><a href="'.base_url('/md/list').'"><span class="txt">View Dimensions</span></a></li>';													
											echo '</ul></li>';
										## END

										## MANAGEMENT
										$glossary = array('glossary/list','glossary/create','glossary/update');
										$evidence = array('ev/list','ev/create','ev/update');
										$scoring = array('scoring/list','scoring/create','scoring/update');										
										$all = array_merge($glossary, $evidence, $scoring);
										echo '<li class="hasSub ',(in_array(uri_string(), $all)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $all)) ? 'expand active-state' : 'notExpand','" href="#">'; 
											echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $all)) ? 'rotate90' : 'rotate0','"></i>'; 
											echo '<i class="',(in_array(uri_string(), $all)) ? 'active ' : '','fa fa-cloud"></i>'; 
											echo '<span class="txt">Cloud Administration</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $all)) ? 'show' : '','">';
												echo '<li class="hasSub ',(in_array(uri_string(), $glossary)) ? 'highlight-menu' : '','">'; 
													echo '<a class="pl12 ', (in_array(uri_string(), $glossary)) ? 'expand active-state' : 'notExpand','" href="#">'; 
													echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $glossary)) ? 'rotate90' : 'rotate0','"></i>'; 
													echo '<span class="txt">Glossary of Terms</span></a>'; 
													echo '<ul class="sub ', (in_array(uri_string(), $glossary)) ? 'show' : '','">';
														echo '<li class="subsub"><a href="'.base_url('/glossary/create').'"> <span class="txt">Create new Term</span></a> </li>';															
														echo '<li class="subsub"><a href="'.base_url('/glossary/list').'"> <span class="txt">View Glossary of Terms</span></a> </li>';														
													echo '</ul>';
												echo '</li>';
												
												echo '<li class="hasSub ',(in_array(uri_string(), $evidence)) ? 'highlight-menu' : '','">'; 
													echo '<a class="pl12 ', (in_array(uri_string(), $evidence)) ? 'expand active-state' : 'notExpand','" href="#">'; 
													echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $evidence)) ? 'rotate90' : 'rotate0','"></i>'; 
													echo '<span class="txt">Evidentiary Examples</span></a>'; 
													echo '<ul class="sub ', (in_array(uri_string(), $evidence)) ? 'show' : '','">';
														echo '<li class="subsub"><a href="'.base_url('/ev/create').'"> <span class="txt">Create Example</span></a> </li>';															
														echo '<li class="subsub"><a href="'.base_url('/ev/list').'"> <span class="txt">View Examples</span></a> </li>';

													echo '</ul>';
												echo '</li>';	

												echo '<li class="hasSub ',(in_array(uri_string(), $scoring)) ? 'highlight-menu' : '','">'; 
													echo '<a class="pl12 ', (in_array(uri_string(), $scoring)) ? 'expand active-state' : 'notExpand','" href="#">'; 
													echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $scoring)) ? 'rotate90' : 'rotate0','"></i>'; 
													echo '<span class="txt">Scoring Criteria</span></a>'; 
													echo '<ul class="sub ', (in_array(uri_string(), $scoring)) ? 'show' : '','">';
														echo '<li class="subsub"><a href="'.base_url('/scoring/create').'"> <span class="txt">Create Scoring Criteria</span></a> </li>';															
														echo '<li class="subsub"><a href="'.base_url('/scoring/list').'"> <span class="txt">View Scoring Criteria</span></a> </li>';														
													echo '</ul>';
												echo '</li>';												
											echo '</ul>';
										echo '</li>';
										## END

}

										## START REVENUE AUTHORITY MENU
									if ( $UserRole == 600  || $UserRole == 700 ){
										$ra = array('ra/introduction','ra/pmq-1');
										echo '<li class="hasSub ',(in_array(uri_string(), $ra)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $ra)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $ra)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $ra)) ? 'active ' : '','fa fa-random"></i>'; 
										echo '<span class="txt">Complete PMQ</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $ra)) ? 'show' : '','">';
													echo '<li class="last"><a href="'.base_url('/ra/introduction').'"><span class="txt">Introduction</span></a></li>';
											echo '</ul></li>';
										## END
									}
									if ( $UserRole == 400 || $UserRole == 500 ){
										## START QUESTIONS POA
										$md = array('questions/introduction', 'questions/introduction', 'questions/introduction');
										echo '<li class="hasSub ',(in_array(uri_string(), $md)) ? 'highlight-menu' : '','">'; 
										echo '<a class="pl12 pr0 ', (in_array(uri_string(), $md)) ? 'expand active-state' : 'notExpand','" href="#">'; 
										echo '<i class="l-arrows-right sideNav-arrow ', (in_array(uri_string(), $md)) ? 'rotate90' : 'rotate0','"></i>'; 
										echo '<i class="',(in_array(uri_string(), $md)) ? 'active ' : '','fa fa-random"></i>'; 
										echo '<span class="txt">Complete POA</span></a>'; 
											echo '<ul class="sub ', (in_array(uri_string(), $md)) ? 'show' : '','">';
													echo '<li><a class="last" href="'.base_url('/questions/introduction').'"><span class="txt">Introduction</span></a></li>';
											echo '</ul></li>';
										## END										
												}
//*************************************  CHANGE BACK WHEN IN PRODUCTION  ******************************************************** 
 }
									?>
									</ul>
									
							</div>


							<!-- / side-nav 

							<div class="sidebar-panel">
									<h5 class="sidebar-panel-title">Mission Statistics</h5>
									<div class="sidebar-panel-content">
											<div class="sidebar-stat mb10">
													<p class="color-white mb5 mt5"><i class="fa fa-hdd-o mr5"></i> POA Completion <span class="pull-right small">30%</span></p>
													<div class="progress flat transparent progress-bar-xs">
															<div style="width: 30%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="30" role="progressbar" class="progress-bar progress-bar-white"></div>
													</div>
													<span class="dib s12 mt5 per100 text-center"></span> </div>
											<div class="sidebar-stat">
												<p class="color-white mb5 mt5"><i class="glyphicon glyphicon-transfer mr5"></i> Mission Completion <span class="pull-right small">78%</span></p>
												<div class="progress flat transparent progress-bar-xs">
														<div style="width: 78%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="78" role="progressbar" class="progress-bar progress-bar-white"></div>
												</div>
												<span class="dib s12 mb10 mt5 per100 text-center"></span> 
											</div>
									</div>
							</div>
							-->
					</div>
			</div>
	</aside>
