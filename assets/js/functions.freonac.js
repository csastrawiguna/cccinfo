$(function () {
	const baseUrl = jsVar.baseUrl;

	$("#tombolReset").on("click", function(){
		window.location.reload(false);
	});

	$("#tombolHitung").on("click", function(){
		if ($("#modelAC").val() == "") {
			Swal.fire('ERROR', 'Kolom Model harus diisi lengkap', 'error');
		} else {
			hitungTotalBiaya();
		}
	});

	$("#modelAC").on("change", function(){
		if ($("#modelAC").val() == "") {
			Swal.fire('ERROR', 'Kolom Model harus diisi lengkap', 'error');
		} else {
			hitungTotalBiaya();
		}
	});

	$("#hargaPart1").on("input", function(){
		hitungTotalBiaya();
	});

	$("#hargaPart2").on("input", function(){
		hitungTotalBiaya();
	});

	$("#hargaPart3").on("input", function(){
		hitungTotalBiaya();
	});

	function hitungTotalBiaya() {
		var model = $("#modelAC").val();
		$.ajax({
			url : baseUrl + 'cost/freonacByModel',
			data : {
				model : model
			},
			dataType : "json",
			method : "post",
			success : function(data) {
				if(data == null) {
					console.log(data);
					$("#typeAC").val("-");
					$("#capacityAC").val(0);
					$("#refrigerantAC").val(0);
					$("#maxVolumeReff").val(0);
					$("#pricePerGram").val(0);
					$("#maxRefrigerantPrice").val(0);
					$("#serviceFee").val(0);
					$("#totalCost").val(0);
					Swal.fire('ERROR', 'MODEL TIDAK SPESIFIK/TIDAK ADA/TIDAK LENGKAP', 'error');
				} else {
					$("#modelAC").val(data.model);
					$("#typeAC").val(data.type);
					$("#capacityAC").val(data.capacity);
					$("#refrigerantAC").val(data.refrigerant);
					$("#maxVolumeReff").val(data.max_refrigerant_volume);
					$("#pricePerGram").val(data.cost_per_gram);
					$("#maxRefrigerantPrice").val(parseInt(data.cost_per_gram) * parseInt(data.max_refrigerant_volume));
					$("#serviceFee").val(data.svc_cost);
					$("#totalCost").val(
						(parseInt(data.cost_per_gram) * parseInt(data.max_refrigerant_volume)) + 
						parseInt(data.svc_cost) +
						parseInt($("#hargaPart1").val()) + 
						parseInt($("#hargaPart2").val()) + 
						parseInt($("#hargaPart3").val()));
				}				
			}
		});
	}

	function Swalfire(title, text, icon) {
		Swal.fire({
			title: title,
			text: text,
			icon: icon,
		});
	}
	
});