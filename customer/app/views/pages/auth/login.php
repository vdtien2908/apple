<section class="my-5">
    <div class="container">
        <h2 class="mb-5 font-weight-bolder">Login for faster checkout.</h2>
        <form id="form" action="http://localhost/apple/customer/auth/signIn" class="mx-auto" style="max-width: 450px;">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="font-weight-bold text-center">Login to Apple Store</h3>
                    <h6 class="text-success font-weight-bold">
                        <?php echo isset($_SESSION['register-success']) ? $_SESSION['register-success'] : "" ?>
                        <?php unset($_SESSION['register-success']) ?>

                        <?php echo isset($_SESSION['changepw-success']) ? $_SESSION['changepw-success'] : "" ?>
                        <?php unset($_SESSION['changepw-success']) ?>
                    </h6>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="emailinput">Email address</label>
                        <input type="email" name="email" class="form-control" id="emailinput" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="passwordinput">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordinput" placeholder="123456">
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <button role="button" class="primary-btn w-100">Sign In</button>
                </div>
                <div class="col-12 text-center">
                    <a class="text-dark font-weight-bold" href="http://localhost/apple/customer/auth/forgotPassword">Forgot your password?</a>
                </div>
                <div class="col-12 text-center">
                    Don't have account?
                    <a class="text-dark font-weight-bold" href="http://localhost/apple/customer/auth/register">Register now.</a>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    const URL = "http://localhost/apple/customer"

    $(document).ready(function() {
        $('form').submit(function(e) {
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
                        window.location.href = URL + '/home';
                    } else
                        showToast(res.message, false);
                },
                error: function(xhr, status, error) {
                    showToast('Có lỗi xảy ra: ' + error, false);
                }
            });
        });
    });
</script>