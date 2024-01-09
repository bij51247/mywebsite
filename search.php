<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ゆったり時間と癒しの美容室サンプルサイト">
    <title>Kuroneko Hair</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link href="./assets/css/theme-styles.css" rel="stylesheet" media="all">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="content-Wrap">
        <?php get_header() ?>
        <div class="container-fluid content">
            <div class="row">
                <div class="col-lg-8">
                    <main class="main">
                        <header class="content-Header">
                            <h1 class="content-Title">
                                検索結果
                            </h1>
                        </header>
                        <?php if (have_posts()): ?>
                            <p class="search-ResultNum">「
                                <?php the_search_query(); ?>」の検索結果
                            </p>
                            <?php
                            while (have_posts()):
                                the_post();
                                ?>
                                <?php get_template_part('template-parts/loop', 'post'); ?>
                            <?php endwhile; ?>
                            <?php get_template_part('template-parts/parts', 'pagination'); ?>
                        <?php else: ?>
                            <p class="search-NoResult">検索単語に一致するものは見つかりませんでした。他キーワードで再度お試しください。</p>
                            <?php get_search_form(); ?>
                        <?php endif; ?>
                    </main>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php get_footer(); ?>
    </div>
    <script src="./assets/js/theme-common.js"></script>
</body>

</html>