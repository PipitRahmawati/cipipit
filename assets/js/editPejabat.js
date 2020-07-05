/**
 * File : editPejabat.js
 * 
 * File ini berisi validasi form pada ubah pejabat
 * 
 * Menggunakan validasi plugin : jquery.validate.js
 * 
 * @author Pipit
 */

$(document).ready(function(){
	
	var editPejabatForm = $("#editPejabat");
	
	var validator = editPejabatForm.validate({
		
		rules:{
			nip : { required : true, digits : true },
			nama : { required : true },
			jabatan : { required : true },
		},
		messages:{
			nip : { required : "Field ini diperlukan", digits : "Mohon untuk menginputkan hanya angka saja" },
			nama :{ required : "Field ini diperlukan" },
			jabatan :{ required : "Field ini diperlukan" },
		}
		
	});
});
