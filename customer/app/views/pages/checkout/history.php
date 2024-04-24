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
                        <div class="d-flex" style="gap: 5px;">
                            <span class="text-dark font-weight-bold text-truncate" style="max-width: 250px;">Đơn hàng số: ${('00000' + Math.floor(Math.random() * 10000000000)).slice(-5)}</span>
                        </div>
                        <div class="d-flex align-items-center" style="gap: 3px;">
                            ${getStatusIconAndText(order.status)}
                        </div>
                    </div>
                    <hr class="dropdown-divider">
                    <div class="my-2">
                        ${renderOrderDetails(order.orderDetail)}
                    </div>
                    <hr class="dropdown-divider">
                    <div class="my-2 ml-auto ms-auto">
                        Tổng thành tiền: <span class="fs-4 text-danger font-weight-bold">${Number(order.total_price).toLocaleString('vi-VN')} VND <span>
                    </div>
                    <div class="mt-3 d-flex justify-content-between ">
                        <span>Ngày tạo đơn hàng: <span class="text-dark flex-1">${order.created_at}</span>.</span>
                        <div class="flex-1">
                            ${getButtonBasedOnStatus(order.status,order.order_id)}
                        </div>
                    </div>
                </div>
            `;
        }).join('');

        orderHistoryContainer.innerHTML = orderHistoryHTML;
    }

    const getStatusIconAndText = (status) => {
        switch (status) {
            case 'đang chờ':
                return `<span class="text-dark font-weight-bold">Đơn hàng của bạn đang chờ xác nhận</span>`;
            case 'đang giao':
                return `<span class="text-dark font-weight-bold">Đơn hàng của bạn đang được vận chuyển</span>`;
            case 'đã giao':
                return `<span class="text-dark font-weight-bold">Đơn hàng của bạn đã giao thành công</span>`;
            case 'đã hủy':
                return `<span class="text-dark font-weight-bold">Đơn hàng của bạn đã đưọc hủy</span>`;
            default:
                return `<span class="text-dark font-weight-bold">Đơn hàng của bạn đang chờ xác nhận</span>`;
        }
    }

    const renderOrderDetails = (orderDetails) => {
        let html = '';
        if (orderDetails && orderDetails.length > 0) {
            orderDetails.forEach(orderDetail => {
                html += `
                <div class="row">
                    <div class="col-2 mb-2">
                        <img src=" ${IMAGES_PATH}/${orderDetail.product.image}" alt="" width="50" height="50">
                    </div>
                    <div class="col-7 d-flex flex-column" style="gap: 5px;">
                        <span class="text-dark font-weight-bold">
                            ${orderDetail.product.title }
                        </span>
                        <span class="text-muted">
                            Số lượng: ${orderDetail.quantity}
                        </span>
                    </div>
                    <div class="col-3">
                        <span class="text-danger font-weight-bold">${Number(orderDetail.product.price).toLocaleString('vi-VN')} VND</span>
                    </div>
                </div>
            `;
            });
        }
        return html;
    }

    const getButtonBasedOnStatus = (status, orderId) => {
        switch (status) {
            case 'đang chờ':
                return `<button class="site-btn rounded-0 w-100" onclick="updateStatusCancle('${orderId}')">Hủy đơn hàng</button>`;
            case 'đang giao':
                return `<button class="btn btn-success w-100" onclick="updateStatusCompleted('${orderId}')">Xác nhận đã nhận</button>`;
            case 'đã giao':
                return `<button class="btn btn-secondary disabled w-100" style="cursor: not-allowed;">Đã giao</button>`;
            default:
                return `<button class="btn btn-secondary w-100 disabled" style="cursor: not-allowed;">Đơn hàng đã hủy</button>`;
        }
    }

    const updateStatusCompleted = (orderId) => {
        $.ajax({
            url: `http://localhost/phone-ecommerce-chat/customer/user/receiveOrder/${orderId}`,
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

    const updateStatusCancle = (orderId) => {
        $.ajax({
            url: `http://localhost/phone-ecommerce-chat/customer/user/cancleOrder/${orderId}`,
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