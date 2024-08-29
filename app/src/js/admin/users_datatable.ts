import DataTable from 'datatables.net-dt';
import 'datatables.net-responsive-dt';

let table = new DataTable('#users_datatable', {
	responsive: true,
	pageLength: 10,
});
