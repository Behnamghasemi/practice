<?php
if(isset($_POST['create_user_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = Sanitizer::sanitize($_POST['frm']);
    
    $user = new User();
    $user->create($data);
}

?>
<h2>Create new user:</h2>

<div class="col-sm-12">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?page=user-create"); ?>">
    <input type="hidden" name="frm[csrf_token]" value="<?php echo CsrfToken::generate(); ?>">
        <div class="form-group form-floating mb-3">
            <input type="text" name="frm[fullname]" id="fullname" placeholder="Enter fullname" class="form-control">
            <label for="fullname">Firstname</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="number" name="frm[ncode]" id="ncode" placeholder="Enter national code" class="form-control">
            <label for="ncode">national code</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="number" name="frm[phone]" id="phone" placeholder="Enter phone" class="form-control">
            <label for="phone">phone</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="password" name="frm[password]" id="password" placeholder="Enter password" class="form-control">
            <label for="password">password</label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="frm['is_active']" id="is_active">
            <label for="is_active" class="form-check-label">Active</label>
        </div>
        <div class="form-group form-floating mb-3">
           <input type="submit" name="create_user_btn" value="Create" class="btn btn-primary">
        </div>
    </form>
</div>