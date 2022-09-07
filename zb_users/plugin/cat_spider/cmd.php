<?php

require '../../../zb_system/function/c_system_base.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('cat_spider')) {$zbp->ShowError(48);die();}
$act = GetVars('act', 'GET');
switch ($act) {
    case 'del':
        CheckIsRefererValid();
        $id = (int) GetVars("id", "GET");
        $zbp->db->sql->get()->delete($zbp->db->dbpre.'cat_spider')->where('=', 'id', $id)->query;
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        break;
    case 'alldel':
        CheckIsRefererValid();
        $zbp->db->sql->get()->delete($zbp->db->dbpre.'cat_spider')->query;
        $sql = $zbp->db->sql->get()->ALTER($zbp->db->dbpre.'cat_spider')->sql. ' AUTO_INCREMENT=1 ;';
        $zbp->db->Query($sql);
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        break;
    case 'txt':
        CheckIsRefererValid();
        $arr = $zbp->db->sql->get()->select($zbp->db->dbpre.'cat_spider')->where(array('=', 'status', '404'))->query;
        if(!empty($arr)){
            $new = [];
            foreach ($arr as $key => $value) {
                $new[$key] = $value['url'];
            }
            $new = array_flip($new);
            $new = array_flip($new);
            $four = '';
            foreach($new as $ve){
                $four .= $ve."\r\n";
            }
            if(false!==fopen('sl.txt','w+')){
                file_put_contents('sl.txt',$four);
            }
            $zbp->SetHint('good','更新成功');
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        } else {
            $zbp->SetHint('bad','一整个被你打败了 ~ 没有404地址呀');
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        }
        break;
    default:
        // code...
        break;
}



?>