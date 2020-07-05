/**
 * File : addJenisDok.js
 * 
 * File ini berisi validasi form pada tambah Jenis Dokumen
 * 
 * Menggunakan validasi plugin : jquery.validate.js
 * 
 * @author Pipit
 */

$(document).ready(function(){
	
	var addJenisDokForm = $("#addJenisDok");
	
	var validator = addJenisDokForm.validate({
		
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
