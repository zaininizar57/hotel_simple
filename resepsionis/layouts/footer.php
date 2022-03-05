</main>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/custom-admin.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/DataTables/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
<script src="../assets/DataTables/DataTables-1.11.5/js/dataTables.bootstrap.min.js"></script>
<script>
var btnAct = document.querySelectorAll("#btn-act");
var act = document.querySelectorAll("#act");

btnAct.forEach((el) => {
    el.addEventListener('click', (e) => {
        el.nextElementSibling.classList.toggle('show');
    });
});
</script>
</body>

</html>