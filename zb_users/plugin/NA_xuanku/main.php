<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {
    $zbp->ShowError(6);
    die();
}
if (!$zbp->CheckPlugin('NA_xuanku')) {
    $zbp->ShowError(48);
    die();
}
$blogtitle = '配置';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
$setid = 0;//设置配置标识
?>
    <div id="divMain">
        <?php require $blogpath . 'zb_users/plugin/NA_xuanku/admin/admin_top.php'; ?>
        <form id="form1" name="form1" method="post">
            <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
                <tr>
                    <th width="15%"><p align="center">配置名称</p></th>
                    <th width="30%"><p align="center">配置内容</p></th>
                    <th width='20%'><p align="center">配置说明</p></th>
                </tr>
                <tr>
                    <td><label><p align="center">是否全家显示（否为只文章显示）：</p></label></td>
                    <td><p align="left"><input name="Forum[is]" class="checkbox" style="width:250px;" type="text"
                                               value="<?php echo $zbp->Config('NA_xuanku')->is; ?>"></p></td>

                    <td><p align="left">是否全家显示（否为只文章显示）</p></td>
                </tr>
                <tr>
                    <td><label><p align="center">绑定特效的class或者ID元素的设置：</p></label></td>
                    <td><p align="left"><textarea cols="3" rows="6" name="Forum[bdclass]"
                                                  style="width:500px;height:200px;"><?php echo $zbp->Config('NA_xuanku')->bdclass; ?></textarea>
                        </p></td>

                    <td><p align="left">css内容部分为class，就在class前加点.
                            如果是id，那么就加#，下面以默认主题为例：.post-body，推荐给图片img设置（绑定class或者ID间用“|”隔开，不建议设置过多，一行绑定一个）
                            示例：<br>img|wow wobble<br>
                            h2|wow pulse<br>
                            #divContorPanel|wow pulse<br>
                            .search|wow pulse<br>
                            教程：https://blog.csdn.net/weixin_43535265/article/details/114401211
                        </p></td>
                </tr>
                <tr>
                    <td><label><p align="center">设置后的js（不需要修改）：</p></label></td>
                    <td><p align="left"><textarea cols="3" rows="6"
                                                  style="width:500px;height:200px;"><?php echo $zbp->Config('NA_xuanku')->get_js; ?></textarea>
                        </p></td>

                    <td><p align="left"></p></td>
                </tr>

            </table>
            <br/>
            <input name="" type="Submit" class="button" value="保存"/>
        </form>
        <h2>特效如下：（直接复制过去就能使用）（wow与后面的参数之间有个空格，一个空格）</h2>
        <table border="0">
            <tbody>
            <tr>
                <td>wow rollIn</td>
                <td>从左到右、顺时针滚动、透明度从100%变化至设定值</td>


            </tr>
            <tr>
                <td>wow bounceIn</td>
                <td>从原位置出现，由小变大超出设定值，再变小小于设定值，再回归设定值、透明度从100%变化至设定值</td>


            </tr>
            <tr>
                <td>wow bounceInUp</td>
                <td>从下往上、窜上来以后会向上超出一部分然后弹回去、透明度为设定值不变</td>


            </tr>
            <tr>
                <td>wow bounceInDown</td>
                <td>从上往下、掉下来以后会向下超出一部分然后弹跳一下、透明度为设定值不变</td>


            </tr>
            <tr>
                <td>wow bounceInLeft</td>
                <td>从左往右、移过来以后会向右超出一部分然后往左弹一下、透明度为设定值不变</td>


            </tr>
            <tr>
                <td>wow bounceInRight</td>
                <td>从右往左、移过来以后会向左超出一部分然后往右弹一下、透明度为设定值不变</td>


            </tr>
            <tr>
                <td>wow slideInUp</td>
                <td>从下往上、上来后固定到设定位置、透明度为设定值不变（up是从下往上）（如果元素在最下面，会撑开盒子高度）</td>


            </tr>
            <tr>
                <td>wow slideInDown</td>
                <td>从上往下、上来后固定到设定位置、透明度为设定值不变</td>


            </tr>
            <tr>
                <td>wow slideInLeft</td>
                <td>从左往右、上来后固定到设定位置、透明度为设定值不变（left却是从左往右）</td>


            </tr>
            <tr>
                <td>wow slideInRight</td>
                <td>从右往左、上来后固定到设定位置、透明度为设定值不变</td>


            </tr>
            <tr>
                <td>wow lightSpeedIn</td>
                <td>从右往左、头部先向右倾斜，又向左倾斜，最后变为原来的形状、透明度从100%变化至设定值</td>


            </tr>
            <tr>
                <td>wow pulse</td>
                <td>原位置放大一点点在缩小至原本大小、透明度为设定值不变（配合动画执行次数属性效果更佳）</td>


            </tr>
            <tr>
                <td>wow flipInX</td>
                <td>原位置后仰前栽、透明度从100%变化至设定值</td>


            </tr>
            <tr>
                <td>wow flipInY</td>
                <td>原位置左右旋动、透明度从100%变化至设定值</td>


            </tr>
            <tr>
                <td>wow bounce</td>
                <td>上下抖动、透明度为设定值不变（配合动画执行次数和动画持续时间属性可以实现剧烈抖动亦或是慢慢抖）</td>


            </tr>
            <tr>
                <td>wow shake</td>
                <td>左右抖动、透明度为设定值不变（配合动画执行次数和动画持续时间属性可以实现剧烈抖动亦或是慢慢抖）</td>


            </tr>
            <tr>
                <td>wow swing</td>
                <td>从右往左、头部先向右倾斜，又向左倾斜，最后变为原来的形状、透明度为设定值不变</td>


            </tr>
            <tr>
                <td>wow bounceInU</td>
                <td>原位置不变、直接从不显示到显示（无过过渡效果）</td>


            </tr>
            <tr>
                <td>wow wobble</td>
                <td>原位置不变、类似于一个人站在那左右晃头、透明度为设定值不变</td>


            </tr>


            </tbody>


        </table>

    </div>
    <script type="text/javascript">
        ActiveTopMenu("topmenu_NA_xuanku");
    </script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>