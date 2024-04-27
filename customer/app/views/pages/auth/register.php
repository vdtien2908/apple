<section class="my-5">
    <div class="container">
        <h2 class="mb-5 font-weight-bolder">Register to begin shopping our products.</h2>
        <form id="registerForm" action="<?php echo URL_APP; ?>/auth/signUp" class="mx-auto" style="max-width: 450px;">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="font-weight-bold text-center">Register to Apple Store</h3>
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
                        <input type="password" name="password" class="form-control" id="passwordinput" placeholder="">
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked id="defaultCheck1">
                        <label class="form-check-label font-weight-bold " for="defaultCheck1">
                            I accept the lisence.
                        </label>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <button role="button" class="primary-btn w-100">REGISTER</button>
                </div>
                <div class="col-12 text-center">
                    Alrealy have account?
                    <a href="http://localhost/apple/customer/auth/login" class="text-dark font-weight-bold">Login now.</a>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    const URL = "http://localhost/apple/customer"

    const validateForm = () => {
        var email = $('input[name="email"]').val().trim();
        var password = $('input[name="password"]').val().trim();

        if (email === '') {
            showToast("Please, enter email account", false);
            return false;
        }

        if (password === '') {
            showToast("Please, enter password", false);
            return false;
        } else if (password.length < 6) {
            showToast("Please, password must have at least 6 character", false);
            return false;
        }

        return true;
    }

    $(document).ready(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault();

            if (validateForm()) {
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
                        } else
                            showToast(res.message, false);
                            
                    },
                    error: function(xhr, status, error) {
                        showToast('Có lỗi xảy ra: ' + error, false);
                    }
                });
            }
        });
    });
</script>