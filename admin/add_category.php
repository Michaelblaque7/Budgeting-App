<?php
session_start();   
require_once "partials/joiner.php";
require_once "classes/Oversight.php";
require_once "admin_guard.php";
?>

<div class="mb-3">
    <form action="process/add_process.php" method="post">
        <label for="" class="form-label">Add Category</label>
        <input type="text" class="form-control" name="addct">
        <input type="hidden" name="hide" value="<?php echo $_SESSION['admin_id']; ?>'">
        <button class="btn btn-success" name="btnadd">Add</button>
    </form>
</div>
</body>
</html>