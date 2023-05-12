<?php
if(!isset($_GET['user_id'])) {
    Semej::set('danger', 'error', 'Missing user id');
    header('Location: dashboard.php?page=users');
}

$_user = new User();
$id = Sanitizer::sanitize($_GET['user_id']);
$user = $_user->Edit($id);
$user = $user[0];

if(isset($_POST['update_user_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = Sanitizer::sanitize($_POST['frm']);
    $id = $user['id'];
    $userclass = new User();
    $userclass->update($id, $data);
}
?>
<h2>Edit user:</h2>

<div class="col-sm-12">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?page=user-edit&user_id=".$user['id']); ?>">
    <input type="hidden" name="frm[csrf_token]" value="<?php echo CsrfToken::generate(); ?>">
        <div class="form-group form-floating mb-3">
            <input value="<?php echo $user['fullname']; ?>" type="text" name="frm[fullname]" id="fullname" placeholder="Enter fullname" class="form-control">
            <label for="fullname">full name</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input value="<?php echo $user['ncode']; ?>" type="number" name="frm[ncode]" id="ncode" placeholder="Enter national code" class="form-control">
            <label for="ncode">national code</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input value="<?php echo $user['phone']; ?>" type="number" name="frm[phone]" id="phone" placeholder="Enter phone" class="form-control">
            <label for="phone">phone</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="password" name="frm[password]" id="password" placeholder="Enter password" class="form-control">
            <label for="password">password</label>
        </div>
        <div class="form-check mb-3">
            <input <?php echo ($user['is_active'] == 1) ? 'checked' : ''; ?> class="form-check-input" type="checkbox" name="frm['is_active']" id="is_active">
            <label for="is_active" class="form-check-label">Active</label>
        </div>
        <div class="form-group form-floating mb-3">
           <input type="submit" name="update_user_btn" value="Update" class="btn btn-primary">
        </div>
    </form>
</div>