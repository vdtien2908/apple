<div class="content_container">
    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Staff</h1>
            </div>
            <div class="table_action">
                <ul class="table_tab">
                    <li class="active"><a href="#">Table</a></li>
                    <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                </ul>
                <div class="table_totalItem">
                    Total: <b id="total_item">0</b> staff
                </div>
            </div>
        </div>
        <div class="table_main animation" id="table_main">
            <div class="table_loader">
                <div class="loader"></div>
            </div>
            <div class="top_table">
                <div class="table_right">
                    <div class="table_search">
                        <input id="search" type="text" placeholder="Search...">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <div class="table_left">
                    <button class="modal-open btn btn_primary table_add" data-modal-target="#create-modal">
                        Create
                    </button>
                </div>
            </div>
            <div class="table_content">
                <!-- Table root -->
                <table id="table"></table>
            </div>
        </div>
    </div>
</div>
<style>
    .btn_cancel,
    .btn_show,
    .btn_confirm {
        display: none;
    }
</style>
<!-- Modal Create -->
<div id="create-modal" class="modal">
    <div class="modal_container">
        <button class="modal_close btn-close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="modal_inner">
            <h1 class="modal_title">Create staff</h1>
            <form class="form mt-5" id="form_create" style="width: 700px;">
                <div class="form_group ">
                    <div class='form_field'>
                        <input name="name" id='name' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="name" class="form_label">Name</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="email" id='email' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="name" class="form_label">Email</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <textarea name="address" id='address' type="text" class="form_input" placeholder=" "
                            autocomplete="off"></textarea>
                        <label for="address" class="form_label">Address</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group">
                    <div class='form_field'>
                        <select name="gender" id='gender' class="form_input">
                            <option value="" disabled selected hidden>-- Select --</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                        <label for="gender" class="form_label">Gender</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="phone" id='phone' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="phone" class="form_label">Phone number</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="password" id='password' type="password" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="password" class="form_label">Password</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="password_r" id='password_r' type="password" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="password_r" class="form_label">Retype password</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_action text-right">
                    <div class="btn btn_secondary modal_close">Cancel</div>
                    <button type="submit" class="btn btn_primary
                    ">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal Create -->

<!-- Modal Edit -->
<div id="edit-modal" class="modal">
    <div class="modal_container">
        <button class="modal_close btn-close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="modal_inner">
            <h1 class="modal_title">Update staff</h1>
            <form class="form mt-5" id="form_edit" style="width: 700px;">
                <div class="form_group" style="display: none;">
                    <div class='form_field'>
                        <input name="id" id='id' type="text" class="form_input">
                    </div>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <input name="name" id='name' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="name" class="form_label">Name</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="email" id='email' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="name" class="form_label">Email</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <textarea name="address" id='address' type="text" class="form_input" placeholder=" "
                            autocomplete="off"></textarea>
                        <label for="address" class="form_label">Address</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group">
                    <div class='form_field'>
                        <select name="gender" id='gender' class="form_input">
                            <option value="" disabled selected hidden>-- Select --</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                        <label for="gender" class="form_label">Gender</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="phone" id='phone' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="phone" class="form_label">Phone number</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_action text-right">
                    <div class="btn btn_secondary modal_close">Cancel</div>
                    <button type="submit" class="btn btn_submit-update
                    ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal Edit-->

<!-- Modal delete -->
<div id="delete-modal" class="modal">
    <div class="modal_container">
        <button class="modal_close btn-close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="modal_inner">
        <h1 class="modal_title">Delete staff</h1>
            <div class="form mt-5" id="form_delete" style="width: 450px;">
                <h1>Are you sure you want to delete the staff?</h1>
                <div class="form_action text-right mt-5">
                    <div class="btn btn_secondary modal_close">Cance</div>
                    <button type="submit" class="btn btn_submit-delete">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal delete -->
<script src="./public/js/table.js"></script>
<script src="./public/js/toast.js"></script>
<script src="./public/js/validator.js"></script>
<script src="./public/js/utils.js"></script>

<script>
    const columns = [
        { title: '#', field: 'index', width: '100px' },
        { title: 'Name', field: 'name' },
        { title: 'Email', field: 'email' },
        { title: 'Phone number', field: 'phone' },
        {
            title: 'Gender',
            field: 'gender',
            width: '100px',
            align: 'center',
            filter: [{ 1: 'Male' }, { 0: 'Female' }],
        },
    ];

    const urlGlobal = "/apple/admin/staff";

    const init = () => {
        $.ajax({
            type: 'GET',
            url: `${urlGlobal}/all`,
            success: function (response) {
                const staffs = response;

                // Init table
                renderTable(staffs, columns, true);

                // Handle search
                searchTable(staffs, '#search', columns, true)

                $('#table_main').removeClass('animation')
            },
            error: function (error) {
                toast({
                    title: 'Tải trang thất bại',
                    message: `Lỗi máy chủ`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });
    }

    init();

    // Handle edit
    const handleEdit = (id) => {
        $('#edit-modal').addClass('show');
        $.ajax({
            type: 'GET',
            url: `${urlGlobal}/edit/${id}`,
            success: function (response) {
                const staff = response;

                $('#form_edit #id').val(staff.id)
                $('#form_edit #name').val(staff.name)
                $('#form_edit #email').val(staff.email)
                $('#form_edit #address').val(staff.address)
                $('#form_edit #gender').val(staff.gender)
                $('#form_edit #phone').val(staff.phone)
            },
            error: function (error) {
                toast({
                    title: 'Error',
                    message: `Error get staff`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });
    }

    // Handle delete
    const handleDelete = (id) => {
        $('#delete-modal').addClass('show');
        $('#delete-modal .btn_submit-delete').data('id', id)
    }

    // Handle click btn delete
    $('#delete-modal .btn_submit-delete').on('click', function () {
        $('#delete-modal').removeClass('show');
        $('#table_main').addClass('animation');
        const id = $(this).data('id');

        $.ajax({
            type: 'GET',
            url: `${urlGlobal}/delete/${id}`,
            success: function(response) {
                init();
                toast({
                    title: 'Success',
                    message: `Deleted staff successfully!`,
                    type: 'success',
                    duration: 3000,
                });
            },
            error: function(error) {
                toast({
                    title: 'Failed',
                    message: `${error.responseJSON.message}`,
                    type: 'error',
                    duration: 3000,
                });
                init();
            }
        });
    })


    // Handle validation form create
    Validator({
        form: '#form_create',
        formGroupSelector: '.form_group',
        errorSelector: '.form_messages',
        rules: [
            Validator.isRequired('#name', 'Name is required.'),
            Validator.isRequired('#email', 'Email is required.'),
            Validator.isRequired('#address', 'Address is required.'),
            Validator.isRequired('#phone', 'Phone is required.'),
            Validator.isRequired('#gender', 'Gender is required.'),
            Validator.isRequired('#password', 'Password is required.'),
            Validator.minLength('#password', 6, 'The password field must be at least 6 characters.'),
            Validator.isRequired('#password_r', 'Please enter this field.'),
            Validator.isConfirmed('#password_r', () => {
                return $('#password').val();
            }, 'The re-entered password does not match.'),
            Validator.isEmail('#email', "Please enter email"),
        ],
        onSubmit: (data) => {
            $('#create-modal').removeClass('show');
            $('#table_main').addClass('animation');

            $.ajax({
                type: 'POST',
                url: `${urlGlobal}/create`,
                data: data,
                success: function(response) {
                    toast({
                        title: 'Success',
                        message: `Created staff successfully!`,
                        type: 'success',
                        duration: 3000,
                    });
                    init();
                },
                error: function(error) {
                    toast({
                        title: `${error.responseJSON.title}`,
                        message: `${error.responseJSON.message}`,
                        type: 'error',
                        duration: 3000,
                    });
                    init();
                }
            });
        }
    })

    // Handle validation form edit
    Validator({
        form: '#form_edit',
        formGroupSelector: '.form_group',
        errorSelector: '.form_messages',
        rules: [
            Validator.isRequired('#name', 'Name is required.'),
            Validator.isRequired('#email', 'Email is required.'),
            Validator.isRequired('#address', 'Address is required.'),
            Validator.isRequired('#phone', 'Phone is required.'),
            Validator.isRequired('#gender', 'Gender is required.'),
            Validator.isEmail('#email', "Please enter email"),
        ],
        onSubmit: (data) => {
            const { id, ...restData } = data;
            $('#edit-modal').removeClass('show');
            $('#table_main').addClass('animation');

            $.ajax({
                type: 'POST',
                url: `${urlGlobal}/update/${id}`,
                data: restData,
                success: function (response) {
                    if (response.code === 1) {
                        toast({
                            title: 'Thất bại',
                            message: response.message,
                            type: 'error',
                            duration: 3000,
                        });
                    } else {
                        toast({
                            title: 'Thành công',
                            message: `Cập nhật nhân viên thành công`,
                            type: 'success',
                            duration: 3000,
                        });
                    }

                    init();
                },
                error: function (error) {
                    toast({
                        title: 'Thất bại',
                        message: `Cập nhật nhân viên thất bại`,
                        type: 'error',
                        duration: 3000,
                    });
                }
            });
        }
    })
</script>