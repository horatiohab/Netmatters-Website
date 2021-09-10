<!-- Articles Section -->
<div class="news-section">
    <div class="news-cards">

        <?php

        include("inc/connection.php");

        try {
            $sql = 'SELECT * FROM news_articles LIMIT 3';

            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        while ($item = $q->fetch()): ?>

            <div class='news-card'>

                <div class='img-wrapper'>
                    <a href='#' class='<?= $item['category_class']; ?>'>
                        <h4><?= $item['category']; ?></h4>
                    </a>
                    <a href='#'><img src='<?= $item['image']; ?>' alt='News'></a>
                </div>

                <div class='news-container news'>
                    <a href='#' class='news-headline'><?= $item['title']; ?></a><br>
                    <p><?= $item['content']; ?></p>
                    <a href='#' class='btn <?= $item['button']; ?>'>READ MORE</a>
                    <hr>

                    <div class='author'>
                        <img src='<?= $item['author_icon']; ?>' alt='Netmatters mini logo'>

                        <div class='author-sig'>
                            <h4><?= $item['author']; ?></h4>
                            <span><?= $item['date']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </div>
</div>