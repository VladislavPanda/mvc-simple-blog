<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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


	<link rel="stylesheet" href="/fonts/icomoon/style.css">
	<link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="/assets/css/tiny-slider.css">
	<link rel="stylesheet" href="/assets/css/aos.css">
	<link rel="stylesheet" href="/assets/css/glightbox.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">

	<link rel="stylesheet" href="/assets/css/flatpickr.min.css">

    <title>Категория:
        <?php /** @var TYPE_NAME $currentCategory */
            echo $currentCategory['title'];
        ?>
    </title>
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

	<div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading">Категория: <?php echo $currentCategory['title']; ?></div>
				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
                    <?php
                        if (! empty($currentCategory['articles'])) {
                            foreach ($currentCategory['articles'] as $article) {
                    ?>
                                <div class="blog-entry d-flex blog-entry-search-item">
                                    <a href="/articles/show/<?php echo $article['id'] ?>" class="img-link me-4">
                                        <img src="<?php echo $article['image_path'] ?>" alt="Image" class="img-fluid">
                                    </a>
                                    <div>
                                        <span class="date"><?php echo $article['created_at']; ?>
                                            <a href="#"><?php echo $currentCategory['title']; ?></a>
                                        </span>
                                        <h2>
                                            <a href="/articles/show/<?php echo $article['id'] ?>">
                                                <?php echo $article['title']; ?>
                                            </a>
                                        </h2>
                                        <p><?php echo substr($article['content'], 0, 150) . '...' ?></p>
                                        <p>
                                            <a href="/articles/show/<?php echo $article['id'] ?>"
                                               class="btn btn-sm btn-outline-primary">
                                               Читать всё
                                            </a>
                                        </p>
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

					<div class="row text-start pt-5 border-top">
						<div class="col-md-12">
							<div class="custom-pagination">
								<span>1</span>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<span>...</span>
								<a href="#">15</a>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-4 sidebar">
					<!--<div class="sidebar-box search-form-wrap mb-4">
						<form action="#" class="sidebar-search-form">
							<span class="bi-search"></span>
							<input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
						</form>
					</div>-->
					<!-- END sidebar-box -->
					<div class="sidebar-box">
						<h3 class="heading">Популярные статьи</h3>
						<div class="post-entry-sidebar">
							<ul>
                                <?php
                                    /** @var array $popularArticles */
                                    foreach ($popularArticles as $popularArticle) {
                                ?>
                                        <li>
                                            <a href="/articles/show/<?php echo $popularArticle['id']; ?>">
                                                <img src="<?php echo $popularArticle['image_path']; ?>"
                                                    alt="Image placeholder" class="me-4 rounded">
                                                <div class="text">
                                                    <h4><?php echo $popularArticle['title']; ?></h4>
                                                    <div class="post-meta">
                                                        <span class="mr-2">
                                                            <?php echo $popularArticle['created_at']; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <?php
                                }
                                ?>
							</ul>
						</div>
					</div>
					<!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Категории</h3>
                        <ul class="categories">
                            <?php
                                /** @var array $categories */
                                foreach ($categories as $category) {
                            ?>
                                    <li>
                                        <a href="/categories/show/<?php echo $category['id']; ?>">
                                            <?php echo $category['title']; ?>
                                            <span>
                                                (<?php echo $category['articles_num']; ?>)
                                            </span>
                                        </a>
                                    </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
					<!-- END sidebar-box -->

					<!--<div class="sidebar-box">
						<h3 class="heading">Tags</h3>
						<ul class="tags">
							<li><a href="#">Travel</a></li>
							<li><a href="#">Adventure</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Freelancing</a></li>
							<li><a href="#">Travel</a></li>
							<li><a href="#">Adventure</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Freelancing</a></li>
						</ul>
					</div>-->
				</div>
			</div>
		</div>
	</div>

	<?php echo $view->include('footer'); ?>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/tiny-slider.js"></script>
    <script src="/assets/js/flatpickr.min.js"></script>
    <script src="/assets/js/aos.js"></script>
    <script src="/assets/js/glightbox.min.js"></script>
    <script src="/assets/js/navbar.js"></script>
    <script src="/assets/js/counter.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>
</html>
