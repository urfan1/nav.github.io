<?php

/**
 * 系统初始化等相关操作.
 */

/**
 * ZBLOGPHP
 *
 * @var ZBlogPHP;
 */
$zbp = null;

error_reporting(E_ALL);

defined('ZBP_PATH') || define('ZBP_PATH', rtrim(str_replace('\\', '/', realpath(dirname(__FILE__) . '/../../')), '/') . '/');
defined('ZBP_HOOKERROR') || define('ZBP_HOOKERROR', true);
defined('ZBP_OBSTART') || define('ZBP_OBSTART', true);
defined('ZBP_SAFEMODE') || define('ZBP_SAFEMODE', false);

//强制开启debug模式，需要开启时请打开注释
//defined('ZBP_DEBUGMODE') || define('ZBP_DEBUGMODE', true);

if (ZBP_OBSTART) {
    ob_start();
}

/**
 * 加载系统基础函数.
 */
require ZBP_PATH . 'zb_system/function/c_system_version.php';
require ZBP_PATH . 'zb_system/function/c_system_compat.php';
require ZBP_PATH . 'zb_system/function/c_system_plugin.php';
require ZBP_PATH . 'zb_system/function/c_system_debug.php';
require ZBP_PATH . 'zb_system/function/c_system_common.php';
require ZBP_PATH . 'zb_system/function/c_system_function.php';
require ZBP_PATH . 'zb_system/function/c_system_route.php';
require ZBP_PATH . 'zb_system/function/c_system_event.php';
require ZBP_PATH . 'zb_system/function/c_system_api.php';

/**
 * 指定加载类的目录并注册加载函数到系统
 */
if (function_exists('RunTime_Begin')) {
    RunTime_Begin();
}
$GLOBALS['autoload_class_dirs'] = array();
if (function_exists('AddAutoloadClassDir')) {
    AddAutoloadClassDir(ZBP_PATH . 'zb_system/function/lib'); 
}
spl_autoload_register('AutoloadClass');

if (is_readable($file_base = ZBP_PATH . 'vendor/autoload.php') && PHP_VERSION_ID >= 50300) {
    include_once $file_base;
}

/*
 * 定义系统变量
 */
/*
 * 操作系统
 */
define('SYSTEM_UNKNOWN', 0);
define('SYSTEM_WINDOWS', 1);
define('SYSTEM_UNIX', 2);
define('SYSTEM_LINUX', 3);
define('SYSTEM_DARWIN', 4);
define('SYSTEM_CYGWIN', 5);
define('SYSTEM_BSD', 6);
/*
 * 网站服务器
 */
define('SERVER_UNKNOWN', 0);
define('SERVER_APACHE', 1);
define('SERVER_IIS', 2);
define('SERVER_NGINX', 3);
define('SERVER_LIGHTTPD', 4);
define('SERVER_KANGLE', 5);
define('SERVER_CADDY', 6);
define('SERVER_BUILTIN', 7);
/*
 * PHP引擎
 */
define('ENGINE_PHP', 1);
define('ENGINE_HHVM', 2);
define('PHP_SYSTEM', GetSystem());
define('PHP_SERVER', GetWebServer());
define('PHP_ENGINE', ENGINE_PHP);
define('IS_X64', (PHP_INT_SIZE === 8));
/*
 * 如果想获取准确的值，请zbp->Load后使用$zbp->isHttps
 * 此处仅为当前系统环境检测
 */
defined('HTTP_SCHEME') || define('HTTP_SCHEME', GetScheme($_SERVER));
/*
 * 兼容性策略
 */
define('IS_WINDOWS', PHP_SYSTEM === SYSTEM_WINDOWS);
define('IS_UNIX', PHP_SYSTEM === SYSTEM_UNIX);
define('IS_LINUX', PHP_SYSTEM === SYSTEM_LINUX);
define('IS_DARWIN', PHP_SYSTEM === SYSTEM_DARWIN);
define('IS_CYGWIN', PHP_SYSTEM === SYSTEM_CYGWIN);
define('IS_BSD', PHP_SYSTEM === SYSTEM_BSD);
define('IS_APACHE', PHP_SERVER === SERVER_APACHE);
define('IS_IIS', PHP_SERVER === SERVER_IIS);
define('IS_NGINX', PHP_SERVER === SERVER_NGINX);
define('IS_LIGHTTPD', PHP_SERVER === SERVER_LIGHTTPD);
define('IS_KANGLE', PHP_SERVER === SERVER_KANGLE);
define('IS_CADDY', PHP_SERVER === SERVER_CADDY);
define('IS_BUILTIN', PHP_SERVER === SERVER_BUILTIN);
define('IS_HHVM', PHP_ENGINE === ENGINE_HHVM);

define('IS_CLI', strtolower(php_sapi_name()) === 'cli');

define('IS_WORKERMAN', (IS_CLI && class_exists('Workerman\Worker')));
define('IS_SWOOLE', (IS_CLI && defined('SWOOLE_VERSION')));
define('IS_SCF', (getenv('SCF_RUNTIME') && getenv('SCF_FUNCTIONNAME')));
/*
 * 定义文章类型
 */
define('ZC_POST_TYPE_ARTICLE', 0); // 文章
define('ZC_POST_TYPE_PAGE', 1); // 页面
define('ZC_POST_TYPE_TWEET', 2); // 一句话
define('ZC_POST_TYPE_DISCUSSION', 3); // 讨论
define('ZC_POST_TYPE_LINK', 4); // 链接
define('ZC_POST_TYPE_MUSIC', 5); // 音乐
define('ZC_POST_TYPE_VIDEO', 6); // 视频
define('ZC_POST_TYPE_PHOTO', 7); // 照片
define('ZC_POST_TYPE_ALBUM', 8); // 相册

/*
 * 定义类型序列
 * @param  id=>{id,name,url,template,classname}
 * id = 0 ~ 255是系统预留的类型，非系统自定义类型id > 255
 */
$GLOBALS['posttype'] = array(
    array('id' => 0, 'name' => 'article', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //0
    array('id' => 1, 'name' => 'page', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //1
    array('id' => 2, 'name' => 'tweet', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //2
    array('id' => 3, 'name' => 'discussion', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //3
    array('id' => 4, 'name' => 'link', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //4
    array('id' => 5, 'name' => 'music', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //5
    array('id' => 6, 'name' => 'video', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //6
    array('id' => 7, 'name' => 'photo', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //7
    array('id' => 8, 'name' => 'album', 'classname' => 'Post', 'actions' => array(), 'routes' => array()), //8
);

/*
 * 定义文章状态
 */
/*
 * 文章状态：公开发布
 */
define('ZC_POST_STATUS_PUBLIC', 0);
/*
 * 文章状态：草稿
 */
define('ZC_POST_STATUS_DRAFT', 1);
/*
 * 文章状态：审核
 */
define('ZC_POST_STATUS_AUDITING', 2);
/*
 * 用户状态：正常
 */
define('ZC_MEMBER_STATUS_NORMAL', 0);
/*
 * 用户状态：审核中
 */
define('ZC_MEMBER_STATUS_AUDITING', 1);
/*
 * 用户状态：已锁定
 */
define('ZC_MEMBER_STATUS_LOCKED', 2);
/*
 * 文章状态：私人
 */
define('ZC_POST_STATUS_PRIVATE', 4);
/*
 * 文章状态：加密
 */
define('ZC_POST_STATUS_PASSWORD', 8);


/*
 *定义命令
 */
$GLOBALS['actions'] = array(
    'login'  => 6,
    'logout' => 6,
    'verify' => 6,
    'admin'  => 5,
    'search' => 6,
    'misc'   => 6,
    'feed'   => 6,
    'cmt'    => 6,
    'getcmt' => 6,
    'ajax'   => 6,
    'view'   => 6,
    'api'    => 6,

    'ArticleNew' => 4,
    'ArticleEdt' => 4,
    'ArticlePst' => 4,
    'ArticleDel' => 4,
    'ArticlePub' => 3,

    'PageNew' => 2,
    'PageEdt' => 2,
    'PagePst' => 2,
    'PageDel' => 2,
    'PagePub' => 2,

    'CategoryNew' => 2,
    'CategoryEdt' => 2,
    'CategoryPst' => 2,
    'CategoryDel' => 2,

    'CommentEdt' => 5,
    'CommentSav' => 5,
    'CommentDel' => 5,
    'CommentChk' => 5,
    'CommentBat' => 5,

    'MemberNew' => 1,
    'MemberEdt' => 5,
    'MemberPst' => 5,
    'MemberDel' => 1,

    'TagNew' => 2,
    'TagEdt' => 2,
    'TagPst' => 2,
    'TagDel' => 2,

    'PluginEnb' => 1,
    'PluginDis' => 1,

    'UploadPst' => 3,
    'UploadDel' => 3,

    'ModuleEdt' => 1,
    'ModulePst' => 1,
    'ModuleDel' => 1,

    'ThemeSet'   => 1,
    'SidebarSet' => 1,

    'SettingSav' => 1,

    'ArticleMng'  => 4,
    'PageMng'     => 2,
    'CategoryMng' => 2,
    'SettingMng'  => 1,
    'TagMng'      => 2,
    'CommentMng'  => 5,
    'UploadMng'   => 3,
    'MemberMng'   => 5,
    'ThemeMng'    => 1,
    'PluginMng'   => 1,
    'ModuleMng'   => 1,

    'PostBat'     => 2,
    'ArticleAll'  => 2,
    'PageAll'     => 2,
    'CategoryAll' => 2,
    'CommentAll'  => 2,
    'MemberAll'   => 1,
    'TagAll'      => 2,
    'UploadAll'   => 2,

    'NoValidCode' => 5,

    'root' => 1,
);

/*
 *定义数据表
 */
$GLOBALS['table'] = array(

    'Post'     => '%pre%post',
    'Category' => '%pre%category',
    'Comment'  => '%pre%comment',
    'Tag'      => '%pre%tag',
    'Upload'   => '%pre%upload',
    'Module'   => '%pre%module',
    'Member'   => '%pre%member',
    'Config'   => '%pre%config',
);

/*
 *定义数据结构
 */
$GLOBALS['datainfo'] = array(
    'Config' => array(
        'ID'    => array('conf_ID', 'integer', '', 0),
        'Name'  => array('conf_Name', 'string', 250, ''),
        'Key'   => array('conf_Key', 'string', 250, ''),
        'Value' => array('conf_Value', 'string', '', ''),
    ),
    'Post' => array(
        'ID'         => array('log_ID', 'integer', '', 0),
        'CateID'     => array('log_CateID', 'integer', '', 0),
        'AuthorID'   => array('log_AuthorID', 'integer', '', 0),
        'Tag'        => array('log_Tag', 'string', 250, ''),
        'Status'     => array('log_Status', 'integer', '', 0),
        'Type'       => array('log_Type', 'integer', '', 0),
        'Alias'      => array('log_Alias', 'string', 250, ''),
        'IsTop'      => array('log_IsTop', 'integer', '', 0),
        'IsLock'     => array('log_IsLock', 'boolean', '', false),
        'Title'      => array('log_Title', 'string', 250, ''),
        'Intro'      => array('log_Intro', 'string', '', ''),
        'Content'    => array('log_Content', 'string', '', ''),
        'CreateTime' => array('log_CreateTime', 'integer', '', 0),
        'PostTime'   => array('log_PostTime', 'integer', '', 0),
        'UpdateTime' => array('log_UpdateTime', 'integer', '', 0),
        'CommNums'   => array('log_CommNums', 'integer', '', 0),
        'ViewNums'   => array('log_ViewNums', 'integer', '', 0),
        'Template'   => array('log_Template', 'string', 250, ''),
        'Meta'       => array('log_Meta', 'string', '', ''),
    ),
    'Category' => array(
        'ID'          => array('cate_ID', 'integer', '', 0),
        'Name'        => array('cate_Name', 'string', 250, ''),
        'Order'       => array('cate_Order', 'integer', '', 0),
        'Type'        => array('cate_Type', 'integer', '', 0),
        'Count'       => array('cate_Count', 'integer', '', 0),
        'Alias'       => array('cate_Alias', 'string', 250, ''),
        'Group'       => array('cate_Group', 'string', 250, ''),
        'Intro'       => array('cate_Intro', 'string', '', ''),
        'RootID'      => array('cate_RootID', 'integer', '', 0),
        'ParentID'    => array('cate_ParentID', 'integer', '', 0),
        'Template'    => array('cate_Template', 'string', 250, ''),
        'LogTemplate' => array('cate_LogTemplate', 'string', 250, ''),
        'Meta'        => array('cate_Meta', 'string', '', ''),
    ),
    'Comment' => array(
        'ID'         => array('comm_ID', 'integer', '', 0),
        'LogID'      => array('comm_LogID', 'integer', '', 0),
        'IsChecking' => array('comm_IsChecking', 'boolean', '', false),
        'RootID'     => array('comm_RootID', 'integer', '', 0),
        'ParentID'   => array('comm_ParentID', 'integer', '', 0),
        'AuthorID'   => array('comm_AuthorID', 'integer', '', 0),
        'Name'       => array('comm_Name', 'string', 250, ''),
        'Content'    => array('comm_Content', 'string', '', ''),
        'Email'      => array('comm_Email', 'string', 250, ''),
        'HomePage'   => array('comm_HomePage', 'string', 250, ''),
        'PostTime'   => array('comm_PostTime', 'integer', '', 0),
        'IP'         => array('comm_IP', 'string', 250, ''),
        'Agent'      => array('comm_Agent', 'string', '', ''),
        'Meta'       => array('comm_Meta', 'string', '', ''),
    ),
    'Module' => array(
        'ID'          => array('mod_ID', 'integer', '', 0),
        'Name'        => array('mod_Name', 'string', 250, ''),
        'FileName'    => array('mod_FileName', 'string', 250, ''),
        'Content'     => array('mod_Content', 'string', '', ''),
        'HtmlID'      => array('mod_HtmlID', 'string', 250, ''),
        'Type'        => array('mod_Type', 'string', 5, 'div'),
        'MaxLi'       => array('mod_MaxLi', 'integer', '', 0),
        'Source'      => array('mod_Source', 'string', 250, 'user'),
        'IsHideTitle' => array('mod_IsHideTitle', 'boolean', '', false),
        'Meta'        => array('mod_Meta', 'string', '', ''),
    ),
    'Member' => array(
        'ID'         => array('mem_ID', 'integer', '', 0),
        'Guid'       => array('mem_Guid', 'string', 36, ''),
        'Level'      => array('mem_Level', 'integer', '', 6),
        'Status'     => array('mem_Status', 'integer', '', 0),
        'Name'       => array('mem_Name', 'string', 250, ''),
        'Password'   => array('mem_Password', 'string', 250, ''),
        'Email'      => array('mem_Email', 'string', 250, ''),
        'HomePage'   => array('mem_HomePage', 'string', 250, ''),
        'IP'         => array('mem_IP', 'string', 250, ''),
        'CreateTime' => array('mem_CreateTime', 'integer', '', 0),
        'PostTime'   => array('mem_PostTime', 'integer', '', 0),
        'UpdateTime' => array('mem_UpdateTime', 'integer', '', 0),
        'Alias'      => array('mem_Alias', 'string', 250, ''),
        'Intro'      => array('mem_Intro', 'string', '', ''),
        'Articles'   => array('mem_Articles', 'integer', '', 0),
        'Pages'      => array('mem_Pages', 'integer', '', 0),
        'Comments'   => array('mem_Comments', 'integer', '', 0),
        'Uploads'    => array('mem_Uploads', 'integer', '', 0),
        'Template'   => array('mem_Template', 'string', 250, ''),
        'Meta'       => array('mem_Meta', 'string', '', ''),
    ),
    'Tag' => array(
        'ID'       => array('tag_ID', 'integer', '', 0),
        'Name'     => array('tag_Name', 'string', 250, ''),
        'Order'    => array('tag_Order', 'integer', '', 0),
        'Type'     => array('tag_Type', 'integer', '', 0),
        'Count'    => array('tag_Count', 'integer', '', 0),
        'Alias'    => array('tag_Alias', 'string', 250, ''),
        'Group'    => array('tag_Group', 'string', 250, ''),
        'Intro'    => array('tag_Intro', 'string', '', ''),
        'Template' => array('tag_Template', 'string', 250, ''),
        'Meta'     => array('tag_Meta', 'string', '', ''),
    ),
    'Upload' => array(
        'ID'         => array('ul_ID', 'integer', '', 0),
        'AuthorID'   => array('ul_AuthorID', 'integer', '', 0),
        'Size'       => array('ul_Size', 'integer', '', 0),
        'Name'       => array('ul_Name', 'string', 250, ''),
        'SourceName' => array('ul_SourceName', 'string', 250, ''),
        'MimeType'   => array('ul_MimeType', 'string', 250, ''),
        'PostTime'   => array('ul_PostTime', 'integer', '', 0),
        'DownNums'   => array('ul_DownNums', 'integer', '', 0),
        'LogID'      => array('ul_LogID', 'integer', '', 0),
        'Intro'      => array('ul_Intro', 'string', '', ''),
        'Meta'       => array('ul_Meta', 'string', '', ''),
    ),
);

/*
 * 版本兼容处理
 * PHP 7.4移除了get_magic_quotes_gpc
 * https://github.com/php/php-src/commit/b2ea507beab862a0167af6b99f44fe9c695ca4f0
 */
if (function_exists('get_magic_quotes_gpc') && PHP_VERSION_ID < 70400 && call_user_func('get_magic_quotes_gpc')) {

    function _stripslashes(&$var)
    {
        if (is_array($var)) {
            foreach ($var as $k => &$v) {
                _stripslashes($v);
            }
        } else {
            $var = stripslashes($var);
        }
    }

    _stripslashes($_GET);
    _stripslashes($_POST);
    _stripslashes($_COOKIE);
    _stripslashes($_REQUEST);
}

/*
 * CLI Mock 处理
 */
if (IS_CLI && !IS_WORKERMAN && !IS_SWOOLE) {
    if (isset($GLOBALS['argv'])) {
        $_SERVER["QUERY_STRING"] = implode('&', array_slice($GLOBALS['argv'], 1));
    } else {
        $_SERVER["QUERY_STRING"] = '';
    }

    $_SERVER["HTTP_HOST"] = "localhost";
    $_SERVER['SERVER_SOFTWARE'] = "CLI";
    $_GET = array();
    parse_str($_SERVER["QUERY_STRING"], $_GET);
    parse_str($_SERVER["QUERY_STRING"], $_REQUEST);
    // $_POST = json_decode(file_get_contents('php://stdin'), true);
}

/*
 * 定义系统全局变量
 */

/*
 * 默认路由url数组
 */
$GLOBALS['routes'] = array();

/*
 * 当前动作命令
 */
$GLOBALS['action'] = '';
/*
 * 当前请求路径
 */
$GLOBALS['currenturl'] = GetRequestUri();
$GLOBALS['fullcurrenturl'] = '';
$GLOBALS['currentscript'] = GetRequestScript();
$GLOBALS['fullcurrentscript'] = ZBP_PATH . $GLOBALS['currentscript'];
/*
 * 语言包
 */
$GLOBALS['lang'] = array(); // array
$GLOBALS['langs'] = null; // object
/*
 * 系统根路径
 */
$GLOBALS['blogpath'] = ZBP_PATH;
/*
 * 用户路径
 */
$GLOBALS['usersdir'] = ZBP_PATH . 'zb_users/';
/*
 * System路径
 */
$GLOBALS['systemdir'] = ZBP_PATH . 'zb_system/';
/*
 * Admin路径
 */
$GLOBALS['admindir'] = $GLOBALS['systemdir'] . 'admin/';
/*
 * CACHE路径
 */
$GLOBALS['cachedir'] = $GLOBALS['usersdir'] . 'cache/';
/*
 * LOGS路径
 */
$GLOBALS['logsdir'] = $GLOBALS['usersdir'] . 'logs/';
/*
 * DATA路径
 */
$GLOBALS['datadir'] = $GLOBALS['usersdir'] . 'data/';

/*
 * 已激活插件列表
 */
$GLOBALS['activedapps'] = array();
//保留activeapps，兼容以前版本
$GLOBALS['activeapps'] = &$GLOBALS['activedapps'];

/*
 * 加载设置
 */
$GLOBALS['option'] = include ZBP_PATH . 'zb_system/defend/option.php';
$op_users = null;
if (!ZBP_HOOKERROR && isset($_ENV['ZBP_USER_OPTION']) && is_readable($file_base = $_ENV['ZBP_USER_OPTION'])) {
    $op_users = include $file_base;
    $GLOBALS['option'] = array_merge($GLOBALS['option'], $op_users);
} elseif (is_readable($file_base = $GLOBALS['usersdir'] . 'c_option.php')) {
    $op_users = include $file_base;
    $GLOBALS['option'] = array_merge($GLOBALS['option'], $op_users);
}

$GLOBALS['blogtitle'] = $GLOBALS['option']['ZC_BLOG_SUBNAME']; // 不是漏写！
$GLOBALS['blogname'] = &$GLOBALS['option']['ZC_BLOG_NAME'];
$GLOBALS['blogsubname'] = &$GLOBALS['option']['ZC_BLOG_SUBNAME'];
$GLOBALS['blogtheme'] = &$GLOBALS['option']['ZC_BLOG_THEME'];
$GLOBALS['blogstyle'] = &$GLOBALS['option']['ZC_BLOG_CSS'];
$GLOBALS['cookiespath'] = null;
$GLOBALS['bloghost'] = GetCurrentHost($GLOBALS['blogpath'], $GLOBALS['cookiespath']);
$GLOBALS['usersurl'] = $GLOBALS['bloghost'] . 'zb_users/';
$GLOBALS['systemurl'] = $GLOBALS['bloghost'] . 'zb_system/';
$GLOBALS['adminurl'] = $GLOBALS['bloghost'] . 'zb_system/admin/';

/*
 * 系统实例化
 */
AutoloadClass('ZBlogPHP');
AutoloadClass('DbSql');
AutoloadClass('Config');

$GLOBALS['zbp'] = ZBlogPHP::GetInstance();
$GLOBALS['zbp']->Initialize();

/*
 * 加载主题和插件APP
 */
if (ZBP_SAFEMODE === false) {

    $theme_preset = GetVarsFromEnv('ZBP_PRESET_THEME');
    if ($theme_preset != '') {
        $GLOBALS['blogtheme'] = $theme_preset;
        $style_preset = GetVarsFromEnv('ZBP_PRESET_THEME_STYLE');
        if ($style_preset != '') {
            $GLOBALS['blogstyle'] = $style_preset;
        }
    }
    $theme_name = $GLOBALS['blogtheme'];
    $file_base = $GLOBALS['usersdir'] . 'theme/' . $GLOBALS['blogtheme'] . '/theme.xml';
    $theme_include = $GLOBALS['usersdir'] . 'theme/' . $GLOBALS['blogtheme'] . '/include.php';

    if (is_readable($file_base)) {
        $GLOBALS['activedapps'][] = $theme_name;

        // 读主题版本信息
        $GLOBALS['zbp']->themeapp = $GLOBALS['zbp']->LoadApp('theme', $theme_name);
        $GLOBALS['zbp']->themeinfo = $GLOBALS['zbp']->themeapp->GetInfoArray();

        if ($GLOBALS['zbp']->themeapp->isloaded && is_readable($theme_include)) {
            include $theme_include;
        }
    }

    $aps = GetVarsFromEnv('ZBP_PRESET_PLUGINS');
    $aps2 = $GLOBALS['zbp']->GetPreActivePlugin();
    if ($aps != '') {
        $aps = explode('|', $aps);
        foreach ($aps2 as $ap) {
            $aps[] = $ap;
        }
        $aps = array_unique($aps);
    } else {
        $aps = $aps2;
    }

    foreach ($aps as $ap) {
        if (is_readable($file_base = $GLOBALS['usersdir'] . 'plugin/' . $ap . '/plugin.xml')) {
            $GLOBALS['activedapps'][] = $ap;
        }
        if (is_readable($file_base = $GLOBALS['usersdir'] . 'plugin/' . $ap . '/include.php')) {
            include $file_base;
        }
    }

    foreach ($GLOBALS['plugins'] as &$fn) {
        if (function_exists($fn)) {
            $fn();
        }
    }
}

unset($file_base, $aps, $aps2, $fn, $ap, $op_users, $opk, $opv);
unset($theme_name, $theme_iclude, $theme_preset, $style_preset);

//1.7新加入的
$GLOBALS['zbp']->PreLoad();
