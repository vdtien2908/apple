<div class="content_container">
    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Orders</h1>
            </div>
            <div class="table_action">
                <ul class="table_tab">
                    <li class="active"><a href="#">Table</a></li>
                    <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                </ul>
                <div class="table_totalItem">
                    Total: <b id="total_item">0</b> orders
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
            </div>
            <div class="table_content">
                <!-- Table root -->
                <table id="table"></table>
            </div>
        </div>
    </div>
</div>

<style>
    .btn_edit,
    .btn_delete {
        display: none;
    }
</style>

<!-- Modal show -->
<div id="show-modal" class="modal">
    <div class="modal_container">
        <button class="modal_close btn-close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="modal_inner">
            <h1 class="modal_title">Detail order</h1>
            <div class="form mt-5" id="form_delete" style="width: 1000px;">
                <div class="bill">
                    <div class="bill__header">
                        <div id="status"> </div>
                        <p>Order <b id="id-order"></b></p>
                    </div>
                    <div class=" bill__content">
                        <div class="bill__top">
                            <div class="bill__info">
                                <div class="customer__info">
                                    <p class="customer__position">Orderer</p>
                                    <p class="customer__name"></p>
                                    <p class="customer__phone"></p>
                                </div>
                                <div class="bill__receive">
                                    <div class="receive__title">Receiver</div>
                                    <div class="receive__name"></div>
                                    <div class="receive__phone"></div>
                                    <div class="receive__address"></div>
                                    <div class="receive__note"></div>
                                    <div class="receive__payment"></div>
                                </div>
                            </div>
                            <div class="bill__date">
                                <p></p>
                            </div>
                        </div>
                        <div class="bill__main">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name product</th>
                                        <th>quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="list-product-order">

                                </tbody>
                            </table>
                        </div>
                        <div class="bill__bottom">
                            <p class="bill__total"></p>
                            <!-- <div class="bill__action">
                                <button class="btn btn_confirm">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                                <button class="btn btn_cancel">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /Modal show -->

<script src="./public/js/table.js"></script>
<script src="./public/js/toast.js"></script>
<script src="./public/js/validator.js"></script>
<script src="./public/js/utils.js"></script>
<script>
    const urlGlobal ="/apple/admin/order";

    const columns = [
        { title: '#', field: 'id', align: 'center', width: '120px' },
        {
            title: 'Status',
            field: 'status_order',
            filter:
                [
                    { 0: 'Pending' }, { 1: "Approved" }, { 2: "Canceled" }
                ],
            align: 'center'
        },
        { title: 'Name receive', field: 'name_receive' },
        { title: 'Phone receive', field: 'phone_receive' },
        { title: 'Total money', field: 'total_money', align: 'right', type: 'format' },
    ];


    const init = () => {
        $.ajax({
            type: 'GET',
            url: `${urlGlobal}/all`,
            success: function (response) {
                const orders = response;
                // Init table
                renderTable(orders, columns, true, 'status_order');

                // Handle search
                searchTable(orders, '#search', columns, true)

                $('#table_main').removeClass('animation')
            },
            error: function (error) {
                toast({
                    title: 'Fail load page',
                    message: `Error server`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });
    }

    init();

    // Handle confirm
    const handleConfirm = (id) => {
        $('#table_main').addClass('animation');
        $.ajax({
            type: 'GET',
            url: `${urlGlobal}/confirm/${id}`,
            success: function (response) {
                init();
                toast({
                    title: 'Success',
                    message: `Confirm order successfully`,
                    type: 'success',
                    duration: 3000,
                });
            },
            error: function (error) {
                toast({
                    title: 'Error',
                    message: `Error system`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });
    }

    // Handle cancel
    const handleCancel = (id) => {
        $('#table_main').addClass('animation');
        $.ajax({
            type: 'GET',
            url: `${urlGlobal}/cancel/${id}`,
            success: function (response) {
                init();
                toast({
                    title: 'Success',
                    message: `Cancel order successfully`,
                    type: 'success',
                    duration: 3000,
                });
            },
            error: function (error) {
                toast({
                    title: 'Error',
                    message: `Error system`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });
    }

    // Handle show
    const handleShow = (id) => {
        $('#table_main').addClass('animation');
        $.ajax({
            type: 'GET',
            url: `${urlGlobal}/edit/${id}`,
            success: function (response) {
                const VND = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                });

                $('#show-modal').addClass('show');
                $('#table_main').removeClass('animation');
                const order = response.order;
                const orderDetails = response.order_details;
                const customer = response.customer;

                // Id order
                $("#id-order").text('#' + order.id);

                // Customer
                $('.customer__name').text('- ' + customer.name);
                $('.customer__phone').text('- ' + customer.phone);

                // Receive
                $('.receive__name').text(order.name_receive);
                $('.receive__phone').text(order.phone_receive);
                $('.receive__address').text(order.address_receive);
                $('.receive__note').text(order.note);

                // Date
                const dateWithTimezone = new Date(order.created_at);

                const dateUTC = new Date(
                    dateWithTimezone.toISOString()
                );

                const formattedDate = dateUTC.toLocaleString('en-US', {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    timeZone: 'UTC',
                });
                $(".bill__date p").text('Thời gian: ' + formattedDate);

                let total = 0;
                let orderDetailHTML = '';
                let index = 1;
                orderDetails.forEach((orderDetail) => {
                    total += orderDetail.quantity * orderDetail.price;
                    orderDetailHTML += 
                        `<tr>
                            <td class="text-center">${index}</td>
                            <td>
                                ${orderDetail.title}
                            </td>
                            <td class="text-center">
                                ${orderDetail.quantity}
                            </td>
                            <td class="text-right">
                            ${VND.format(orderDetail.price)}
                            </td>
                            <td class="text-right">
                            ${VND.format(orderDetail.quantity * orderDetail.price)}
                            </td>
                        </tr>`;
                    index++;
                })
                $('#list-product-order').empty();
                $('#list-product-order').append(orderDetailHTML);

                // Total
                $('.bill__total').text('Total money: ' + VND.format(total));

                // Status
                let htmlStatus = `
                    <div class="btn-status btn-status--pending">
                        Pending
                    </div>
                `;
                if (order.statusOrder === 1) {
                    htmlStatus = `
                    <div class="btn-status btn-status--success">
                        Approved
                    </div>
                `;
                } else if (order.statusOrder === 2) {
                    htmlStatus = `
                    <div class="btn-status btn-status--close">
                        Canceled
                    </div>
                `;
                }

                $('#status').html(htmlStatus);
                if (order.statusOrder !== 0) {
                    $('.bill__action').css('display', 'none');
                }
            },
            error: function (error) {
                toast({
                    title: 'Thao tác thất bại',
                    message: `Lỗi hệ thống`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });

    }

</script>