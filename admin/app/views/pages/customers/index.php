<div class="content_container">
    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Customers</h1>
            </div>
            <div class="table_action">
                <ul class="table_tab">
                    <li class="active"><a href="#">Table</a></li>
                    <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                </ul>
                <div class="table_totalItem">
                    Total: <b id="total_item">0</b> customers
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
                <!-- <div class="table_left">
                    <button class="modal-open btn btn_primary table_add" data-modal-target="#create-modal">
                        Thêm mới
                    </button>
                </div> -->
            </div>
            <div class="table_content">
                <!-- Table root -->
                <table id="table"></table>
            </div>
        </div>
    </div>
</div>



<style>
    .btn_show,
    .btn_confirm {
        display: none;
    }
</style>

<script src="./public/js/table.js"></script>
<script src="./public/js/toast.js"></script>
<script src="./public/js/validator.js"></script>
<script src="./public/js/utils.js"></script>

<script>
    const columns = [
        { title: '#', field: 'index', width: '100px' },
        { title: 'Name', field: 'name' },
        {
            title: 'Gender',
            field: 'gender',
            width: '100px',
            align: 'center',
            filter: [{ 1: 'Male' }, { 0: 'Female' }],
        },
        { title: 'Email', field: 'email' },
        { title: 'Phone number', field: 'phone' }
    ];

    const init = () => {
        $.ajax({
            type: 'GET',
            url: '/apple/admin/customer/all',
            success: function (response) {
                const customers = response;

                // Init table
                renderTable(customers, columns, false);

                // Handle search
                searchTable(customers, '#search', columns, false)

                $('#table_main').removeClass('animation')
            },
            error: function (error) {
                toast({
                    title: 'Fail load page!',
                    message: `Error server`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });
    }

    init();
</script>