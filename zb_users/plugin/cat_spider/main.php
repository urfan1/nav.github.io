<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('cat_spider')) {$zbp->ShowError(48);die();}
$act = GetVars("act", "GET");
if ($act == 'save') {
    CheckIsRefererValid();
    cat_spider_save_config($_POST);
    $zbp->SetHint('good');
    Redirect('./main.php?act=option');
}

$blogtitle='蜘蛛日志记录';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<link rel="stylesheet" rev="stylesheet" type="text/css" href="./static/css/layui.css" />
<div id="divMain">
    <div class="layui-elem-quote" style="margin-top: 5px;font-size: 16px;"><?php echo $blogtitle;?><span class="layui-badge" style="margin-left: 15px;">Plus</span></div>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <?php cat_spider_QieMenu($act); ?>
                <li class="right"><a href="javascript:window.confirm('确定清除所有记录吗？') && (window.location.href = 'cmd.php?act=alldel&csrfToken=<?php echo $zbp->GetCSRFToken(); ?>');"><button class="layui-btn layui-btn-sm layui-btn-danger">清除所有数据</button></a></li>
                <li class="right" style="margin-right: 20px;"><a href="javascript:(window.location.href = 'cmd.php?act=txt&csrfToken=<?php echo $zbp->GetCSRFToken(); ?>');"><button class="layui-btn layui-btn-sm">更新404死链文件</button></a></li>
            </ul>
        </div>
        <div id="divMain2">
        <?php
        if ($act == 'xi') {
        ?>
        <script src="static/echarts.js"></script>
        <div class="layui-row">
            <div class="layui-col-md6">
                <div id="shuxing" style="width: 100%;height:500px;"></div>
            </div>
            <div class="layui-col-md6">
                <div id="shanxing" style="width: 100%;height:500px;"></div>
            </div>
        </div>
        <?php $today = cat_spider_post_shu(); ?>
        <script type="text/javascript">
        var shuxing = echarts.init(document.getElementById('shuxing'));
        var shanxing = echarts.init(document.getElementById('shanxing'));
        var option = {
            title: {
                text: '今日抓取排行',
                left: 'center'
            },
            tooltip: {},
            xAxis: {
                data: <?php echo $today[0]; ?>
            },
            yAxis: {},
            series: [{
                name: '抓取次数',
                type: 'bar',
                itemStyle: {
                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                        { offset: 0, color: '#83bff6' },
                        { offset: 0.5, color: '#188df0' },
                        { offset: 1, color: '#188df0' }
                    ])
                },
                data: <?php echo $today[1]; ?>
            }]
        };
        var options = {
            title: {
                text: '总数据',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left'
            },
            series: [{
                name: '总抓取次数',
                type: 'pie',
                radius: '50%',
                data: [
                    <?php 
                    $zongarr = cat_spider_post_shan();
                    foreach ($zongarr as $k){
                        echo "{ value: ".$k['num'].", name: '".$k['name']."' },";
                    }
                    ?>
                    ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };
        shuxing.setOption(option);
        shanxing.setOption(options);
    </script>
        <?php
        }
        if ($act == 'list') {
        ?>
        <?php
        $list = new Pagebar('{%host%}zb_users/plugin/cat_spider/main.php?act=list&page={%page%}{&search=%search%}', false);
        $list->PageCount = 30;
        $list->PageNow = (int) GetVars('page', 'GET') == 0 ? 1 : (int) GetVars('page', 'GET');
        $list->PageBarCount = $zbp->pagebarcount;
        $list->UrlRule->Rules['{%search%}'] = urlencode(GetVars('search'));
        $w = array();
        if (GetVars('search')) {
            if(GetVars('search') == '404' || GetVars('search') == '200'){
                $w[] = array("=","status",GetVars('search'));
            } else {
                $w[] = array("=","name",GetVars('search'));
            }
        }
        $order = array('id' => 'DESC');
        $sql = $zbp->db->sql->Select($zbp->table['cat_spider'], '*', $w, $order, array(($list->PageNow - 1) * $list->PageCount, $list->PageCount), array('pagebar' => $list));
        $array = $zbp->GetListCustom($zbp->table['cat_spider'],$datainfo['cat_spider'],$sql);
        ?>
        <form class="search" method="post" action="#">
            <select class="edit" size="1" name="search" style="width:250px;height: 38px;">
                <option value="0">所有记录</option>
                <option value="baidu">百度</option>
                <option value="toutiao">头条</option>
                <option value="sogou">搜狗</option>
                <option value="shenma">神马</option>
                <option value="google">谷歌</option>
                <option value="biying">必应</option>
                <option value="youdao">有道</option>
                <option value="other">其他</option>
                <option value="haosou">360搜索</option>
                <option value="200">所有200状态</option>
                <option value="404">所有404状态</option>
            </select>
            <button type="submit" class="layui-btn layui-btn-primary layui-border-other">查看</button>
        </form>
        <div class="layui-form">
            <table class="layui-table">
                <thead>
                    <tr><th>ID</th><th>蜘蛛</th><th>IP</th><th>页面地址</th><th>状态码</th><th>爬取时间</th><th>操作</th></tr>
                </thead>
                <tbody>
                <?php
                foreach ($array as $key=>$value){
                ?>
                    <tr>
                        <td><?php echo $value->ID; ?></td>
                        <td><?php echo cat_spider_Qiepin($value->Name); ?></td>
                        <td><?php echo $value->Ip; ?></td>
                        <td><a href="<?php echo $value->Url; ?>" target="_blank"><?php echo $value->Url; ?></a></td>
                        <td><?php echo $value->Status; ?></td>
                        <td><?php echo date("Y-m-d H:i:s",$value->Stime) ?></td>
                        <td><a onclick="return window.confirm('单击“确定”继续。单击“取消”停止。');" href="cmd.php?act=del&id=<?php echo $value->ID; ?>&csrfToken=<?php echo $zbp->GetCSRFToken(); ?>"><button type="button" class="layui-btn layui-btn-danger layui-btn-sm"><i class="layui-icon"></i></button></a></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            <?php
                echo  '<div class="layui-box layui-laypage layui-laypage-molv">';
                foreach ($list->buttons as $key => $value) {
                    echo '<a href="'. $value .'">' . $key . '</a>&nbsp;&nbsp;' ;
                }
                echo  '</div>';
            ?>
        </div>
        <?php
        } if ($act == 'option') {
        ?>
        <form class="layui-form" action="<?php echo BuildSafeURL("main.php?act=save"); ?>" method="post">
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <fieldset class="layui-elem-field">
                        <legend>基础设置</legend>
                        <div class="layui-field-box">
                            <div class="layui-form-item">
                                <label class="layui-form-label">蜘蛛</label>
                                <div class="layui-input-block">
                                    <input type="checkbox" name="baidu" value="1" title="百度" <?php echo $zbp->Config('cat_spider')->baidu ? 'checked' : '' ?>>
                                    <input type="checkbox" name="google" value="1" title="谷歌" <?php echo $zbp->Config('cat_spider')->google ? 'checked' : '' ?>>
                                    <input type="checkbox" name="biying" value="1" title="必应" <?php echo $zbp->Config('cat_spider')->biying ? 'checked' : '' ?>>
                                    <input type="checkbox" name="haosou" value="1" title="360" <?php echo $zbp->Config('cat_spider')->haosou ? 'checked' : '' ?>>
                                    <input type="checkbox" name="sogou" value="1" title="搜狗" <?php echo $zbp->Config('cat_spider')->sogou ? 'checked' : '' ?>>
                                    <input type="checkbox" name="youdao" value="1" title="有道" <?php echo $zbp->Config('cat_spider')->youdao ? 'checked' : '' ?>>
                                    <input type="checkbox" name="shenma" value="1" title="神马" <?php echo $zbp->Config('cat_spider')->shenma ? 'checked' : '' ?>>
                                    <input type="checkbox" name="toutiao" value="1" title="头条" <?php echo $zbp->Config('cat_spider')->toutiao ? 'checked' : '' ?>>
                                    <input type="checkbox" name="other" value="1" title="其他" <?php echo $zbp->Config('cat_spider')->other ? 'checked' : '' ?>>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="layui-elem-field">
                        <legend>其他设置</legend>
                        <div class="layui-field-box">
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">数据</label>
                                <div class="layui-input-inline" style="text-align: center;">
                                    <input type="checkbox" name="xieon" value="1" lay-skin="switch" lay-text="开|关" <?php echo $zbp->Config('cat_spider')->xieon ? 'checked' : '' ?>>
                                </div>
                                <div class="layui-form-mid layui-word-aux">开启后关闭插件将清除所有数据</div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="layui-elem-field">
                        <legend>死链文件</legend>
                        <div class="layui-field-box">
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">更新</label>
                                <div class="layui-form-mid layui-word-aux">建议等待蜘蛛爬取死链文件后，再点击更新404数据</div>
                            </div>
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">地址</label>
                                <div class="layui-form-mid layui-word-aux"><?php echo $zbp->host;?>zb_users/plugin/cat_spider/sl.txt</div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="layui-form-item">
                        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken(); ?>">
                        <button type="submit" class="layui-btn">提交</button>
                    </div>
                </div>
            </div>
        </form>
        <?php
        }
        ?>
    </div>
</div>
<script type="text/javascript" src="./static/layui.js"></script>
<script>
layui.use(['form', 'layer','table'], function() {
    var form = layui.form;
    var layer = layui.layer;
    var table = layui.table;
    table.init('list', {
        height: 500 ,
        page: true 
    });
})
</script> 
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>