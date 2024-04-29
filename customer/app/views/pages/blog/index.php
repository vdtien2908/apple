<style>
    .post-categories-list {
        display: flex;
        justify-content: start;
        align-items: center;
        gap: 10px;
        border-radius: 10px;
    }

    .post-category {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        text-transform: capitalize;
        height: 40px;
        padding: 0 20px;
        border-radius: 10px;
    }

    .post-category.default {
        background-color: #57c4ff31;
    }

    .post-category.fashion {
        background-color: #da85c731;
    }

    .post-category.food {
        background-color: #7fb88133;
    }

    .post-category.travel {
        background-color: #ff795736;
    }

    .post-category.culture {
        background-color: #ffb04f45;
    }

    .post-category.coding {
        background-color: #5e4fff31;
    }
</style>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-blog set-bg" data-setbg="<?php echo SCRIPT_ROOT; ?>/assets/img/blog/blog-banner.jpg" style="background-position: center; object-fit: contain;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- <h2>OUR BLOG</h2> -->
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9 order-2 order-md-1">
                <h4 class="font-weight-bold text-uppercase mb-4">Explore our newest post</h4>
                <div class="row" id="blogContainer">
                </div>
            </div>
            <div class="col-12 col-md-3 order-1 order-md-2 mb-5">
                <h4 class="font-weight-bold text-uppercase mb-4">Blog Categories</h4>
                <div class="row post-categories-list" id="categoriesContainer">
                </div>
            </div>
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

    const fetchCategories = () => {
        $.ajax({
            url: `${URL}/getCategories`,
            method: 'GET',
            dataType: 'json',
            success: function(res) {
                if (res.status === 200) {
                    renderCategories(res.data);
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
        let htmlElement = '';

        if (data.length === 0) {
            return `<h4 class="font-weight-bold text-center mb-4">Sorry, no post was found for this category.</h4>`;
        }

        if (data.length > 1) {
            htmlElement = data.map((blog, index) => {
                const formattedDate = new Date(blog.created_at).toLocaleDateString('en-US', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });

                return `
                <div class="col-12">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="<?php echo URL_APP; ?>/blog/detail/${blog.slug}">
                                <div>
                                    <img loading="lazy" class="image" src="<?php echo IMAGES_PATH; ?>/${blog.img}" alt="${blog.title}" style="object-fit:contain; width:120px !important; height:120px !important;" />
                                </div>
                            </a>
                        </div>
                        <div class="col-9 col-md-10 blog__item__text m-0 p-0">
                            <div class="d-flex flex-column align-items-start">
                                <h5>${blog.title}</h5>
                                <span><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/calendar.png" alt="">${formattedDate}</span>
                                <a href="<?php echo URL_APP; ?>/blog/detail/${blog.slug}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            `
            }).join(' ');
        } else {
            const formattedDate = new Date(data.created_at).toLocaleDateString('en-US', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });

            htmlElement = `
                <div class="col-12">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="<?php echo URL_APP; ?>/blog/detail/${data.slug}">
                                <div>
                                    <img loading="lazy" class="image" src="<?php echo IMAGES_PATH; ?>/${data.img}" alt="${data.title}" style="object-fit:contain; width:120px !important; height:120px !important;" />
                                </div>
                            </a>
                        </div>
                        <div class="col-9 col-md-10 blog__item__text m-0 p-0">
                            <div class="d-flex flex-column align-items-start">
                                <h5>${data.title}</h5>
                                <span><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/calendar.png" alt="">${formattedDate}</span>
                                <a href="<?php echo URL_APP; ?>/blog/detail/${data.slug}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        blogContainer.innerHTML = htmlElement;
    }

    const renderCategories = (categories) => {
        const categoriesContainer = document.getElementById('categoriesContainer');

        const htmlElement = categories.map((cat, index) => {
            const categoriesBg = ['fashion', 'food', 'travel', 'culture', 'coding'];
            return `
                <a href="#" onClick="fetchPostByCategorySlug('${cat.slug}')" class="post-category ${categoriesBg[index] !== undefined ? categoriesBg[index]:""} text-dark">${cat.title}</a>
            `
        });

        categoriesContainer.innerHTML = htmlElement.join('');
    }

    const fetchPostByCategorySlug = (slug) => {
        $.ajax({
            url: `${URL}/category/${slug}`,
            method: 'GET',
            dataType: 'json',
            success: function(res) {
                renderPost(res.data);
                showToast(res.message, true);

                // thiss one push the slug to url but it may trigger error when u chose a category then reload page.
                // window.history.pushState({
                //     path: `${URL}/category?slug=${slug}`
                // }, '', `${URL}/category?slug=${slug}`);
            },
            error: function(error) {
                console.error('Lỗi khi lấy dữ liệu sản phẩm:', error);
            }
        });
    }

    window.addEventListener('popstate', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const slug = urlParams.get('slug');

        if (slug) {
            fetchPostByCategorySlug(slug);
        }
    });

    // Kiểm tra URL ban đầu và render nội dung tương ứng
    const urlParams = new URLSearchParams(window.location.search);
    const slug = urlParams.get('slug');

    if (slug) {
        fetchPostByCategorySlug(slug);
    } else {
        fetchPost();
    }

    fetchCategories();
</script>