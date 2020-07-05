/**
 * File : editJenisDok.js
 * 
 * File ini berisi validasi form pada ubah jenis dokumen
 * 
 * Menggunakan validasi plugin : jquery.validate.js
 * 
 * @author Pipit
 */

$(document).ready(function(){
	
	var editJenisDokForm = $("#editJenisDok");
	
	var validator = editJenisDokForm.validate({
		
		rules:{
			kodeDok : { required : true },
			nama : { required : true },
		},
		messages:{
			kodeDok :{ required : "Field ini diperlukan" },
			nama :{ required : "Field ini diperlukan" },
		}
		
	});
});
