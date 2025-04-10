<?php

    class Pages extends Controller {
        public function __construct(){

        }

        public function index (){
            $data = [                                                                                       // this data send to "pages/index.php" and can use from this data in this page
                'title' => "index Home page",
            ];
            
            $this -> view("pages/index", $data);
        }

        public function about (){
            $data = [                                                                                       // this data send to "pages/about.php" and can use from this data in this page
                'title' => "About Us page"
            ];

            $this -> view("pages/about");
        }
    }