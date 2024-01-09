<article id="post-<?php the_ID(); ?>" <?php post_class('module-Article_Item'); ?>>
    <a href="<?php the_permalink(); ?>" class="module-Article_Item_Link">
        <div class="module-Article_Item_Img">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('archive_thumbnail'); ?>
            <?php else: ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/dummy-image.png'); ?>" alt=""
                    width="200" height="150" load="lazy">
            <?php endif; ?>
        </div>
        <div class="module-Article_Item_Body">
            <h2 class="module-Article_Item_Title">
                <?php the_title() ?>
            </h2>
            <?php the_excerpt(); ?>
            <ul class="module-Article_Item_Meta">
                <?php $category_list = get_the_category();
                // 投稿が属するカテゴリー情報を取得して変数に格納する 
                
                if ($category_list):
                    // ←─ $category_listに値がある場合の条件分岐を追加 
                    ?>
                    <li class="module-Article_Item">
                        <?php echo esc_html($category_list[0]->name); ?>
                        <!-- ←─カテゴリー情報の最初のカテゴリー名を取り出して出力する -->
                    </li>
                <?php endif; ?>
                <!-- <li class="module-Article_Item_Cat">お知らせ</li> -->
                <li class="module-Article_Item_Date"><time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                        <?php echo get_the_date(); ?>
                    </time></li>
            </ul>
        </div>
    </a>
</article>