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

                                <div class="d-flex justify-content-between">
                                    <h4>ویرایش مقاله</h4>
                                    <a href="<?php echo URLROOT; ?>/articles/edit" class="btn btn-dark">
                                        بازگشت
                                    </a>
                                </div>
                                
                                <br><hr class="mt-0">

                                <form novalidate action="<?php echo URLROOT; ?>articles/edit/<?php echo $data['id']; ?>" method="post">

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">عنوان مقاله</label>
                                        <input name="title" type="title" id="form3Example3cg" class="form-control form-control-lg <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>"/>
                                        <div class="invalid-feedback"> <?php echo $data['title_error']; ?> </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">متن مقاله</label>
                                        <textarea name="body" type="body" id="form3Example4cg" class="form-control form-control-lg <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"> <?php echo $data['body']; ?> </textarea>
                                        <div class="invalid-feedback"> <?php echo $data['body_error']; ?> </div>
                                    </div>

                                    <div class="d-flex justify-content-center" >
                                        <button id="btn-register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" type="submit">ایجاد</button>
                                    </div>
                                    
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once (APPROOT . '/View/base/footer.php'); ?>