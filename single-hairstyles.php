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
        <?php get_header(); ?>
        <div class="container-fluid content">
            <div class="row">
            <div class="col-lg-8">
                <main class="main">
                        <?php if(have_posts()): ?>
                            <?php while(have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="content-Header">
                                    <h1 class="content-Title">
                                        <span class="content-SubTitle">ヘアスタイルカタログ</span>
                                        <?php the_title(); ?>
                                    </h1>
                                    <div class="content-Meta">
                                        <a href="#"> ミディあむ
                                        </a>
                                    </div>
                                </header>
                                <div class="content-Body">
                                    <?php if(has_post_thumbnail()): ?>
                                        <figure class="hairStyle-Img">
  
                                        <?php the_post_thumbnail('page_eyecatch'); ?>
                                        </figure>
                                    <?php endif; ?>
                                    <div class="hairStyle-Description">
         
                                    <?php the_content(); ?>
                                    </div>
                                </div>
                                <footer class="content-Footer">
                                    <nav class="content-Nav" aria-label="前後の記事">
                                        <div class="content-Nav_Prev">
                                            <?php previous_post_link('&lt; %link'); ?>
                                        </div>
                                        <div class="content-Nav_Next">
                                            <?php next_post_link('%link &gt;'); ?>
                                        </div>
                                    </nav>
                                </footer>
                        </article>
                        <?php endwhile; ?>
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