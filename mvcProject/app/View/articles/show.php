<?php require_once (APPROOT . '/View/base/header.php'); ?>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    
    <?php require_once (APPROOT . "/View/base/nav.php"); ?>

    <div class="card mb-2 text-left">
        <div class="card-body">
    
            <div class="d-flex justify-content-between">
                <h4 class="card-title">
                    <?php echo $data['article'] -> title; ?>
                </h4>
                <a href="<?php echo URLROOT; ?>/articles/index" class="btn btn-dark">
                    بازگشت
                </a>
            </div>

            <div class="bg-light mb-3 p-1">
                نوشته شده توسط: 
                <?php echo $data['user'] -> name; ?>
                در تاریخ: 
                <?php echo $data['article'] -> CreateDate; ?>
            </div>

            <p class="card-text">
                <?php echo $data['article'] -> bady; ?>
            </p>

            <?php if ($data['article'] -> user_id == $_SESSION['user_id']): ?>
                <br><hr>

                <div class="d-flex justify-content-between">
                    <a href="<?php echo URLROOT; ?>articles/edit/<?php echo $data['article'] -> id; ?>" class="btn btn-dark">ویرایش</a>
                    
                    <form action="<?php echo URLROOT; ?>articles/delete/<?php echo $data['article'] -> id; ?>" method="post">
                        <button class="btn btn-light" type="submit">حذف</button>
                    </form>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php require_once (APPROOT . '/View/base/footer.php'); ?>