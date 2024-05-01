<!-- Checkout Section Begin -->
<section class="mb-5 p-3">
    <div class="row" id="orderHistoryContainer">

    </div>
</section>
<!-- Checkout Section End -->


<script>
    const IMAGES_PATH = "http://localhost/apple/product_img"

    const renderOrderHistory = (orderHistory) => {
        const orderHistoryContainer = document.getElementById('orderHistoryContainer');

        const orderHistoryHTML = orderHistory.map((order, index) => {
            return `
                <div class="col-lg-12 mb-5 shadow-lg p-3">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-start flex-column" style="gap: 3px;">
                            ${getStatusIconAndText(order.status)}
                            <div>
                                Tổng thành tiền: <span class="fs-4 text-danger font-weight-bold">${Number(order.total_price).toLocaleString('vi-VN')} VND <span>
                            </div>
                        </div>
                        <div class="flex-1">
                            ${getButtonBasedOnStatus(order.status,order.order_id)}
                        </div>
                    </div>
                    <hr class="dropdown-divider">
                    <div class="my-2">
                        <table class="table table-striped border rounded-lg">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Image</td>
                                    <td>Title</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                </tr>
                            </thead>
                            <tbody>
                                ${renderOrderDetails(order.orderDetail)}
                            </tbody>
                        </table>
                    </div>
                    <hr class="dropdown-divider">
                    <div class="mt-3 d-flex justify-content-end">
                        <span>Ngày tạo: <span class="text-dark font-weight-bold flex-1">${order.created_at}</span>.</span>
                    </div>
                </div>
            `;
        }).join('');

        orderHistoryContainer.innerHTML = orderHistoryHTML;
    }

    const getStatusIconAndText = (status) => {
        switch (status) {
            case '0':
                return `<span class="text-dark font-weight-bold"># Đơn hàng của bạn đang chờ xác nhận</span>`;
            case '1':
                return `<span class="text-dark font-weight-bold"># Đơn hàng của bạn đã được xác nhận</span>`;
            case '2':
                return `<span class="text-dark font-weight-bold"># Đơn hàng của bạn đã đưọc hủy</span>`;
            default:
                return `<span class="text-dark font-weight-bold"># Đơn hàng của bạn đang chờ xác nhận</span>`;
        }
    }

    const renderOrderDetails = (orderDetails) => {
        let html = '';
        if (orderDetails && orderDetails.length > 0) {
            orderDetails.forEach((orderDetail, index) => {
                html += `
                <tr>
                    <td>${index+1}</td>
                    <td><img src=" ${IMAGES_PATH}/${orderDetail.product.image}" alt="" width="25" height="25"></td>
                    <td>${orderDetail.product.title}</td>
                    <td>${orderDetail.quantity}</td>
                    <td>${Number(orderDetail.product.price).toLocaleString('vi-VN')} VND</td>
                </tr>
            `;
            });
        }
        return html;
    }

    const getButtonBasedOnStatus = (status, orderId) => {
        switch (status) {
            case '0':
                return `<button class="site-btn rounded-0 w-100" onclick="updateStatusCancle('${orderId}')">Hủy đơn hàng</button>`;
            case '1':
                return `<button class="btn btn-secondary w-100">Đã nhận</button>`;
            case '2':
                return `<button class="btn btn-secondary disabled w-100" style="cursor: not-allowed;">Đơn hàng Đã Hủy</button>`;
            default:
                return `<button class="btn btn-secondary w-100 disabled" style="cursor: not-allowed;">Đơn hàng đã hủy</button>`;
        }
    }

    // const updateStatusCompleted = (orderId) => {
    //     $.ajax({
    //         url: `http://localhost/phone-ecommerce-chat/customer/user/receiveOrder/${orderId}`,
    //         method: 'GET',
    //         success: function(res) {
    //             if (res.status === 200) {
    //                 showToast(res.message, true)
    //                 window.location.reload();
    //             }
    //         },
    //         error: function(error) {
    //             showToast("Cập nhật đơn hàng thất bại!", false)
    //         }
    //     });
    // };

    const updateStatusCancle = (orderId) => {
        $.ajax({
            url: `http://localhost/apple/customer/user/cancleOrder/${orderId}`,
            method: 'GET',
            success: function(res) {
                if (res.status === 200) {
                    showToast(res.message, true)
                    window.location.reload();
                }
            },
            error: function(error) {
                showToast("Cập nhật đơn hàng thất bại!", false)
            }
        });
    };

    $(document).ready(function() {
        $.ajax({
            url: `http://localhost/apple/customer/user/getOrderHistory`,
            method: 'GET',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                if (res.status === 200) {
                    renderOrderHistory(res.data)
                }
            },
            error: function(error) {
                console.error('Lỗi khi lấy dữ liệu sản phẩm:', error);
            }
        });

        // Actions
    });
</script>