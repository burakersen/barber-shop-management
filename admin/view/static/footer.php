    <script src="<?=public_url('js/jquery.min.js')?>"></script>
    <script src="<?=public_url('js/bootstrap/popper.min.js')?>"></script>
    <script src="<?=public_url('js/bootstrap/bootstrap.min.js')?>"></script>
    <script src="<?=public_url('js/sweetalert/sweetalert.min.js')?>"></script>
    <script src="<?=public_url('js/common.js')?>"></script>
    <?php if(session('admin_login')): ?>
    <script src="<?=admin_public_url('js/ajax.js')?>"></script>
    <script src="<?=admin_public_url('js/main.js')?>"></script>
    <?php else: ?>
    <script src="<?=public_url('js/ajax.js')?>"></script>
    <script src="<?=public_url('js/main.js')?>"></script>
    <?php endif; ?>
</body>
</html>
