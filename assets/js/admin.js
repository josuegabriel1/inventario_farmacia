//para iniciar sesión como administrador
$(document).on('submit', '#login-form', function(event) {
		event.preventDefault();
		/* Actuar sobre el evento */

		var un = $('input[id=un]');
		var pwd = $('input[id=pwd]');

		if(un.val() != "" && pwd.val() != ""){
			$.ajax({
					url: '../data/admin_login.php',
					type: 'post',
					dataType: 'json',
					data: {
						un: un.val(),
						pwd: pwd.val()
					},
					success: function (data) {
						if(data.valid == true){
							window.location = data.url;
						}else{
							alert(data.msg);
							$('#un').val("");
							$('#pwd').val("");
							$('#un').focus();
						}
					},
					errpr: function(){
						alert("System Error: L93+");
					}
				});
		}

	});

//formulario modal_student
$(document).on('submit', '#student-form', function(event) {
	event.preventDefault();
	/* Actuar sobre el evento */
	var validate = "";
	var form_student = new Array(
				$('input[id=stud_id]'),
				$('input[id=rf]'),
				$('input[id=fN]'),
				$('input[id=mN]'),
				$('input[id=lN]'),
				$('select[id=year]'),
				$('select[id=sect]')
	);
	var data = new Array(form_student.length);
	for(var i = 0; i < form_student.length; i++){
		// console.log(form_student[i].val());
		if(form_student[i].val().length == 0){
			//input have no data
			form_student[i].parent().parent().addClass('has-error');
		}else{
			//eliminar el color rojo con éxito
			form_student[i].parent().parent().removeClass('has-error');
			data[i] = form_student[i].val();
			validate += i;
		}

		if(validate == "0123456"){
			$.ajax({
					url: '../data/save_student.php',
					type: 'post',
					dataType: 'json',
					data: {
						data: JSON.stringify(data)
					},
					success: function (data) {
						// console.log(data);
						if(data.valid == true){
							$('#modal-message').find('.modal-body').text(data.result);
							$('#modal-student').modal('hide');
							showAllStudents();	
							$('#modal-message').modal('show');
						}else{
							alert(data.result + " Realmente existe!");
						}
					},
					error: function(){
						alert('System Error: L72+');
					}
				});
		}//finalizar validar

	}

});


//mostrar la tabla de los estudiantes
function showAllStudents()
{
	$.ajax({
			url: '../data/get_all_students.php',
			type: 'post',
			success: function (data) {
				$('#students-table').html(data);
			},
			error: function(){
				alert("Error: L101+");
			}
		});
}
showAllStudents();//Mostrar todos los estudiantes

//eliminar estudiante
var sid;
function removeStudent(stud_id){
	sid = stud_id;
	$('#modal-confirmation').modal('show');
	// $('#remove-stud-msg').find('h1').text('Confirmar Eliminación?!');
}//función final removeStudent

$('#confirm-remove-stud').click(function(event) {
	/* actuar sobre el evento*/
	// console.log(sid);//id na e remove
	$.ajax({
			url: '../data/remove_student.php',
			type: 'post',
			// dataType: 'json',
			data: {
				sid : sid
			},
			success: function (data) {
				// console.log(data);
				showAllStudents();//
				$('#modal-confirmation').modal('hide');
			},
			error: function(){
				alert('Error: L125+');
			}
		});
});


//abrir modo de actualización
function openEdit(stud_id)
{
	$('#modal-update-student').modal('show');

	//Obtener id val y llenarlo al modal
	$.ajax({
			url: '../data/get_student.php',
			type: 'post',
			dataType: 'json',
			data: {
				sid : stud_id	
			},
			success: function (data) {
				// console.log(data);
				$('#stud_id-upt').val(data.stud_id);
				$('#stud_id_num-upt').val(data.stud_id_num);
				$('#rf-upt').val(data.stud_rfid);
				$('#fN-upt').val(data.stud_fN);
				$('#mN-upt').val(data.stud_mN);
				$('#lN-upt').val(data.stud_lN);
				$('#year-upt').val(data.year_id);
				$('#sect-upt').val(data.section_id);
			},
			error: function(){
				alert('Error: L154+');
			}
		});

	

}

//obtener el valor upt modal
$(document).on('submit', '#form-update-student', function(event) {
	event.preventDefault();
	/* Actuar sobre el evento */
	var validate = "";
	var form_data = new Array(
			$('input[id=stud_id-upt]'),
			$('input[id=rf-upt]'),
			$('input[id=fN-upt]'),
			$('input[id=mN-upt]'),
			$('input[id=lN-upt]'),
			$('select[id=year-upt]'),
			$('select[id=sect-upt]'),
			$('input[id=stud_id_num-upt]')
		);
	var data = new Array(form_data.length);
	for(var i = 0; i < form_data.length; i ++){
		if(form_data[i].val().length == 0){
			form_data[i].parent().parent().addClass('has-error');
		}else{
			form_data[i].parent().parent().removeClass('has-error');
			validate += i;
			data[i] = form_data[i].val();
		}
	}

	if(validate == "01234567"){
			$.ajax({
					url: '../data/edit_student.php',
					type: 'post',
					dataType: 'json',
					data: {
						data : JSON.stringify(data)
					},
					success: function (data) {
						// console.log(data);
						if(data.data == true){
								//succ
							$('#modal-message').find('.modal-body').text("Student Save Successfully!");
							$('#modal-update-student').modal('hide');
							showAllStudents();
							$('#modal-message').modal('show');
						}else{
							alert(data.data);
						}
					},
					error: function(){
						alert('Error: L207+');
					}
				});
		}//finalizar validacion
});//finalizar enviar actualizar estudiante


//rellenar el modal de cambio de pase
$('#changepass-button').click(function(event) {
	/* Actuar sobre el evento */
	$.ajax({
			url: '../data/get_logged_user.php',
			type: 'post',
			dataType: 'json',
			success: function (data) {
				$('#change-username').val(data.user_un);
			},
			error: function(){
				alert('Error: L237+');
			}
		});
});

//cambio de contraseña
$(document).on('submit', '#form-changepassword', function(event) {
	event.preventDefault();
	/* Actuar sobre el evento */
	var validate = "";
	var form_data = new Array(
				$('input[id=change-username]'),
				$('input[id=change-password]'),
				$('input[id=confirm-password]')
		);
	var data = new Array(form_data.length);
	for(var i = 0; i < form_data.length; i++){
		if(form_data[i].val().length == 0){
			form_data[i].parent().parent().addClass('has-error');
		}else{
			form_data[i].parent().parent().removeClass('has-error');
			data[i] = form_data[i].val();
			validate += i;
		}
	}

	if(validate == "012"){
		if(data[1] == data[2]){
			// alert('¡Coincidencia de contraseña!');
			$.ajax({
					url: '../data/update_password.php',
					type: 'post',
					dataType: 'json',
					data: { data: JSON.stringify(data)},
					success: function (data) {
						// console.log(data);
						if(data.valid == true){
							$('#modal-changepass').modal('hide');
							$('#modal-message').find('.modal-body').text(data.msg);
							$('#modal-message').modal('show');
						}//datos finales.válidos
					},
					error: function(){
						alert('Error: L274+');
					}
				});
		}else{
			for(var i = 1; i < form_data.length; i++){
				form_data[i].parent().parent().addClass('has-error');
			}
			alert('Password Not Match!');
		}
	}//finalizar validacion

});//finalizar el cambio

// mostrar todas las elecciones
function showAllElection()
{
	$.ajax({
			url: '../data/get_all_election.php',
			type: 'post',
			data: { valid: "true"},
			success: function (data) {
			 	$('#elections-table').html(data);
			},
			error: function(){
				alert('Error: L304+');
			}
		});
}
showAllElection();
//Fin de mostrarTodas las elecciones

$(document).on('submit', '#form-party', function(event) {
	event.preventDefault();
	/* Actuar sobre el evento */
    var validate = "";
    var name = $('input[id=party-name]');
    if(name.val() == ""){
    	name.parent().parent().addClass('has-error');
    }else{
    	name.parent().parent().removeClass('has-error');
    	validate = "0";
    }

    if(validate == "0"){
    	$.ajax({
    			url: '../data/save_party.php',
    			type: 'post',
    			dataType: 'json',
    			data: { 
    				name: name.val()
    			},
    			success: function (data) {
    				// console.log(data);
    				if(data.valid == true){
    					$('#modal-message').find('.modal-body').text(data.msg);
    					$('#modal-party').modal('hide');
    					showAllParty();
    					$('#modal-message').modal('show');
    				}else{
    					$('#party-name').focus();
    					alert(data.msg);
    				}//
    			},
    			error: function(){
    				alert('Error: L340+');
    			}
    		});
    }//finalizar validacion
});	

//
function showAllParty()
{
	$.ajax({
			url: '../data/get_all_party.php',
			type: 'post',
			success: function (data) {
				$('#party-table').html(data);
			},
			error: function(){
				alert('Error: L368+');
			}//
		});
}//
showAllParty();
//end show all party

//confirm remove party
var pid;
function confirmDeleteParty(party_id){
	pid = party_id;
	$('#modal-confirmation').modal('show');
}
$('.confirm-party').click(function(event) {
	/* Actuar sobre el evento */
	$.ajax({
			url: '../data/delete_party.php',
			type: 'post',
			data: {
				pid : pid
			},
			success: function (data) {
				// console.log('wtf');
			$('#modal-message').find('.modal-body').text('Eliminado correctamente!');
				showAllParty();
			},
			error: function(){
				alert('Error: L386+');
			}
		});
});//finalizar confirmacion 



function getStud(id){
	$.ajax({
			url: '../data/get_student.php',
			type: 'post',
			dataType: 'json',
			data: {
				sid : id
			},
			success: function (data) {
				$('#modal-run').find('.modal-title').text(data.stud_fN+" "+data.stud_mN+" "+data.stud_lN);
			},
			error: function(){
				alert('Error: ');
			}
		});
}//finalizar getStud
var rid;
function run(stud_id)
{
	rid = stud_id;
	getStud(rid);
	$('#modal-run').modal('show');
}
//ejecutar función final

//formulario de ejecución modal
$(document).on('submit', '#form-run', function(event) {
	event.preventDefault();
	
	var validate = "";
	var form_data = new Array(
				$('select[id=pos]'),
				$('select[id=party]')
		);	
	var data = new Array((form_data.length)+1);
	for(var i = 0; i < form_data.length; i++){
		if(form_data[i].val().length == 0){
			form_data[i].parent().parent().addClass('has-error');
		}else{
			form_data[i].parent().parent().removeClass('has-error');
			validate += i;
			data[i] = form_data[i].val();
		}
	}
	
	data[i] = rid;

	if(validate == "01"){
		$.ajax({
						url: '../data/run.php',
						type: 'post',
						dataType: 'json',
						data: {
							data : JSON.stringify(data)
						},
						success: function (data) {
							// console.log(data);
							$('#modal-message').find('.modal-body').text(data.msg);
							$('#modal-run').modal('hide');
							$('#modal-message').modal('show');
							if(data.valid == true){
								showAllStudents();
							}
						},
						error: function(){
							alert('Error: L447+');
						}
					});		
	}

});


//formar elección
$(document).on('submit', '#form-election', function(event) {
	event.preventDefault();
	/* Actuar sobre el evento */
	var date = $('#elec-date').val();
	if(date == ""){
		alert('Seleccione la fecha de la elección!');
	}else{
		$.ajax({
				url: '../data/save_election.php',
				type: 'post',
				dataType: 'json',
				data: {
					date : date
				},
				success: function (data) {
					if(data.valid == false){
						alert(data.msg);
					}else{
						$('#modal-election').modal('hide');
						$('#modal-message').find('.modal-body').text(data.msg);
						showAllElection();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					alert('Error:  L481+');
				}
			});
	}
});



//confirmar mi eleccion
$('#end-election').click(function(event) {
	/* Actuar sobre el evento */
	$('#modal-confirmation').find('.modal-title').text('¿Seguro que quieres terminar la elección?');
	$('#modal-confirmation').modal('show');
});

//confirm end election
$('.confirm-election').click(function(event) {
	/* Act on the event */
	$.ajax({
			url: '../data/end_election.php',
			type: 'post',
			dataType: 'json',
			data: {
				data : true	
			},
			success: function (data) {
				if(data.valid == true){
					showAllElection();//actualizar tabla y estado
				}
				$('#modal-message').find('.modal-body').text(data.msg);
				$('#modal-message').modal('show');
			},
			error: function(){
				alert('Error: L517+');
			}
		});
});

function viewResult(elec_id){
	// console.log(elec_id);

	// for(var pos_id = 1; pos_id < 2; pos_id++){
		$.ajax({
			url: '../data/view_results.php',
			type: 'post',
			// dataType: 'json',
			data: {
				eid : elec_id,
			},
			success: function (data) {
				// console.log(data);
				$('#result').html(data);
				$('#modal-result').modal('show');
			},
			error: function(){
				alert('Error: L541+');
			}
		});	
	// }//end for

	
}//end viewResult

// view party
function viewParty(pid)
{
	// console.log(pid);
	$.ajax({
			url: '../data/get_party.php',
			type: 'post',
			// dataType: 'json',
			data: {
				pid : pid
			},
			success: function (data) {
				// console.log(data);
				$('#party-detail').html(data);
				$('#modal-party-detail').modal('show');
			},
			error: function(){
				alert('Error: L569+');
			}
		});
}