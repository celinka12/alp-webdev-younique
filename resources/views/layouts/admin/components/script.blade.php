<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script
    src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/af-2.7.0/b-3.0.2/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sl-2.0.3/datatables.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "lengthMenu": "_MENU_"
            }
        });

        $('#dataTable2').DataTable({
            "language": {
                "lengthMenu": "_MENU_"
            }
        });
    });
</script>
