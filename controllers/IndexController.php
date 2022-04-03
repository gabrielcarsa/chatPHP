<?php
    class IndexController extends Controller {
        function index() {
            $dados = array();
            $this->view('index', $dados);
        }
    }
 ?>
