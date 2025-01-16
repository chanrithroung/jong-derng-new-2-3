<?php include("admin/function.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jong Deng News | Website</title>

        <link rel="stylesheet" href="assets/css/theme.css">
        <link rel="stylesheet" href="assets/css/boostrap.css">
    </head>

    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <a href="home.php">
                        <img src="http://localhost/jongdeng-news/admin/assets/images/<?php echo getWebSiteLogo() ?>" style="width: 200px;height: 80px;">
                    </a>
                </div>
                <ul>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <a href="">News</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="" method="get">
                        <input type="text" name="query" placeholder="Find Content Here">
                        <button>
                            <img src="assets/icons/search.svg" alt="">
                        </button>
                    </form>
                </div>
            </div>
        </header>
        <main>
            <section class="trending">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <figcaption>
                                <?php 
                                    $pinedNews = getPinedNews();

                                    echo '<h2>'.$pinedNews['title'].'</h2>';
                                    echo '<p>'.$pinedNews['description'].'</p>';
                                ?>
                                
                                <a href="article.php?id=<?php echo $pinedNews['id'] ?>">FIND OUT MORE</a>
                            </figcaption>
                        </div>
                        <div class="col-6">
                            <div class="thumbnail">
                                <img src="http://localhost/jongdeng-news/admin/assets/images/<?php echo $pinedNews['thumbnail']  ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="news">
                <div class="container">
                    <div class="top">
                        <h2>Latest News</h2>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <figure>
                                <div class="thumbnail">
                                    <a href="">
                                        <img src="https://placehold.co/300" alt="">
                                    </a>
                                </div>
                            </figure>
                            <figcaption>
                                <h3>
                                    <a href="">
                                        1990 World Cup Finals 3rd Shirt
                                    </a>
                                </h3>
                                <div>
                                    <img src="assets/icons/date.svg" alt="">
                                    <span>19 Jun, 2023</span>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                </div>
            </section>

            <section class="news">
                <div class="container">
                    <div class="top">
                        <h2>Popular News</h2>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <figure>
                                <div class="thumbnail">
                                    <a href="">
                                        <img src="https://placehold.co/300" alt="">
                                    </a>
                                </div>
                            </figure>
                            <figcaption>
                                <h3>
                                    <a href="">
                                        1990 World Cup Finals 3rd Shirt
                                    </a>
                                </h3>
                                <div>
                                    <img src="assets/icons/date.svg" alt="">
                                    <span>19 Jun, 2023</span>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        <footer>
            <div class="container">
                <h5>Connect With Us</h5>
                <ul>
                    <li>
                        <a href="">
                            <img src="https://placehold.co/100" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="https://placehold.co/100" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="https://placehold.co/100" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="https://placehold.co/100" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="https://placehold.co/100" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
    </body>

    <script src="assets/script/jquery.js"></script>
    <script src="assets/script/theme.js"></script>
    <script src="assets/script/bootstrap.js"></script>
</html>