<?php
class IndexAction extends Action  {
    public function _empty(){
        $this->redirect('Index/index','',2,'url is unlegal...');
    }
    public function index(){
        header("Content-type:text/html;charset=utf-8");
/*         $id=I('aid',0,'intval');
        if(empty($id)) {$this->error("信息不存在！");return;}
 */
        //var_dump($id);exit;

        $m = M('contents'); 

/*         $map = array();
         $map['id'] = array('eq',$id); */
             
        //$list = $m->where('id=2')->find();
		//$list = $m->select();
		//$list = $m->find();
         // var_dump($list);exit;
/* 		 
		$this->assign('id',$list['id']);
        $this->assign('link_word',$list['link_word']);
        $this->assign('link',$list['link']);
		 */
		$list = $m->order('sort')->select();
		//var_dump($list);exit;
		$this->assign('list',$list);
		
        $this->display();
    }
    public function add(){
         
          $c['link_word']=htmlentities($_POST['web']);
          $c['link']=htmlentities($_POST['website']);
          $m = M('contents');
          $last=$m->order('id desc')->limit(1)->find();
		  $c['sort']=++$last[id]; 
              $result=$m->filter('htmlspecialchars')->add($c);
          if($result){
              $this->success("success");
          }else{
              $this->error("faile");
          }

        // $this->display("Index/modify");

	}

    public function delete(){
          
          $id=I('aid',0,'intval');
          $map=array();
          $map['id']=array('eq',$id);

          $m = M('contents');

          $result=$m->where($map)->delete();

         if($result){
     	   $this->success("删除成功");
         }else{
           $this->error("删除失败");
         } 

    }
		
}