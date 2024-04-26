<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-blog set-bg" data-setbg="<?php echo SCRIPT_ROOT; ?>/assets/img/blog/blog-banner.jpg" style="background-position: center; object-fit: contain;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>OUR BLOG</h2>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row" id="blogContainer">

        </div>
    </div>
</section>
<!-- Blog Section End -->

<script>
    const URL = 'http://localhost/apple/customer/blog';

    const fetchPost = () => {
        $.ajax({
            url: `${URL}/getAll`,
            method: 'GET',
            dataType: 'json',
            success: function(res) {
                if (res.status === 200) {
                    console.log(res);
                    renderPost(res.data);
                } else {
                    console.log(res);
                }
            },
            error: function(error) {
                console.error('Lỗi khi lấy dữ liệu sản phẩm:', error);
            }
        });
    }

    const renderPost = (data) => {
        const blogContainer = document.getElementById('blogContainer');

        const htmlElement = data.map((blog, index) => {
            const formattedDate = new Date(blog.created_at).toLocaleDateString('en-US', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });

            return `
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <a href="<?php echo URL_APP; ?>/blog/detail/${blog.slug}">
                        <div class="blog__item__pic">
                            <img loading="lazy" class="image" src="<?php echo IMAGES_PATH; ?>/${blog.img}" alt="${blog.title}" style="object-fit:contain; width:360px; height:240px" />
                        </div>
                    </a>
                    <div class="blog__item__text">
                        <span><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/calendar.png" alt="">${formattedDate}</span>
                        <h5>${blog.title}</h5>
                        <a href="<?php echo URL_APP; ?>/blog/detail/${blog.slug}">Read More</a>
                    </div>
                </div>
            </div>
            `
        });

        blogContainer.innerHTML = htmlElement.join('');
    }

    fetchPost();
</script>