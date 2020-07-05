/**
 * File : editRegLeg.js
 * 
 * File ini berisi validasi form pada ubah register legalisir
 * 
 * Menggunakan validasi plugin : jquery.validate.js
 * 
 * @author Pipit
 */

$(document).ready(function(){
	
	var editRegLegForm = $("#editRegLeg");
	
	var validator = editRegLegForm.validate({
		
		rules:{
			pejabatId : { required : true },
			jenisdokId : { required : true },
			tanggal : { required : true },
			nik : { required : true },
		},
		messages:{
			pejabatId :{ required : "Field ini diperlukan" },
			jenisdokId : { required : "Field ini diperlukan" },
			tanggal : { required : "Field ini diperlukan" },
			nik : { required : "Field ini diperlukan" },
		}
		
	});
});
