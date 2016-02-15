<?php
class EmptyAction extends Action{
    public function _empty(){
        $this->redirect('Index/index','',2,'The URL is not legal!');
    }
    public function index(){
        $this->redirect('Index/index','',2,'The URL is not legal!');
    }
}