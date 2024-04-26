<section class="my-5">
    <div class="container">
        <h2 class="mb-5 font-weight-bolder">Forgot your password, no problem change it here!.</h2>
        <form id="registerForm" action="<?php echo URL_APP; ?>/auth/changePassword" class="mx-auto" style="max-width: 450px;">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="font-weight-bold text-center">Change your password in Apple Store</h3>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="emailinput">Email address</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['auth']['email'] ?>" id="emailinput" placeholder="name@example.com" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="passwordinput">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordinput" placeholder="123456" required>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <button role="button" class="primary-btn w-100">CHANGE PASSWORD</button>
                </div>
                <div class="col-12 text-center">
                    Alrealy have account?
                    <a href="http://localhost/apple/customer/auth/login">Login now.</a>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    const URL = "http://localhost/apple/customer"

    $(document).ready(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status === 200) {
                        showToast(res.message, true);
                        window.location.href = URL + '/auth/login';
                    } else if (res.status === 204) {
                        showToast(res.message, false);
                    } else if (res.status === 404) {
                        showToast(res.message, false);
                    }
                },
                error: function(xhr, status, error) {
                    showToast('Có lỗi xảy ra: ' + error, false);
                }
            });
        });
    });
</script>