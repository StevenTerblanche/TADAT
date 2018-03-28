<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<div class="par-heading-full-width-div"><h1>Tax Administration Organizational Chart</h1></div>
<div class="par-full-width-div"><img src="https://e-tadat.org/data/files/128/24/1/org-chart.jpg"></div>
<div style="margin:auto !important; padding-top:25px !important; width:600px !important; text-align:center !important"><button style="width:175px !important" type="button" id="id_back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>Back to Table of Contents</button></div>
<script type="text/javascript">
    document.getElementById("id_back_button").onclick = function () {
        location.href = "<? echo base_url('reporting/toc/?id=') . base64_encode($this->encrypt->encode($mission_id));?>";
    };
</script>
