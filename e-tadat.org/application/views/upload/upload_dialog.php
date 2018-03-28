				<div class="col-md-12 pl0 pr0 ml0 mr0">
					<!-- The blueimp Gallery widget -->
					<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
						<div class="slides"></div>
						<h3 class="title"></h3>
						<a class="prev">‹</a>
						<a class="next">›</a>
						<a class="close">×</a>
						<a class="play-pause"></a>
						<ol class="indicator"></ol>
					</div>
                    <div class="modal fade" id="modal-style2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-center modal-lg">
                            <div class="modal-content">
                                <div class="modal-header tadat-info">
                                    <button type="button" class="close" data-dismiss="modal"><span class="white-text" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h5 class="modal-title white-text pl5" id="mySmallModalLabel">DOCUMENT UPLOAD MANAGER</h5>
                                </div>
                                <div class="modal-body">
									<div class="tabs inside-panel" style="height:400px !important;max-height:400px !important; overflow-x: hidden;overflow-y: auto; padding:5px !important; margin:5px !important">
										<ul id="uploadTabs" class="nav nav-tabs">
											<li class="active"><a href="#upload" data-toggle="tab"><strong>UPLOAD</strong></a></li>
											<li class=""><a href="#notes" data-toggle="tab"><strong>UPLOAD NOTES</strong></a></li>
										</ul>
										<div id="uploadContent" class="tab-content" style="height:350px !important; margin-left:0px !important; padding-left:0px !important">
											<div id="upload" class="tab-pane fade active in text-muted" style="margin:0px !important; padding:0px !important">
												<?php
													$content_data['uFkidUser'] = $this->user->id;
													$content_data['uFkidMission'] = $this->session->userdata('mission_id');
													$content_data['uFkidIndicator'] = $this->session->userdata('indicator_id');
													echo $this->load->view('upload/upload', $content_data, true);
												?>
											</div>
											<div class="tab-pane fade text-muted" id="notes">
												<ul>
													<li>The maximum size per file is <strong>25 MB</strong>.</li>
													<li>The following file types are allowed: 
													<ul>
													<li><strong>Adobe Acrobat </strong>PDF</li>
													<li><strong>Microsoft Word </strong>DOC, DOCX, RTF.</li>
													<li><strong>Microsoft Excel </strong>XLS, XLSX</li>
													<li><strong>Microsoft PowerPoint </strong>PPT, PPTX, PPS, PPSX</li>
													<li><strong>Image Files </strong>JPG, GIF</li>
													<li><strong>Text Files </strong>TXT, CSV</li>
													
													</ul>
													</li>
													<li>You can <strong>drag &amp; drop</strong> files from your desktop onto this area.</li>
												</ul>
											</div>
										</div>
									</div>
								 </div>
                                <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>
