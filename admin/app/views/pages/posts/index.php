<div class="content_container">
    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Post</h1>
            </div>
            <div class="table_action">
                <ul class="table_tab">
                    <li class="active"><a href="#">Table</a></li>
                    <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                </ul>
                <div class="table_totalItem">
                    Total: <b id="total_item">0</b> post
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
            <h1 class="modal_title">Create Post</h1>
            <form class="form mt-5" id="form_create" style="width: 800px;">
                <div class="form_group ">
                    <div class='form_field'>
                        <input name="title" id='title' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="title" class="form_label">Title</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <textarea name="content" id='content' type="text" class="form_input" placeholder=" " autocomplete="off"></textarea>
                        <label for="content" class="form_label">Content</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <select name="post_cat_id" id="post_cat_id" class="form_input">
                            <option selected disabled value="">Select category</option>
                        </select>
                        <label for="post_cat_id" class="form_label">Category</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <div class="form-img">
                            <img id="blah" src="./public/img/img.png" alt="">
                        </div>
                        <input name="img" id='img' type="file" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="file" class="form_label">Image</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_action text-right">
                    <div class="btn btn_secondary modal_close">Cance</div>
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
            <h1 class="modal_title">Update product</h1>
            <form class="form mt-5" id="form_edit" style="width: 700px;">
                <div class="form_group" style="display: none;">
                    <div class='form_field'>
                        <input name="id" id='id' type="text" class="form_input">
                    </div>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <input name="title" id='title' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="title" class="form_label">Title</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="group_container">
                    <div class="form_group ">
                        <div class='form_field'>
                            <input name="price" id='price' type="text" class="form_input" placeholder=" "
                                autocomplete="off">
                            <label for="price" class="form_label">Price</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <input name="sale_price" id='sale_price' type="text" class="form_input"
                                placeholder=" " autocomplete="off">
                            <label for="sale_price" class="form_label">Sale price</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                </div>
                <div class="group_container">
                    <div class="form_group ">
                        <div class='form_field'>
                            <input name="color" id='color' type="text" class="form_input" placeholder=" "
                                autocomplete="off">
                            <label for="color" class="form_label">Color</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <select name="hot" id="hot" class="form_input">
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                            </select>
                            <label for="hot" class="form_label">Hot</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <textarea name="description" id='description' type="text" class="form_input" placeholder=" "
                            autocomplete="off"></textarea>
                        <label for="description" class="form_label">Description</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <textarea name="content" id='content' type="text" class="form_input" placeholder=" " autocomplete="off"></textarea>
                        <label for="content" class="form_label">Content</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <select name="category_id" id="category_id" class="form_input">
                            <option selected disabled value="">Select category</option>
                        </select>
                        <label for="category_id" class="form_label">Category</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <div class="form-img">
                            <img id="blah" src="./public/img/img.png" alt="">
                        </div>
                        <input name="img" id='img' type="file" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="file" class="form_label">Image</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_action text-right">
                    <div class="btn btn_secondary modal_close">Huỷ</div>
                    <button type="submit" class="btn btn_submit-update
                ">Cập nhật</button>
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
            <h1 class="modal_title">Delete product</h1>
            <div class="form mt-5" id="form_delete" style="width: 450px;">
                <h1>Are you sure you want to delete the product?</h1>
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

<!-- Modal show -->
<div id="show-modal" class="modal">
    <div class="modal_container">
        <button class="modal_close btn-close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="modal_inner">
            <h1 class="modal_title">Detail product</h1>
            <div class="form_container" style="display:flex; width: 1000px; max-height:inset;">
                <form class="form mt-5" id="form_show" style="width:60%;">
                    <div class="group_container">
                        <div class="form_group ">
                            <div class='form_field'>
                                <div class="form-img text-center">
                                    <img style="width:120px" id="blah" src="./public/img/img.png" alt="">
                                </div>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                        <div class="form_group">
                            <div class='form_field'>
                                <input name="title" id='title' type="text" class="form_input" placeholder=" "
                                    autocomplete="off" readonly="true">
                                <label for="title" class="form_label">Title</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                    </div>
                    <div class="group_container">
                        <div class="form_group ">
                            <div class='form_field'>
                                <input name="price" id='price' type="text" class="form_input" placeholder=" "
                                    autocomplete="off" readonly="true">
                                <label for="price" class="form_label">Price</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                        <div class="form_group ">
                            <div class='form_field'>
                                <input name="sale_price" id='sale_price' type="text" class="form_input"
                                    placeholder=" " autocomplete="off" readonly="true">
                                <label for="sale_price" class="form_label">Sale price</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                    </div>
                    <div class="group_container">
                        <div class="form_group ">
                            <div class='form_field'>
                                <input name="color" id='color' type="text" class="form_input" placeholder=" "
                                    autocomplete="off" readonly="true">
                                <label for="color" class="form_label">Color</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                        <div class="form_group ">
                            <div class='form_field'>
                                <select name="hot" id="hot" class="form_input" style="pointer-events:none">
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <label for="hot" class="form_label">Hot</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <textarea name="description" id='description' type="text" class="form_input" placeholder=" "
                                autocomplete="off" readonly="true"></textarea>
                            <label for="description" class="form_label">Description</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <textarea name="content" id='content' type="text" class="form_input" placeholder=" " autocomplete="off" readonly="true"></textarea>
                            <label for="content" class="form_label">Content</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <select name="category_id" id="category_id" class="form_input" style="pointer-events:none">
                                <option selected disabled value="">Select category</option>
                            </select>
                            <label for="category_id" class="form_label">Category</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                </form>
    
                <div class="info_product-detail" style="width:40%">
                    <h2 class="text-center">Add specification</h2>
                    <!-- Add info detail product -->
                    <form class="form" id="form_add-info" style="padding:10px;">
                        <div class="group_container-3">
                            <div class="form_group">
                                <div class='form_field'>
                                    <input name="key" id='key' type="text" class="form_input" placeholder=" "
                                        autocomplete="off">
                                    <label for="key" class="form_label">Key</label>
                                </div>
                                <span class="form_messages"></span>
                            </div>
                            <div class="form_group ">
                                <div class='form_field'>
                                    <input name="value" id='value' type="text" class="form_input" placeholder=" "
                                        autocomplete="off">
                                    <label for="value" class="form_label">Value</label>
                                </div>
                                <span class="form_messages"></span>
                            </div>
                            <div class="form_action text-right">
                                <button type="submit" class="btn btn_primary">Add</button>
                            </div>
                        </div>
                    </form>
                    <div class="" style="overflow: auto;max-height: calc(100vh - 310px);">
                        <table id="table-mini"></table>
                    </div>
                    <!-- /Add info detail product -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal show-->


<script src="./public/js/table.js"></script>
<script src="./public/js/table-mini.js"></script>
<script src="./public/js/toast.js"></script>
<script src="./public/js/validator.js"></script>
<script src="./public/js/utils.js"></script>

<script>
    let product_id = 0;
    // Preview Img Input form create
    const fileValueCreate =document.querySelector('#form_create #img');
    const blahCreate =document.querySelector('#form_create #blah');
    fileValueCreate.onchange = evt => {
        const [file] = fileValueCreate.files
        if (file) {
            blahCreate.src = URL.createObjectURL(file)
        }
    }

    // Preview Img Input form update
    const fileValueUpdate =document.querySelector('#form_edit #img');
    const blahUpdate =document.querySelector('#form_edit #blah');
    fileValueUpdate.onchange = evt => {
        const [file] = fileValueUpdate.files
        if (file) {
            blahUpdate.src = URL.createObjectURL(file)
        }
    }


    const columns = [
        {
            title: '#',
            field: 'index',
            width: '100px'
        },
        {
            title: 'Title',
            field: 'title',
            align: 'center'
        },
        {
            title: 'Image',
            field: 'img',
            align: 'center',
            type: 'img'
        },
    ];
    
    

    // Define api
    const urlGlobal = '/apple/admin/post'

    const init = () => {
        // Reset img  form create
        $('#create-modal #blah').attr('src', './public/img/img.png');

        //  Handle load categories form create product
        $.ajax({
            type: 'GET',
            url: '/apple/admin/post_category/all',
            success: function(response) {
                const categories = response;
                const selectElement = $('#create-modal #post_cat_id');

                // Xóa các option cũ nếu có
                selectElement.empty();

                // Lặp qua mảng categories và tạo các option
                categories.map((category) => {
                    const option = $('<option></option>');
                    option.attr('value', category.id);
                    option.text(category.title);
                    selectElement.append(option);
                });
            },
            error: function(error) {
                toast({
                    title: 'Failed load category form create',
                    message: `Error server`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });

        $.ajax({
            type: 'GET',
            url: `${urlGlobal}/all`,
            success: function(response) {
                const products = response;
                // Init table
                renderTable(products, columns, true);

                // Handle search
                searchTable(products, '#search', columns, true)

                $('#table_main').removeClass('animation')
            },
            error: function(error) {
                toast({
                    title: 'Failed load page',
                    message: `Error server`,
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
            success: function(response) {
                const product = response;
                $('#form_edit #id').val(product.id);
                $('#form_edit #title').val(product.title);
                $('#form_edit #price').val(product.price + 'đ');
                $('#form_edit #sale_price').val(product.sale_price);
                $('#form_edit #content').val(product.content);
                $('#form_edit #description').val(product.description);
                $('#form_edit #color').val(product.color);
                    // Reset img  form edit
                $('#form_edit #blah').attr('src', `../product_img/${product.img}`);

                 //  Handle load categories form edit product
                $.ajax({
                    type: 'GET',
                    url: '/apple/admin/category/all',
                    success: function(response) {
                        const categories = response;
                        const selectElement = $('#edit-modal #category_id');

                        // Xóa các option cũ nếu có
                        selectElement.empty();

                        // Lặp qua mảng categories và tạo các option
                        categories.map((category) => {
                            const option = $('<option></option>');
                            option.attr('value', category.id);
                            option.text(category.title);
                            if(product.category_id == category.id){
                                option.attr('selected', 'selected');
                            }
                            selectElement.append(option);
                        });
                    },
                    error: function(error) {
                        toast({
                            title: 'Failed',
                            message: `${error.responseJSON.message}`,
                            type: 'error',
                            duration: 3000,
                        });
                    }
                });
            },
            error: function(error) {
                toast({
                    title: 'Error',
                    message: `${error.responseJSON.message}`,
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
    $('#delete-modal .btn_submit-delete').on('click', function() {
        $('#delete-modal').removeClass('show');
        $('#table_main').addClass('animation');
        const id = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            url: `${urlGlobal}/delete/${id}`,
            success: function(response) {
                toast({
                    title: 'Success',
                    message: `Deleted product successfully!`,
                    type: 'success',
                    duration: 3000,
                });
                init();
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
            Validator.isRequired('#title', 'Title is require.'),
            Validator.isRequired('#content', 'Content is require.'),
            Validator.isRequired('#img', 'Image is require.'),
            Validator.isRequired('#post_cat_id', 'Category is require.'),

        ],
        onSubmit: (data) => {
            $('#create-modal').removeClass('show');
            $('#table_main').addClass('animation');


            // Add FormData when handle file with ajax
            const formData = new FormData();
            formData.append('title', data.title);
            formData.append('content', data.content);
            formData.append('img', data.img);
            formData.append('post_cat_id', data.post_cat_id);


            $.ajax({
                type: 'POST',
                url: `${urlGlobal}/create`,
                data: formData,
                contentType: false,
                cache: false,
                processData: false, // Add this row when handle file
            
                success: function(response) {
                    toast({
                        title: 'Success',
                        message: `Created post successfully!`,
                        type: 'success',
                        duration: 3000,
                    });
                    init();
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
        }
    })

    // Handle validation form edit
    Validator({
        form: '#form_edit',
        formGroupSelector: '.form_group',
        errorSelector: '.form_messages',
        rules: [
            Validator.isRequired('#title', 'Title is require.'),
            Validator.isRequired('#price', 'Price is require.'),
            Validator.isNumber('#price', 'Please enter number.'),
            Validator.isRequired('#sale_price', 'Sale price is require.'),
            Validator.isNumber('#sale_price', 'Please enter number.'),
            Validator.isRequired('#description', 'Description is require.'),
            Validator.isRequired('#content', 'Content is require.'),
            Validator.isRequired('#color', 'Color is require.'),
            // Validator.isRequired('#img', 'Image is require.'),
            Validator.isRequired('#category_id', 'Category is require.'),
        ],
        onSubmit: (data) => {
            const {
                id,
                ...restData
            } = data;
            $('#edit-modal').removeClass('show');
            $('#table_main').addClass('animation');

            // Add FormData when handle file with ajax
            const formData = new FormData();
            formData.append('title', restData.title);
            formData.append('price', restData.price);
            formData.append('sale_price', restData.sale_price);
            formData.append('hot', restData.hot);
            formData.append('content', restData.content);
            formData.append('description', restData.description);
            formData.append('color', restData.color);
            formData.append('category_id', restData.category_id);
            formData.append('img', restData.img);
            
            $.ajax({
                type: 'POST',
                url: `${urlGlobal}/update/${id}`,
                data: formData,
                contentType: false,
                cache: false,
                processData: false, // Add this row when handle file
                success: function(response) {
                    toast({
                        title: 'Success',
                        message: `Update product successfully!`,
                        type: 'success',
                        duration: 3000,
                    });
                    init();
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
        }
    });
</script>

