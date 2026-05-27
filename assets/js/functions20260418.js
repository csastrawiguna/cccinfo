const baseUrl = jsVar.baseUrl;

// copy to clipboard at Service Area Table
function copyToClipboard(teks) {
    // 1. Coba cara modern heula (HTTPS/Localhost)
	if (navigator.clipboard && window.isSecureContext) {
		navigator.clipboard.writeText(teks).then(() => {
			console.log("Berhasil nyalin (Modern API)");
		}).catch(err => {
			console.error("Gagal nyalin: ", err);
		});
	} 
	
	// 2. Cara darurat pikeun Firefox di HTTP biasa
	else {
		const textArea = document.createElement("textarea");
		textArea.value = teks;

		// Sangkan teu ngaganggu tampilan
		textArea.style.position = "fixed";
		textArea.style.left = "-9999px";
		textArea.style.top = "0";
		document.body.appendChild(textArea);
		textArea.focus();
		textArea.select();

		try {
			const sukses = document.execCommand('copy');
			if (sukses) {
				// alert("Teks geus disalin (via Fallback)!");
				toastr["info"](teks, "Copied");
				toastr.options = { "closeButton": false, "debug": false, "newestOnTop": false, "progressBar": false, "positionClass": "toast-top-right", "preventDuplicates": false, "onclick": null, "showDuration": "300", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut"}
			} else {
				alert("Duh, teu bisa nyalin euy!");
			}
		} catch (err) {
			console.error("Gagal pisan: ", err);
		}
	
		document.body.removeChild(textArea);
	}
}

// FUNCTIONS
$(function () {
	Chart.register(ChartDataLabels);	

	$(".preloader").fadeOut();

	// USER MANAGEMENT
	$("#buttonAddUser").on("click", function () {
		$("#listAllUserByJoinDate").hide();
		$("#formAddUser").fadeIn();
		$("#formAddUser div div h3").html("Add User");
		$("#user_id").removeAttr("readonly");
		$("#user_id").val("");
		$("#fullname").val("");
		$("#npk").val("");
		$("#birthdate").val("");
		$("#joindate").val("");
		$("#status").val("");
		$("#retiredate").val("");
		$("#emailAddress").val("");
		$("#emailPersonal").val("");
		$("#userMoodle").val("");
		$("#deptjobdesk").val("");
		$("#role_access").val("");
		$("#is_active").val("");
	});

	// form add user
	$("#buttonFormAddUser").on("click", function () {
		$("#formAddUser div div form").attr("method", "post");
	});

	// edit user
	$(".container-fluid").on("click", ".buttonEditUser", function () {
		$("#listAllUserByJoinDate").hide();
		$("#formAddUser").fadeIn();
		$("#formAddUser div div h3").html("Edit User");
		$("#formAddUser div div form").attr("method", "post");
		$("#formAddUser div div form").attr(
			"action",
			baseUrl + "usermanagement/editUserById"
		);
		const user_id = this.dataset.userid;

		$.ajax({
			url: baseUrl + "usermanagement/getUserById",
			data: {
				user_id: user_id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				//console.log(data);
				$("#user_id").attr("readonly", "");
				$("#user_id").val(data.user_id);
				$("#fullname").val(data.fullname);
				$("#npk").val(data.npk);
				$("#birthdate").val(data.birthdate);
				$("#joindate").val(data.joindate);
				$("#status").val(data.status);
				$("#retiredate").val(data.retiredate);
				$("#emailAddress").val(data.email_address);
				$("#emailPersonal").val(data.email_personal);
				$("#userMoodle").val(data.user_moodle);
				$("#deptjobdesk")
					.val(data.department + " - " + data.jobdesk)
					.prop("selected", true);
				$("#role_access").val(data.role_access);
				$("#is_active").val(data.is_active);
			},
		});
	});

	// delete user
	$(".container-fluid").on("click", ".btn-delete-user", function (e) {
		e.preventDefault();
		const id = this.dataset.id;
		const title = "Sure to delete this user?";
		const text = "You won't be able to revert user data!";
		Swal.fire({
			title: title,
			text: text,
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Delete",
		}).then((result) => {
			if (result.value) {
				window.location.href = baseUrl + "usermanagement/deleteUserById/" + id;
			}
		});
	});

	// DataTable User List	
	$("#tableUsermanagementUserlist").DataTable({
		"info": false
	});

	// tutup form
	$("#buttonCloseForm").on("click", function () {
		$("#formAddUser").fadeOut();
	});

	// SCHEDULE
	// Repair schedule list
	$("#tableScheduleRepair").DataTable();

	// delete schedule data
	$(".container-fluid").on("click", ".buttonScheduleRepairDelete", function (e) {
		e.preventDefault();
		var link = this.href;
		SwalConfirm('Hapus jadwal', 'Yakin hapus jadwal?', link, 'Hapus', 'warning');
	});

	// edit schedule repair
	$(".container-fluid").on("click", ".buttonScheduleRepairEdit", function (e) {
		e.preventDefault();
		const id = this.dataset.id;
		//console.log(id);
		$("#modalAddSingleSchedule .modal-dialog .modal-content form .modal-header .modal-title").html("Edit jadwal");
		$("#modalAddSingleSchedule .modal-dialog .modal-content form").attr("action", baseUrl + "schedule/updateScheduleRepair");
		$("#addSingleScheduleSubmit").html("Update");
		$.ajax({
			url: baseUrl + "schedule/scheduleRepairById",
			data: {
				"scheduleId": id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#addSingleScheduleId").val(data.id);
				$("#addSingleScheduleNotif").val(data.notif);
				$("#addSingleScheduleStatus").val(data.notif_status);
				$("#addSingleScheduleName").val(data.customer_name);
				$("#addSingleScheduleAddress").val(data.customer_address);
				$("#addSingleSchedulePhone").val(data.customer_phone);
				$("#addSingleScheduleModel").val(data.model);
				$("#addSingleScheduleDescription").val(data.description);
				$("#addSingleScheduleTechnician").val(data.technician);
				$("#addSingleScheduleSchedule").val(data.visit_schedule);
				$("#addSingleScheduleRemark").val(data.remark);
			}
		})
	});

	// MENU MANAGEMENT
	// dismiss menu access
	$(".container-fluid").on("click", ".buttonDismissMenuAccess", function () {
		var menuid = this.dataset.menuid;
		var roleaccess = this.dataset.roleaccess;
		var title = "Dismiss Access";
		var text = "Are you sure to dismis this menu access?";
		var confirmText = "Dismiss";
		var link = baseUrl + "accessmanagement/dismissMenuAccess/" + menuid + "/" + roleaccess;
		SwalConfirm(title, text, link, confirmText, "warning");
	});

	// Add menu access
	$("#menuAccessAdd").on("click", function () {
		const menusAssigned = $(".unassignedMenuAcces:checked");
		const menus = [];
		for (let i = 0; i < menusAssigned.length; i++) {
			const menu_id = menusAssigned[i].dataset.menuid;
			const role_access = $("#accessMenuSelectLevel").val();
			menus.push({
				menu_id: menu_id,
				role_access: role_access
			});
		}
		console.log(menus);
		$.ajax({
			url: baseUrl + "accessmanagement/addMenuAccess",
			data: { data: menus },
			method: "post",
			success: function (data) {
				//console.log(data);
				window.location.reload(false);
			},
		});
	});

	// toggle submenu access
	$(".container-fluid").on("click", ".submenuAccessCheckbox", function () {
		var submenuid = this.dataset.submenuid;
		var roleaccess = this.dataset.roleaccess;
		var checkAccess = this.checked;

		console.log(submenuid, roleaccess, checkAccess);
		$.ajax({
			url: baseUrl + "accessmanagement/toggleSubmenuAccess",
			data: {
				submenuid: submenuid,
				roleaccess: roleaccess,
				checkAccess: checkAccess
			},
			method: "post",
			success: function () {
				window.location.reload(false);
			}
		})
	});

	// empty form value on add single schedule repair
	$("#buttonAddSingleSchedule").on("click", function () {
		var d = new Date();
		var currDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
		$("#modalAddSingleSchedule .modal-dialog .modal-content form .modal-header .modal-title").html("Tambah jadwal manual");
		$("#addSingleScheduleNotif").val("");
		$("#addSingleScheduleStatus").val("");
		$("#addSingleScheduleName").val("");
		$("#addSingleScheduleAddress").val("");
		$("#addSingleSchedulePhone").val("");
		$("#addSingleScheduleModel").val("");
		$("#addSingleScheduleDescription").val("");
		$("#addSingleScheduleTechnician").val("");
		$("#addSingleScheduleSchedule").val(currDate);
		$("#addSingleScheduleRemark").val("");
		$("#addSingleScheduleSubmit").html("Save");
	});

	// AC INSTALL
	$(".container-fluid").on("click", ".buttonScheduleAcinstallDelete", function (e) {
		e.preventDefault();
		const link = this.href;
		SwalConfirm('Hapus jadwal install AC', 'Yakin hapus jadwal?', link, 'Hapus', 'warning');
	});

	// empty form value on add single schedule AC install
	$("#buttonAddSingleScheduleAcinstall").on("click", function () {
		$("#modalAddSingleScheduleAcinstall .modal-dialog .modal-content form .modal-header .modal-title").html("Tambah jadwal install AC manual");
		$("#addSingleScheduleAcinstallId").val("");
		$("#addSingleScheduleAcinstallContractor").val("");
		$("#addSingleScheduleAcinstallName").val("");
		$("#addSingleScheduleAcinstallAddress").val("");
		$("#addSingleScheduleAcinstallPhone").val("");
		$("#addSingleScheduleAcinstallModel").val("");
		$("#addSingleScheduleAcinstallPurchasement").val("");
		$("#addSingleScheduleAcinstallRemark").val("");
		$("#addSingleScheduleAcinstallSubmit").html("Save");
	});

	// edit single schedule AC install
	$(".container-fluid").on("click", ".buttonScheduleAcinstallEdit", function (e) {
		e.preventDefault();
		const id = this.dataset.id;
		$("#modalAddSingleScheduleAcinstall .modal-dialog .modal-content form").attr("action", baseUrl + "schedule/updateScheduleAcinstall");
		$.ajax({
			url: baseUrl + "schedule/scheduleAcinstallById",
			data: {
				scheduleId: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#modalAddSingleScheduleAcinstall .modal-dialog .modal-content form .modal-header .modal-title").html("Edit jadwal install AC");
				$("#addSingleScheduleAcinstallId").val(data.id);
				$("#addSingleScheduleAcinstallContractor").val(data.contractor_id);
				$("#addSingleScheduleAcinstallSpk").val(data.spk_letter);
				$("#addSingleScheduleAcinstallName").val(data.customer_name);
				$("#addSingleScheduleAcinstallAddress").val(data.customer_phone);
				$("#addSingleScheduleAcinstallPhone").val(data.customer_address);
				$("#addSingleScheduleAcinstallModel").val(data.model);
				$("#addSingleScheduleAcinstallPurchasement").val(data.purchasement);
				$("#addSingleScheduleAcinstallRemark").val(data.remark);
				$("#addSingleScheduleAcinstallSubmit").html("Update");
			}
		})
	});

	// PRICE LIST
	// DataTable for Price list
	$("#pricelistTablePricelist").DataTable();

	// DataTable for Dealer
	$("#pricelistTableDealer").DataTable();

	// ajax Edit Price list
	$(".container-fluid").on("click", ".buttonPricelistEdit", function (e) {
		e.preventDefault();
		const id = this.dataset.id;
		const period = this.dataset.period;
		const model = this.dataset.model;
		$("#modalAddSinglePricelist form").attr("action", baseUrl + "pricelist/updateData");
		$.ajax({
			url: baseUrl + "pricelist/getSingleData",
			data: {
				period: period,
				model: model
			},
			dataType: "json",
			method: "post",
			success: function (data) {
				$("#modalAddSinglePricelist .modal-title").val('Update Data Pricelist');
				$("#editPricelistId").val(data.id);
				$("#editPricelistPeriod").val(data.period);
				$("#editPricelistCategory").val(data.category);
				$("#editPricelistModel").val(data.model);
				$("#editPricelistSpecification").val(data.specification);
				$("#editPricelistDebut").val(data.debut);
				$("#editPricelistPrice").val(data.price);
				$("#editPricelistIsnla").val(data.is_nla);
				$("#editPricelistRemark").val(data.remark);
			}
		});
	})

	$("#buttonAddSinglePricelist").on("click", function (e) {
		$("#modalAddSinglePricelist modal-title").val('Tambah Data Pricelist');
		$("#modalAddSinglePricelist form").attr("action", baseUrl + "pricelist/addData");
		$("#editPricelistId").val("");
		$("#editPricelistPeriod").val("");
		$("#editPricelistCategory").val("");
		$("#editPricelistModel").val("");
		$("#editPricelistSpecification").val("");
		$("#editPricelistDebut").val("");
		$("#editPricelistPrice").val("");
		$("#editPricelistIsnla").val("");
		$("#editPricelistRemark").val("");
	});

	$(".container-fluid").on("click", ".buttonPricelistDelete", function (e) {
		e.preventDefault();
		const period = this.dataset.period;
		const model = this.dataset.model;
		var title = "Yakin hapus data?";
		var text = "Data tidak bisa di-recovery setelah dihapus";
		var link = baseUrl + "pricelist/deletePricelist/" + period + "/" + model;
		SwalConfirm(title, text, link, "Delete", "warning");
	});

	// TECHNICIAN
	// Datatable for Technician list
	//$("#technicianTableAllTechnician").DataTable();
	$("#technicianTableAllInactiveTechnician").DataTable();

	// Technician Datatable Server Side
	$('#technicianTableAllTechnician').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "order": [],
        "lengthMenu": [10, 25, 50, 100, 250, 500],
        "ajax": {
            //panggil method ajax list dengan ajax
            "url": baseUrl + 'technician/ajax_list',
            "type": "POST",
        }
    });

	// get service name by service type
	$("#formAddTechnicianSvctype").on("change", function () {
		var svcType = this.value;
		var target = $("#formAddTechnicianSvcbranch");
		selectServiceNameByType(svcType, target);
	});

	// select SVC name by type
	$("#technicianSelectServiceType").on("change", function(){
		var svcType = $(this).val();
		var target = $("#technicianSelectTechnicianByBranch");
		selectServiceNameByType(svcType, target);
	});

	// Edit Technician - get service name by service type
	$("#formEditTechnicianSvctype").on("change", function () {
		var svcType = this.value;
		var target = $("#formEditTechnicianSvcbranch");
		selectServiceNameByType(svcType, target);
	});

	function selectServiceNameByType(svcType, target) {
		$.ajax({
			url: baseUrl + "technician/servicenamebytype",
			data: {
				svcType: svcType
			},
			method: "post",
			success: function (data) {
				target.html('');
				target.append(data);
			}
		});
	}

	$("#buttonAddTechnician").on("click", function () {
		$("#formAddTechnicianModalLabel").html("Tambah Data PIC Service Center");
		$("#formAddTechnician").removeAttr("action");
		$("#formAddTechnicianSubmit").show();
		$("#formAddTechnicianUpdate").hide();
		$("#formAddTechnicianId").val('');
		$("#formAddTechnicianSvctype").val('');
		$("#formAddTechnicianSvcbranch").val('');
		$("#formAddTechnicianName").val('');
		$("#formAddTechnicianPhone1").val('');
		$("#formAddTechnicianPhone2").val('');
		$("#formAddTechnicianPhone3").val('');
		$("#formAddTechnicianPhone4").val('');
		$("#formAddTechnicianRemark").val('');
		// $("#formAddTechnicianStatus").parent().parent().hide();
	});

	// delete PIC
	$(".container-fluid").on("click", ".buttonTechnicianDelete", function (e) {
		e.preventDefault();
		const id = this.dataset.id;
		var title = "Yakin hapus data?";
		var text = "Data tidak bisa di-recovery setelah dihapus";
		var link = baseUrl + "technician/delete/" + id;
		SwalConfirm(title, text, link, "Delete", "warning");
	});

	$(".container-fluid").on("click", ".buttonTechnicianEdit", function (e) {
		e.preventDefault();
		$("#formAddTechnicianModalLabel").html("Edit Data PIC Service Center");
		$("#formAddTechnicianSubmit").hide();
		$("#formAddTechnicianUpdate").show();
		$("#formAddTechnician").attr("action", baseUrl + "technician/update");
		const id = this.dataset.id;
		$.ajax({
			url: baseUrl + "technician/technicianDetail",
			data: {
				technicianid: id
			},
			dataType: "json",
			method: "post",
			success: function (data) {
				console.log(data);
				// console.log($("#formAddTechnicianSvcbranch"));
				//$("#formAddTechnicianSvcbranch").append(data);
				var val_group = '<option value="' + data.svc_group + '" selected>' + data.svc_group + '</option>';
				$("#formAddTechnicianId").val(data.id);
				$("#formAddTechnicianSvctype").val(data.svc_type);
				$("#formAddTechnicianSvcbranch").html('');
				$("#formAddTechnicianSvcbranch").html(val_group);
				//$("#formAddTechnicianSvcbranch").prop('selected');
				$("#formAddTechnicianName").val(data.name);
				$("#formAddTechnicianPhone1").val(data.phone1);
				$("#formAddTechnicianPhone2").val(data.phone2);
				$("#formAddTechnicianPhone3").val(data.phone3);
				$("#formAddTechnicianPhone4").val(data.phone4);
				$("#formAddTechnicianRemark").val(data.remark);
				// $("#formAddTechnicianStatus").val(data.status);
				if (data.is_active == 1) {
					$("#formAddTechnicianIsactive").prop("checked", true);
				} else {
					$("#formAddTechnicianIsactive").prop("checked", false);
				}
				//$("#formAddTechnicianStatus").parent().parent().show();
			}
		});
	});

	// SPARE PART CODE
	$("#partcodeTabelAllPart").DataTable();

	// Dropdown add partcode part description
	$("#addPartcodeDescSource").on("change", function(){
		var val = $(this).val();
		$("#addPartcodeDesc").val(val);
		if (val != '') {
			$("#addPartcodeDesc").prop("readonly", true);
			$("#addPartcodeDesc").prop("autofocus", false);
		} else {
			$("#addPartcodeDescSource").prop("autofocus", false);
			$("#addPartcodeDesc").prop("readonly", false);
			$("#addPartcodeDesc").prop("autofocus", true);
		}
		$("#addPartcodeDesc").parent().parent().show();
	});

	// Dropdown edit partcode part description
	$("#editPartcodeDescSource").on("change", function(){
		var val = $(this).val();
		$("#editPartcodeDesc").val(val);
		if (val != '') {
			$("#editPartcodeDesc").prop("readonly", true);
			$("#editPartcodeDesc").prop("autofocus", false);
		} else {
			$("#editPartcodeDescSource").prop("autofocus", false);
			$("#editPartcodeDesc").prop("readonly", false);
			$("#editPartcodeDesc").prop("autofocus", true);
		}
		$("#editPartcodeDesc").parent().parent().show();
	});

	// confirm to Delete Part Code
	$("#buttonDeleteParCode").on("click", function(e){
		e.preventDefault();
		var link = this.href;
		var title = 'Yakin hapus kode part?';
		var text = 'Kode part yang dihapus tidak dapat dipulihkan';
		var confirmText = 'Delete';
		var icon = 'warning';
		SwalConfirm(title, text, link, confirmText, icon);
	});

	// SERVICE AREA
	// Datatable for Service are list
	$("#serviceareaTableAllServiceArea").DataTable();

	$(".container-fluid").on("click", ".buttonServiceareaDelete", function (e) {
		e.preventDefault();
		var link = this.href;
		var text = 'Setelah dihapus data tidak bisa di-recovery!';
		var title = 'Yakin hapus/delete data?';
		SwalConfirm(title, text, link, "Delete", "warning");
	});

	// DATATABLE SERVER SIDE
	$('#tableServiceAreaServerside thead tr.search-row th').each(function(index) {
	    var title = $(this).text();
	    // Daptar kolom nu TEU meunang aya form search
	    var excluded = ["#", "Provinsi", "Remark", "Area Servis", "..."];

	    if (title !== "" && !excluded.includes(title)) {
	        $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Cari ' + title + '" />');
	    } else {
	        $(this).html(''); // Kosongkeun mun asup daptar excluded
	    }
	});

	var table = $('#tableServiceAreaServerside').DataTable({
        "processing": true,
        "serverSide": true, // Aktifkeun Server-side
        "searchDelay": 800, // delay search after keyup
        "order": [], 
        "ajax": {
            "url": baseUrl + 'servicearea/get_data',
            "type": "POST" // Kudu POST pikeun server-side CI
        },
        // --- TAMBAHKEUN BAGIAN IEU ---
	    "columns": [
		    { "data": "0", "orderable": false }, // # (Nomer)
		    { "data": "1" },                     // Alamat
		    { 
		        "data": "2",                     // Kelurahan (Subdistrict)
		        "render": function(data, type, row) {
		            // Urang akses pake index: 2 (subdistrict), 3 (district), 4 (city)
		            let fullAddress = `Kel. ${row[2]} Kec. ${row[3]} ${row[4]}`;
		            return `<span>${data}</span> 
		                    <button type="button" class="btn btn-xs btn-outline-primary p-0 px-1 ml-1" 
		                    onclick="copyToClipboard('${fullAddress}')" title="Copy Alamat">
		                    <i class="fa fa-copy" style="font-size:10px;"></i></button>`;
		        }
		    },
		    { "data": "3" }, // Kecamatan
		    { "data": "4" }, // Kota/Kab
		    { "data": "5" }, // Provinsi
		    { 
		        "data": "6", // Kode Pos
		        "render": function(data, type, row) {
		            return `<span>${data}</span> 
		                    <button type="button" class="btn btn-xs btn-outline-secondary p-0 px-1 ml-1" 
		                    onclick="copyToClipboard('${data}')" title="Copy Kodepos">
		                    <i class="fa fa-copy" style="font-size:10px;"></i></button>`;
		        }
		    },
		    { "data": "7" }, // Area Servis
		    { "data": "8" }, // Remark
		    { "data": "9", "orderable": false } // Kolom "..." (Aksi)
		],
		"columnDefs": [
	        {
		        "targets": "_all", // lumaku pikeun kabeh kolom, atawa pilih nomer kolomna [0, 1, 2]
		        "render": function (data, type, row) {
		            // Mun data null, undefined, atawa string kosong, ganti ku strip
		            if (data === null || data === undefined || data === "" || data == null) {
		                return "-";
		            }
		            return data;
		        }
		    }
	    ]
    });

	// Jieun variabel global diluar keur nampung timer-na
	var searchTimer;

	table.columns().every(function(index) {
	    var that = this;
	    
	    // Pake event 'input' meh leuwih sensitif batan 'keyup'
	    $('input', $('#tableServiceAreaServerside thead tr.search-row th').eq(index)).on('input', function() {
	        var val = this.value;
	        
	        // Unggal user ngetik, reset timer nu keur jalan
	        clearTimeout(searchTimer);
	        
	        // Mimiti ngitung deui ti nol
	        searchTimer = setTimeout(function() {
	            // Mun geus 800ms cicing, kakara tembak AJAX
	            if (that.search() !== val) {
	                that.search(val).draw();
	            }
	        }, 800); 
	    });
	});

	// clear Filter
	$('#btnResetFilter').on('click', function() {
	    // 1. Kosongkeun fisik inputna
	    $('#tableServiceAreaServerside thead tr.search-row input').val('');

	    // 2. Bersihan filter per kolom sacara internal (ieu kuncina)
	    table.columns().search(''); 

	    // 3. Bersihan Global Search (anu pojok katuhu luhur)
	    table.search('');

	    // 4. Tarik deui data ti server (draw)
	    table.draw();

	    console.log("Filter geus bersih, data geus di-reset, Mang!");
	});

	// DATATABLE SERVER SIDE DB #2 (OLD)
	$('#tableServiceAreaServerside2 thead tr.search-row th').each(function() {
        var title = $(this).text();
        if (title !== "") {
            $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Cari ' + title + '" />');
        }
    });

	var table = $('#tableServiceAreaServerside2').DataTable({
        "processing": true,
        "serverSide": true, // Aktifkeun Server-side
        "searchDelay": 800, // delay search after keyup
        "order": [], 
        "ajax": {
            "url": baseUrl + 'servicearea/get_data_db2',
            "type": "POST" // Kudu POST pikeun server-side CI
        },
        // --- TAMBAHKEUN BAGIAN IEU ---
	    "columns": [
		    { "data": "0", "orderable": false }, // # (Nomer)
		    { "data": "1" },                     // Alamat
		    { 
		        "data": "2",                     // Kelurahan (Subdistrict)
		        "render": function(data, type, row) {
		            // Urang akses pake index: 2 (subdistrict), 3 (district), 4 (city)
		            let fullAddress = `Kel. ${row[2]} Kec. ${row[3]} ${row[4]}`;
		            return `<span>${data}</span> 
		                    <button type="button" class="btn btn-xs btn-outline-primary p-0 px-1 ml-1" 
		                    onclick="copyToClipboard('${fullAddress}')" title="Copy Alamat">
		                    <i class="fa fa-copy" style="font-size:10px;"></i></button>`;
		        }
		    },
		    { "data": "3" }, // Kecamatan
		    { "data": "4" }, // Kota/Kab
		    { "data": "5" }, // Provinsi
		    { 
		        "data": "6", // Kode Pos
		        "render": function(data, type, row) {
		            return `<span>${data}</span> 
		                    <button type="button" class="btn btn-xs btn-outline-secondary p-0 px-1 ml-1" 
		                    onclick="copyToClipboard('${data}')" title="Copy Kodepos">
		                    <i class="fa fa-copy" style="font-size:10px;"></i></button>`;
		        }
		    },
		    { "data": "7" }, // Area Servis
		    { "data": "8" }, // Remark
		    { "data": "9", "orderable": false } // Kolom "..." (Aksi)
		],
		"columnDefs": [
	        {
		        "targets": "_all", // lumaku pikeun kabeh kolom, atawa pilih nomer kolomna [0, 1, 2]
		        "render": function (data, type, row) {
		            // Mun data null, undefined, atawa string kosong, ganti ku strip
		            if (data === null || data === undefined || data === "" || data == null) {
		                return "-";
		            }
		            return data;
		        }
		    }
	    ]
    });

	// Jieun variabel global diluar keur nampung timer-na
	var searchTimer;

	table.columns().every(function(index) {
	    var that = this;
	    
	    // Pake event 'input' meh leuwih sensitif batan 'keyup'
	    $('input', $('#tableServiceAreaServerside2 thead tr.search-row th').eq(index)).on('input', function() {
	        var val = this.value;
	        
	        // Unggal user ngetik, reset timer nu keur jalan
	        clearTimeout(searchTimer);
	        
	        // Mimiti ngitung deui ti nol
	        searchTimer = setTimeout(function() {
	            // Mun geus 800ms cicing, kakara tembak AJAX
	            if (that.search() !== val) {
	                that.search(val).draw();
	            }
	        }, 800); 
	    });
	});

	// clear Filter
	$('#btnResetFilter2').on('click', function() {
	    // 1. Kosongkeun kabeh input dina kolom search (thead)
	    $('#tableServiceAreaServerside2 thead tr.search-row input').val('');

	    // 2. Kosongkeun Global Search bawaan DataTables
	    table.search('').columns().search('');

	    // 3. Re-draw tabel ti mimiti (page 1)
	    table.draw();
	    
	    // Opsional: Mere notif leutik atawa fokus deui ka input pertama
	    console.log("Filter geus dibersihan, Mang!");
	});		

	// BRANCHES
	// Datatable for Service are list
	$("#branchesTableAllBranches").DataTable({
		"lengthChange": false
	});
	$("#branchesTableAllBranchesSales").DataTable({
		"lengthChange": false
	});

	// Get Branch Detail (on Modal)
	$(".container-fluid").on("click", ".buttonDetailServiceCenter", function () {
		const id = this.dataset.id;
		$.ajax({
			url: baseUrl + "branch/getDetailServiceBranch",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				// console.table(data);
				$("#modalDetailServiceCenterTitle").html(checkSass(data));
				$("#modalDetailServiceCenterBranch").val(data.svc_name);
				$("#modalDetailServiceCenterAddress").html(data.address);
				$("#modalDetailServiceCenterPhone").val(data.phone1 + checkOthersData(data.phone2) + checkOthersData(data.phone3) + checkOthersData(data.phone4));
				$("#modalDetailServiceCenterPhoneext").val(data.phone_ext);
				$("#modalDetailServiceCenterHeadname").val(data.head_name);
				$("#modalDetailServiceCenterHeadphone").val(data.head_phone1 + checkOthersData(data.head_phone2) + checkOthersData(data.head_phone3) + checkOthersData(data.head_phone4));
				$("#modalDetailServiceCenterSapcode").val(data.sap_code);
				$("#modalDetailServiceCenterUnderbranch").val(data.under_branch);
				$("#modalDetailServiceCenterEmail").html(data.email);
			}
		})
	});

	// Edit service center
	$(".container-fluid").on("click", ".detailServiceCenterEdit", function () {
		const id = this.dataset.id;
		$.ajax({
			url: baseUrl + "branch/getDetailServiceBranch",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				// console.table(data);
				$("#modalDetailServiceCenterTitle").html(checkSass(data));
				$("#modalDetailServiceCenterBranch").val(data.svc_name);
				$("#modalDetailServiceCenterAddress").html(data.address);
				$("#modalDetailServiceCenterPhone").val(data.phone1 + checkOthersData(data.phone2) + checkOthersData(data.phone3) + checkOthersData(data.phone4));
				$("#modalDetailServiceCenterPhoneext").val(data.phone_ext);
				$("#modalDetailServiceCenterHeadname").val(data.head_name);
				$("#modalDetailServiceCenterHeadphone").val(data.head_phone1 + checkOthersData(data.head_phone2) + checkOthersData(data.head_phone3) + checkOthersData(data.head_phone4));
				$("#modalDetailServiceCenterSapcode").val(data.sap_code);
				$("#modalDetailServiceCenterUnderbranch").val(data.under_branch);
				$("#modalDetailServiceCenterEmail").html(data.email);
			}
		})
	});

	$("#addServiceType").on("change", function(){
		var val = $(this).val();
		// alert(val);
		if (val == 'SASS') {
			$("#addServiceNameGroup").parent().parent().fadeIn();
		} else {
			$("#addServiceNameGroup").val($("#addServiceName").val());
			$("#addServiceNameGroup").parent().parent().fadeOut(100);
		}
	});

	// COST
	// script hitung biaya isi Freon Reff direct cooling
	$("#gantiKompresorPilihReffDirectCooling").on("click", function () {
		$("#inputGantiKompresorJasa").val(244000);
		$("#inputGantiKompresorFreon").val(107800);
		$("#inputGantiKompresorTotal").val(hitungTotalGantiKompresor());
	});
	// script hitung biaya isi Freon Reff below 500 liters
	$("#gantiKompresorPilihReffNoFrostBelow500").on("click", function () {
		$("#inputGantiKompresorJasa").val(257000);
		$("#inputGantiKompresorFreon").val(107800);
		$("#inputGantiKompresorTotal").val(hitungTotalGantiKompresor());
	});
	// script hitung biaya isi Freon Reff 500 liters above
	$("#gantiKompresorPilihReffNoFrostMore500").on("click", function () {
		$("#inputGantiKompresorJasa").val(269000);
		$("#inputGantiKompresorFreon").val(269500);
		$("#inputGantiKompresorTotal").val(hitungTotalGantiKompresor());
	});

	$("#tableHitungGantiKompresor input").on("input", function () {
		$("#inputGantiKompresorTotal").val(hitungTotalGantiKompresor());
	});

	$("#gantiEvaporatorPilihReffDirectCooling").on("click", function () {
		$("#inputGantiEvaporatorJasa").val(244000);
		$("#inputGantiEvaporatorFreon").val(107800);
		$("#inputGantiEvaporatorTotal").val(hitungTotalGantiEvaporator());
	});
	$("#gantiEvaporatorPilihReffNoFrostBelow500").on("click", function () {
		$("#inputGantiEvaporatorJasa").val(257000);
		$("#inputGantiEvaporatorFreon").val(107800);
		$("#inputGantiEvaporatorTotal").val(hitungTotalGantiEvaporator());
	});
	$("#gantiEvaporatorPilihReffNoFrostMore500").on("click", function () {
		$("#inputGantiEvaporatorJasa").val(269000);
		$("#inputGantiEvaporatorFreon").val(269500);
		$("#inputGantiEvaporatorTotal").val(hitungTotalGantiEvaporator());
	});

	$("#tableHitungGantiEvaporator input").on("input", function () {
		$("#inputGantiEvaporatorTotal").val(hitungTotalGantiEvaporator());
	});

	$("#gantiKompresorEvaporatorPilihReffDirectCooling").on("click", function () {
		$("#inputGantiKompresorEvaporatorJasa").val(244000);
		$("#inputGantiKompresorEvaporatorFreon").val(107800);
		$("#inputGantiKompresorEvaporatorTotal").val(hitungTotalGantiKompresorEvaporator());
	});
	$("#gantiKompresorEvaporatorPilihReffNoFrostMore500").on("click", function () {
		$("#inputGantiKompresorEvaporatorJasa").val(257000);
		$("#inputGantiKompresorEvaporatorFreon").val(107800);
		$("#inputGantiKompresorEvaporatorTotal").val(hitungTotalGantiKompresorEvaporator());
	});
	$("#gantiKompresorEvaporatorPilihReffNoFrostBelow500").on("click", function () {
		$("#inputGantiKompresorEvaporatorJasa").val(269000);
		$("#inputGantiKompresorEvaporatorFreon").val(269500);
		$("#inputGantiKompresorEvaporatorTotal").val(hitungTotalGantiKompresorEvaporator());
	});

	$("#tableHitungGantiKompresorEvaporator input").on("input", function () {
		$("#inputGantiKompresorEvaporatorTotal").val(hitungTotalGantiKompresorEvaporator());
	});

	function hitungTotalGantiKompresor() {
		var total = parseInt($("#inputGantiKompresorJasa").val()) +
			parseInt($("#inputGantiKompresorFreon").val()) +
			parseInt($("#inputGantiKompresorKompresor").val()) +
			parseInt($("#inputGantiKompresorPipaIsi").val()) +
			parseInt($("#inputGantiKompresorDryer").val());
		return total;
	}

	function hitungTotalGantiEvaporator() {
		var total = parseInt($("#inputGantiEvaporatorJasa").val()) +
			parseInt($("#inputGantiEvaporatorFreon").val()) +
			parseInt($("#inputGantiEvaporatorEvaporator").val());
		return total;
	}

	function hitungTotalGantiKompresorEvaporator() {
		var total = parseInt($("#inputGantiKompresorEvaporatorJasa").val()) +
			parseInt($("#inputGantiKompresorEvaporatorFreon").val()) +
			parseInt($("#inputGantiKompresorEvaporatorEvaporator").val()) +
			parseInt($("#inputGantiKompresorEvaporatorKompresor").val()) +
			parseInt($("#inputGantiKompresorEvaporatorPipaIsi").val()) +
			parseInt($("#inputGantiKompresorEvaporatorDryer").val());
		return total;
	}

	// IKLAN & PROMO
	// DataTable Promo List
	$("#tablePromoList").DataTable({
		"info": false,
		//"searching": true,
		"lengthChange": false,
	});

	// Memo list
	$("#tableMemoList").DataTable();

	// Info General
	$("#tableInfoList1").DataTable();
	$("#tableInfoList2").DataTable();
	$("#tableInfoList3").DataTable();
	$("#tableInfoList4").DataTable();
	$("#tableInfoList5").DataTable();

	// confirm delete BO part
	$(".container-fluid").on("click", ".buttonDeleteBopart", function(e){
		e.preventDefault();
		var date = this.dataset.date;
		// var yrs = this.dataset.yrs;
		var id = this.dataset.id;

		var link = baseUrl + "promo/deleteBopartData/" + date + "/" + id;
		var title = 'Yakin hapus data?';
		var text = 'Setelah dihapus data tidak dapat dipulihkan';
		var confirmText = 'Delete';
		var icon = 'warning';

		SwalConfirm(title, text, link, confirmText, icon);
	});

	// COMPLAINT
	// Chart complaint daily transition
	// Complaint Summary Vue 3
	if ($('#complaintDailyTransitionChart').length > 0) {
		$('#complaintDailyTransitionChart').ready(function(){
			const ctx = document.getElementById("complaintDailyTransitionChart");
			var dataX = JSON.parse(document.getElementById("dailyComplaintContainer").innerHTML);

			new Chart(ctx, {
				type: 'line',
				data: {
					labels: dataX.date,
					datasets: [{
						data: dataX.complaint,
						borderWidth: 1,
						label : "complaint",
						backgroundColor : "yellow",
						borderColor : "brown",
						fill : false
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					},
					plugins: {
						title: {
			                display: true,
			                text: 'Transition of Daily Complaint',
			                color: 'orange'
			            },
			            legend: {
			            	display: false
			            },
			            xAxes: {
					        ticks: {
					          	fontSize: 8
					        }
					    },
					    scales: {
						    y: {
								border: {
									display: true
								}
							},
					    }
					}
				}
			});
		});
	}

	// DataTable Complaint List
	$("#tableComplaintList").DataTable({
		"autoWidth": false,
		"lengthChange": false,
	});

	// DataTables Complaint List - Server-side Processing
	var complaintListTable = $('#tableComplaintListServerside').DataTable({
		"autoWidth": false,
        "processing": true, // Nembokeun tulisan 'loading/processing'
        "serverSide": true, // Aktifkeun mode server-side
        "searchDelay": 400, // delay search after keyup
        "order": [],        // Order awal kosong (turutkeun tina model)
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "ajax": {
            "url": baseUrl + "complaint/get_complaint_list_ajax",
            "type": "POST",
            "data": function (d, res) {
                // Ngirim filter custom ka Controller liwat variabel 'd'
                d.startPeriod  = $('#complaintListFilterStartPeriod').val();
                d.endPeriod    = $('#complaintListFilterEndPeriod').val();
                d.regional     = $('#complaintListFilterRegional').val();
                d.under_branch = $('#complaintListFilterUnderBranch').val();
                d.status       = $('#complaintListFilterStatus').val();
                d.orderby      = $('#complaintListFilterOrderby').val();
                d.ordertype    = $('#complaintListFilterOrdertype').val();
                
                // Mun make CSRF CI3, buka komen di handap:
                d[jsVar.CSRF_NAME] = jsVar.CSRF_HASH;
            },
            "dataSrc": function(json) {
		        // Lamun make CSRF, hash-na kudu di-update unggal request 
		        // sangkan request saterusna (pagination/sorting) teu error 403
		        if(json.CSRF_HASH) {
		            CSRF_HASH = json.CSRF_HASH; 
		        }
		        return json.data;
		    }
        },
        "columns": [
		    { "orderable": false }, // No
		    { "orderable": true  }, // Info
		    { "orderable": true  }, // TAT
		    { "orderable": true  }, // Desc
		    { "orderable": true  }, // Customer
		    { "orderable": true  }, // Notif
		    { "orderable": true }, // Detail
		    { "orderable": true }, // Progress
		    { "orderable": true }, // PIC
		    { "orderable": true, "className": "text-center" }, // Status
		    { "orderable": true }  // Action
		],
        "columnDefs": [
            { "targets": [0, -1, -2], "orderable": false } // Kolom id, progress, & aksi teu bisa di-sort
        ],
        "drawCallback": function(settings) {
	    	// Set tanggal
	        let start = $('#complaintListFilterStartPeriod').val();
		    let end   = $('#complaintListFilterEndPeriod').val();
		    if (start && end) {
		        // Mun Start jeung End aya eusina
		        let rangeText = dateFormater(start) + " - " + dateFormater(end);
		        $('#complaintListTitleStartDate').text(rangeText);
		    } else if (start) {
		        // Mun ngan Start hungkul
		        $('#complaintListTitleStartDate').text(dateFormater(start));
		    }

	        var api = this.api();
	        var info = api.page.info();
	        
	        // Nampilkeun total ka elemen HTML (misalna id="total-data")
	        $('#containerInfoRecordTotal').html(info.recordsDisplay + ' keluhan');
	    },
    });

    // 2. Fungsi Tombol Filter
    $('#complaintListFilterSubmit').click(function() {
        complaintListTable.ajax.reload(); // Refresh data dumasar filter anyar
    });

    // 3. Fungsi Tombol Reset
    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset(); // Kosongkeun form
        complaintListTable.ajax.reload();        // Balikkeun data ka awal
    });

	// toggle show/hide filter
	$("#buttonToggleFilterRow").click(function (e) {
		e.preventDefault();
		$("#complaintFilterRow").fadeToggle(500);
	});

	// toggle hide filter
	$("#buttonCloseComplaintFilterPanel").click(function (e) {
		e.preventDefault();
		$("#complaintFilterRow").slideUp("fast");
	});

	// submit update Rootcause & countermeasure
	$("#complaintRootcauseSubmit").on("click", function(){
		var complaintId = $("#complaintRootcauseId").val();
		var rootcause = $("#complaintRootcause").val();
		var countermeasure = $("#complaintCountermeasure").val();

		$.ajax({
			url: baseUrl + "complaint/updateRootcause",
			data: {
				id : complaintId,
				rootcause : rootcause,
				countermeasure : countermeasure
			},
			dataType: "json",
			method: "post",
			success: function(data) {
				SwalConfirmReload('Berhasil', 'Root Cause & Countermeasure sudah update', 'OK', 'success'); 
			}
		});
	});

	// input complaint select service branch
	$("#complaintInputPicReport1Type").on("change", function () {
		var serviceType = $(this).val();
		var target = $("#complaintInputPicReport1");
		var nameid = 'complaintInputPicReport1';
		getServiceByType(serviceType, target, 'complaintInputPicReport1');
	});

	$("#complaintInputPicReport2Type").on("change", function () {
		var serviceType = $(this).val();
		var target = $("#complaintInputPicReport2");
		var nameid = 'complaintInputPicReport2';
		getServiceByType(serviceType, target, 'complaintInputPicReport2');
	});

	$("#complaintInputPicReport1").on("change", function () {
		//var serviceBranch = $(this).val();
		if ($(this).val() == 'Part Center' || $(this).val() == 'Others') {
			$("#complaintInputPartRegionalArea").html('');
			$("#complaintInputPartRegionalArea").append('<option value="" selected></option>');
		} else {
			getServiceUnderBranch($(this).val());
			getServiceRegional($(this).val());
		}
	});
	// input complaint status by complaint category
	$("#complaintInputClaimDescription").on("change", function() {
		var complaintDesc = $("#complaintInputClaimDescription").val().toLowerCase();
		let stts;
		let txt;
		switch (complaintDesc) {
			case 'substitution process' :
				stts = 41;
				txt = '41 - Apv substitusi/buyback on progress';
				break
			case 'waiting part' :
				stts = 30;
				txt = '30 - Part di HQ kosong';
				break
			case 'sass overdue/overlimit' :
				stts = 23;
				txt = '23 - SASS overdue/overlimit';
				break
			case 'sass overdue/overlimit' :
				stts = 23;
				txt = '23 - SASS overdue/overlimit';
				break
			case 'late visit' :
				stts = 20;
				txt = '20 - Tunggu kunjungan teknisi';
				break
			default :
				stts = 21;
				txt = '21 - Unit dalam perbaikan';
		}
		$('#complaintInputClaimStatus option[value="' + stts + '"').prop('selected', true).trigger('change');
	});


	$("#complaintListFilterRegional").on("click", function () {
		var regional = $(this).val();
		$.ajax({
			url: baseUrl + 'complaint/branchListByRegional',
			data: { regional: regional },
			method: "post",
			dataType: "html",
			success: function (data) {
				$("#complaintListFilterUnderBranch").html('');
				$("#complaintListFilterUnderBranch").append(data);
			}
		});
	});

	//Select2Js
	$(".js-example-basic-single").select2({
		theme: 'bootstrap4',
	});

	$(".js-example-tags").select2({
		theme: 'bootstrap4',
		tags: true,
		placeholder: 'Pilih atau input baru'
	});

	// general style for Datatable
	$(".tableDatatableFullOption").DataTable();

	// summary dbclick to detailed list
	$(".linktoDetail").on("dblclick", function(){
		var formToLink = $("#formToLink");
		$("#linktoDetailCategory").val(this.dataset.category);
		$("#linktoDetailStartperiod").val(this.dataset.start);
		$("#linktoDetailEndperiod").val(this.dataset.end);

		Swal.fire({
			title: 'View detail/PIC',
			text: 'Akan menampilkan detail PIC/keluhan',
			icon: "info",
			showCancelButton: true,
			confirmButtonColor: "#007BFF",
			cancelButtonColor: "#DC3545",
			confirmButtonText: 'Tampilkan',
		}).then((result) => {
			if (result.value) {
				$("#formToLink").submit();
			}
		});
	});


	// get under branch by regional
	$("#complaintInputPicReport2").on("change", function () {
		getServiceUnderBranch($(this).val());
		getServiceRegional($(this).val());
	});

	$("#complaintInputPicReport1").on("change", function () {
		getServiceUnderBranch($(this).val());
		getServiceRegional($(this).val());
	});

	// edit Complaint Progress
	$(".buttonEditProgressComplaint").on("click", function (e) {
		e.preventDefault();
		var progressId = this.dataset.id;
		$.ajax({
			url: baseUrl + "complaint/getProgress",
			data: { id: progressId },
			method: "post",
			dataType: "json",
			success: function (data) {
				// console.log($("#editComplaintUpdateProgress"));
				$("#editComplaintUpdateId").val(data.id);
				$("#editComplaintUpdateProgress").html(data.progress_update);
			}
		});
	});

	// delete complaint progress
	$(".buttonDeleteProgressComplaint").on("click", function (e) {
		e.preventDefault();
		var progressId = this.dataset.id;
		var link = baseUrl + "complaint/deleteProgress/" + progressId;
		var title = 'Yakin hapus Progress?';
		var text = 'Data progress yang dihapus tidak dapat dikembalikan';
		var confirmText = 'Delete';
		var icon = 'warning';

		SwalConfirm(title, text, link, confirmText, icon);
	});

	// export to Excel from filtered list
	$("#complaintListExportExcel").on("click", function (e) {
		e.preventDefault();
		complaintListToExcel();
	});

	// export to Excel from filtered list (download button)
	$("#complaintListExportExcelFilter").on("click", function () {
		complaintListToExcel();
	});

	// show all Outstanding complaint
	$("#buttonShowAllOutstanding").on("click", function (e) {
		e.preventDefault();
		outstandingComplaintSubmit();
	});
	
	// export to Excel all outstanding
	$("#complaintListExportExcelOutstanding").on("click", function () {
		var beforeDate = $("#complaintListFilterStartPeriod").val();
		$("#complaintListFilterStatus").val('In progress & new');
		$.ajax({
			url : baseUrl + 'complaint/latestoutstandingdate',
			dataType : 'json',
			success : function(data) {
				$("#complaintListFilterStartPeriod").val(data);
				// $("#complaintListTitleStartDate").html(dateFormater(data));
				complaintListToExcel();
				$("#complaintListFilterStartPeriod").val(beforeDate);
			}
		});
	});

	function outstandingComplaintSubmit() {
		$.ajax({
			url : baseUrl + 'complaint/latestoutstandingdate',
			dataType : 'json',
			success : function(data) {
				$("#complaintListFilterStartPeriod").val(data);
				$("#complaintListFilterStatus").val("In progress & new");
				complaintListFilterSubmit();
			}
		});
	}

	// function export complaint list to Excel
	function complaintListToExcel() {
		// 1. Identifikasi form-na (make ID ambeh leuwih spesifik)
	    let form = $("#complaintListFilterForm"); // Ganti ku ID form filter maneh mun beda
	    
	    // 2. Set action URL na
	    let exportUrl = baseUrl + "complaint/listToExcel";
	    form.attr("action", exportUrl);
	    form.attr("method", "POST"); // Pastikeun make POST ambeh aman mawa data loba
	    
	    // 3. Submit
	    form.submit();
	    
	    // 4. (Opsional) Balikeun deui action-na ka kosong bisi rek dipake filter biasa deui
	    form.attr("action", "javascript:void(0);");
	}

	function complaintListFilterSubmit() {
		$("#complaintFilterRow div form").removeAttr("action");
		$("#complaintFilterRow div form").submit();
	}

	$("#complaintListFilterSubmit").on("click", function () {
		// complaintListFilterSubmit();
		// $("#complaintFilterRow div form").removeAttr("action");
		// $("#complaintFilterRow div form").submit();
	});

	// delete complaint by list
	$(".container-fluid").on("click", ".buttonComplaintDelete", function (e) {
		e.preventDefault();
		var link = this.href;
		var text = 'Setelah dihapus data tidak bisa di-recovery!';
		var title = 'Yakin hapus/delete data?';
		SwalConfirm(title, text, link, "Delete", "warning");
	});

	// Dismiss/reject request close
	$(".container-fluid").on("click", ".buttonRejectRequestClose", function (e) {
		e.preventDefault();
		var link = this.href;
		var text = 'Setelah di-reject, masih dapat diajukan Close';
		var title = 'Yakin tolak request?';
		SwalConfirm(title, text, link, "Reject", "warning");
	});

	// toggle Propose Close
	$("#complaintProposeCloseStatus").on("click", function () {
		var complaintId = this.dataset.complaintid;
		var proposeStatus = this.checked;
		$.ajax({
			url: baseUrl + "complaint/proposeClose",
			data: {
				complaintId: complaintId,
				proposeStatus: proposeStatus,
			},
			method: "post",
			success: function (data) {
				location.reload(false);
				console.log(data);
			}
		});
	});

	$("#tableComplaintRequestClose").DataTable({
		"info": true
	});

	$('#add-more-part').click(function() {
        let newRow = `
            <div class="form-row align-items-center pb-3">
            	<div class="form-group col-md-5 mb-0">
	                <label class="small font-weight-bold">Tipe Part</label>
	                <input type="text" name="part_type[]" class="form-control" placeholder="Contoh: Kompresor" required>
	            </div>
	            
	            <div class="form-group col-md-5 mb-0">
	                <label class="small font-weight-bold">Kode Part</label>
	                <input type="text" name="part_code[]" class="form-control" placeholder="Contoh: FCMPLA-xxx" required>
	            </div>
	            
	            <div class="form-group col-md-2 mb-0 pt-4">
	            	<div class="pretty p-icon p-curve p-smooth p-bigger">
	                    <input type="hidden" name="part_isready[]" class="isready-value" value="0">
	                    <input type="checkbox" class="isready-check" checked />
	                    <div class="state p-info">
	                        <i class="icon fas fa-check"></i>
	                        <label class="text-dark">Ready di HQ</label>
	                    </div>
	                </div>
        		</div>
        	</div>`;
        $('#part-container').append(newRow);
    });

    // Fungsi ngahapus baris nu anyar dijieun
    $(document).on('click', '.btn-remove-row', function() {
        $(this).closest('.part-row').remove();
    });

    // Submit via AJAX
    $('#formAddPart').on('submit', function(e) {
        e.preventDefault();

	    // Loop unggal baris part-row
	    $('.part-row').each(function() {
	        // Cek naha checkbox dina baris ieu dicéklis atawa henteu
	        let checkStatus = $(this).find('.isready-check').is(':checked');
	        
	        // Mun dicéklis set jadi 1, mun henteu set jadi 0
	        $(this).find('.isready-value').val(checkStatus ? "1" : "0");
	    });
        
        const btn = $('#btnSavePart');
        btn.prop('disabled', true).text('Keur nyimpen...');

        $.ajax({
            url: baseUrl + 'complaint/addPartAjax', // Ganti ku route controller maneh
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            success: function(response) {
            	console.log(response);
                if(response.status) {
                    Swal.fire('Berhasil!', 'Kode part berhasil ditambahkan.', 'success').then(() => {
                        location.reload(); // Reload jang ningali parobahanana
                    });
                } else {
                    Swal.fire('Gagal!', 'Ada yang error mungkin.', 'error');
                }
            },
            error: function() {
                alert('Aya kasalahan sistem!');
            },
            complete: function() {
                btn.prop('disabled', false).text('Simpen Part');
            }
        });
    });

	// close view detail window 
	$("#buttonCloseViewDetail").on("click", function () {
		SwalConfirmClosePage();
	});

	$("#buttonCloseViewDetailBottom").on("click", function () {
		SwalConfirmClosePage();
	});

	$("#buttonCloseComplaintEdit").on("click", function () {
		SwalConfirmClosePage();
	});

	// collaps/view branch under group branch
	$(".btnCollapse").on("click", function () {
		var collapsRow = this.dataset.id;
		var rowGroup = document.getElementsByClassName(collapsRow);
		for (let i = 0; i < rowGroup.length; i++) {
			console.log(rowGroup[i]);
			if (rowGroup[i].classList.contains('collapse')) {
				rowGroup[i].classList.remove('collapse');
				$(this).html('-');
			} else {
				rowGroup[i].classList.add('collapse');
				$(this).html('+');
			}
		}
	});

	// add row part info at complaint input
	$(".btnAddRowsPart").on("click", function () {
		$(this).parent().parent().next().show(100);
	});

	$(".container-fluid").on("click", ".requestInfoSign", function () {
		var by = this.dataset.by;
		var notif = this.dataset.notif;
		var message = this.dataset.message;
		SwalInfoHtml('<div class="h6 d-flex"><div class="badge badge-info badge-pill d-flex justify-content-between">' + by + '</div><div class="d-flex justify-content-between">&nbsp;&nbsp;&nbsp;&nbsp; Notif: ' + notif + '</div></div></div>', '<div class="bg-light p-2 rounded" style="text-align: left">' + message + '</div>', 'info');
	});

	$("#tableComplaintManualUnsent").DataTable({});

	$(".container-fluid").on("click", ".btnAddNoteUnsent", function(e){
		e.preventDefault();
		var id = this.dataset.id;
		var note = this.dataset.note;
		$("#addNoteUnsentComplaintId").val(id);
		$("#addNoteUnsentRemarkInternal").html(note);
	});

	$(".container-fluid").on("click", ".btnToastNoteUnsent", function () {
		var message = this.dataset.message;
		SwalInfo("Info", message, "info");
	});

	$("#tableComplaintByCategoryBranchlist").DataTable({
		// "info" : false
	});

	// Dismiss Progress Update List All/Closed
	$(".btnComplaintDismissUpdate").on("click", function(e) {
		e.preventDefault();
		var criteria = this.dataset.criteria;
		var qty = this.dataset.qty;
		var text = 'Yakin sudah melihat ' + qty + ' update keluhan?';
		var link = baseUrl + 'complaint/dismissUpdateList/' + criteria;
		SwalConfirm('Cek Lagi!', text, link, "Dismiss", "warning");
	});

	// Dismiss Progress Update List All/Closed
	$(".container-fluid").on("click", ".buttonSelectDismissComplaintUpdate", function(){
		var n = $(".container-fluid .buttonSelectDismissComplaintUpdate:checked").length;
		if (n > 0) {
			var text = '<i class="fas fa-check-square"></i> Clear Selected (' + n + ')';
			$("#btnDismissComplaintUpdateMarked").html(text);
			$("#btnDismissComplaintUpdateMarked").show(100);
		} else {
			$("#btnDismissComplaintUpdateMarked").hide(100);
		}
	});

	// Mark Progress Update List
	$("#buttonSelectComplaintAllUpdateList").on("click", function(){
		var qty = this.dataset.allqty;
		if ($(this).is(":checked")) {
			var text = '<i class="fas fa-check-square"></i> Clear Selected (' + qty + ')';
			$("#btnDismissComplaintUpdateMarked").html(text);
			$(".buttonSelectDismissComplaintUpdate").prop("checked", true);
			$("#btnDismissComplaintUpdateMarked").show(100);
		} else {
			$(".buttonSelectDismissComplaintUpdate").prop("checked", false);
			$("#btnDismissComplaintUpdateMarked").hide(100);
		}
	});

	// Dismiss Progress Update List
	$("#btnDismissComplaintUpdateMarked").on("click", function(){
		var nums = $(".container-fluid .buttonSelectDismissComplaintUpdate:checked").toArray();
		var lists = [];
		for (let i = 0; i < nums.length; i++) {
			lists.push(nums[i].value);
		}
		$.ajax({
			url : baseUrl + 'complaint/dismissUpdateListMarked',
			data : {lists : lists},
			method : "post",
			success : function(data) {
				console.log(data);
				SwalConfirmReload('Berhasil', 'Update progress ditandai dibaca', "OK", "info");
			}
		});
	});

	function getServiceByType(serviceType, target, nameid) {
		//console.log(serviceType);
		if (serviceType == 'Others') {
			var inputReplacement = '';
			target.replaceWith('<input type="text" class="form-control" name="' + nameid + '" id="' + nameid + '">');
		} else if (serviceType == 'Part Center') {
			//target.replaceWith('<select type="text" class="form-control custom-select" name="'+ nameid +'" id="'+ nameid +'"></select');
			target.html('');
			target.append('<option value="Part Center" selected>Part Center</option>');
		} else if (serviceType == 'Sales Marketing') {
			target.html('');
			target.append('<option value="Sales Marketing" selected>Sales Marketing</option>');
			$("#complaintInputPartUnderBranch").append('<option value="Sales Marketing" selected>Sales Marketing</option>');
			$("#complaintInputPartRegionalArea").append('<option value="Sales Marketing" selected>Sales Marketing</option>');
		} else {
			$.ajax({
				url: baseUrl + 'complaint/serviceBranchByType',
				data: { serviceType: serviceType },
				method: "post",
				dataType: "html",
				success: function (data) {
					target.html('');
					target.append('<option value=""> - pilih Cabang service - </option>');
					target.append(data);
				}
			});
		}
	}

	function getServiceUnderBranch(picReport) {
		$.ajax({
			url: baseUrl + 'complaint/serviceReginoalByBranch',
			data: { serviceBranch: picReport },
			method: "post",
			dataType: "html",
			success: function (data) {
				$("#complaintInputPartUnderBranch").append('<option value="' + JSON.parse(data).under_branch + '" selected>' + JSON.parse(data).under_branch + '</option>');
			}
		});
	}

	function getServiceRegional(picReport) {
		$.ajax({
			url: baseUrl + 'complaint/serviceReginoalByBranch',
			data: { serviceBranch: picReport },
			method: "post",
			dataType: "html",
			success: function (data) {
				//$("#complaintInputPartRegionalArea").html('');
				$("#complaintInputPartRegionalArea").append('<option value="' + JSON.parse(data).region + '" selected>' + JSON.parse(data).region + '</option>');
			}
		});
	}

	// EDUCATION
	// product material datatable
	$("#tableMaterialEducationProduct").DataTable({
		"info" : false,
	});


	// SOCMED INQUIRY
	// table Inquiry List
	$("#socmedTableInquryList").DataTable({
		"autoWidth": false
	});

	// input new Socmed Inquiry
	$("#socmedInsertSystemCode").on("change", function () {
		var systemCode = $(this).val();
		$.ajax({
			url: baseUrl + 'socmedinquiry/getInquiry',
			data: {
				code : systemCode
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#socmedInsertInquiryGroup").val(data);
			}
		})
	});

	// Update Socmed Inquiry
	$("#socmedUpdateSystemCode").on("change", function () {
		var systemCode = $(this).val();
		$.ajax({
			url: baseUrl + 'socmedinquiry/getInquiry',
			data: {
				code : systemCode
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#socmedUpdateInquiryGroup").val(data);
			}
		})
	});

	// Update Socmed Inquiry
	$("#emailUpdateSystemCode").on("change", function () {
		var systemCode = $(this).val();
		$.ajax({
			url: baseUrl + 'socmedinquiry/getInquiry',
			data: {
				code : systemCode
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#emailUpdateInquiryGroup").val(data);
			}
		})
	});

	// confirm delete Socmed Inquiry
	$(".container-fluid").on("click", ".buttonSocmedlistDelete", function (e) {
		e.preventDefault();
		const id = this.dataset.id;
		var title = "Yakin hapus data?";
		var text = "Data tidak bisa di-recovery setelah dihapus";
		var link = baseUrl + "socmedinquiry/deleteInquiry/" + id;
		SwalConfirm(title, text, link, "Delete", "warning");
	});

	// Get Inquiry on input new Email
	$("#emailInsertSystemCode").on("change", function () {
		var systemCode = $(this).val();
		$.ajax({
			url: baseUrl + 'socmedinquiry/getInquiry',
			data: {
				code : systemCode
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#emailInsertInquiryGroup").val(data);
			}
		})
	});

	// Datetime picker
	$("#emailInsertDatetime").datetimepicker();

	// confirm delete Email Inquiry
	$(".container-fluid").on("click", ".buttonEmaillistDelete", function (e) {
		e.preventDefault();
		const id = this.dataset.id;
		var title = "Yakin hapus data?";
		var text = "Data tidak bisa di-recovery setelah dihapus";
		var link = baseUrl + "socmedinquiry/deleteEmail/" + id;
		SwalConfirm(title, text, link, "Delete", "warning");
	});

	// OTHERS
	// phone prefix datatable
	$("#othersPhoneprefixTableJabodetabek").DataTable({
		"info": false
	});

	$("#othersPhoneprefixTableOthersarea").DataTable({
		"info": false
	});

	// to blanking modal form
	$("#buttonAddSapData").on("click", function () {
		$("#formEditPasswordSapModalLabel").html("Tambah data pasword user SAP");
		$("#formEditPasswordSapUsername").val("");
		$("#formEditPasswordSapAccess").val("");
		$("#formEditPasswordSapPassword1").val("");
		$("#formEditPasswordSapPassword2").val("");
		$("#formEditPasswordSapShare").val("");
		$("#formEditPasswordSapRemark").val("");
	});

	// Edit password SAP
	$(".buttonEditPasswordSap").on("click", function (e) {
		e.preventDefault();
		$("#formEditPasswordSap").attr("action", baseUrl + "others/updatesap");
		const id = this.dataset.id;
		$.ajax({
			url: baseUrl + "others/getsapdata",
			data: {
				id: id
			},
			dataType: "json",
			method: "post",
			success: function (data) {
				// console.table(data);
				var name = '<span class="text-info text-bold">' + data.name + '</span>';
				$("#formEditPasswordSapModalLabel").html("Edit user SAP - " + name);
				$("#formEditPasswordSapId").val(data.id);
				$("#formEditPasswordSapName").val(data.name);
				$("#formEditPasswordSapUsername").val(data.username);
				// $("#formEditPasswordSapPassword1").val(data.password);
				// $("#formEditPasswordSapPassword2").val(data.password);
				$("#formEditPasswordSapAccess").val(data.access);
				$("#formEditPasswordSapShare").val(data.share);
				$("#formEditPasswordSapRemark").val(data.remark);
			}
		});

	});

	// cek password
	$("#formEditPasswordSapPassword1").on("input", function () {
		checkEditPassword();
		// if ($(this).val() != '') {
		// 	$("#errorPassword1").fadeOut(200);
		// } else {
		// 	$("#errorPassword1").fadeIn();
		// 	$("#formEditPasswordSapSubmit").prop("disabled", true);
		// };
	});
	$("#formEditPasswordSapPassword2").on("input", function () {
		checkEditPassword();
	});

	function checkEditPassword() {
		var password1 = $("#formEditPasswordSapPassword1").val();
		var password2 = $("#formEditPasswordSapPassword2").val();
		//console.log(password1 + password2);
		//console.log(password1);
		$.ajax({
			url: baseUrl + "others/checkpassword",
			data: {
				formEditPasswordSapPassword1: password1,
				formEditPasswordSapPassword2: password2,
			},
			dataType: "json",
			method: "post",
			success: function (data) {
				if (data.error != 'OK') {
					$("#errorPassword2").fadeIn();
					$("#formEditPasswordSapSubmit").prop("disabled", true);
				} else {
					$("#errorPassword2").fadeOut();
					$("#formEditPasswordSapSubmit").prop("disabled", false);
				}

				if (password2 == '') {
					$("#errorPassword2").fadeOut();
					$("#formEditPasswordSapSubmit").prop("disabled", true);
				}

				if (password1 == '') {
					$("#errorPassword1").fadeIn();
					$("#formEditPasswordSapSubmit").prop("disabled", true);
				} else {
					$("#errorPassword1").fadeOut();
				}

			}
		});
	}

	// Serial Number
	$("#tableOthersManageSerialNumber").DataTable();

	$("#buttonAddSerial").on("click", function(){
		$("#modalAddSingleSerial .modal-title").html('Tambah Data No. Seri');
		$("#addSerialCategory").val("");
		$("#addSerialModel").val("");
		$("#addSerialFirstcode").val("");
		$("#addSerialSubmit").html("Save");
	});

	$(".container-fluid").on("click", ".buttonSerialEdit", function (e) {
		e.preventDefault();
		$("#modalAddSingleSerial form").attr("action", baseUrl + "others/updateSerial");
		$("#modalAddSingleSerial .modal-title").html('Edit Data No. Seri');
		var id = this.dataset.id;
		$.ajax({
			url: baseUrl + "others/singleSerialById",
			data: { id : id },
			dataType: "json",
			method: "post",
			success: function (data) {
				console.log(data);
				$("#addSerialId").val(data.id)
				$("#addSerialCategory").val(data.category);
				$("#addSerialModel").val(data.model);
				$("#addSerialFirstcode").val(data.first_code);
				$("#addSerialSubmit").html("Update");			}
		});
	});

	$(".container-fluid").on("click", ".buttonSerialDelete", function (e) {
		e.preventDefault();
		const id = this.dataset.id;
		console.log(id);
		var title = "Yakin Hapus Data?";
		var text = "Data terhapus tidak bisa di-recovery";
		var confirmText = "Delete";
		var link = baseUrl + "others/deleteSerial/" + id;
		SwalConfirm(title, text, link, confirmText, "warning");
	});

	// CHART GENERATOR
	// chart generator #3
	$("#cardChartGeneratorContainer").ready(function() {
		let myChartInstance = null;
		let showLabels = false;
		let textColor;

	    // === 1. FUNGSI PIKEUN NGATUR TEMA & SKALA (SAFETY FIRST) ===
	    function applySavedSettings() {
	        if (!myChartInstance) return;

	        // A. Logika Warna Latar
	        const savedColor = localStorage.getItem('warnaPilihan') || '#ffffff';
	        $('#chartContainer').css('background-color', savedColor);
	        $('#colorPicker').val(savedColor);

	        textColor = (savedColor === '#333333' || savedColor === 'black') ? 'white' : '#666';

	        // B. Logika Skala Y (Min/Max)
	        const savedMin = localStorage.getItem('yMinVal');
	        const savedMax = localStorage.getItem('yMaxVal');

	        // Cek naha jenis chart gaduh scales (Pie/Radar teu gaduh 'scales.y')
	        if (myChartInstance.options.scales) {
	            const axes = ['y', 'y1']; // Sumbu kenca & katuhu
	            axes.forEach(axis => {
	                if (myChartInstance.options.scales[axis]) {
	                    myChartInstance.options.scales[axis].ticks.color = textColor;
	                    myChartInstance.options.scales[axis].min = savedMin ? parseFloat(savedMin) : undefined;
	                    myChartInstance.options.scales[axis].max = savedMax ? parseFloat(savedMax) : undefined;
	                }
	            });
	            
	            if (myChartInstance.options.scales.x) {
	                myChartInstance.options.scales.x.ticks.color = textColor;
	            }
	        }

	        myChartInstance.update();
	    }

	    // === 2. LOGIKA TAMBAH/HAPUS DATASET ===
	    $('#btnAddDataset').click(function() {
	        let datasetHtml = `
	            <div class="dataset-item border p-3 mb-3 bg-white shadow-sm">
	                <span class="btn-remove text-danger" onclick="$(this).parent().remove()">×</span>
	                <label class="small font-weight-bold text-muted">Extra Dataset</label>
	                <input type="text" class="form-control ds-value mb-2" placeholder="Conto: 10,20,30">
	                <div class="d-flex align-items-center justify-content-between">
	                    <input type="color" class="ds-color" value="#${Math.floor(Math.random()*16777215).toString(16)}">
	                    <span class="small text-muted">Pick Color</span>
	        			<input type="number" class="form-control ds-color-opacity" min="0.1" max="1" step="0.1" value="0.3" style="max-width: 80px">
                        <span class="small text-muted">Opacity</span>
	                </div>
	            </div>`;
	        $('#container-datasets').append(datasetHtml);
	    });

	    // === 3. GENERATE CHART (INTI) ===
	    $('#btnCreate').click(function() {
	        const ctx3 = document.getElementById('myChart').getContext('2d');
	        const mainType = $('#chartType').val();
	        const labelsArray = $('#labels').val().split(',').map(s => s.trim());

	        // Hapus chart lami mun aya (meh teu tumpang tindih)
	        if (myChartInstance) { myChartInstance.destroy(); }

	        // Ambil sadaya data tina form
	        let chartDatasets = [];
	        $('.dataset-item').each(function(index) {
	            let values = $(this).find('.ds-value').val().split(',').map(v => parseFloat(v.trim()));
			    let color = $(this).find('.ds-color').val(); // Ieu warna Hex tina picker
			    let opac = $(this).find('.ds-color-opacity').val(); // Ieu warna Hex tina picker

			    // FUNGSI TRANSPARANSI (HEX ka RGBA)
			    // Urang setel opacity-na 0.3 (30%) supados area-na transparan
			    // let rgbaColor = hexToRgba(color, 0.3);
			    let rgbaColor = hexToRgba(color, opac);

			    let dsConfig = {
			        label: 'Dataset ' + (index + 1),
			        data: values,
			        backgroundColor: rgbaColor, // Nganggo warna transparan kanggo area
			        borderColor: color,         // Garis tetep pekat (teu transparan)
			        borderWidth: 2,
			        fill: (mainType === 'area'),
			        tension: (mainType === 'area' || mainType === 'line-smooth') ? 0.4 : 0
			    };

	            // Logika Khusus Tipe Chart
	            if (mainType === 'line-smooth' || mainType === 'area') dsConfig.tension = 0.4;
	            if (mainType === 'combo' && index === 1) {
	            	dsConfig.type = 'line';   // Dataset kadua jadi garis
			        dsConfig.tension = 0.4;   // IEU KONCINA meh smoothed line
			        dsConfig.fill = false;
	            }
	            if (mainType === 'dual-axis') dsConfig.yAxisID = (index === 0) ? 'y' : 'y1';

	            chartDatasets.push(dsConfig);
	        });

	        // Konfigurasi Scales
	        let finalScales = { y: { beginAtZero: true } };
	        if (mainType === 'dual-axis') {
	            finalScales.y1 = { position: 'right', grid: { drawOnChartArea: false } };
	        }
	        if (mainType === 'bar-stacked') {
	            finalScales.x = { stacked: true };
	            finalScales.y = { stacked: true };
	        }
	        // Pie/Radar teu nganggo scales
	        if (['pie', 'radar'].includes(mainType)) finalScales = undefined;

	        // Logika nangtoskeun tipe dasar
			let baseType = mainType;
			if (mainType === 'area' || mainType === 'line-smooth') {
			    baseType = 'line';
			} else if (['combo', 'dual-axis', 'bar-stacked'].includes(mainType)) {
			    baseType = 'bar';
			}

			myChartInstance = new Chart(ctx3, {
			    type: baseType, // Ieu bakal 'line', 'bar', 'pie', atawa 'radar'
			    data: { labels: labelsArray, datasets: chartDatasets },
			    options: {
			        responsive: true,
			        maintainAspectRatio: false,
			        plugins: {
				        datalabels: {
				            display: function(context) {
				                return showLabels; // Ieu konci sangkan bisa hide/show
				            },
				            anchor: 'end',
				            align: 'top',
				            color: textColor, // Engké tiasa disaruakeun sareng textColor
				            font: { weight: 'bold' },
				            // formatter: Math.round // Supados angkana buleud
				            formatter : function(value, context) {
				            	if (value % 1 === 0) {
				                    return value.toFixed(0); // 0 decimal places (integer)
				                } else {
				                    return value.toFixed(1); // 2 decimal places
				                }
				            }
				        },
				        // ... plugin sanésna (legend, tooltip)
				    },
			        scales: finalScales // finalScales tos otomatis kaatur ku logika urang tadi
			    }
			});

	        $('#chartStatus').text('Rendered: ' + mainType.toUpperCase()).removeClass('badge-info').addClass('badge-success');
	        applySavedSettings(); // Terapkeun warna & skala nu aya dina storage
	    });

	    // === 4. EVENT LISTENERS (THEME & AXIS) ===
	    $('#themeSelect').change(function() {
	        let val = $(this).val();
	        if (val === 'custom') {
	            $('#colorPicker').show();
	        } else {
	            $('#colorPicker').hide();
	            let color = (val === 'dark') ? '#333333' : '#ffffff';
	            localStorage.setItem('warnaPilihan', color);
	            applySavedSettings();
	        }
	    });

	    $('#colorPicker').on('input', function() {
	        localStorage.setItem('warnaPilihan', $(this).val());
	        applySavedSettings();
	    });

	    $('#btnApplyAxis').click(function() {
	        localStorage.setItem('yMinVal', $('#yMin').val());
	        localStorage.setItem('yMaxVal', $('#yMax').val());
	        applySavedSettings();
	    });

	    $('#btnToggleLabels').click(function() {
		    showLabels = !showLabels; // Balikkeun statusna (true/false)
		    
		    // Ganti warna/style tombol sangkan katingal aktif
		    $(this).toggleClass('btn-info btn-outline-secondary');
		    
		    // Update chart
		    if (myChartInstance) {
		        myChartInstance.update();
		    }
		});

		$('#btnToggleXaxis').click(function() {
		    myChartInstance.options.scales.x.display = !myChartInstance.options.scales.x.display;
		    
		    // Ganti warna/style tombol sangkan katingal aktif
		    $(this).toggleClass('btn-outline-secondary btn-info');
		    
		    // Update chart
		    if (myChartInstance) {
		        myChartInstance.update();
		    }
		});

		$('#btnToggleYaxis').click(function() {
		    myChartInstance.options.scales.y.display = !myChartInstance.options.scales.y.display;
		    
		    // Ganti warna/style tombol sangkan katingal aktif
		    $(this).toggleClass('btn-outline-secondary btn-info');
		    
		    // Update chart
		    if (myChartInstance) {
		        myChartInstance.update();
		    }
		});

	    // Jalankeun pas munggaran buka	    
	    $('#btnCreate').trigger('click');
	});
	

	// FU MANUAL
	// get customer data AP Survey
	$(".btnPerformSurveyAp").on("click", function () {
		var id = this.dataset.id;
		$.ajax({
			url: baseUrl + "fumanual/databyid",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (result) {
				//console.log(result);
				$("#modalPerformSurveyApId").val(result.id);
				$("#modalPerformSurveyApName").val(result.name);
				$("#modalPerformSurveyApPhone").val(result.phone);
				$("#modalPerformSurveyApQ1").val(result.q1);
				$("#modalPerformSurveyApQ2").val(result.q2);
				$("#modalPerformSurveyApQ3").val(result.q3);
				$("#modalPerformSurveyApQ4").val(result.q4);
				$("#modalPerformSurveyApQ5").val(result.q5);
				$("#modalPerformSurveyApRemark").val(result.remark);
				$("#modalPerformSurveyApStatus").val(result.status);
			}
		})
	});

	$("#tableFumanualSurveylist").DataTable({
		"lengthChange" : true,
	});

	// Summernote for add new complaint
	$('#complaintAddTextarea').summernote({
		height: "360px",
		callbacks: {
			onPaste: function (e) {
				var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

				e.preventDefault();

				// Firefox fix
				setTimeout(function () {
					document.execCommand('insertText', false, bufferText);
				}, 10);
			}
		}
	});

	// Summernote for add new manual
	$('#manualAddTextarea').summernote({
		height: "360px",
		callbacks: {
			onPaste: function (e) {
				var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

				e.preventDefault();

				// Firefox fix
				setTimeout(function () {
					document.execCommand('insertText', false, bufferText);
				}, 10);
			}
		}
	});

	$('#editorText').summernote();

	$("#tableSerialAircon").DataTable({
		"lengthChange": false,
		"info": false,
	});

	$("#tableSerialTvLocal").DataTable({
		"lengthChange": false,
		"info": false,
	});

	$("#tableSerialReffLocal").DataTable({
		"lengthChange": false,
		"info": false,
	});

	$("#tableSerialShowcase").DataTable({
		"lengthChange": false,
		"info": false,
	});

	$("#tableSerialDispenser").DataTable({
		"lengthChange": false,
		"info": false,
	});

	$("#tableSerialWmLocal").DataTable({
		"lengthChange": false,
		"info": false,
	});

	$("#tableSerialWmPensonic").DataTable({
		"lengthChange": false,
		"info": false,
	});

	$("#tableSerialWmWhirpool").DataTable({
		"lengthChange": false,
		"info": false,
	});

	// ACTIVITY
	// Chart monthly overall
	if (document.getElementById("activityDailyDateStart") == null) {
		var startPeriod = '2022-01-01';
		var endPeriod = '2022-01-01';
	} else {
		var startPeriod = document.getElementById("activityDailyDateStart").value;
		var endPeriod = document.getElementById("activityDailyDateEnd").value;
	}

	if ($("#chartActivityAllMonth").length > 0 ) {
		$.ajax({
			url: baseUrl + "activity/monthlyTransition",
			data: {
				startPeriod: startPeriod,
				endPeriod: endPeriod
			},
			dataType: "json",
			method: "post",
			success: function (data) {
				const ctx1 = document.getElementById('chartActivityAllMonth');
				const myChart = new Chart(ctx1, {
					type: 'bar',
					data: {
						labels: data.month,
						datasets: [
							{
								label: 'Whatsapp',
								data: data.whatsapp,
								backgroundColor: 'rgba(40, 167, 69, 0.5)',
								borderColor: 'rgba(40, 167, 69, 1)',
								borderWidth: 1
							},
							{
								label: 'Call',
								data: data.icall,
								backgroundColor: 'rgba(54, 162, 235, 0.5)',
								borderColor: 'rgba(54, 162, 235, 1)',
								borderWidth: 1
							},
							{
								label: 'Email',
								data: data.email,							
								backgroundColor: 'rgba(255, 99, 132, 0.5)',
								borderColor: 'rgba(255, 99, 132, 1)',
								borderWidth: 1
							},
							// {
							// 	label: 'SMS',
							// 	data: data.sms,
							// 	backgroundColor: 'rgba(75, 192, 192, 0.5)',
							// 	borderColor: 'rgba(75, 192, 192, 1)',
							// 	borderWidth: 1
							// },
							{
								label: 'Callback',
								data: data.callback,
								backgroundColor: 'rgba(153, 102, 255, 0.5)',
								borderColor: 'rgba(153, 102, 255, 1)',
								borderWidth: 1
							},
							{
								label: 'Conf. call',
								data: data.confirmation_call,
								backgroundColor: 'rgba(255, 159, 64, 0.5)',
								borderColor: 'rgba(255, 159, 64, 1)',
								borderWidth: 1
							},
							{
								label: 'Follow up',
								data: data.followup,														
								backgroundColor: 'rgba(255, 206, 86, 0.5)',
								borderColor: 'rgba(255, 206, 86, 1)',
								borderWidth: 1
							},
							// {
							// 	label: 'Repair req.',
							// 	data: data.repair_request,
							// 	backgroundColor: 'rgba(102, 16, 242, 0.5)',
							// 	borderColor: 'rgba(102, 16, 242 1)',
							// 	borderWidth: 1
							// },
						]
					},
					options: {
						plugins: {
							title: {
								display: true,
								text: 'Transisi Aktivitas CCC'
							},
							legend: {
								title: {
									display: true,
									// text: 'Legend Title',
								},
								position: "right",
								reverse: true
							}
						},
						responsive: true,
						scales: {
							x: {
								stacked: true,
							},
							y: {
								stacked: true
							}
						}
					}
				});
			}
		});
	}

	$("#chartActivitySameday").ready(function(){
		$.ajax({
			url: baseUrl + "activity/samedayComparison",
			data: {
				startPeriod: startPeriod,
				endPeriod: endPeriod
			},
			dataType: "json",
			method: "post",
			success: function (data) {
				//console.log(data);
				const ctx2 = document.getElementById('chartActivitySameday');
				const myChart = new Chart(ctx2, {
					type: 'bar',
					data: {
						labels: data.month,
						datasets: [
							{
								label: 'Whatsapp',
								data: data.whatsapp,
								backgroundColor: 'rgba(40, 167, 69, 0.5)',
								borderColor: 'rgba(40, 167, 69, 1)',
								borderWidth: 1
							},
							{
								label: 'Call',
								data: data.icall,
								backgroundColor: 'rgba(54, 162, 235, 0.5)',
								borderColor: 'rgba(54, 162, 235, 1)',
								borderWidth: 1
							},
							{
								label: 'Email',
								data: data.email,
								backgroundColor: 'rgba(255, 99, 132, 0.5)',
								borderColor: 'rgba(255, 99, 132, 1)',
								borderWidth: 1
							},
							// {
							// 	label: 'SMS',
							// 	data: data.sms,
							// 	backgroundColor: 'rgba(75, 192, 192, 0.5)',
							// 	borderColor: 'rgba(75, 192, 192, 1)',
							// 	borderWidth: 1
							// },
							{
								label: 'Callback',
								data: data.callback,
								backgroundColor: 'rgba(153, 102, 255, 0.5)',
								borderColor: 'rgba(153, 102, 255, 1)',
								borderWidth: 1
							},
							{
								label: 'Conf. call',
								data: data.confirmation_call,
								backgroundColor: 'rgba(255, 159, 64, 0.5)',
								borderColor: 'rgba(255, 159, 64, 1)',
								borderWidth: 1
							},
							{
								label: 'Follow up',
								data: data.followup,																								
								backgroundColor: 'rgba(255, 206, 86, 0.5)',
								borderColor: 'rgba(255, 206, 86, 1)',
								borderWidth: 1
							},
							// {
							// 	label: 'Repair req.',
							// 	data: data.repair_request,
							// 	backgroundColor: 'rgba(102, 16, 242, 0.5)',
							// 	borderColor: 'rgba(102, 16, 242 1)',
							// 	borderWidth: 1
							// },
						]
					},
					options: {
						plugins: {
							title: {
								display: true,
								text: 'Komparasi hari yang sama' + data.period,
							},
							legend: {
								title: {
									display: true,
									// text: 'Legend Title',
								},
								position: "right",
								reverse: true
							}
						},
						responsive: true,
						scales: {
							x: {
								stacked: true,
							},
							y: {
								stacked: true
							}
						}
					}
				});
			}
		});	
	});
	

	$("#buttonAddDailyActivity").on("click", function(){
		var btnText = '<i class="fas fa-save"></i> Save';
		$("#modalAddCCCActivity .modal-content .modal-header h4").html("Tambah Data Aktivitas CCC");
		$("#modalAddCCCActivity .modal-content form").attr("action", "");
		$("#addCCCActivityDate").val(0);
		$("#addCCCActivityCall").val(0);
		$("#addCCCActivityWhatsapp").val(0);
		// $("#addCCCActivitySMS").val(0);
		$("#addCCCActivityEmail").val(0);
		$("#addCCCActivityCallback").val(0);
		$("#addCCCActivityConfirmationcall").val(0);
		$("#addCCCActivityFollowup").val(0);
		$("#addCCCActivitySocmedInquiry").val(0);
		$("#addCCCActivityWorkhour").val(0);
		$("#addCCCActivityRemark").html("")
		$("#addCCCActivitySubmit").html(btnText);
	});

	$(".btnEditDailyActivity").on("click", function(){
		// Get data
		$("#modalAddCCCActivity .modal-content form").attr("action", baseUrl + "activity/editByDate");
		var xdate = this.dataset.xdate;
		$.ajax({
			url : baseUrl + "activity/activityByDate",
			data : {
				xdate : xdate
			},
			dataType : "json",
			method : "post",
			success : function (data) {
				var btnText = '<i class="fas fa-check"></i> Update';
				$("#modalAddCCCActivity .modal-content .modal-header h4").html("Edit Data Aktivitas CCC");
				$("#addCCCActivityDate").val(data.date);
				$("#addCCCActivityCall").val(data.icall);
				$("#addCCCActivityWhatsapp").val(data.whatsapp);
				// $("#addCCCActivitySMS").val(data.sms);
				$("#addCCCActivityEmail").val(data.email);
				$("#addCCCActivityCallback").val(data.callback);
				$("#addCCCActivityConfirmationcall").val(data.confirmation_call);
				$("#addCCCActivityFollowup").val(data.followup);
				$("#addCCCActivitySocmedInquiry").val(data.socmed_inquiry);
				$("#addCCCActivityWorkhour").val(data.work_hour);
				$("#addCCCActivityRemark").val(data.remark);
				$("#addCCCActivitySubmit").html(btnText);
			}
		});
	});

	$(".btnShowRemarkDailyActivity").on("click", function(){
		var textinfo = this.dataset.textinfo;
		var dateinfo = this.dataset.dateinfo;
		SwalInfo('Note on: ' + dateinfo, textinfo, 'info');
	});

	// PROFILE
	$("#buttonUpdatePassword").on("click", function () {
		$("#formUpdateProfile").hide();
		$("#formUpdatePassword").fadeToggle();
	});

	// GENERAL FUNCTIONS
	// Sweat Alert for Flash Message
	if($(".flashmessage").html()) {
		const flashData = $(".flashmessage").html();
		const arr = flashData.split("|");
		const title = arr[0];
		const type = arr[1];
		const text = arr[2];
		if (flashData) {
			Swal.fire({
				title: title,
				text: text,
				icon: arr[1],
			});
		}
	}

	// Confim Sweat Alert
	function SwalConfirm(title, text, link, confirmText, icon) {
		Swal.fire({
			title: title,
			text: text,
			icon: icon,
			showCancelButton: true,
			confirmButtonColor: "#007BFF",
			cancelButtonColor: "#DC3545",
			confirmButtonText: confirmText,
		}).then((result) => {
			if (result.value) {
				window.location.href = link;
			}
		});
	}

	function SwalConfirmNewTab(title, text, link, confirmText, icon) {
		Swal.fire({
			title: title,
			text: text,
			icon: icon,
			showCancelButton: true,
			confirmButtonColor: "#007BFF",
			cancelButtonColor: "#DC3545",
			confirmButtonText: confirmText,
		}).then((result) => {
			if (result.value) {
				window.open(link);
			}
		});
	}

	function SwalConfirmReload(title, text, confirmText, icon) {
		Swal.fire({
			title: title,
			text: text,
			icon: icon,
			showCancelButton: false,
			confirmButtonColor: "#007BFF",
			cancelButtonColor: "#DC3545",
			confirmButtonText: confirmText,
		}).then((result) => {
			if (result.value) {
				window.location.reload(false);
			}
		});
	}

	// Sweat Alert Info
	function SwalInfo(title, text, icon) {
		Swal.fire({
			title: title,
			text: text,
			icon: icon,
			confirmButtonColor: "#007BFF",
		});
	}

	function SwalInfoHtml(title, text, icon) {
		Swal.fire({
			title: title,
			html: text,
			icon: icon,
			confirmButtonColor: "#007BFF",
			confirmButtonText: '<i class="fa fa-check"></i> OK'
		});
	}

	function SwalConfirmClosePage() {
		Swal.fire({
			title: 'Cek Lagi!',
			text: 'Yakin tutup halaman ini?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: "#007BFF",
			cancelButtonColor: "#DC3545",
			confirmButtonText: 'Tutup',
		}).then((result) => {
			if (result.value) {
				window.close();
			}
		});
	}

	function checkSass(data) {
		if (data.svc_type == 'SASS') {
			return 'Detail of SASS ' + data.svc_name;
		} else {
			return 'Detail of ' + data.svc_name;
		}
	}

	// phone to breakline
	function checkOthersData(data) {
		if (data == '') {
			return '';
		} else {
			return ', ' + data;
		}
	}

	// JQuery Date Formater
	function dateFormater(dt) {
		var date = new Date(dt);
         if (isNaN(date.getTime())) {
            return dt;
         } else {
	          var month = new Array();
	          month[0] = "Jan";
	          month[1] = "Feb";
	          month[2] = "Mar";
	          month[3] = "Apr";
	          month[4] = "May";
	          month[5] = "Jun";
	          month[6] = "Jul";
	          month[7] = "Aug";
	          month[8] = "Sept";
	          month[9] = "Oct";
	          month[10] = "Nov";
	          month[11] = "Dec";
	          day = date.getDate();

          	if(day < 10) {
             	day = "0"+day;
          	}
          
          	return day + " " +month[date.getMonth()] + " " + date.getFullYear();
        }
	}

	// HEX2RGBA Color Picker Function
	function hexToRgba(hex, opacity) {
	    let r = parseInt(hex.slice(1, 3), 16),
	        g = parseInt(hex.slice(3, 5), 16),
	        b = parseInt(hex.slice(5, 7), 16);

	    return `rgba(${r}, ${g}, ${b}, ${opacity})`;
	}

});