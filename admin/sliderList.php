<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>

<!-- main body of dashboard -->
<script type="text/javascript" src="../js/admin-datatable.js"></script>
<div class="my-5">
    <div class="cat-list--title">
        <h1>Slider List</h1>
        <table class="table table-striped table-dark w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Slider name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Didier Michel</td>
                    <td><a href="#" class="text-primary">Edit</a> || <a href="#" class="text-primary">Delete</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>System Architect</td>
                    <td><a href="#">Edit</a> || <a href="#">Delete</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'inc/footer.php'; ?>