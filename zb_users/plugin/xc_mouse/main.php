<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('xc_mouse')) {$zbp->ShowError(48);die();}

$blogtitle='鼠标点击特效插件';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<style>
	table{
		width:100%;
	}
	tr{
		height: 35px;
	}
	label{
		margin-right: 20px;
	}
	input[type="radio"]{
		margin-right: 5px;
	}
	.range__counter-column{
		display: none;
	}
	.range__input{
		padding: 10px;
		border: 1px solid #cddc39;
		margin: 10px 20px 10px 0px;
		display: inline-block;
		height: 45px;
		width: 300px;
		border-radius: 3px;
	}
	.range__input input[type="range"]{
		width:100%;
	}
	.range__counter-sr{
		font-size: 20px;
		font-weight: bold;
		color: green;
	}
	#confetti_div,#sparkles_div{
		width: 100%;
		padding: 60px 0;
		background-color: #fff !important;
		border: 1px solid #cddc39;
		border-radius: 10px;
		text-align: center;
		font-size: 30px;
		color: #f5f5f5;
		font-weight: bold;
		user-select: none;
	}

	#confetti_div p,#sparkles_div p{
		font-size: 18px;
    	line-height: unset;
	}
	#party-js-container{
		height:100vh !important;
	}
</style>
<div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
	<div class="SubMenu">
		<a href="javascript:;"><span class="m-left m-now">基本设置</span></a>
		<a href="https://www.316la.com" target="_blank"><span class="m-left m-now" style="background: #ff9800;">推荐插件</span></a>
	</div>
	<div id="divMain2">
		<?php
		if (count($_POST) > 0) {
			CheckIsRefererValid();
			foreach ($_POST as $key => $value) {
				$zbp->Config('xc_mouse')->$key = $value;
			}
			$zbp->SaveConfig('xc_mouse');
			$zbp->ShowHint('good');
			xc_mouse_addfilejs();
		}
		?>
		<form action="" method="post">
		<input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
		<input type="hidden" name="rand" value="<?php echo time();?>">
		<table>
			<tr>
				<td colspan="3">鼠标效果设置</td>
			</tr>
			<tr>
				<td style="width: 200px;">鼠标左键特效类型</td>
				<td style="width: 400px;" colspan="2">
					<label ><input type="radio" name="type" value="confetti" <?php echo $zbp->Config('xc_mouse')->type == 'confetti' ? 'checked="true"':'';?> >彩色纸屑</label>
					<label ><input type="radio" name="type" value="sparkles" <?php echo $zbp->Config('xc_mouse')->type == 'sparkles' ? 'checked="true"':'';?> >五角星星</label>
				</td>
			</tr>
			<tr>
				<td style="width: 200px;">鼠标右键特效类型</td>
				<td style="width: 400px;" colspan="2">
					<label ><input type="radio" name="r_type" value="" <?php echo !$zbp->Config('xc_mouse')->r_type ? 'checked="true"':'';?> >关闭效果</label>
					<label ><input type="radio" name="r_type" value="confetti" <?php echo $zbp->Config('xc_mouse')->r_type == 'confetti' ? 'checked="true"':'';?> >彩色纸屑</label>
					<label ><input type="radio" name="r_type" value="sparkles" <?php echo $zbp->Config('xc_mouse')->r_type == 'sparkles' ? 'checked="true"':'';?> >五角星星</label>
				</td>
			</tr>
			<tr>
				<td style="width: 200px;">鼠标右键阻止弹出菜单</td>
				<td style="width: 400px;" colspan="2">
					<input type="text" class="checkbox" name="r_no" value="<?php echo $zbp->Config('xc_mouse')->r_no;?>">
					<span>注意，只有开启右键效果后，此项才会生效!</span>
				</td>
			</tr>
			<tr>
				<td style="width: 200px;">自定义效果设置</td>
				<td style="width: 400px;" colspan="2">
					<input type="text" class="checkbox" name="custom" value="<?php echo $zbp->Config('xc_mouse')->custom;?>">
					<span>开启后，下面的自定义设置才会生效!</span>
				</td>
			</tr>
			<tr>
				<td style="width: 200px;">彩色纸屑设置</td>
				<td style="width: 400px;">
					<p>纸屑数量：<input type="range" id="ra1" min="0" max="60" step="1" name="confetti_count" value="<?php echo (int)$zbp->Config('xc_mouse')->confetti_count;?>"></p>
					<p>传播范围：<input type="range" id="ra2" min="0" max="80" step="1" name="confetti_spread" value="<?php echo (int)$zbp->Config('xc_mouse')->confetti_spread;?>"></p>
				</td>
				<td>
					<div id="confetti_div">
						鼠标点击此处，预览效果
						<p>调试好效果后，记得保存！</p>
					</div>
				</td>
			</tr>
			<tr>
				<td style="width: 200px;">五角星星设置</td>
				<td>
					<p>星星数量：<input type="range" id="ra3" min="0" max="40" step="1" name="sparkles_count" value="<?php echo (int)$zbp->Config('xc_mouse')->sparkles_count;?>"></p>
					<p>星星大小：<input type="range" id="ra4" min="0" max="2" step="0.05" name="sparkles_size" value="<?php echo $zbp->Config('xc_mouse')->sparkles_size;?>"></p>
				</td>
				<td>
					<div id="sparkles_div">
						鼠标点击此处，预览效果
						<p>调试好效果后，记得保存！</p>
					</div>
				</td>
			</tr>
			<tr>
				<td style="color: red;" colspan="3">注意：本插件为免费插件，有问题请Zblog应用中心购买页面留言，不接受售后咨询服务！</td>
			</tr>
		</table>
		<br>
		<input type="submit" value="保存">
		<br>
		</form>
	</div>
	<div>

	</div>
</div>
<script src="script/script.js"></script>
<script src="script/main.js"></script>
<script>


document.getElementById('confetti_div').addEventListener("click", function (e) {
	party.confetti(e, {
		count:$('#ra1').val(),
		spread:$('#ra2').val(),
	});
});


document.getElementById('sparkles_div').addEventListener("click", function (e) {
	party.sparkles(e,{
		count:$('#ra3').val(),
		size: parseFloat($('#ra4').val()),
	});
});

</script>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>