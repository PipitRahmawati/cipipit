/**
 * File : addRegLeg.js
 * 
 * File ini berisi validasi form pada tambah Register Legalisir
 * 
 * Menggunakan validasi plugin : jquery.validate.js
 * 
 * @author Pipit
 */

$(document).ready(function(){
	
	var addRegLegForm = $("#addRegLeg");
	
	var validator = addRegLegForm.validate({
		
		rules:{
			pejabatId : { required : true },
			jenisdokId : { required : true },
			tanggal : { required : true },
			no_dok : { required : true },
		},
		messages:{
			pejabatId :{ required : "Field ini diperlukan" },
			jenisdokId : { required : "Field ini diperlukan" },
			tanggal : { required : "Field ini diperlukan" },
			no_dok : { required : "Field ini diperlukan" },
		}
	});
});
