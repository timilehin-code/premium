<script src="../assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#booksTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "responsive": true,
            "language": {
                "search": "<i class='fas fa-search'></i> Search Books:",
                "lengthMenu": "Show _MENU_ books",
                "info": "Displaying _START_ to _END_ of _TOTAL_ books"
            }
        });

        $('#toggleSidebar').click(function() {
            $('#sidebar').toggleClass('sidebar-hidden sidebar-active');
            $('#mainContent').toggleClass('full-width');
        });
    });
</script>
</body>

</html>