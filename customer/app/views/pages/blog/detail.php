<style>
    .post-categories-list {
        display: flex;
        justify-content: center;
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

<!-- Blog Details Hero Begin -->
<section class="blog-hero spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 text-center">
                <div class="blog__hero__text">
                    <h2 id="blogTitle"></h2>
                    <ul>
                        <li>By <span class="authorName"></span></li>
                        <li><span id="postDate"></span></li>
                        <li>Views: <span id="views"></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="blog__details__pic">
                    <img loading="lazy" id="blog-main-image" src="https://images.unsplash.com/photo-1501290741922-b56c0d0884af?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 order-2 order-md-1">
                <div class="blog__details__content">
                    <div class="blog__details__text" id="blogContainer">
                    </div>
                </div>
                <div class="blog__details__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/blog/details/blog-author.jpg" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h5><span class="authorName"></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__details__tags">
                                <a href="#">#Technologies</a>
                                <a href="#">#Trending</a>
                                <a href="#">#2024</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog__details__comment">
                    <h4>Leave A Comment</h4>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <input type="text" placeholder="Name">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <input type="text" placeholder="Email">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <input type="text" placeholder="Phone">
                            </div>
                            <div class="col-lg-12 text-center">
                                <textarea placeholder="Comment"></textarea>
                                <button type="submit" class="site-btn" disabled>Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-5 order-md-2 mb-5">
                <h4 class="tex-dark font-weight-bold mb-2 mr-auto ms-0">WANNA SEE SOME BLOG CATEGORIES.</h4>
                <div class="row post-categories-list" id="categoriesContainer"></div>
                <div class="blog__details__share text-center position-absolute" style="top:auto; left: 0; bottom:0;">
                    <span>Share</span>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Blog Details Section End -->

<script>
    const URL = 'http://localhost/apple/customer/blog';
    const pathArray = window.location.pathname.split('/');
    const slug = pathArray[pathArray.length - 1];

    const fetchPostDetail = () => {
        $.ajax({
            url: `${URL}/getDetail/${slug}`,
            method: 'GET',
            dataType: 'json',
            success: function(res) {
                if (res.status === 200) {
                    console.log(res);
                    renderPostDetail(res.data);
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

    const renderPostDetail = (data) => {
        const blogContainer = document.getElementById('blogContainer');
        const authorName = document.querySelectorAll(".authorName");
        const title = document.getElementById("blogTitle");
        const postDate = document.getElementById("postDate");
        const views = document.getElementById("views");

        // when u wanna use an image use this one ^^
        // const mainImage = document.getElementById("blog-main-image");


        // assign attribute
        authorName.forEach((item, index) => item.innerHTML = data.name);
        const htmlElement = data.content;
        title.innerHTML = data.title;
        views.innerHTML = data.views;

        // date handle
        const formatDate = new Date(data.created_at).toLocaleDateString('en-US', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
        postDate.innerHTML = formatDate;

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
        // $.ajax({
        //     url: `${URL}/category/${slug}`,
        //     method: 'GET',
        //     dataType: 'json',
        //     success: function(res) {
        //         window.location.href = `${URL}/category/${slug}`;
        //     },
        //     error: function(error) {
        //         console.error('Lỗi khi lấy dữ liệu sản phẩm:', error);
        //     }
        // });
        window.location.href = `${URL}?slug=${slug}`;
    }

    fetchCategories();
    fetchPostDetail();
</script>