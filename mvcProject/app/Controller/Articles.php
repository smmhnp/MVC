<?php

class Articles extends controller {
    protected $articleModel;

    function __construct (){
        if (!is_user_logged_in()){                                                                          // if user not login -> redirect to login page (this page just show for logged in user)
            Redirect('users/login');
        }

        $this -> articleModel = $this -> model('Article');
        $this -> userModel = $this -> model('User');
    }

    function index (){
        $articles = $this -> articleModel -> GetArticle();

        $data = [
            'article' => $articles
        ];

        $this -> view('articles/index', $data);
    }

    function add (){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title-_error' => '',
                'body_error' => ''
            ];

            if (empty($data['title'])){
                $data['title_error'] = 'عنوان مقاله نمیتواند خالی باشد';
            }

            if (empty($data['body'])){
                $data['body_error'] = 'متن مقاله نمیتواند خالی باشد';
            }

            if (empty($data['title_error']) and empty($data['body_error'])){
                if ($this -> articleModel -> AddArticle($data)){
                    flash('article_message', 'مقاله اضافه شد');
                    Redirect('articles/index');
                } else {
                    die ('add article error');
                }

            } else {
                $this -> view('articles/add', $data);
            }
            
        } else {
            $data = [
                'title' => '',
                'body' => '',
                'title-_error' => '',
                'body_error' => ''
            ];

            $this -> view('articles/add', $data);
        }
    }

    function show ($id){
        $article = $this -> articleModel -> GetArticleById($id);                                            // receve article id and get article info
        $user = $this -> userModel -> GetUserById($article -> user_id);                                     // receve user id and get user info

        $data = [
            'article' => $article,
            'user' => $user
        ];

        $this -> view('articles/show', $data);
    }

    function edit ($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title-_error' => '',
                'body_error' => ''
            ];

            if (empty($data['title'])){
                $data['title_error'] = 'عنوان مقاله نمیتواند خالی باشد';
            }

            if (empty($data['body'])){
                $data['body_error'] = 'متن مقاله نمیتواند خالی باشد';
            }

            if (empty($data['title_error']) and empty($data['body_error'])){
                if ($this -> articleModel -> UpdateArticle($data)){
                    flash('article_message', 'مقاله ویرایش شد');
                    Redirect('articles/index');
                } else {
                    die ('update article error');
                }

            } else {
                $this -> view('articles/edit', $data);
            }

        } else {
            $article = $this -> articleModel -> GetArticleById($id);
            
            // check content owner
            if ($article -> user_id != $_SESSION['user_id']){
                Redirect('articles/index');
            }

            $data = [
                'id' => $id,
                'title' => $article -> title,
                'body' => $article -> bady,
                'title_error' => '',
                'body_error' => ''
            ];

            $this -> view('articles/edit', $data);
        }
    }

    function delete ($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $article = $this -> articleModel -> GetArticleById($id);

            // check contetn owner
            if ($article -> user_id != $_SESSION['user_id']){
                Redirect('articles/index');
            }

            if ($this -> articleModel -> DeleteArticle($id)){
                flash('article_message', 'مقاله حذف شد');
                Redirect('articles/index');
            } else {
                die ('delete article error');
            }

        } else {
            Redirect('articles/index');
        }
    }
}