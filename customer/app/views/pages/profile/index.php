<section class="my-5">
    <div class="container">
        <h3 class="mb-5 font-weight-bolder">Checking and update your information here.</h3>
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="form-group">
                    <label for="emailinput">Email address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['auth']['email'] ?>" placeholder="name@example.com">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="nameinput">Fullname</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['auth']['name'] ?>" placeholder="Jony">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $_SESSION['auth']['address'] ?>" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control" value="<?php echo $_SESSION['auth']['phone'] ?>" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Gender</label>
                    <div>
                        <input type="radio" name="gender" value="Male" <?php echo $_SESSION['auth']['gender'] == 0 ? "checked" : "" ?>>
                        <label for="male">Male</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" value="Female" <?php echo $_SESSION['auth']['gender'] == 1 ? "checked" : "" ?>>
                        <label for="female">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-12 my-4">
                <button role="button" class="primary-btn">Update INFORMATION</button>
            </div>
            <div class="col-12">
                <span class="text-secondary">Can't remember your passowrd? </span><a href="http://localhost/apple/customer/auth/forgotPassword" class="text-dark font-weight-bold ">Change password?</a>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.primary-btn').click(function(e) {
            e.preventDefault();

            // Get input values
            const customerName = $('input[name="name"]').val();
            const email = $('input[name="email"]').val();
            const phone = $('input[name="phone"]').val();
            const address = $('input[name="address"]').val();
            const gender = $('input[name="gender"]').val();

            if (!customerName || !email || !phone || !gender || !address) {
                alert('Please check your information!');
                return;
            }

            const formData = {
                name: customerName,
                email: email,
                phone: phone,
                gender: gender,
                address: address
            };

            $.ajax({
                url: `http://localhost/apple/customer/user/updateProfile`,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(res) {
                    if (res.status === 200) {
                        showToast(res.message, true);
                    } else {
                        showToast('Lỗi khi cập nhật hồ sơ: ' + res.message, false);
                    }
                },
                error: function(error) {
                    console.error('Lỗi khi cập nhật hồ sơ:', error);
                    showToast('Đã xảy ra lỗi khi cập nhật hồ sơ!', false);
                }
            });
        });
    });
</script>