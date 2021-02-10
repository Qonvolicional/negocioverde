<script type="text/javascript">
	$(document).ready(function(){
		let url = $("#url").val();

        function envioDatos(evt){
            let self = this;
           
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".rex").each(function(index, obj) {
            
                let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                $(this).hide();
                $("#progress1-10").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress1-10").hide({
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

		$(".subir-evidencia").change(function(evt){
			let label = evt.target.labels[0];
			label.innerHTML +=": "+evt.target.files[0].name;
		});

		$("#enviar-tab1-1").click(function(evt){
			let self = this;
            
			let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".ve").each(function(index, obj) {
            	let idEvindencia = $(this).val();
                if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                }else{
                	data.push({
                		'opcion_id': idEvindencia,
                		'calificacion': $("#calificacion_"+idEvindencia).val(),
                		'observacion': $("#observacion_"+idEvindencia).val()
                	});

                	formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data))
            
            if( enviarDatos ){
                $(this).hide(); 
                $("#progress1-1").show();  
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                           $("#progress1-1").hide({
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
		});


        $("#enviar-tab1-2").click(function(evt){
            let self = this;
          
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".ia").each(function(index, obj) {
            
                let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                  $(this).hide();
                  $("#progress1-2").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                         
                           $("#progress1-2").hide({
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
        });

        $("#enviar-tab1-3").click(function(evt){
            let self = this;
          
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let   enviarDatos = true;
            $(".ec").each(function(index, obj) {
                let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length >0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                $(this).hide();
                $("#progress1-3").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                         
                           $("#progress1-3").hide({
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
        });

        $("#enviar-tab1-4").click(function(evt){
            let self = this;
            
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;

            $(".vu").each(function(index, obj) {
                
                let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data))
           
           if(enviarDatos){
            $(this).hide();
            $("#progress1-4").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress1-4").hide({
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
           
        });

        $("#enviar-tab1-5").click(function(evt){
            let self = this;
           
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".sm").each(function(index, obj) {
            
                let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });

            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data))
            if(enviarDatos){
                 $(this).hide();
                  $("#progress1-5").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress1-5").hide({
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
           
        });

        $("#enviar-tab1-6").click(function(evt){
            let self = this;
           
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".re").each(function(index, obj) {
            
                let idEvindencia = $(this).val();
                if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                 $(this).hide();
                $("#progress1-6").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress1-6").hide({
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
        });

        $("#enviar-tab1-7").click(function(evt){
            let self = this;
          
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".ue").each(function(index, obj) {
            
                let idEvindencia = $(this).val();
                  if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0 )
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                  $(this).hide();
            $("#progress1-7").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress1-7").hide({
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
           
        });

        $("#enviar-tab1-8").click(function(evt){
            let self = this;
           
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".ri").each(function(index, obj) {
                let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data))
            if( enviarDatos ){
                 $(this).hide();
            $("#progress1-8").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                           
                           $("#progress1-8").hide({
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
        });

        $("#enviar-tab1-9").click(function(evt){
            let self = this;
           
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos;
            $(".rc").each(function(index, obj) {
            
                 let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                 $(this).hide();
            $("#progress1-9").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress1-9").hide({
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
           
        });

        $("#enviar-tab1-10").click(function(evt){
            let self = this;
           
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".rex").each(function(index, obj) {
            
                let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                $(this).hide();
                $("#progress1-10").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress1-10").hide({
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
           
        });

        $("#enviar-tab1-11").click(function(evt){
            let self = this;
           
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos =true;
            $(".ca").each(function(index, obj) {
            
                 let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                 $(this).hide();
                $("#progress1-11").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress1-11").hide({
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
        });

        $("#enviar-tab2-2").click(function(evt){
            let self = this;
           
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".vex").each(function(index, obj) {
            
               let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                 $(this).hide();
                $("#progress2-2").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress2-2").hide({
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
           
        });

        $("#enviar-tab2-3").click(function(evt){
            let self = this;
          
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];
            let enviarDatos = true;
            $(".resp").each(function(index, obj) {
            
                let idEvindencia = $(this).val();
                 if( $("#calificacion_"+idEvindencia).val() == null ||  $("#observacion_"+idEvindencia).val() == null ){
                    enviarDatos = false;
                     $("#calificacion_"+idEvindencia).parent().addClass("has-error");
                     $("#observacion_"+idEvindencia).parent().addClass("has-error");
                 }else{
                    data.push({
                        'opcion_id': idEvindencia,
                        'calificacion': $("#calificacion_"+idEvindencia).val(),
                        'observacion': $("#observacion_"+idEvindencia).val()
                    });

                    formData.append('evidencia_'+idEvindencia, $("#evidencia_"+idEvindencia)[0].files[0]);
                }
            });
            if(data.length > 0)
                formData.append("opcion_data", JSON.stringify(data));

            if(enviarDatos){
                  $(this).hide();
                $("#progress2-3").show();
                $.ajax({
                        url: url+"verificacion-dos/guardar",
                        data: formData,
                        type: "POST",
                        success: function(data){
                            console.log(data);
                           $("#progress2-3").hide({
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
           
        });
	});
</script>