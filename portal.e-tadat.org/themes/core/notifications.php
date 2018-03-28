<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	if ($this->session->flashdata('error') || validation_errors() || $this->session->flashdata('message') || $this->session->flashdata('persistent-message') || $this->session->flashdata('persistent-message-array')){
		echo '<div class="col-md-12" style="margin-top:100px">';
		echo '<div class="col-md-3"></div>';
		echo '<div class="col-md-6" style="margin-left:0px !important; margin-right:0px !important; padding-left:0px !important; padding-right:0px !important;">';
			if ($this->session->flashdata('error')){
				echo '<div class="panel panel-danger panelClose form-error alert_panel_closer_error">';
				echo '<div class="panel-heading tadat-danger"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'!</h4></div>';
				echo '<div class="panel-body">'.$this->session->flashdata('error').'</div>';
				echo '</div>';
			}elseif (validation_errors()){
				echo '<div class="panel panel-danger panelClose form-error alert_panel_closer_error">';
				echo '<div class="panel-heading tadat-danger"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_validation_error').lang('_occurred')).'!</h4></div>';
				echo '<div class="panel-body">'.validation_errors().'</div>';
				echo '</div>';
			}elseif ($this->session->flashdata('message')){
				echo '<div class="panel panel-success panelClose form-error alert_panel_closer">';
				echo '<div class="panel-heading tadat-success"><h4 class="panel-title"><i class="glyphicon glyphicon-ok-sign"></i>'.strtoupper(lang('action').lang('_successful')).'!</h4></div>';
				echo '<div class="panel-body">'.$this->session->flashdata('message').'</div>';
				echo '</div>';
			}elseif ($this->session->flashdata('persistent-message')){
				$persistent_message = $this->session->flashdata('persistent-message');
				echo '<div class="panel panel-success panelClose form-error alert_panel_persistent">';
				echo '<div class="panel-heading tadat-warning"><h4 class="panel-title"><i class="glyphicon glyphicon-exclamation-sign"></i>'.strtoupper($persistent_message['heading']).'!</h4></div>';
				echo '<div class="panel-body">'.$persistent_message['message'].'</div>';
				echo '</div>';
			}elseif ($this->session->flashdata('persistent-message-array')){
				$persistent_message_array = $this->session->flashdata('persistent-message-array');
				echo '<div class="panel panel-success panelClose form-error alert_panel_persistent">';
				echo '<div class="panel-body"><pre>';
				print_r(array_map("strip_tags", $persistent_message_array));
				echo '</pre></div>';				
				echo '</div>';
			}

		echo '</div>';
		echo '<div class="col-md-3"></div>';
		echo '</div>';
	}
?>
