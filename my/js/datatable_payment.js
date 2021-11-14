'use strict';

// customized display
function display_st_payment(db_table) {
	$(`#${db_table}_title`).html(`<h1> Student Payment Table</h1>`);
	$(`#${db_table}`).DataTable({
		paging: false,
		keys: true,
		ajax: "<?php echo site_url('payment/read_by_month'); ?>",
		columns: [
			{
				data: 'id',
			},
			{
				data: 'year',
			},
			{
				data: 'month',
			},
			{
				data: 'name',
			},
		],

		columnDefs: [
			/*{
				targets: [0],
				render: function (data, type, row, meta) {
					return `#${data}`;
				},
			},*/
			{
				targets: '_all',
				className: 'dt-body-center',
			},
		],
	});

	let table = $(`#${db_table}`).DataTable();
	let preClickedTD = null;
	table
		.on('key-focus', function (e, datatable, cell) {
			if (cell.index().column == 0) {
				display_st_info(cell.data());
				return;
			}
			let clickCellData = cell.data();
			let clickCellInputId = 'td_' + cell.index().row + '_' + cell.index().column;
			let inputData = "<input type='text' id ='" + clickCellInputId + "'>";
			cell.data(inputData).draw();
			cell.inputID = clickCellInputId;
			$('#' + clickCellInputId).attr('originalData', clickCellData);
			//original data 저장함...
			$('#' + clickCellInputId).val(clickCellData);
			$('#' + clickCellInputId).focus();
			preClickedTD = cell;
		})
		.on('key-blur', function (e, datatable, cell) {
			if (preClickedTD) {
				// 선택 상태에서 원복
				returnTdToOriginal(
					`${db_table}`,
					datatable,
					preClickedTD,
					cell.index().row,
					cell.index().column
				);
			}
		});
}
