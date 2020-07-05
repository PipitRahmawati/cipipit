/**
 * @author Pipit
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deletePejabat", function(){
		var pejabatId = $(this).data("pejabatid"),
			hitURL = baseURL + "deletePejabat",
			currentRow = $(this);

		console.log('pejabatId = '+pejabatId);

		var confirmation = confirm("Apakah anda yakin ingin menghapus pejabat ini ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { pejabatId : pejabatId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Pejabat Berhasil Dihapus !"); }
				else if(data.status = false) { alert("Pejabat Gagal Hapus"); }
				else { alert("Tidak diijinkan akses..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deleteJenisDok", function(){
		var jenisdokId = $(this).data("jenisdokid"),
			hitURL = baseURL + "deleteJenisDok",
			currentRow = $(this);

		console.log('jenisdokId = '+jenisdokId);

		var confirmation = confirm("Apakah anda yakin ingin menghapus jenis dokumen ini ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { jenisdokId : jenisdokId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Jenis Dokumen Berhasil Dihapus !"); }
				else if(data.status = false) { alert("Jenis Dokumen Gagal Hapus"); }
				else { alert("Tidak diijinkan akses..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deleteRegLeg", function(){
		var reglegId = $(this).data("reglegid"),
			hitURL = baseURL + "deleteRegLeg",
			currentRow = $(this);

		console.log('reglegId = '+reglegId);

		var confirmation = confirm("Apakah anda yakin ingin menghapus data register legalisir ini ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { reglegId : reglegId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Data Register Legalisir Berhasil Dihapus !"); }
				else if(data.status = false) { alert("Data Register Legalisir Gagal Hapus"); }
				else { alert("Tidak diijinkan akses..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deleteBioAdm", function(){
		var bioadmId = $(this).data("bioadmid"),
			hitURL = baseURL + "deleteBioAdm",
			currentRow = $(this);

		console.log('bioadmId = '+bioadmId);

		var confirmation = confirm("Apakah anda yakin ingin menghapus biodata adminduk ini ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { bioadmId : bioadmId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Biodata Adminduk Berhasil Dihapus !"); }
				else if(data.status = false) { alert("Biodata Adminduk Gagal Hapus"); }
				else { alert("Tidak diijinkan akses..!"); }
			});
		}
	});

	jQuery(document).on("click", ".searchList", function(){
		
	});
});
