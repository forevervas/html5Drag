<?php
// if() or die('非法访问!');

if(!defined('THINK_PATH')) {
	exit('Access Denied');
}
class UpdateAction extends Action {
    public function index(){
    	if(!$this->isPost()&&!$this->isAjax()) {
    		exit('Access Denied!');
    	}
		$item = I('post.id','','');
		// $item = $_POST['id'];
		dump($item);
		$item = explode("&",$item);//转化为数组
		dump($item);
        //var_dump(count($item));
        //var_dump(substr($item[2],4));//截取字符串
		$m = M('contents');
		//$result = $m->where('id=1')->setField('link_word','abcdefg');//测试数据库
 		for ($i=0;$i<count($item);$i++) {
			$item[$i] = (int)(substr($item[$i],4));
            $ii=$i+1;//echo '$ii='.$ii.'->'.$item[$i];
			$result = $m->where(array('id'=>$item[$i]))->setField(array('sort'=>$ii));
			//$result = $m->where('id='.$item[$i])->setField('sort',$i);
		} 
		dump(mysql_affected_rows());
        if ($result) {
        	$this->success('修改成功');
			// $this->ajaxReturn($result,"修改成功",1);echo "修改成功!";
		}else{
			$this->error('修改失败');
			// $this->ajaxReturn(0,"修改失败",0);echo "修改失败!";
		}
		
	}
}