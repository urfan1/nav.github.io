<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('themeEditor')) {$zbp->ShowError(48);die();}

$blogtitle = 'themeEditor';
require $blogpath . 'zb_system/admin/admin_header.php';
?>
<style type="text/css">
.fixedPanel {
	position: fixed;
	height: 32px;
	top: 0px;
	width: 80%;
	z-index: 8888;
	opacity: 0.8;
	text-align: center;
}
.hideLayer {
	margin: 0px;
	padding: 0px;
	position: fixed;
	top: 0px;
	bottom: 0px;
	left: 0px;
	right: 0px;
	z-index: 9990;
	background-color: rgba(0, 0, 0, 0.298039);
	display: none;
}
.messageBox {
	position: absolute;
	top: 40%;
	left: 50%;
	transform: translate(-50%, -50%);
	-webkit-transform: translate(-50%, -50%);
	height: 100px;
	width: 200px;
	background: white;
	border: 1px black solid;
}
.content {
	text-align: center;
	margin-top: 35px;
	font-size: 20px;
}
</style>
<?php
require $blogpath . 'zb_system/admin/admin_top.php';
require './function.php';
?>
<div id="divMain">
  <div id="divMain2">
  <form method="post" id="formSubmit">
  <div class="fixedPanel" style="">
  	<input class="button" type="button" value="保存" id="saveButton" style="margin: 0; height: 32px;">
  <select style="width: 60%; height: 32px; padding: 0;" id="fileSelect">
  	<option value="" disabled="disabled" selected="selected">请选择...</option>
  <?php
$options = scanThemeDir();
foreach ($options as $id => $value) {
	echo '<option value="' . $value . '">' . $value . '</option>';
}
?>
  </select>
  <select style="width: 20%; height: 32px; padding: 0" id="themeSelect">
  	<option value="dreamweaver" selected="selected">Dreamweaver</option>
  	<option value="github">GitHub</option>
  	<option value="monokai">Monokai</option>
  	<option value="tomorrow">Tomorrow</option>
  	<option value="tomorrow_night">Tomorrow_Night</option>
  	<option value="xcode">XCode</option>
  </select>
	</div>
	<div id="editor"></div>
  </form>
  </div>
</div>
<div class="hideLayer">
	<div class="messageBox">
		<div class="content">
			<img src="../../../zb_system/image/admin/loading.gif" style="margin-right: 10px"/>操作进行中..
		</div>
	</div>
</div>
<script src="ace/ace.js" type="text/javascript"></script>
<script src="ace/ext-emmet.js" type="text/javascript"></script>
<script src="ace/ext-beautify.js" type="text/javascript"></script>
<script src="ace/emmet.js"></script>
<script>
$(function() {

	var fileChangeState = false;
	var defaultTheme = localStorage.themeEditorTheme || 'dreamweaver';
	var emmet = require('ace/ext/emmet');
	var beautify = require('ace/ext/beautify');
	var editor = ace.edit("editor");
	var editorSession = editor.getSession();
	var saveEditor = function() {
		$(".hideLayer").show();
		$.ajax({
			url: 'ajax.php?action=save&filename=' + encodeURI($("#fileSelect").val()),
			data: {
				content: editorSession.getValue()
			},
			type: 'POST',
			dataType: 'json'
		}).done(function(data) {
			fileChangeState = false;
			document.title = document.title.replace("(*) ", "");
		}).always(function() {
			$(".hideLayer").hide();
		});
	};

	editor.setTheme("ace/theme/" + defaultTheme);
	$("#themeSelect").val(defaultTheme);
	editor.setAutoScrollEditorIntoView(true);
	//editor.setOption("minLines", parseInt(screen.height / 20));
	editor.setOption("maxLines", 10000000);
	editor.setOption("enableEmmet", true);
	editor.commands.addCommands(beautify.commands);
	editor.commands.addCommand({
		name: "showKeyboardShortcuts",
		bindKey: {win: "Ctrl-Alt-h", mac: "Command-Alt-h"},
		exec: function(editor) {
			ace.config.loadModule("ace/ext/keybinding_menu", function(module) {
				module.init(editor);
				editor.showKeyboardShortcuts()
			})
		}
	});
	editor.commands.addCommand({
		name: "Save",
		bindKey: {win: "Ctrl-S", mac: "Command-S"},
		exec: function(editor) {
			saveEditor();
		}
	});
	editorSession.on('change', function() {
		if (!fileChangeState) {
			fileChangeState = true;
			document.title = "(*) " + document.title;
		}
	});
	$("#fileSelect").change(function(e) {
		if (!fileChangeState || confirm('你当前编辑的文件还没保存，确定要切换文件吗？')) {
			$(".hideLayer").show();
			$.ajax({
				url: 'ajax.php?action=load&filename=' + encodeURI($(this).val()),
				type: 'GET',
				dataType: 'json'
			}).done(function(data) {
				editorSession.setMode('ace/mode/' + data.aceMode);
				editorSession.setValue(data.content);
				fileChangeState = false;
				document.title = "Editing " + $("#fileSelect").val();
			}).always(function() {
				$(".hideLayer").hide();
			});
		}
	});
	$("#saveButton").click(saveEditor);
	window.onbeforeunload = function() {
		if (fileChangeState) {
			return '你当前编辑的文件还没保存，确定要退出吗？'
		} else {
			return;
		}
	}
	$("#themeSelect").change(function(e) {
		var theme = $(this).val();
		localStorage.themeEditorTheme = theme;
		editor.setTheme("ace/theme/" + theme);
	});
});
</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>