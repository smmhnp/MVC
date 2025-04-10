<?php require_once (APPROOT . '/View/base/header.php'); ?>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    
    <?php require_once (APPROOT . "/View/base/nav.php"); ?>

    <?php flash('article_message'); ?>

    <div class="row text-white my-4">
        <div class="col-md-6 text-left">
            <h4>مقالات</h4>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo URLROOT; ?>articles/add" class="btn btn-light">
                افزودن مقاله
            </a>
        </div>
    </div>

    <?php foreach ($data['article'] as $article) : ?>
        <div class="card mb-2 text-left">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $article -> title; ?>
                </h5>

                <div class="bg-light mb-3 p-1">
                    نوشته شده توسط: 
                    <?php echo $article -> name; ?>
                    در تاریخ: 
                    <?php echo $article -> articleCreated; ?>
                </div>

                <p class="card-text" style="min-height: 40px; max-height: 80px;">
                    <?php 
                        $content = $article -> bady; 
                        if (strlen($content) > 500){
                            for($i = 0; $i <= 500; $i++) {
                                echo $content[$i];
                            } 
                            echo " ... ";
                        } else {
                            echo $article -> bady;
                        }
                    ?>
                </p>

                <a href="<?php echo URLROOT; ?>articles/show/<?php echo $article -> articleID; ?>" class="btn btn-dark btn-block">نمایش</a>
            </div>
        </div>
    <?php endforeach; ?>

<?php require_once (APPROOT . '/View/base/footer.php'); ?>