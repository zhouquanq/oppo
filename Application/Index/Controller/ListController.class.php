<?php 
/**
 * 列表页控制器
 */
class ListController extends Controller{
	//显示列表页
	public function index(){
		//分配顶级
        $topdata = K('Category')->where("spid=0")->all();
		$this->assign('topdata',$topdata);
		//筛选处理
		$sid = Q('get.sid',0,'intval');
		//获得当前分类的子集cid
		$sids = $this->_getSon($sid);
		$gids = K('Goods')->where("category_sid in(" . implode(',', $sids) . ")")->getField('gid',true);
		//如果分类下面有商品的时候
		if($gids){
			//通过商品gid得到属性
			$attr = K('GoodsAttr')->where("goods_gid in(" . implode(',', $gids) . ")")->group('gtvalue')->all();
			//以下两个临时数组为重组列表页需要的属性
			$tempAttr = array();
			foreach ($attr as $v) {
				$tempAttr[$v['attribute_attr_id']][] = $v;
			}
			$tempFinalAttr = array();
			//组合有名称name的属性
			foreach ($tempAttr as $taid => $value) {
				$tempFinalAttr[] = array(
					'name' => K('Attr')->where("attr_id=" . $taid)->getField('attr_name'),
					'value' => $value
				);
			}
			$this->assign('tempFinalAttr',$tempFinalAttr);
			//定义筛选的格式  例：/cid/1/param/0_0_0_0_0
			$num = count($tempFinalAttr);
			$param = isset($_GET['param']) ? explode('_', $_GET['param']) : array_fill(0, $num, 0);
			$this->assign('param',$param);
//			p($param);
			//进行筛选
			foreach ($param as $v) {
				if($v){
					$filterGids[] = M()->join('__goods_attr__ g1 JOIN __goods_attr__ g2 ON g1.gtvalue=g2.gtvalue')->where("g1.gtid={$v}")->getField('g2.goods_gid',true);
				}
			}
//			p($filterGids);
			//如果有筛选的gid
			if(isset($filterGids)){
				//取交集
				$finalGids = $filterGids[0];
				foreach ($filterGids as $v) {
					$finalGids = array_intersect($finalGids, $v);
				}
				//属性获得交集gid之后，再和分类下面的商品gid再取交集
				$finalGids = array_intersect($finalGids,$gids);
			}else{
				//全部不限的时候，就是当前分类下面的所有商品gid
				$finalGids = $gids;
			}
		}else{
			//如果分类下面没有商品,把gid赋值为空数组
			$finalGids = array();
		}
		//分页处理
		if($finalGids){
			$total = K('Goods')->where("gid in(" . implode(',', $finalGids) . ")")->count();
			$pageObj = new Page($total,12,3);
			$page = $pageObj->show(5);
			$this->assign('page',$page);
			//获取分配条数
			$limit = $pageObj->limit();
			//分配数据
			
			$goods = K('Goods')->where("gid in(" . implode(',', $finalGids) . ")")->limit($limit)->all();
			$this->assign('goods',$goods);
		}
		
		
		//分配最近浏览
		if(isset($_SESSION['gsid'])){
			$gsids = $_SESSION['gsid'];
			$gsids = array_reverse($gsids);
			foreach ($gsids as $k => $v) {
				$history[] = K('goods')->where("gid = $v")->find();
			}
			$this->assign('history',$history);
		}
		
	    $this->display();
	}
	private function _getSon($sid){
		$data = K('Category')->all();
		$sids = $this->_getSonSid($data,$sid);
		$sids[] = $sid;
		return $sids;
	}
	private function  _getSonSid($data,$sid){
		$temp = array();
		foreach ($data as $v) {
			if($v['spid'] == $sid){
				$temp[] = $v['sid'];
				$temp = array_merge($temp,$this->_getSonSid($data, $v['sid']));
			}
		}
		return $temp;
	}
	
}

 ?>