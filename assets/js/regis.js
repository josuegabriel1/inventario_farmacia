
function eMsg(params) {
	alert("Error: L" + params + "+");
}//end eMsg

//login
$(document).on('submit', '#form-login', function (event) {
	event.preventDefault();
	/* Act on the event */
	let un = $('#un').val();
	let up = $('#up').val();
	let tipo = $('#tipo').val();

	$.ajax({
		url: 'data/login_user.php',
		type: 'post',
		dataType: 'json',
		data: {
			un: un,
			up: up,
			tipo: tipo
		},
		success: function (data) {
			console.log(data);
			if (data.logged == true) {
				window.location = data.url;
			} else {
				alert(data.msg);
				$('#un').focus();
			}
		},
		error: function () {
			alert('Error: L17+');
		}
	});
});

//all item
function showAllItem() {
	$.ajax({
		url: 'data/all_item.php',
		success: function (data) {
			$('#all-item').html(data);
		},
		error: function () {
			alert('Error: L42+');
		}
	});
}//end showAllItem
showAllItem();


function showAllcitas() {
	$.ajax({
		url: 'data/all_item_citas.php',
		success: function (data) {
			$('#all-item_citas').html(data);
		},
		error: function () {
			alert('Error: L42+');
		}
	});
}//end showAllcitas
showAllcitas();

$('#add-new-item').click(function (event) {
	/* Act on the event */
	$('#modal-item').find('.modal-title').text('Agregar producto');
	$('#modal-item').modal('show');
	$('#submit-item').val('add');
});

$('#add-new-item2').click(function (event) {
	let codigo_cita = $('#codigo_cita').val();
	let codigo = $('#codigo').val();
	let nombre = $('#nombre').val();
	let fecha = $('#fecha').val();
	 hora = $('#hora').val();
	let telefono = $('#telefono').val();
	let motivo = $('#motivo').val();

	if ($('#add-new-item2').text() == "Agregar Citas") {

		if (fecha == "" || nombre == "" || telefono == "" || motivo == "" || hora == "") {
			alert("Debe de completar todos los campos")
		} else {
			$.ajax({
				url: 'data/agregar_cita.php',
				type: 'post',
				dataType: 'json',
				data: {
					codigo: codigo,
					nombre: nombre,
					fecha: fecha,
					telefono: telefono,
					motivo: motivo,
					hora: hora
				},
				success: function (data) {


				}
			});
			alert("Cita Registrada")
			$('#codigo').val("");
			$('#nombre').val("");
			$('#fecha').val("");
			$('#hora').val("");
			$('#telefono').val("");
			$('#motivo').val("");

		}
	} else {


		if (fecha == "" || nombre == "" || telefono == "" || motivo == "" || hora == "") {
			alert("Debe de completar todos los campos")
		} else {
			$.ajax({
				url: 'data/actualizar_cita.php',
				type: 'post',
				dataType: 'json',
				data: {
					codigo_cita: codigo_cita,
					codigo: codigo,
					nombre: nombre,
					fecha: fecha,
					telefono: telefono,
					motivo: motivo,
					hora: hora
				},
				success: function (data) {


				}
			});
			alert("Cita Actualizada")
			$('#codigo').val("");
			$('#nombre').val("");
			$('#fecha').val("");
			$('#telefono').val("");
			$('#motivo').val("");

		}
	}



});

$('#nombreeee').click(function (event) {
	/* Act on the event */
	$('#modal-item2').find('.modal-title').text('Agregar Cliente');
	$('#modal-item2').modal('show');
	$('#submit-item').val('add');
});

$(document).on('submit', '#form-item', function (event) {
	event.preventDefault();
	/* Act on the event */
	var iName = $('#item-name').val();
	var iPrice = $('#item-price').val();
	var iType = $('#item-type').val();
	var code = $('#code').val();
	var brand = $('#brand').val();
	var grams = $('#grams').val();
	if ($('#submit-item').val() == "add") {
		// console.log('add ra');
		$.ajax({
			url: 'data/add_item.php',
			type: 'post',
			dataType: 'json',
			data: {
				iName: iName,
				iPrice: iPrice,
				iType: iType,
				code: code,
				brand: brand,
				grams: grams
			},
			success: function (data) {
				console.log(data);
				if (data.valid == true) {
					$('#modal-message').find('#msg-body').text(data.msg);
					$('#modal-item').modal('hide');
					showAllItem();
					$('#modal-message').modal('show');
					$('#submit-item').val('null');
				}
			},
			error: function () {
				eMsg('70');
			}//
		});
	}//end if == "add"
});

$(document).on('submit', '#form-pacientes', function (event) {
	event.preventDefault();
	/* Act on the event */
	var fecha = $('#fecha').val();
	var num_expediente = $('#num_expediente').val();
	var direccion = $('#direccion').val();
	var responsable = $('#responsable').val();
	var antecedentes = $('#antecedentes').val();
	var fc = $('#fc').val();
	var spo2 = $('#spo2').val();
	var Peso = $('#Peso').val();
	var tratamiento = $('#tratamiento').val();
	var edad = $('#edad').val();
	var nombre = $('#nombre').val();
	var telefono = $('#telefono').val();
	var consulta = $('#consulta').val();
	var ta = $('#ta').val();
	var t = $('#t').val();
	var hgt = $('#hgt').val();
	var diagnostico = $('#diagnostico').val();


	//if($('#add-paciente').val() == "add"){
	// console.log('add ra');
	$.ajax({
		url: 'data/add_pacientes.php',
		type: 'post',
		dataType: 'json',
		data: {
			fecha: fecha,
			num_expediente: num_expediente,
			direccion: direccion,
			responsable: responsable,
			antecedentes: antecedentes,
			fc: fc,
			spo2: spo2,
			Peso: Peso,
			tratamiento: tratamiento,
			edad: edad,
			nombre: nombre,
			telefono: telefono,
			consulta: consulta,
			t: t,
			hgt: hgt,
			diagnostico: diagnostico,
			ta: ta

		},
		success: function (data) {
			console.log(data);
			if (data.valid == true) {
				$('#modal-message').find('#msg-body').text(data.msg);
				$('#modal-item').modal('hide');
				//showAllItem();
				$('#modal-message').modal('show');
				$('#submit-item').val('null');
			}
		},
		error: function () {
			eMsg('70');
		}//
	});
	//}//end if == "add"
});


function editModal(item_id) {
	// $('#submit-item').val('add');
	$.ajax({
		url: 'data/get_item.php',
		type: 'post',
		dataType: 'json',
		data: {
			item_id: item_id
		},
		success: function (data) {
			$('#submit-item').val(data.event);
			$('#item-name').val(data.name);
			$('#item-price').val(data.price);
			$('#item-id').val(data.id);
			$('#code').val(data.code);
			$('#brand').val(data.brand);
			$('#grams').val(data.grams);
			$('#item-type').val(data.type);
			$('#modal-item').find('.modal-title').text("Editar producto");
			$('#modal-item').modal('show');
		},
		error: function () {
			alert('Error: L56+');
		}
	});
}//end editModal

//save edit modal
$(document).on('submit', '#form-item', function (event) {
	event.preventDefault();
	/* Act on the event */
	var submit = $('#submit-item').val();
	var item_id = $('#item-id').val();

	var iName = $('#item-name').val();
	var iPrice = $('#item-price').val();
	var iType = $('#item-type').val();
	var code = $('#code').val();
	var brand = $('#brand').val();
	var grams = $('#grams').val();

	if (submit == "edit") {
		$.ajax({
			url: 'data/edit_item.php',
			type: 'post',
			dataType: 'json',
			data: {
				item_id: item_id,
				iName: iName,
				iPrice: iPrice,
				iType: iType,
				code: code,
				brand: brand,
				grams: grams
			},
			success: function (data) {
				// console.log(data);
				if (data.valid == true) {
					$('#modal-message').find('#msg-body').text(data.msg);
					$('#modal-item').modal('hide');
					showAllItem();
					$('#modal-message').modal('show');
				}
			},
			error: function () {
				eMsg('127');
			}
		});
	}//end submit
});

function showAllStockList() {
	$.ajax({
		url: 'data/all_stocklist.php',
		type: 'post',
		success: function (data) {
			$('#all-stocklist').html(data);
		},
		error: function () {
			eMsg('152');
		}
	});
}//end showAllStockList
showAllStockList();

// $('#del-stock').on('click', '.selector', function(event) {
// 	event.preventDefault();
// 	/* Act on the event */
// 	// $('input[type=checkbox]:checked').each(function(index) {
//  //        //where the magic begins wahaha. ge ahak.
//  // 		console.log($(this).val())
//  //    });
//  	console.log('sad');
// });
$('#del-stock').click(function (event) {
	/* Act on the event */
	var check = 0;
	$('input[type=checkbox]:checked').each(function (index) {
		check++;
	});
	if (check == 0) {
		//Alerta animada
		swal("¡Seleccione la fila que desea eliminar!", {
		});
	} else {
		$('#confirm-type').val('expired');
		$('#modal-confirmation').modal('show');
	}//end if check == 0
});

$('.del-expired').click(function (event) {
	/* Act on the event */
	if ($('#confirm-type').val() == "expired") {
		var finish = false;
		$('input[type=checkbox]:checked').each(function (index) {
			// console.log($(this).val());
			finish = true;
			var stock_id = $(this).val();
			$.ajax({
				url: 'data/del_expired.php',
				type: 'post',
				dataType: 'json',
				data: {
					stock_id: stock_id
				},
				success: function (data) {
					showAllStockList();
				},
				error: function () {
					eMsg('195');
				}
			});
		});
		if (finish == true) {
			$('#modal-confirmation').modal('hide');
			$('#modal-message').find('#msg-body').text('Eliminado correctamente!')
			$('#modal-message').modal('show');
		}//end finish

	}//end if
});

$('#add-stock').click(function (event) {
	/* Act on the event */
	// $("#item-id").val(" ");
	// $("#qty").val(" ");
	// $("#xDate").val(" ");
	// $("#manu").val(" ");
	// $("#purc").val(" ");
	$('#modal-stock').find('.modal-title').text('Nuevo stock');
	$('#modal-stock').modal('show');
	document.getElementById('item-id').value = ""
	document.getElementById('qty').value = ""
	document.getElementById('xDate').value = ""
	document.getElementById('manu').value = ""
	document.getElementById('purc').value = ""

	$("#boton_guardar").css("display", "inline");
	$("#boton_modificar").css("display", "none");
});

//form stock
var fuck = 0;
$(document).on('submit', '#form-stock', function (event) {
	event.preventDefault();
	/* Act on the event */
	var item_id = $('#item-id').val();
	var qty = $('#qty').val();
	var xDate = $('#xDate').val();
	var manu = $('#manu').val();
	var purc = $('#purc').val();
	var validarr = $('#validarr').val();
	fuck++;
	// alert(fuck);

	if (validarr == "modificar") {
		//alert(item_id);
		$.ajax({
			url: 'data/edit_fuck.php',
			type: 'post',
			// dataType: 'json',
			data: {
				item_id: item_id,
				qty: qty,
				xDate: xDate,
				manu: manu,
				purc: purc
			},
			success: function (data) {
				console.log(data);
				// console.log('stock');
				// if(data.valid == true){
				$('#modal-stock').modal('hide');
				showAllStockList();
				$('#modal-message').find('#msg-body').text(data.msg);
				$('#modal-message').modal('show');
				// }
			},
			error: function () {
				eMsg('233');
			}
		});
	} else {
		//alert("NOOO");
		$.ajax({
			url: 'data/add_fuck.php',
			type: 'post',
			// dataType: 'json',
			data: {
				item_id: item_id,
				qty: qty,
				xDate: xDate,
				manu: manu,
				purc: purc
			},
			success: function (data) {
				console.log(data);
				// console.log('stock');
				// if(data.valid == true){
				$('#modal-stock').modal('hide');
				showAllStockList();
				$('#modal-message').find('#msg-body').text(data.msg);
				$('#modal-message').modal('show');
				// }
			},
			error: function () {
				eMsg('233');
			}
		});
	}

});

//all expired
function showAllExpired() {
	$.ajax({
		url: 'data/all_expired.php',
		type: 'post',
		// data: {},
		success: function (data) {
			$('#all-expired').html(data);
		},
		error: function () {
			eMsg('260');
		}
	});
}//end showAllExpired
showAllExpired();

//all stock
function showAllStocks() {
	$.ajax({
		url: 'data/all_stock.php',
		type: 'post',
		success: function (data) {
			$('#all-stock').html(data);
		},
		error: function () {
			eMsg('275');
		}
	});
}//end showAllStocks
showAllStocks();

//all stock
function pacientes_lista() {
	$.ajax({
		url: 'data/pacientes_lista.php',
		type: 'post',
		success: function (data) {
			$('#pacientes_lista').html(data);
		},
		error: function () {
			eMsg('275');
		}
	});
}//end pacientes_lista
pacientes_lista();

//stock report print
$('#stock-report').click(function (event) {
	/* Act on the event */
	// window.open('print.php?datePick=<?php echo $datePick; ?>','name','width=auto,height=auto');
	window.open('data/print.php', 'name', 'width=auto,height=auto');
});

//stock report print
$('#imprimir_pacientes').click(function (event) {
	/* Act on the event */
	// window.open('print.php?datePick=<?php echo $datePick; ?>','name','width=auto,height=auto');
	window.open('data/imprimir_pacientes.php', 'name', 'width=auto,height=auto');
});

function showOrder() {
	$.ajax({
		url: 'data/order.php',
		type: 'post',
		success: function (data) {
			$('#order').html(data);
		},
		error: function () {
			eMsg('297');
		}
	});
}//end showOrder
showOrder();

//add to cart
function toCart(stock_id, qty, item_id) {
	$('#stock-id').val(stock_id);
	$('#item-id').val(item_id);
	$('#item-qty').val(qty);
	$('#modal-to-cart').modal('show');
}//end toCart

$(document).on('submit', '#form-toCart', function (event) {
	event.preventDefault();
	/* Act on the event */
	var stock_id = $('#stock-id').val();
	var item_id = $('#item-id').val();
	var qty = $('#item-qty').val();
	var cartQty = $('#cart-qty').val();//add to cart
	var newStockQty = qty - cartQty;
	if (newStockQty < 0) {
		alert('El artículo no es suficiente!');
	} else {
		// alert('Enough!');
		$.ajax({
			url: 'data/add_cart.php',
			type: 'post',
			data: {
				stock_id: stock_id,
				item_id: item_id,
				cqty: cartQty,
				nqty: newStockQty
			},
			success: function (data) {
				console.log(data);
				showOrder();
				$('#modal-to-cart').modal('hide');
			},
			error: function () {
				eMsg('331');
			}
		});
	}//end if !qty
});

//del from cart
function delCart(stock_id, qty, cart_id) {
	$.ajax({
		url: 'data/del_cart.php',
		type: 'post',
		data: {
			stock_id: stock_id,
			cart_id: cart_id,
			qty: qty
		},
		success: function (data) {
			console.log(data);
			showOrder();
		},
		error: function () {
			eMsg('354');
		}
	});
}//end delCart

//order form
$(document).on('submit', '#form-order', function (event) {
	event.preventDefault();
	/* Act on the event */
	var custName = $('#customer-name').val();
	var tender = $('#tendered').val();
	var totalOrder = $('#totalOrder').val();
	var change = tender - totalOrder;

	if (change < 0) {
		alert('Datos insuficientes!');
	} else {
		//good vibes
		$.ajax({
			url: 'data/add_transaction.php',
			type: 'post',
			// dataType: 'json',
			data: {
				custName: custName,
				tender: tender,
				totalOrder: totalOrder,
				change: change
			},
			success: function (data) {
				console.log(data);
			},
			error: function () {
				eMsg('385');
			}
		});
	}//end change < 0

});//form order


function confirm_cart() {
	$('#confirm-type').val('confirmCart');
	$('#modal-confirmation').modal('show');
}//end confirm_cart

$('#confirm-yes').click(function (event) {
	/* Act on the event */
	var choice = $('#confirm-type').val();
	if (choice == 'confirmCart') {
		$.ajax({
			url: 'data/confirm_order.php',
			type: 'post',
			dataType: 'json',
			data: {
				click: 'yes'
			},
			success: function (data) {
				// console.log(data);
				if (data.valid == true) {
					$('#confirm-type').val(' ');
					$('#modal-confirmation').modal('hide');
					showOrder();
					$('#modal-message').find('#msg-body').text(data.msg);
					$('#modal-message').modal('show');
				}
			},
			error: function () {
				eMsg(445);
			}
		});
	}
});


function showAllSales() {
	var date = $('#dailyDate').val();
	dailySales(date);
}//end showAllSales
showAllSales();

function dailySales(date) {
	$.ajax({
		url: 'data/all_sales.php?date=' + date,
		type: 'get',
		data: {
			date: date
		},
		success: function (data) {
			$('#all-sales').html(data);
		},
		error: function () {
			eMsg(474);
		}
	});
}


$(document).on('change', '#dailyDate', function (event) {
	event.preventDefault();
	/* Act on the event */
	var date = $('#dailyDate').val();
	if (date == '' || date == null) {
		$('#printBut').hide();
	} else {
		$('#printBut').show();
	}
	dailySales(date);

});

$('#printBut').click(function (event) {
	/* Act on the event */
	var date = $('#dailyDate').val();
	window.open('data/print-sales.php?date=' + date, 'name', 'width=600,height=400');
});
