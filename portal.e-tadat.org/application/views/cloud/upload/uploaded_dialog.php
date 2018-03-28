                    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-center modal-lg" style="overflow:hidden !important">
                            <div class="modal-content" style="overflow:hidden !important">
                                <div class="modal-header tadat-info">
                                    <button type="button" class="close" data-dismiss="modal"><span class="white-text" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h5 class="modal-title white-text pl5" id="mySmallModalLabel">UPLOADED DOCUMENTS</h5>
                                </div>
                                <div class="modal-body" style="overflow:auto !important; height:450px !important">
								<?php 
									$result = _get_record_by_id_all_uploaded($this->session->userdata('mission_id'), '','', 2, 'EvidentiaryDocumentation', 'cloud_questions');
									function formatBytes($size, $precision = 2){
										$base = log($size, 1024);
										$suffixes = array('', 'KB', 'MB', 'GB', 'TB');   
										return round(pow(1024, $base - floor($base)), $precision) . ' '.$suffixes[floor($base)];
									}
									if($result){
										echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover non-responsive mb10" cellspacing="0" width="100%">';
											echo '<thead>';
												echo '<tr>';
													echo '<th>FILE&nbsp;NAME</th>';						
													echo '<th>DESCRIPTION</th>'; 
													echo '<th style="text-align:center !important; width:100px !important;">SIZE</th>';
													echo '<th style="text-align:center !important; width:100px !important;">TYPE</th>';
													echo '<th style="text-align:center !important; width:130px !important;">CREATED</th>';
													echo '<th style="text-align:center !important; width:130px !important;">ACTION</th>';
												echo '</tr>';
											echo '</thead>';
										echo '<tbody>';
											$arrImageTypes=array(
																	array('jpg', 'jpeg','type' => 'jpg'),
																	array('png','type' => 'png'),
																	array('gif', 'type' => 'gif'),
																	array('bmp','type' => 'bmp'),
																	array('powerpoint', 'presentation','type' => 'presentation'),
																	array('wordprocessingml','msword','type' => 'document'),
																	array('spreadsheetml','excel','type' => 'spreadsheet'),
																	array('plain','type' => 'text'),
																	array('csv','type' => 'csv'),
																	array('pdf','type' => 'pdf'),
																	array('zip','type' => 'zip'),
																	array('rar','type' => 'rar')
																);
										foreach($result as $row => $value){
											$strIconPath = base_url().'themes/core/img/icons/unknown.png';						
											$strFileType ='';
											$target = '';
											$needle = $value['documentType'];
											
											$stringtocheck = $value['documentType'];
											foreach($arrImageTypes as $item =>$items){	
												foreach($items as $key =>$keys){
													if(is_int($key) && strpos($needle, $keys) !== FALSE){
														$strFileType = $items['type'];
							
														if ($strFileType === 'text' || $strFileType === 'pdf'){
															$target = 'target="_blank"';
														}
														if ($strFileType === 'jpg' || $strFileType === 'png' || $strFileType === 'gif'|| $strFileType === 'bmp'){
															$strIconPath = base_url().'themes/core/img/icons/'.$strFileType.'.png';
															$dataGallery = 'data-gallery=""';
														}else{
															$strIconPath = base_url().'themes/core/img/icons/'.$strFileType.'.png';
															$dataGallery = '';				
														}
													}
												}
											}
											echo "<tr class='va'>";
												echo "<td class='va'>". $value['documentTitle'] . "</td>";
												echo "<td class='va'>". $value['documentDescription'] . "</td>";
//												echo "<td class='va center'>". formatBytes($value['documentSize']) . "</td>";
												echo "<td class='va center'>". $value['documentSize'] . "</td>";
												echo '<td class="va center"><img src="'. $strIconPath . '"></td>';
												echo "<td class='va center'>" . date("j F Y",strtotime($value['dateCreated'])). "</td>";
												echo '<td class="va center"><a '.$dataGallery.' href="'. base_url().$value['documentPath'] . '" '.$target.'>Click to View</a></td>';
												
											echo '</tr>';
										}
										echo '</tbody>';
										echo '</table>';
									}else{
										echo '<p><strong>There are currently no Evidentiary Documents uploaded.</strong></p>';
										echo '<p>Click on the "Upload Documents" button to upload supporting evidentiary documentation.</p>';			
									}
							
																
							?>
								 </div>
                                <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>

