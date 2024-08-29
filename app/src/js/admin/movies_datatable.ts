import DataTable from 'datatables.net-dt';

let table = new DataTable('#movies_datatable', {
	responsive: true,
	pageLength: 10,
});
