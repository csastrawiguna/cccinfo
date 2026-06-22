// Vue - Summary Keluhan
const { createApp, ref, reactive, computed, onMounted, watch } = Vue;

// PREV SCRIPT
createApp({
    setup() {
        const loading = ref(true);
        const loadingBranch = ref(false);

        // 1. Ganti jadi Array [] sangkan bisa nampung checkbox multi-select
        const filters = reactive({
            start: '', 
            end: '',
            selectedRegion: [], // Dirobah jadi array
            selectedBranch: [], // Dirobah jadi array
            orderBy: 'Complaint Qty'
        });

        const listRegion = ref(['Jakarta', 'Jawa Bali', 'Sumatera', 'Kalimantan Sulawesi']);
        const listBranch = ref([]);

        const reports = reactive({
            tableHeader: [],
            convertData: [],
            byMonths: []
        });

        // 2. Fungsi narik daptar cabang (Cascading Multi-Region)
        const fetchBranch = async () => {
		    if (filters.selectedRegion.length === 0) {
		        listBranch.value = [];
		        filters.selectedBranch = [];
		        return;
		    }

		    loadingBranch.value = true;
		    try {
		        const formData = new FormData();
		        filters.selectedRegion.forEach(reg => {
		            formData.append('regions[]', reg); 
		        });

		        const resp = await axios.post(baseUrl + 'complaint/get_branchs_ajax_by_multi_regions', formData);
		        
		        let finalBranches = [];
		        // Tambahkeun "All [Region]" di awal daptar
		        filters.selectedRegion.forEach(reg => {
		            finalBranches.push({
		                id: 'all-' + reg.replace(/\s+/g, '-'),
		                under_branch: 'All ' + reg,
		                region: reg,
		                is_all: true
		            });
		        });

		        // Gabungkeun jeung data ti DB
		        listBranch.value = [...finalBranches, ...resp.data];

		        // Filter validasi (tetep sarua)
		        const validNames = listBranch.value.map(b => b.under_branch);
		        filters.selectedBranch = filters.selectedBranch.filter(val => validNames.includes(val));
		    } catch (e) {
		        console.error("Gagal load cabang:", e);
		    } finally {
		        loadingBranch.value = false;
		    }
		};

		watch(() => [...filters.selectedBranch], (newVal, oldVal) => {
		    // Téangan bédana: Mana nu kakara dicéklist?
		    const added = newVal.filter(x => !oldVal.includes(x));
		    const removed = oldVal.filter(x => !newVal.includes(x));

		    // LOGIKA MUN "ALL" DICEKLIST
		    added.forEach(item => {
		        if (item.startsWith('All ')) {
		            const regionName = item.replace('All ', '');
		            // Pilih kabéh cabang nu aya dina region éta
		            listBranch.value.forEach(br => {
		                if (br.region === regionName && !filters.selectedBranch.includes(br.under_branch)) {
		                    filters.selectedBranch.push(br.under_branch);
		                }
		            });
		        }
		    });

		    // LOGIKA MUN "ALL" DI-UNCHECK
		    removed.forEach(item => {
		        if (item.startsWith('All ')) {
		            const regionName = item.replace('All ', '');
		            // Cabut kabéh cabang nu aya dina region éta
		            listBranch.value.forEach(br => {
		                if (br.region === regionName) {
		                    const index = filters.selectedBranch.indexOf(br.under_branch);
		                    if (index > -1) filters.selectedBranch.splice(index, 1);
		                }
		            });
		        }
		    });
		});

        // 3. Update loadData sangkan ngirim filter Array
        const loadData = async () => {
            loading.value = true;
            try {
                const formData = new FormData();
                formData.append('startPeriod', filters.start);
                formData.append('endPeriod', filters.end);
                formData.append('orderby', filters.orderBy);

                // Ngirimkeun Array ka PHP (FormData peryogi di-append hiji-hiji atanapi JSON string)
                filters.selectedRegion.forEach(reg => {
                    formData.append('region[]', reg);
                });
                
                filters.selectedBranch.forEach(br => {
                    formData.append('underBranch[]', br);
                });

                const resp = await axios.post(baseUrl + 'complaint/get_summary_data', formData);
                
                // Penanganan hasil data
                reports.convertData = resp.data.convertData || [];
                reports.transition = resp.data.transition || [];
                reports.statusDetail = resp.data.statusDetail || [];
                reports.descriptionByStatusDetail = resp.data.descriptionByStatusDetail || [];
               	console.log(resp.data);
                
                if (reports.convertData.length > 0) {
                    // Nyokot header kolom tanggal (exclude non-date columns)
                    reports.tableHeader = Object.keys(reports.convertData[0]).filter(key => 
                        key !== 'claim_description' && key !== 'ttl_bycategory'
                    );
                } else {
                    reports.tableHeader = [];
                }
            } catch (e) {
                console.error("Error narik data:", e);
                alert("Aya kasalahan nalika narik data!");
            } finally {
                loading.value = false;
            }
        };

        // --- Fungsi Helper ---
        const formatDateHeader = (dateStr) => {
            if (!dateStr) return '';
            const date = new Date(dateStr);
            if (isNaN(date.getTime())) return dateStr; 
            return date.toLocaleString('en-GB', { month: 'short', year: '2-digit' });
        };

        const sortedCategory = computed(() => {
            if (!reports.convertData || reports.convertData.length === 0) return [];
            return [...reports.convertData]
                .sort((a, b) => b.ttl_bycategory - a.ttl_bycategory)
                .slice(0, 10);
        });

        const monthlyTransition = computed(() => {
		    // 1. Mun data kosong, balikkeun array kosong
		    if (!reports.transition || reports.transition.length === 0) return [];

		    // 2. Siapkan wadah jang baris "Open" jeung "Closed"
		    const rows = [
		        { status: 'Case Closed', status_total: 0 },
		        { status: 'In Progress', status_total: 0 },
		        // { status: 'Total Data', status_total: 0 },
		    ];

		    // 3. Iterasi daptar header bulan (Jan 26, Feb 26, dst)
		    reports.tableHeader.forEach(monthKey => {
		        // Cari data bulan nu cocog tina hasil AJAX (reports.transition)
		        const monthData = reports.transition.find(d => d.month === monthKey);
		        
		        if (monthData) {
		            // Status Open: jumlahkeun status_10 nepi ka status_43
		            // Status Closed: cokot tina status_50
		            const closedVal = parseFloat(monthData.case_close || 0);
		            const openVal = parseFloat(monthData.in_progress || 0); // Atanapi jumlahkeun manual status 10-43
		            // const totalVal = parseFloat(monthData.status_total || 0);

		            // Simpen data per bulan dina baris masing-masing
		            rows[0][monthKey] = closedVal;
		            rows[1][monthKey] = openVal;
		            // rows[2][monthKey] = totalVal;

		            // Tambahkeun ka Grand Total per Baris
		            rows[0].status_total += closedVal;
		            rows[1].status_total += openVal;
		            // rows[2].status_total += totalVal;
		        } else {
		            rows[0][monthKey] = 0;
		            rows[1][monthKey] = 0;
		            // rows[2][monthKey] = 0;
		        }
		    });

		    return rows;
		});

        // Forward on same day
		const monthlyOnSameday = computed(() => {
		    if (!reports.transition || reports.transition.length === 0) return [];
		    
		    const rows = [
		    	{ status: 'Total Keluhan', status_total: 0 },
		    	{ status: 'Same Day Forward', status_total: 0 },
		    	{ status: '% Same Day', status_total: 0 },
		    ];

		    reports.tableHeader.forEach(monthKey => {
		        const monthData = reports.transition.find(d => d.month === monthKey);
		        if (monthData) {
		            const ttl = parseFloat(monthData.status_total || 0);
		            const val = parseFloat(monthData.same_day_forward || 0);
		            const ratio = parseFloat(monthData.same_day_ratio || 0);
		            
		            rows[0][monthKey] = ttl;
		            rows[1][monthKey] = val;
		            rows[2][monthKey] = parseFloat(ratio * 100).toFixed(1) + '%';

		            rows[0].status_total += ttl;
		            rows[1].status_total += val;
		            rows[2].status_total = parseFloat(val / ttl * 100).toFixed(1) + '%';
		        } else {
		            rows[0][monthKey] = 0;
		            rows[1][monthKey] = 0;
		            rows[2][monthKey] = 0;
		        }
		    });
		    return rows;
		});

        const byMonths = computed(() => {
            if (!reports.transition || reports.transition.length === 0) return [];

            const rowTotal = { status: 'Total Data', status_total: 0 };

            reports.tableHeader.forEach(monthKey => {
                const monthData = reports.transition.find(d => d.month === monthKey);
                if (monthData) {
                    const totalVal = parseFloat(monthData.status_total) || 0;
                    rowTotal[monthKey] = totalVal;
                    rowTotal.status_total += totalVal;
                } else {
                    rowTotal[monthKey] = 0;
                }
            });
            return [rowTotal]; 
        }); // <-- Ieu nutup computed

		const statusDetail = computed(() => {
		    // 1. Cék bisi datana kosong kénéh
		    if (!reports.statusDetail || reports.statusDetail.length === 0) return [];

		    return reports.statusDetail.map(row => {
		        // 2. Pastikeun total jadi angka (Integer)
		        const total = parseInt(row.total_all) || 0;

		        return {
		            ...row,
		            // Paké month_label sangkan muncul "Mar 2026"
		            month: row.month_label, 
		            
		            // Kolom Under Branch (S20-S29)
		            underBranch: {
		                data: [row.s20, row.s21, row.s22, row.s23, row.s24, row.s25, row.s26, row.s27, row.s28, row.s29],
					    ttl: parseInt(row.ttl_under_branch) || 0,
					    pct: getPercent(parseInt(row.ttl_under_branch), total) // Paké parseInt meh yakin angka
		            },
		            
		            // Kolom Wait Complt (S40-S43)
		            waitComplt: {
		                data: [row.s40, row.s41, row.s42, row.s43],
		                ttl: parseInt(row.ttl_wait_complt) || 0,
		                pct: getPercent(row.ttl_wait_complt, total)
		            },
		            
		            // Kolom Wait Part Delivery (S31-S35)
		            waitPart: {
		                data: [row.s31, row.s32, row.s33, row.s34, row.s35],
		                ttl: parseInt(row.ttl_wait_part) || 0,
		                pct: getPercent(row.ttl_wait_part, total)
		            },
		            
		            // Kolom Sésana
		            waitPart30: {
		                val: row.s30,
		                pct: getPercent(row.s30, total)
		            },
		            inProgress: {
		                ttl: parseInt(row.ttl_in_progress) || 0,
		                pct: getPercent(row.ttl_in_progress, total)
		            },
		            caseClosed: {
		                ttl: parseInt(row.status_50) || 0,
		                pct: getPercent(row.status_50, total)
		            }
		        };
		    });
		});

		// Status detail top 10
		const statusDetailTop10 = computed(() => {
		    return statusDetail.value.slice(0, 10);
		});

		// PREV Status detail top 10
		const statusDesctriptionDetail = computed(() => {
		    // 1. Cék bisi datana kosong kénéh
		    if (!reports.descriptionByStatusDetail || reports.descriptionByStatusDetail.length === 0) return [];

		    // AMBIL TOP 10 SAJA
		    const topTen = reports.descriptionByStatusDetail.slice(0, 100);

		    return topTen.map(row => {
		        const total = parseInt(row.total_all) || 0;
		        return {
		            ...row,
		            month: row.claim_description, 
		            underBranch: {
		                data: [row.s20, row.s21, row.s22, row.s23, row.s24, row.s25, row.s26, row.s27, row.s28, row.s29],
		                ttl: parseInt(row.ttl_under_branch) || 0,
		                pct: getPercent(parseInt(row.ttl_under_branch), total)
		            },
		            waitComplt: {
		                data: [row.s40, row.s41, row.s42, row.s43],
		                ttl: parseInt(row.ttl_wait_complt) || 0,
		                pct: getPercent(row.ttl_wait_complt, total)
		            },
		            waitPart: {
		                data: [row.s31, row.s32, row.s33, row.s34, row.s35],
		                ttl: parseInt(row.ttl_wait_part) || 0,
		                pct: getPercent(row.ttl_wait_part, total)
		            },
		            waitPart30: {
		                val: row.s30,
		                pct: getPercent(row.s30, total)
		            },
		            inProgress: {
		                ttl: parseInt(row.ttl_in_progress) || 0,
		                pct: getPercent(row.ttl_in_progress, total)
		            },
		            caseClosed: {
		                ttl: parseInt(row.status_50) || 0,
		                pct: getPercent(row.status_50, total)
		            }
		        };
		    });
		});

		// by Region - Branch - PIC report
		const branchBreakdown = computed(() => {
		    if (!reports.branchData) return [];
		    // Data ti backend kedah tos dikelompokkeun per Region -> Branch
		    return reports.branchData; 
		});

		// Column Total
        const columnTotals = computed(() => {
            const totals = {};
            reports.tableHeader.forEach(head => totals[head] = 0);
            totals['grandTotal'] = 0;

            reports.convertData.forEach(row => {
                reports.tableHeader.forEach(head => {
                    totals[head] += parseFloat(row[head] || 0);
                });
                totals['grandTotal'] += parseFloat(row.ttl_bycategory || 0);
            });
            return totals;
        });

        // untuk tfoot table #4 & #5
        const table4Totals = computed(() => overallTotals.value);

        const overallTotals = computed(() => {
		    if (!reports.statusDetail || reports.statusDetail.length === 0) return null;

		    const res = {
		        g1: { keys: ['s20','s21','s22','s23','s24','s25','s26','s27','s28','s29'], ttl: 0 },
		        g2: { keys: ['s40','s41','s42','s43'], ttl: 0 },
		        g3: { keys: ['s31','s32','s33','s34','s35'], ttl: 0 },
		        s30: 0,
		        s50: 0,
		        inProgressTtl: 0,
		        grandTotal: 0,
		        all_status: {}
		    };

		    reports.statusDetail.forEach(row => {
		        // Itung per status
		        [...res.g1.keys, ...res.g2.keys, ...res.g3.keys, 's30', 'status_50'].forEach(key => {
		            const val = parseInt(row[key]) || 0;
		            res.all_status[key] = (res.all_status[key] || 0) + val;
		            
		            // Tambahkeun ka Sub-Total masing-masing
		            if (res.g1.keys.includes(key)) res.g1.ttl += val;
		            if (res.g2.keys.includes(key)) res.g2.ttl += val;
		            if (res.g3.keys.includes(key)) res.g3.ttl += val;
		            if (key === 's30') res.s30 += val;
		            if (key === 'status_50') res.s50 += val;
		        });
		        res.grandTotal += parseInt(row.total_all || 0);
		    });

		    res.inProgressTtl = res.g1.ttl + res.g2.ttl + res.g3.ttl + res.s30;
		    return res;
		});

        const formatNumber = (num) => {
            const n = parseFloat(num);
            return !isNaN(n) ? n.toLocaleString('en-EN') : 0;
        };

        const getPercent = (value, rowTotal) => {
		    const v = parseFloat(value) || 0;
		    const t = parseFloat(rowTotal) || 0;
		    if (t === 0) return 0;
		    return ((v / t) * 100).toFixed(1);
		};

        onMounted(() => {
            const poeIeu = new Date();
            const genepBulanLalu = new Date();
            genepBulanLalu.setMonth(poeIeu.getMonth() - 5);
            genepBulanLalu.setDate(1);

            filters.end = poeIeu.toISOString().split('T')[0];
            filters.start = genepBulanLalu.toISOString().split('T')[0];
            
            loadData();
        });

        console.log(byMonths);

        return {
        	monthlyOnSameday, statusDetailTop10, table4Totals, branchBreakdown,
            loading, loadingBranch, filters, reports, sortedCategory, byMonths, overallTotals, 
            listRegion, listBranch, fetchBranch,
            loadData, formatNumber, formatDateHeader, monthlyTransition, statusDetail, statusDesctriptionDetail, 
            columnTotals, getPercent
        };
	}
}).mount("#app");