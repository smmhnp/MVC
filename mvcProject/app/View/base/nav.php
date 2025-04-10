<header class="mb-auto">
    <div>
        <a href="<?php echo URLROOT; ?>pages/index">
            <h3 class="float-md-start mb-0">
                <?php echo SITENAME; ?>
            </h3>
        </a>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <?php 
                $login = '';
                $register = '';
                if (isset($_GET['url'])){

                    if ($_GET['url'] == 'users/login'){
                        $login = 'active';
                    }

                    if($_GET['url'] == 'users/register'){
                        $register = 'active';
                    }
                }
            ?>
            <?php if (is_user_logged_in()): ?>
                <a class="nav-link text-white"><?php echo $_SESSION['user_name']; ?></a>
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">خروج</a>
            <?php else: ?>
                <a class="nav-link fw-bold py-1 px-0 <?php echo $login; ?>" aria-current="page" href="<?php echo URLROOT; ?>users/login">
                    <i class="fas fa-home me-1"></i> 
                    ورود 
                </a>
                <a class="nav-link fw-bold py-1 px-0 <?php echo $register; ?>" href="<?php echo URLROOT; ?>users/register">
                    <i class="fas fa-cog me-1"></i> 
                    عضویت 
                </a>
            <?php endif; ?>
        </nav>
    </div>
</header>