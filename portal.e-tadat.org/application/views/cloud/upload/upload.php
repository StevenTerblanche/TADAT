<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <form class="fileupload" action="/uploads/do_upload/" method="POST" enctype="multipart/form-data">
        <div class="row fileupload-buttonbar" style="margin-left:5px !important; padding-left:5px !important">
            <div class="col-lg-12 fileupload-progress fade">
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <div class="progress-extended" style="margin:auto !important; text-align:center !important"></div>
            </div>

            <div class="col-lg-12" style="margin-left:10px !important; padding-left:10px !important">
                <span class="btn fileinput-button dashboard-blue-panel">
                    <i class="fa fa-upload"></i>
                    <span>Click to add files...</span>
                    <input type="file" name="files[]" multiple>
					
                </span>
            </div>
        </div>        
		<table role="presentation" class="table table-striped">
			<tbody class="files"></tbody>
		</table>			
			<input type="hidden" name="fkidDimension" id="fkidDimension_id" value="" class="form-control">		
    </form>
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td style="width:300px !important">
			<input id="title" type="text" name="title[]" class="form-control zz" placeholder="Document Title">
        </td>
        <td style="width:300px !important">
			<input id="description" type="input" name="description[]" class="form-control" placeholder="Document Description">
			<input type="hidden" name="fkidUser" class="form-control" value="<?php echo $uFkidUser;?>">
			<input type="hidden" name="fkidMission" class="form-control" value="<?php echo $uFkidMission;?>">			
			<input type="hidden" name="fkidIndicator" class="form-control" value="<?php echo $uFkidIndicator;?>">

			<input type="hidden" name="uUploadType" class="form-control" value="1">			
        </td>
        <td style="vertical-align:middle !important;">
            {%
			var thisFile = file.name;
			if (thisFile.length > 20){thisFile = (thisFile.substring(0,20) + '.....')}
			%}
			{%=thisFile%}
        </td>
        <td style="width:250px !important; text-align:right !important;">
            {% if (!i && !o.options.autoUpload) { %}
                <button id="btn_upload" class="btn btn-primary start dashboard-green-panel" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start Upload</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel dashboard-red-panel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Remove</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td colspan="2" style="width:600px !important">
            {%
			var thisFile = file.name;
			if (thisFile.length > 70){thisFile = (thisFile.substring(0,70) + '.....')}
			%}
			<strong>File name: </strong>{%=thisFile||''%} ({%=o.formatFileSize(file.size)%})
		</td>
        <td align="right" colspan="2" style="width:250px !important; text-align:right !important;">
				            {% if (file.error) { %}
					<span style="text-align:right !important;" class="label label-danger">Error</span> {%=file.error%}
		            {% }else{ %}
		<strong>File status:</strong> File uploaded successfully.
		{% } %}
		</td>		
	    </tr>
{% } %}
</script>