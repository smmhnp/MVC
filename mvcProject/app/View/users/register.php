<?php require_once (APPROOT . '/View/base/header.php'); ?>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    
    <?php require_once (APPROOT . "/View/base/nav.php"); ?>

    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">ثبت نام</h2>

                                <form novalidate action="<?php echo URLROOT; ?>users/register" method="post">

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">نام</label>
                                        <input name="name" type="text" id="form3Example1cg" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>"/>
                                        <div class="invalid-feedback"> <?php echo $data['name_error']; ?> </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">ایمیل</label>
                                        <input name="email" type="email" id="form3Example3cg" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>"/>
                                        <div class="invalid-feedback"> <?php echo $data['email_error']; ?> </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">رمز عبود</label>
                                        <input name="password" type="password" id="form3Example4cg" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>"/>
                                        <div class="invalid-feedback"> <?php echo $data['password_error']; ?> </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">تکرار رمز عبور</label>
                                        <input name="confirm_password" type="password" id="form3Example4cdg" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>"/>
                                        <div class="invalid-feedback"> <?php echo $data['confirm_password_error']; ?> </div>
                                    </div>

                                    <div class="d-flex justify-content-center" >
                                        <button id="btn-register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" type="submit">عضویت</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">
                                        حساب کاربری دارید؟ 
                                        <a href="<?php echo URLROOT; ?>users/login" class="fw-bold text-body">
                                            <u>ورود</u>
                                        </a>
                                    </p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once (APPROOT . '/View/base/footer.php'); ?>