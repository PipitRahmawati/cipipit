/**
 * File : editBioAdm.js
 * 
 * File ini berisi validasi form pada ubah Biodata Adminduk
 * 
 * Menggunakan validasi plugin : jquery.validate.js
 * 
 * @author Pipit
 */

$(document).ready(function(){
	
	var editBioAdmForm = $("#editBioAdm");

	var validator = editBioAdmForm.validate({
		
		rules:{
			nik : { required : true, digits : true },
			nama : { required : true },
			jk : { required : true },
			tempatlahir : { required : true },
			tgllahir : { required : true },
			noaktalhr : { required : true, digits : true },
			goldrh : { required : true },
			agama : { required : true },
			statkwn : { required : true },
			noaktakwn : { },
			tglkwn : { },
			noaktacrai : { },
			tglcrai : { },
			stathbkel : { required : true },
			pddkakh : { required : true },
			jnspkrjn : { },
			namaibu : { required : true },
			namaayah : { required : true },
			nokk : { required : true, digits : true },
		},
		messages:{			
			nik : { required : "Field ini diperlukan", digits : "Mohon untuk menginputkan hanya angka saja" },
			nama : { required : "Field ini diperlukan" },
			jk : { required : "Field ini diperlukan" },
			tempatlahir : { required : "Field ini diperlukan" },
			tgllahir : { required : "Field ini diperlukan" },
			noaktalhr : { required : "Field ini diperlukan", digits : "Mohon untuk menginputkan hanya angka saja" },
			goldrh : { required : "Field ini diperlukan" },
			agama : { required : "Field ini diperlukan" },
			statkwn : { required : "Field ini diperlukan" },
			noaktakwn : { },
			tglkwn : { },
			noaktacrai : { },
			tglcrai : { },
			stathbkel : { required : "Field ini diperlukan" },
			pddkakh : { required : "Field ini diperlukan" },
			jnspkrjn : { },
			namaibu : { required : "Field ini diperlukan" },
			namaayah : { required : "Field ini diperlukan" },
			nokk : { required : "Field ini diperlukan", digits : "Mohon untuk menginputkan hanya angka saja" },

		}
	});
	
});
