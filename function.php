<?php
function _encode($data){
	return json_encode($data);
}
function success($code=0,$msg="",$data=""){
	return _encode(['code'=>0,'msg'=>$msg,'data'=>$data]);
}
function fail($code=1,$msg="",$data=""){
	return _encode(['code'=>1,'msg'=>$msg,'data'=>$data]);
}