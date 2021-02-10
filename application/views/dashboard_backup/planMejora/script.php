<script type="text/javascript">
	$(document).ready(function(){
		let url = $("#url").val();
		$(".mes").change(function(evt){
			let label = evt.currentTarget.labels[0];
			//$(label).toggleClass("btn-primary");
			if(evt.currentTarget.checked){
				$(label).removeClass("btn-default");
				$(label).addClass("btn-primary");
			}else{
				$(label).removeClass("btn-primary");
				$(label).addClass("btn-default");
			}
		});

		function enviarPlandeMaejora(className, progressId){
			return function (evt){
				let self = this;
				let empresaId = $("#empresa-id").val();
	            let formData = new FormData();
	            formData.append("empresa_id", empresaId);
	            let enviarDatos = true;
				let data = [];
				$(className).each(function(index, obj){

					let idEvindencia = $(obj).val();
					
	                 if( $("#acciones-"+idEvindencia).val().trim().length == 0 || $("#resultados-"+idEvindencia).val().trim().length == 0 ||  $("#actores-"+idEvindencia).val().trim().length == 0){
	                    enviarDatos = false;
	                     $("#acciones-"+idEvindencia).parent().addClass("has-error");
	                     $("#resultados-"+idEvindencia).parent().addClass("has-error");
	                     $("#actores-"+idEvindencia).parent().addClass("has-error");
	                 }else{
	                    data.push({
	                    	'opcion_id': idEvindencia,
	                        'acciones': $("#acciones-"+idEvindencia).val(),
	                        'actores': $("#actores-"+idEvindencia).val(),
	                        'resultados': $("#resultados-"+idEvindencia).val(),
	                        'observaciones': $("#observaciones-"+idEvindencia).val(),
	                        'mes_1': $("#mes-1-"+idEvindencia)[0].checked,
	                        'mes_2': $("#mes-2-"+idEvindencia)[0].checked,
	                        'mes_3': $("#mes-3-"+idEvindencia)[0].checked,
	                        'mes_4': $("#mes-4-"+idEvindencia)[0].checked,
	                        'mes_5': $("#mes-5-"+idEvindencia)[0].checked,
	                        'mes_6': $("#mes-6-"+idEvindencia)[0].checked,
	                        'mes_7': $("#mes-7-"+idEvindencia)[0].checked,
	                        'mes_8': $("#mes-8-"+idEvindencia)[0].checked,
	                        'mes_9': $("#mes-9-"+idEvindencia)[0].checked,
	                        'mes_10': $("#mes-10-"+idEvindencia)[0].checked,
	                        'mes_11': $("#mes-11-"+idEvindencia)[0].checked,
	                        'mes_12': $("#mes-12-"+idEvindencia)[0].checked,
	                    });
	                }
				});
	                if(data.length > 0)
	                	formData.append("opcion_data", JSON.stringify(data));

		            if(enviarDatos){
		                $(self).hide();
		                $(progressId).show();
		                $.ajax({
		                    url: url+"plan-de-mejora/guardar",
		                    data: formData,
		                    type: "POST",
		                    success: function(data){
		                    console.log(data);
		                    $(progressId).hide({
		                         duration: 1000,
		                                complete:function(){
		                                    $(self).show();        
		                                }
		                            });
		                        },
		                        processData:false,
		                        contentType: false,
		                });
		            }
				}
		}

		
		
		$("#enviar-tab0-5").click(enviarPlandeMaejora(".sm", "#progress0-5"));
		$("#enviar-tab0-1").click(enviarPlandeMaejora(".cl", "#progress0-1"));
		$("#enviar-tab0-2").click(enviarPlandeMaejora(".cll", "#progress0-2"));
		$("#enviar-tab0-3").click(enviarPlandeMaejora(".ia", "#progress0-3"));
		$("#enviar-tab0-4").click(enviarPlandeMaejora(".is", "#progress0-4"));

		$("#enviar-tab1-1").click(enviarPlandeMaejora(".vec", "#progress1-1"));
		$("#enviar-tab1-2").click(enviarPlandeMaejora(".iap", "#progress1-2"));
		$("#enviar-tab1-3").click(enviarPlandeMaejora(".ecv", "#progress1-3"));
		$("#enviar-tab1-4").click(enviarPlandeMaejora(".vu", "#progress1-4"));
		$("#enviar-tab1-5").click(enviarPlandeMaejora(".ss", "#progress1-5"));
		$("#enviar-tab1-5").click(enviarPlandeMaejora(".rec", "#progress1-6"));
		$("#enviar-tab1-7").click(enviarPlandeMaejora(".ues", "#progress1-7"));
		$("#enviar-tab1-8").click(enviarPlandeMaejora(".rei", "#progress1-8"));
		$("#enviar-tab1-9").click(enviarPlandeMaejora(".reca", "#progress1-9"));
		$("#enviar-tab1-10").click(enviarPlandeMaejora(".rex", "#progress1-10"));
		$("#enviar-tab1-11").click(enviarPlandeMaejora(".cat", "#progress1-11"));
	});
</script>