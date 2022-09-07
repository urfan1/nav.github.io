<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {
	$zbp->ShowError(6);
	die();
}
if (!$zbp->CheckPlugin('ly_qq')) {
	$zbp->ShowError(48);
	die();
}
$app = new App();
$app->LoadInfoByXml('plugin', 'ly_qq');
$blogtitle = $app->name . ' - 设置';
if (GetVars('act') == 'save') {
	CheckIsRefererValid();
	unset($_POST['csrfToken']);
	ly_qq_core::Update();
	foreach ($_POST as $k => $v) {

		$zbp->Config('ly_qq')->$k = $v;
	}
	$zbp->SaveConfig('ly_qq');
	$zbp->SetHint('good');
	Redirect('./main.php');
}
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id='divMain'>
	<div class='divHeader'><?php echo $blogtitle; ?></div>
	<div id='divMain2'>
		<style>
			form .w50 {
				min-width: 50%;
			}

			form .w100 {
				width: 100%;
			}

			table {
				width: 100%;
			}

			table th,
			table td {
				word-break: break-all;
			}

			table.ul2 th:nth-child(1) {
				text-align: center;
				min-width: 150px;
			}

			table.ul2 th:nth-child(2) {
				width: 100%;
			}
		</style>
		<form action='?act=save' method='post'>
			<table class='ul2'>
				<tbody>
					<tr>
						<th><a href="<?php echo $app->author_url; ?>" target='_blank'><?php echo $app->author_name; ?></a></th>
						<th><?php echo $app->note; ?></th>
					</tr>
					<tr>
						<td>默认用户级别</td>
						<td>
							<p>
								<?php
								$a = array(3 => '作者', 4 => '协作者',  5 => '评论者',  6 => '游客');
								echo '<select name="level" class="form-control">';
								foreach ($a as $k => $r) {
									echo '<option value="' . $k . '"';
									if ($k == ly_qq_Config('level',6)) echo ' selected="selected"';
									echo '>' . $r . '</option>';
								}
								echo '</select>';
								?>
						</td>
					</tr>
					<tr>
						<td>限制登录评论：</td>
						<td>
							<input name='add' type='text' value="<?php echo ly_qq_Config('add'); ?>" class='checkbox' style='display:none;' />
							(开启后，必须登陆后才能评论留言)
						</td>
					</tr>
					<tr>
						<td>APP ID：</td>
						<td><input name='appid' type='text' value="<?php echo ly_qq_Config('appid'); ?>" class='form-control' /></td>
					</tr>
					<tr>
						<td>APP Key：</td>
						<td><input name='appkey' type='text' value="<?php echo ly_qq_Config('appkey'); ?>" class='form-control' /></td>
					</tr>
					<tr>
						<td>unionid：</td>
						<td>
							<input name='unionid' type='text' value="<?php echo ly_qq_Config('unionid'); ?>" class='checkbox' style='display:none;' />
							(平台统一ID信息，有unionid权限才可以开启)
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type='hidden' name='csrfToken' value="<?php echo $zbp->GetCsrfToken(); ?>">
							<input type='submit' value=' 保 存 ' class='button' />
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							QQ互联：<a href="https://connect.qq.com/index.html" target="_blank">https://connect.qq.com/index.html</a><br>
							回调地址：<a href="<?php echo ly_qq_core::Redirect_Uri(); ?>" target="_blank"><?php echo ly_qq_core::Redirect_Uri(); ?></a>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
<script type='text/javascript'>
	AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/ly_qq/logo.png'; ?>");
</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
