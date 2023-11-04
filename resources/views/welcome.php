<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/assets/css/tiny-slider.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/glightbox.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/flatpickr.min.css">

    <title>Главная</title>
</head>
<body>
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
    <?php
        /** @var \Core\View\View $view */
        echo $view->include('header', ['categories']);
    ?>

    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                <?php
                    /** @var array $articles */
                    foreach ($articles as $article) {
                ?>
                <div class="col-md-4">
                    <a href="/articles/show/<?php echo $article['id']; ?>" class="h-entry mb-30 v-height gradient">

                        <div class="featured-img"
                             style="background-image: url('<?php echo $article['image_path'] ?>');">
                        </div>

                        <div class="text">
                                <span class="date">
                                    <?php echo $article['created_at']; ?>
                                </span>
                            <h2>
                                <?php echo $article['title']; ?>
                            </h2>
                            <h6 style="color: white">
                                Категория: <?php echo $article['category']; ?>
                            </h6>
                            <h6 style="color: white">
                                Автор: <?php echo $article['author']; ?>
                            </h6>
                        </div>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
<!-- End retroy layout blog posts -->

<!-- Start posts-entry -->
<?php
    /** @var array $categories */
    foreach ($categories as $category) {
?>
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title"><?php echo $category['title'] ?></h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.php" class="read-more">Читать все</a></div>
            </div>
            <div class="row g-3">
                <?php
                    if (!empty($category['articles'])) {
                        foreach ($category['articles'] as $article) {
                ?>
                            <div class="col-md-9">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="blog-entry">
                                            <a href="/articles/show/<?php echo $article['id'] ?>" class="img-link">
                                                <img src="<?php echo $article['image_path'] ?>" alt="Image"
                                                     class="img-fluid">
                                            </a>
                                            <span class="date"><?php echo $article['created_at']; ?></span>
                                            <h2><a href="/articles/show/<?php echo $article['id'] ?>">
                                                    <?php echo $article['title']; ?>
                                                </a>
                                            </h2>
                                            <p><?php echo substr($article['content'], 0, 10) . '...'; ?></p>
                                            <p><a href="/articles/show/<?php echo $article['id'] ?>"
                                                  class="btn btn-sm btn-outline-primary">Читать полностью
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    } else {
                ?>
                        <h4>Нет статей</h4>
                <?php
                    }
                ?>
                <!--<div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>

                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">Meta unveils fees on metaverse sales</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>

                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">UK sees highest inflation in 30 years</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>
                    </ul>
                </div>-->
            </div>
        </div>
    </section>
<?php
    }
?>
<!-- End posts-entry -->

<!-- Start posts-entry -->
<!--<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">UK sees highest inflation in 30 years</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="blog-entry">
                    <a href="single.html" class="img-link">
                        <img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid">
                    </a>
                    <span class="date">Apr. 14th, 2022</span>
                    <h2><a href="single.html">Don’t assume your user data in the cloud is safe</a></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p><a href="#" class="read-more">Continue Reading</a></p>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- End posts-entry -->

<!-- Start posts-entry -->
<!--<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Culture</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.php" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            <div class="col-md-9 order-md-2">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="blog-entry">
                            <a href="single.html" class="img-link">
                                <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">Apr. 14th, 2022</span>
                            <h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-entry">
                            <a href="single.html" class="img-link">
                                <img src="images/img_2_sq.jpg" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">Apr. 14th, 2022</span>
                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    <li>
                        <span class="date">Apr. 14th, 2022</span>
                        <h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </li>

                    <li>
                        <span class="date">Apr. 14th, 2022</span>
                        <h3><a href="single.html">Meta unveils fees on metaverse sales</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </li>

                    <li>
                        <span class="date">Apr. 14th, 2022</span>
                        <h3><a href="single.html">UK sees highest inflation in 30 years</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Politics</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.php" class="read-more">View All</a></div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_7_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_6_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_5_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_4.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_4.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">



                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">



                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>-->

<!--<div class="section bg-light">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Travel</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.php" class="read-more">View All</a></div>
        </div>

        <div class="row align-items-stretch retro-layout-alt">

            <div class="col-md-5 order-md-2">
                <a href="single.html" class="hentry img-1 h-100 gradient">
                    <div class="featured-img" style="background-image: url('images/img_2_vertical.jpg');"></div>
                    <div class="text">
                        <span>February 12, 2019</span>
                        <h2>Meta unveils fees on metaverse sales</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-7">

                <a href="single.html" class="hentry img-2 v-height mb30 gradient">
                    <div class="featured-img" style="background-image: url('images/img_1_horizontal.jpg');"></div>
                    <div class="text text-sm">
                        <span>February 12, 2019</span>
                        <h2>AI can now kill those annoying cookie pop-ups</h2>
                    </div>
                </a>

                <div class="two-col d-block d-md-flex justify-content-between">
                    <a href="single.html" class="hentry v-height img-2 gradient">
                        <div class="featured-img" style="background-image: url('images/img_2_sq.jpg');"></div>
                        <div class="text text-sm">
                            <span>February 12, 2019</span>
                            <h2>Don’t assume your user data in the cloud is safe</h2>
                        </div>
                    </a>
                    <a href="single.html" class="hentry v-height img-2 ms-auto float-end gradient">
                        <div class="featured-img" style="background-image: url('images/img_3_sq.jpg');"></div>
                        <div class="text text-sm">
                            <span>February 12, 2019</span>
                            <h2>Startup vs corporate: What job suits you best?</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>-->
    <?php echo $view->include('footer'); ?>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>

    <script src="assets/js/flatpickr.min.js"></script>

    <script src="assets/js/aos.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/navbar.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>