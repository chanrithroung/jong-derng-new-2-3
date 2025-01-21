<?php include("admin/function.php"); ?>
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
            <section class="news">
                <div class="container">
                    <div class="top">
                        <h2>News</h2>
                        <form action="" method="post">
                            <select name="filter" class="form-control">
                                <option selected disabled>Filter News</option>
                                <option value="">Sports</option>
                                <option value="">Technology</option>
                                <option value="">Entertainment</option>
                            </select>
                        </form>
                    </div>
                    <div class="row">
                        <?php getAllNews(); ?>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination">
                                <?php getPageGenation('news', 1); ?>
                            </ul>
                            
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