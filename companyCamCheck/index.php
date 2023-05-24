<html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<table id="tblUser">
    <thead>
        <tr>
	    <th>id</th>
	    <th>type</th>
            <th>CompanyCode</th>
            <th>Message</th>
	    <th>Complete</th>
	    <th>Completed Action</th>
	    <th>Received</th>
	    <th>Completed</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>id</th>
            <th>type</th>
            <th>CompanyCode</th>
            <th>Message</th>
            <th>Complete</th>
            <th>Completed Action</th>
            <th>Received</th>
            <th>Completed</th>
        </tr>
    </tfoot>
</table>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "server_processing.php",
	"order": [[0, 'desc']],
    } );
} );
</script>
</html>
