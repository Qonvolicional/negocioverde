<script type="text/javascript">
  $(document).ready(function(evt){
  		let url = $("#url").val();
    	$("#enviar-tab1").click(function(evt){
            let self = this;
            $(this).hide();
            $("#progress1").show();

          
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];

            $(".cumplimiento-legal").each(function(index, obj){
                let idCumplimiento = obj.value;
             

                data.push({
                    opcion_id: idCumplimiento,
                    opcion_estado: $("#opcion-select-"+idCumplimiento).val(), 
                    opcion_descripcion:$("#opcion-obs-"+idCumplimiento).val()
                });
                
            });
            
            formData.append("opcion_data", JSON.stringify(data))
            $.ajax({
                    url: url+"verificacion-uno/guardar",
                    data: formData,
                    type: "POST",
                    success: function(data){
                        console.log(data);
                        $("#progress1").hide({
                            duration: 1000,
                            complete:function(){
                                $(self).show();        
                            }
                        });
                    },
                    processData:false,
                    contentType: false,
                });
    	});

    	$("#enviar-tab2").click(function(evt){
            let self = this;
            $(this).hide();
            $("#progress2").show();
    	    let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
    		let data = [];

            $(".condiciones-laborales").each(function(index, obj){
                let idCumplimiento = obj.value;
             

                data.push({
                    opcion_id: idCumplimiento,
                    opcion_estado: $("#opcion-select-"+idCumplimiento).val(), 
                    opcion_descripcion:$("#opcion-obs-"+idCumplimiento).val()
                });
                
            });
         
            formData.append("opcion_data", JSON.stringify(data))
            $.ajax({
                    url: url+"verificacion-uno/guardar",
                    data: formData,
                    type: "POST",
                    success: function(data){
                        $("#progress2").hide({
                            duration: 1000,
                            complete:function(){
                                $(self).show();        
                            }
                        });
                    },
                    processData:false,
                    contentType: false,
                });
    	});

        $("#enviar-tab3").click(function(evt){
            let self = this;
            $(this).hide();
            $("#progres3").show();
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];

            $(".impacto-ambiental").each(function(index, obj){
                let idCumplimiento = obj.value;
             

                data.push({
                    opcion_id: idCumplimiento,
                    opcion_estado: $("#opcion-select-"+idCumplimiento).val(), 
                    opcion_descripcion:$("#opcion-obs-"+idCumplimiento).val()
                });
                
            });
           
            formData.append("opcion_data", JSON.stringify(data))
            $.ajax({
                    url: url+"verificacion-uno/guardar",
                    data: formData,
                    type: "POST",
                    success: function(data){
                        $("#progress3").hide({
                            duration: 1000,
                            complete:function(){
                                $(self).show();        
                            }
                        });
                    },
                    processData:false,
                    contentType: false,
                });
        });

        $("#enviar-tab4").click(function(evt){
            let self = this;
            $(this).hide();
            $("#progres4").show();
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];

            $(".impacto-social").each(function(index, obj){
                let idCumplimiento = obj.value;
             
                console.log(idCumplimiento);
                data.push({
                    opcion_id: idCumplimiento,
                    opcion_estado: $("#opcion-select-"+idCumplimiento).val(), 
                    opcion_descripcion:$("#opcion-obs-"+idCumplimiento).val()
                });
                
            });
           
            formData.append("opcion_data", JSON.stringify(data))
            $.ajax({
                    url: url+"verificacion-uno/guardar",
                    data: formData,
                    type: "POST",
                    success: function(data){
                        $("#progress4").hide({
                            duration: 1000,
                            complete:function(){
                                $(self).show();        
                            }
                        });
                    },
                    processData:false,
                    contentType: false,
                });
        });


        $("#enviar-tab5").click(function(evt){
            let self = this;
            $(this).hide();
            $("#progress5").show();
            let empresaId = $("#empresa-id").val();
            let formData = new FormData();
            formData.append("empresa_id", empresaId);
            let data = [];

            $(".sustancia-material").each(function(index, obj){
                let idCumplimiento = obj.value;
             

                data.push({
                    opcion_id: idCumplimiento,
                    opcion_estado: $("#opcion-select-"+idCumplimiento).val(), 
                    opcion_descripcion:$("#opcion-obs-"+idCumplimiento).val()
                });
                
            });
          
            formData.append("opcion_data", JSON.stringify(data))
            $.ajax({
                    url: url+"verificacion-uno/guardar",
                    data: formData,
                    type: "POST",
                    success: function(data){
                        $("#progress5").hide({
                            duration: 1000,
                            complete:function(){
                                $(self).show();        
                            }
                        });
                    },
                    processData:false,
                    contentType: false,
                });
        });
  });
</script>