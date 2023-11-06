<header>
    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <a href="/" class="logo m-0 float-start">IT-блог<span class="text-primary">.</span></a>
                        </div>
                        <div class="col-8 text-center">
                            <form action="#" class="search-form d-inline-block d-lg-none">
                                <input type="text" class="form-control" placeholder="Поиск...">
                                <span class="bi-search">ййй</span>
                            </form>

                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li class="active"><a href="/">Главная</a></li>
                                <li class="active"><a href="/about">О блоге</a></li>
                                <li class="has-children">
                                    <a href="">Категории</a>
                                    <ul class="dropdown">
                                        <?php
                                            /** @var array $categories */
                                            foreach ($categories as $category):
                                        ?>
                                            <li>
                                                <a href="/categories/show/<?php echo $category['id'] ?>">
                                                    <?php echo $category['title'] ?>
                                                </a>
                                            </li>
                                        <?php
                                            endforeach;
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="">Авторизация</a></li>
                                <li><a href="">Регистрация</a></li>
                            </ul>
                        </div>
                        <div class="col-2 text-end">
                            <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                <span></span>
                            </a>
                            <form action="#" class="search-form d-none d-lg-inline-block">
                                <input type="text" class="form-control" placeholder="Найти статью...">
                                <span class="bi-search"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>