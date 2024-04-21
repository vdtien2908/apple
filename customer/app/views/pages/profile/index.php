<section class="my-5">
    <div class="container">
        <h3 class="mb-5 font-weight-bolder">Checking and update your information here.</h3>
        <form id="form" action="http://localhost/apple/customer/auth/signIn">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                        <label for="emailinput">Email address</label>
                        <input type="email" name="email" class="form-control" id="emailinput" placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="passwordinput">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordinput" placeholder="123456">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="nameinput">Fullname</label>
                        <input type="text" name="name" class="form-control" id="nameinput" placeholder="Jony">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="washinton">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="+1 3589">
                    </div>
                </div>
                <div class="col-12 my-4">
                    <button role="button" class="primary-btn">Update INFORMATION</button>
                </div>
                <div class="col-12 text-center">
                    <a href="http://localhost/apple/customer/auth/forgotPassword">Forgot your password?</a>
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