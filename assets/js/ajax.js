$(document).ready(function() {
	// Setup Ajax
	$.ajaxSetup({
		type: 'POST',																																																																						
		cache: false,
		contentType: false,
		processData: false
	});
	// To Validation If Got An Error
	function validasi(text_value) {
		return 	swal({
				  title: "Oops You're Got An Error !!!",
				  text: "The Field "+text_value+" Cannot Be Empty",
				  icon: "warning",
				  dangerMode: true,
				  button: "Continue Filling Out",
				});
	}

     // Form Users Add
	$("#create_post").on("submit", function(e) {
		e.preventDefault();
		var nama  = $("#title_add").val();
		var email = $("#article_add").val();
		var pict  = $("#gbr_add").val();
		if(nama == '') {
			validasi("Title");
		} else if(email == '') {
			validasi("Article");
		} else if(pict == '') {
			validasi("Picture");
		} else {
			$.ajax({
				url	: 'action/posts/insert_post.php',
				data: new FormData(this),
				success: function(message) {
					if(message == 'Success'){
						swal({
						  title: "Success",
						  text: "Congratulation Form Input Success",
						  icon: "success",
						  button: "Done",
						}).then( (ok) => {
							if(ok) {
								window.location.href = '?page=dashboard';
							}
						});
					} else {
						swal({
						  title: "Oops, You're Got An Error !!!",
						  text: "Please Check Your Form Again",
						  icon: "warning",
						  dangerMode: true,
						  button: "Check",
						});
					}
				}
			});
		}
	});

	// Form Users Update
	$("#update_post").on("submit", function(e) {
		e.preventDefault();
		var id  = $("#id_user").val();
		var nama  = $("#title_update").val();
		var email = $("#article_update").val();
		var pict  = $("#gbr_update").val();
		if(nama == '') {
			validasi("Title");
		} else if(email == '') {
			validasi("Article");
		} else if(pict == '') {
			validasi("Picture");
		} else {
			$.ajax({
				url	: 'action/posts/update_post.php',
				data: new FormData(this),
				success: function(message) {
					if(message == 'Success'){
						swal({
						  title: "Success",
						  text: "Congratulation Form Update Success",
						  icon: "success",
						  button: "Done",
						}).then( (ok) => {
							if(ok) {
								window.location.href = '?page=your_post&id='+id;
							}
						});
					} else {
						swal({
						  title: "Oops, You're Got An Error !!!",
						  text: "Please Check Your Form Again",
						  icon: "warning",
						  dangerMode: true,
						  button: "Check",
						});
					}
				}
			});
		}
	});

	// Form Book Delete
	$('#delete').click(function (e) {
		e.preventDefault();
        var data_id = $(this).data("id");
        var data_idUser = $(this).data("idUser");
		swal({
		  title: "Are you sure?",
		  text: "Delete Post",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    $.ajax({
				url	: 'action/posts/delete_post.php?id='+data_id,
				success: function(message) {
					if(message == 'Success'){
						swal({
						  title: "Success",
						  text: "Congratulation Delete Success",
						  icon: "success",
						  button: "Done",
						}).then((ok) => {
							if (ok) {
								window.location.href = '?page=dashboard';
							}
						});
					} else {
						swal({
						  title: "Oops, You're Got An Error !!!",
						  text: "Please Check Your Form Again",
						  icon: "warning",
						  dangerMode: true,
						  button: "Check",
						});
					}
				}
			});
		  } else {
		    swal("Your Data Not Be Deleted :)");
		  }
		});
	});
});