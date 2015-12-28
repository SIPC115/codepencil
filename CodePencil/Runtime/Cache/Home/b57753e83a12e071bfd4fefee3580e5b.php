<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <title>SIPC Codepencil</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="icon" href="/codepencil/Public/images/logo-16.png" sizes="16x16">
    <link rel="stylesheet" href="/codepencil/Public/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="/codepencil/Public/codemirror/addon/scroll/simplescrollbars.css">
    <link rel="stylesheet" href="/codepencil/Public/codemirror/theme/monokai.css">
    <link rel="stylesheet" href="/codepencil/Public/css/reset.css">
    <link rel="stylesheet" href="/codepencil/Public/css/base.css">
    <link rel="stylesheet" href="/codepencil/Public/css/editor.css">
</head>
<body class="layout-side editor">
    <div id="cid" style="display:none;"><?php echo ($cid); ?></div>
    <header class="main-header">
        <div class="title-area">
            <a href="/codepencil/index.php/Index" class="logo">
                <img src="/codepencil/Public/images/logo.png" alt="">
            </a>
            <div class="title-text">
                <h1 id="pen-title">
                    <!-- 这里a放置该帖子的title -->
                    <a href="#" id="codeName">
                        SIPC Code
                    </a>
                </h1>
                <!-- 这里天用户名 -->
                <div class="by">该代码片段 by <span><?php echo ($username); ?></span></div>
            </div>
        </div>
        <div class="header-chunk">
            <button class="btn" id="code-save">
                <i class="icon icon-cloud"></i>保存
            </button>
            <div class="view-switcher-area">
                <button class="btn" id="changeView">
                    <i class="icon icon-resize"></i>切换视图
                </button>
                <div class="view-switcher">
                    <h3>页面布局</h3>
                    <div class="layout-buttons">
                        <a class="active" id="left-layout">
                            <div class="layout-left-img"></div>
                        </a>
                        <a id="top-layout">
                            <div class="layout-top-img"></div>
                        </a>
                        <a id="right-layout">
                            <div class="layout-right-img"></div>
                        </a>
                    </div>
                </div>
            </div>
            <button class="btn" id="code-setting">
                <i class="icon icon-setting"></i>设置
            </button>
            <button class="btn buttonA">
                <?php if($_SESSION['username']){echo "<a href='/codepencil/index.php/Code/readcode/readc/2'>".$_SESSION['username'];}else{ echo "<a href='/codepencil/index.php/Log/login'>"."登录";} ?></a>
            </button>
            <button class="btn buttonA">
                <?php if($_SESSION['username']){echo "<a href='/codepencil/index.php/Log/logout'>"."注销";}else{echo "注册";} ?></a>
            </button>
        </div>
    </header>
    <div class="pen-setting" id="pen-setting">
        <div class="setting-content">
            <h2>SIPC code setting</h2>
            <nav class="explore-tabs">
                <a class="active">CodeInfo</a>
                <a>HTML</a>
                <a>CSS</a>
                <a>JS</a>
            </nav>
            <div class="infoContent active">
                <h4>
                    <label for="titleValue">添加代码(code)标题内容</label>
                    <i class="icon icon-info"></i>
                </h4>
                <input type="text" placeholder="新建标题你内容" id="titleValue" value="<?php echo ($codedata["codename"]); ?>" name="codename">
                <h4>
                    <label for="infoValue">添加代码(code)描述</label>
                    <i class="icon icon-info"></i>
                </h4>
                <textarea name="" id="infoValue" placeholder="填写对代码的描述，也可省略" name="codemessage"><?php echo ($codedata["codemessage"]); ?></textarea>
            </div>
        </div>
        <div class="save-and-close">
            <button class="btn" id="save-and-close">
                Close
            </button>
        </div>
    </div>
    <div class="page-wrap">
        <div class="code-box box-direction">
            <div class="top-boxes editor-box" id="editor">
                <div class="editor-resizer" data-id=0>
                   <h2 class="box-visual-title">
                      <span>HTML</span>
                   </h2>
                </div>  <!-- HTML 控制条 -->
                <div id="box-html" class="box" data-state="mid">
                    <div class="box-title">
                        <div class="box-handle" data-id=0></div> <!-- 拖拽用 -->
                        <div class="box-action-left">
                            <h2>
                                <button class="btn small-btn btn-b-black">
                                    <i class="icon icon-setting"></i>
                                </button>
                                <span>HTML</span>
                            </h2>
                        </div>
                        <div class="box-action-right">
                            <button class="btn small-btn btn-b-black btn-expand">
                                <i class="icon icon-expand"></i>
                            </button>
                        </div>
                    </div>
                    <div class="code-wrap">
                        <textarea id="code-html"></textarea>
                    </div>
                </div>
                <div class="editor-resizer" data-id=1>
                    <h2 class="box-visual-title">
                        <span>CSS</span>
                    </h2>
                </div>  <!-- CSS控制条 -->
                <div id="box-css" class="box" data-state="mid">
                    <div class="box-title">
                        <div class="box-handle" id="css_handle" data-id=1></div> <!-- 拖拽用 -->
                        <div class="box-action-left">
                            <h2>
                                <button class="btn small-btn btn-b-black">
                                    <i class="icon icon-setting"></i>
                                </button>
                                <span>CSS</span>
                            </h2>
                        </div>
                        <div class="box-action-right">
                            <button class="btn small-btn btn-b-black btn-expand">
                                <i class="icon icon-expand"></i>
                            </button>
                        </div>
                    </div>
                    <div class="code-wrap">
                        <textarea id="code-css"></textarea>
                    </div>
                </div>
                <div class="editor-resizer" data-id=2>
                    <h2 class="box-visual-title">
                        <span>JS</span>
                    </h2>
                </div>  <!-- JS控制条 -->
                <div id="box-js" class="box" data-state="mid">
                    <div class="box-title">
                        <div class="box-handle" id="js_handle" data-id=2></div> <!-- 拖拽用 -->
                        <div class="box-action-left">
                            <h2>
                                <button class="btn small-btn btn-b-black">
                                    <i class="icon icon-setting"></i>
                                </button>
                                <span>JS</span>
                            </h2>
                        </div>
                        <div class="box-action-right">
                            <button class="btn small-btn btn-b-black btn-expand">
                                <i class="icon icon-expand"></i>
                            </button>
                        </div>
                    </div>
                    <div class="code-wrap">
                        <textarea id="code-js"></textarea>
                    </div>
                </div>
            </div>
            <!-- 拖动条 -->
            <div id="resizer" class="resizer">
                <span></span>
                <div id="editor-width" class="editor-width">
                    210px
                </div>
            </div>
            <!-- 内容展示区 -->
            <div class="result-div result">
                <div class="iframe-hock" id="iframe-hock"></div>
                <iframe src="/codepencil/template.html" frameborder="0" class="result-iframe" id="aimIframe"></iframe>
            </div>
        </div>
    </div>
    <footer class="site-footer">

    </footer>
    <div id="popup-modal" class="popup-modal"></div>
    <script src="/codepencil/Public/codemirror/lib/codemirror.js"></script>
    <script src="/codepencil/Public/codemirror/addon/scroll/simplescrollbars.js"></script>
    <script src="/codepencil/Public/codemirror/addon/edit/closebrackets.js"></script>
    <script src="/codepencil/Public/codemirror/addon/edit/closetag.js"></script>
    <script src="/codepencil/Public/codemirror/addon/fold/xml-fold.js"></script>

    <script src="/codepencil/Public/codemirror/mode/javascript/javascript.js"></script>
    <script src="/codepencil/Public/codemirror/mode/css/css.js"></script>
    <script src="/codepencil/Public/codemirror/mode/xml/xml.js"></script>
    <script src="/codepencil/Public/codemirror/mode/htmlmixed/htmlmixed.js"></script>

    <script src="/codepencil/Public/js/jquery-2.1.4.js"></script>
    <script>
        /*
         * 全局变量 sc 后序操作小心 断掉原形链
         * codeMirror基本用法:
         *      window.sc.codeHtml.getValue();            //获取值
         *      window.sc.codeHtml.getDoc().setValue();   //设置值
         * */
        window.sc = {
            winSize : {
                "width" : window.innerWidth || $(document).innerWidth(),
                "height" : window.innerHeight || $(document).height()
            }
        };
        /*绑定大小拖拽条区*/
        var bindResizer = (function() {
            var $resizer = $("#resizer"),           //拖动条
                    $showBlock = $("#editor-width"),
                    $iframeHock = $("#iframe-hock"),
                    _resizeDirection,
                    _resizeRight = false,
                    _limitMin,
                    _limitMax,
                    _headerHeight,
                    ele_editor = document.getElementById("editor");           //编辑区
            var _minWidth = 216,
                    _minHeight = 125;
            var _disX, _disY;

            function _init() {
                $("#editor").attr("style", "");
                $resizer.off();                 //清除全部事件
                _resizeDirection = $("body").hasClass("layout-top") ? "horizonal" : "vertical";     //判断方向
                _resizeRight = $("body").hasClass("layout-right") ? true : false;                  //左右颠倒
                _headerHeight = $("header").height();
                if(_resizeDirection === "vertical") {
                    _limitMax = sc.winSize.width - $resizer.width();
                    _limitMin = _minWidth;
                }else {
                    _limitMax = sc.winSize.height - $resizer.height();
                    _limitMin = _minHeight;
                }

                _runAction();
            }

            function _runAction() {
                $resizer.on("mousedown", function(event) {
                    event.preventDefault();     //必须清除全部事件
                    $showBlock.css({
                        "opacity" : 1
                    });
                    if(_resizeDirection === "vertical") {
                        _disX = event.pageX - $(event.target).offset().left;
                        var eleWidth = ele_editor.style.width;
                        ele_editor.style.width = eleWidth < _limitMin ? _limitMin :  eleWidth;
                        ele_editor.style.width = eleWidth > _limitMax ? _limitMax : eleWidth;
                    }else {
                        _disY = event.pageY - $(event.target).offset().top + 4;     //这里有4px微调，不知道为什么
                        var eleHeight = ele_editor.style.height;
                        ele_editor.style.height = eleHeight < _limitMin ? _limitMin :  eleHeight;
                        ele_editor.style.height= eleHeight > _limitMax ? _limitMax : eleHeight;
                    }
                    $iframeHock.css({
                        "display" : "block"
                    });
                    $(document).on("mousemove", resizeMove).on("mouseup", resizeEnd);    //添加两组事件
                })
            }

            function resizeMove(event) {
                event.preventDefault();
                if(_resizeDirection === "vertical") {
                    var dis = event.pageX;
                    if(_resizeRight) {
                        dis = sc.winSize.width - dis;
                    }
                    ele_editor.style.width = (dis - _disX) + "px";
                    $showBlock.text($(ele_editor).css("width"));
                }else {
                    var dis = event.pageY;
                    ele_editor.style.height = (dis - _headerHeight - _disY) + "px";
                    $showBlock.text($(ele_editor).css("height"));
                }
            }
            function resizeEnd(event) {
                $showBlock.css({
                    "opacity" : 0
                });
                $iframeHock.css({
                    "display" : "none"
                });
                $(document).off("mousemove", resizeMove).off("mouseup", resizeEnd);
                window.sc.refresh();
            }

            //设置最小值
            function setMinValue(x, y) {
                _minWidth = x;
                _minHeight = y;
            }
            function _reset() {

            }
            return {
                init : _init,
                setMinValue : setMinValue
            }
        })();
        /*绑定代码区*/
        var bindBoxHandle = (function() {
            $cssHandle = $("#css_handle");
            var $boxHandle,
                    $boxes = $(".box"),             //代码块
                    $editor = $("#editor");		    //代码块容器
            var _resizerDirection,
                    _editorContent,                 //容器空间
                    _minRatio,                    //最小空间 (百分数)
                    _maxRatio,                    //最大空间 (百分数)
                    _extraRatio,                  //三条线，额外空间
                    _headerHeight,                  //头部高度
                    _diX,
                    _dixY,
                    $preEle,
                    $curEle,
                    $nextEle,
                    defaultValue,
                    openState = false;         //是否打开状态
            var _resizerBorder = {             //修正边框
                "height" : 3,
                "width" : 20
            };
            function _init() {
                $(".box").attr("style", "");      //无奈只能这么做，保证style正常
                _headerHeight = $("header").height();
                $boxes.off();
                $(".editor-resizer").off();
                $(".editor-resizer").removeClass("is-horiz");
                _resizeDirection = $("body").hasClass("layout-top") ? "horizonal" : "vertical";     //判断方向

                if(_resizeDirection === "vertical") {
                    $boxHandle = $(".box-handle");

                    $boxHandle.off();              //清空所有事件
                    _editorContent = $editor.height();
                    _minRatio = $("#css_handle").height() / _editorContent;
                    _maxRatio = 1 - 2 * _minRatio;
                    _extraRatio = 9 / _editorContent;
                    defaultValue = changePercent((_editorContent - 3 * _resizerBorder.height) / 3, _editorContent);
                    $boxes.css({
                        "height" : defaultValue
                    })
                }else {
                    $boxHandle = $(".editor-resizer");    //横向

                    $boxHandle.off();              //清空所有事件
                    _editorContent = $editor.width();
                    _minRatio = 0;
                    _maxRatio = (_editorContent - 3 * _resizerBorder.width) / _editorContent;
                    _extraRatio = _resizerBorder.width * 3 / _editorContent;
                    defaultValue = changePercent((_editorContent - 3 * _resizerBorder.width) / 3, _editorContent);
                    $boxes.css({
                        "width" : defaultValue
                    })
                }

                $boxHandle.on("mousedown", function(event) {
                    event.preventDefault();
                    var $target = $(event.target),
                            index = parseInt($target.attr("data-id"));
                    $curEle = $($boxes[index]);
                    $preEle = $($boxes[index - 1]);
                    $nextEle = $($boxes[index + 1]);

                    if(_resizeDirection === "vertical") {
                        _disY = event.pageY - $target.offset().top;    //鼠标在边框上的距离
                    }else {
                        _disX = event.pageX - $target.offset().left;
                    }

                    $(document).on("mousemove", handleMove).on("mouseup", handleUp);

                }).on("dblclick", function(event) {

                    event.preventDefault();
                    var $target = $(event.target),
                            index = parseInt($target.attr("data-id"));
                    var $curEle = $($boxes[index]);
                    var multiValue = _resizeDirection === "vertical" ? Math.abs(parseFloat($curEle[0].style.height) - _maxRatio * 100) : Math.abs(parseFloat($curEle[0].style.width) - _maxRatio * 100) ;    //计算差值

                    $boxes.addClass("boxTransition");

                    if($curEle.attr("data-state") === "mid" && multiValue  > 1) {

                        if(!openState) {
                            openState = true;
                        }else {
                            $boxes.attr("data-state", "mid");
                        }

                        if(_resizeDirection === "vertical") {

                            $curEle.css({
                                height : changePercent(_maxRatio)
                            }).attr("data-state", "full");

                            $(".box[data-state='mid']").css({
                                height : changePercent(_minRatio)
                            });


                        }else {

                            $curEle.css({
                                width : changePercent(_maxRatio)
                            }).attr("data-state", "full").prev().removeClass("is-horiz");

                            $(".box[data-state='mid']").css({
                                width : changePercent(_minRatio)
                            });

                            $(".box[data-state='mid']").prev().addClass("is-horiz");
                        }
                    }else {

                        if(_resizeDirection === "vertical") {

                            $boxes.css({
                                height : defaultValue
                            });
                        }else {

                            $boxes.css({
                                width : defaultValue
                            });

                            $(".box[data-state='mid']").prev().removeClass("is-horiz");

                        }
                        $curEle.attr("data-state", "mid");    //状态切换
                        openState = false;
                    }
                });

                $boxes.on("webkitTransitionEnd transitionend mozTransitionEnd mozTransitionEnd oTransitionEnd", function(event){
                    $boxes.removeClass("boxTransition");
                    window.sc.refresh();
                });

                $($boxHandle[0]).off("mousedown").on("mousemove", function(event) {
                    event.preventDefault();
                });     //删除第一个控制条的全部事件

                //题目不能被选中即可
                $(".box-title").on("selectstart", function(event){
                    event.preventDefault()
                });

                $(".editor-resizer").on("selectstart", function(event){
                    event.preventDefault()
                });
            }

            function handleMove(event) {
                event.preventDefault();
                var $target = $(event.target);
                if(_resizeDirection === "vertical") {
                    if($nextEle.length !== 0) {   //说明选中的css
                        var topHeight = event.pageY - _headerHeight - _disY - 9;   //这里计算值是6？bug
                        var topRatio = topHeight / _editorContent;
                        topRatio = topRatio < _minRatio ? _minRatio : topRatio;
                        topRatio = topRatio > _maxRatio ? _maxRatio : topRatio;
                        var currRatio = 1 - topRatio - _extraRatio - parseFloat($nextEle[0].style.height) / 100;
                        if(currRatio < _minRatio) {
                            currRatio = _minRatio;      //这时是css部分，撞击js部分
                            var nextRatio = 1 - currRatio - topRatio - _extraRatio;
                            nextRatio = nextRatio < _minRatio ? _minRatio : nextRatio;

                            $nextEle.css({
                                "height" : changePercent(nextRatio)
                            })
                        }
                        $preEle.css({
                            "height" : changePercent(topRatio)
                        })
                        $curEle.css({
                            "height" : changePercent(currRatio)
                        })
                    }else {
                        var topHeight = event.pageY - _headerHeight - _disY - 6;   //这里计算值是6？bug
                        var currHeight = _editorContent - topHeight;
                        var $htmlEle = $($(".box")[0]);
                        var currRatio = currHeight / _editorContent;
                        currRatio = currRatio < _minRatio ? _minRatio : currRatio;
                        currRatio = currRatio > _maxRatio ? _maxRatio : currRatio;
                        var preRatio = 1 - currRatio - _extraRatio - parseFloat($htmlEle[0].style.height) / 100;
                        if(preRatio < _minRatio) {
                            preRatio = _minRatio;
                            var htmlRatio = 1 - currRatio - preRatio - _extraRatio;
                            htmlRatio = htmlRatio < _minRatio ? _minRatio : htmlRatio;
                            $htmlEle.css({
                                "height" : changePercent(htmlRatio)
                            })
                        }
                        $curEle.css({
                            "height" : changePercent(currRatio)
                        })
                        $preEle.css({
                            "height" : changePercent(preRatio)
                        })
                    }
                }else {
                    if($nextEle.length !== 0) {
                        var topWidth = event.pageX - _resizerBorder.width - _disX;
                        var topRatio = topWidth / _editorContent,
                                topRatio = topRatio < _minRatio ? _minRatio : topRatio,
                                topRatio = topRatio > _maxRatio ? _maxRatio : topRatio;
                        var currRatio = 1 - topRatio - _extraRatio - parseFloat($nextEle[0].style.width) / 100;
                        if(currRatio < _minRatio) {
                            currRatio = _minRatio;      //这时是css部分，撞击js部分
                            var nextRatio = 1 - currRatio - topRatio - _extraRatio;
                            nextRatio = nextRatio < _minRatio ? _minRatio : nextRatio;

                            $nextEle.css({
                                "width" : changePercent(nextRatio)
                            })
                        }
                        $preEle.css({
                            "width" : changePercent(topRatio)
                        })
                        $curEle.css({
                            "width" : changePercent(currRatio)
                        })
                    }else {
                        var topWidth = event.pageX + (_resizerBorder.width - _disX),
                                currWidth = _editorContent - topWidth;
                        var $htmlEle = $($(".box")[0]);
                        var currRatio = currWidth / _editorContent;

                        currRatio = currRatio < _minRatio ? _minRatio : currRatio;
                        currRatio = currRatio > _maxRatio ? _maxRatio : currRatio;

                        var preRatio = 1 - currRatio - _extraRatio - parseFloat($htmlEle[0].style.width) / 100;

                        if(preRatio < _minRatio) {
                            preRatio = _minRatio;
                            var htmlRatio = 1 - currRatio - preRatio - _extraRatio;
                            htmlRatio = htmlRatio < _minRatio ? _minRatio : htmlRatio;
                            $htmlEle.css({
                                "width" : changePercent(htmlRatio)
                            })
                        }
                        $curEle.css({
                            "width" : changePercent(currRatio)
                        })
                        $preEle.css({
                            "width" : changePercent(preRatio)
                        })
                    }

                    if($preEle.width() < 180) {
                        $preEle.prev().addClass("is-horiz");
                    }else {
                        $preEle.prev().removeClass("is-horiz");
                    }
                    if($curEle.width() < 180) {
                        $curEle.prev().addClass("is-horiz");
                    }else {
                        $curEle.prev().removeClass("is-horiz");
                    }
                    //这里用这个简直了，我醉了
                    try {
                        /*顺序不能颠倒*/
                        if($nextEle.width() < 180) {
                            $nextEle.prev().addClass("is-horiz");
                        }else{
                            $nextEle.prev().removeClass("is-horiz");
                        }

                        if($htmlEle.width() < 180) {
                            $htmlEle.prev().addClass("is-horiz");
                        }else{
                            $htmlEle.prev().removeClass("is-horiz");
                        }
                    }catch(e){}
                }
            }

            function handleUp(event) {
                $(document).off("mousemove", handleMove).off("mouseup", handleUp);
                window.sc.refresh();
            }

            function changePercent() {
                if(arguments.length === 1) {
                    return arguments[0] * 100 + "%";
                }
                if(arguments.length === 2) {
                    return (arguments[0] / arguments[1]) * 100 + "%";
                }
            }

            return {
                init : _init
            }
        })();
        jQuery(document).ready(function($) {
            var mixedMode = {
                name: "htmlmixed",
                scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
                    mode: null},
                    {matches: /(text|application)\/(x-)?vb(a|script)/i,
                        mode: "vbscript"}]
            };
            var aimIframe = document.getElementById("aimIframe"),
                    iframeDocument,
                    iframeBody,
                    $aLayout = $(".layout-buttons").find("a"),
                    $saveBtn = $("#code-save"),
                    $settingBtn = $("#code-setting"),
                    alertTimeout,
                    $popupModal = $("#popup-modal"),
                    $penSetting = $("#pen-setting"),
                    changeTime = 800;

            window.sc.codeHtml = CodeMirror.fromTextArea(document.getElementById("code-html"), {
                lineNumbers: true,
                mode : mixedMode,
                scrollbarStyle : "overlay",
                theme : "monokai",
                lineWrapping: true,       //长文本换行
                smartIndent: false,
                autoCloseTags: true,
                autoCloseBrackets: true
            });

            window.sc.codeCss = CodeMirror.fromTextArea(document.getElementById("code-css"), {
                lineNumbers: true,
                mode : "css",
                scrollbarStyle : "overlay",
                theme : "monokai",
                lineWrapping: true,       //长文本换行
                smartIndent: false,
                autoCloseTags: true,
                autoCloseBrackets: true
            });

            window.sc.codeJs = CodeMirror.fromTextArea(document.getElementById("code-js"), {
                lineNumbers: true,
                mode : "javascript",
                scrollbarStyle : "overlay",
                theme : "monokai",
                lineWrapping: true,       //长文本换行
                smartIndent: false,
                autoCloseTags: true,
                autoCloseBrackets: true
            });


            window.sc.refresh = function() {
                window.sc.codeHtml.refresh();
                window.sc.codeCss.refresh();
                window.sc.codeJs.refresh();
            };

            $(".code-wrap").css({
                "visibility" : "visible"
            });

            /*
             *  各种事件绑定，注意事件冒泡在这里
             */

            $(".btn-expand").on("click", function(event) {
                var $target = $(event.target);
                $target.parents(".box-title").find(".box-handle").trigger("dblclick");

                if($target[0].nodeName === "I") {
                    var $icon = $target;
                }else {
                    var $icon = $target.find("i");
                }
                if($icon.hasClass("icon-expand")) {
                    $icon.removeClass("icon-expand").addClass("icon-collapse");
                }else {
                    $icon.removeClass("icon-collapse").addClass("icon-expand");
                }
            });

            $("#changeView").on("click", function(event){
                event.stopPropagation();
                var $view = $(this).next();

                if($view.hasClass("view-switcher-active")) {
                    $view.removeClass("view-switcher-active");
                    $view.css({
                        "display" : "none"
                    });
                }else {
                    $view.css({
                        "display" : "block"
                    });
                    setTimeout(function() {
                        $view.addClass("view-switcher-active");
                    }, 30)
                }
            });


            $("#top-layout").on("click", function(event) {
                $aLayout.removeClass("active");
                $(this).addClass("active");
                $("body").removeClass().addClass("layout-top editor");
                window.sc.reset();
            });

            $("#left-layout").on("click", function(event) {
                $aLayout.removeClass("active");
                $(this).addClass("active");
                $("body").removeClass().addClass("layout-side editor");
                window.sc.reset();
            });
            $("#right-layout").on("click", function(event) {
                $aLayout.removeClass("active");
                $(this).addClass("active");
                $("body").removeClass().addClass("layout-side editor layout-right");
                window.sc.reset();
            });

            $("header").on("click", function(event) {
                $(".view-switcher").css({
                    "display" : "none"
                }).removeClass("view-switcher-active");
            });

            $("button").on("mousedown", function(event) {
                $(this).css({
                    "transform" : "translateY(2px)"
                });
                $(document).on("mouseup", buttonUp);
            });
            $(".buttonA").on("click", function(evnet) {
                var href = $(this).find("a").attr("href");
                if(href !== undefined) {
                    window.location.href = href;
                }
            })


            function buttonUp(event) {
                $("button").css({
                    "transform" : "translateY(0px)"
                });
                $(document).off("mouseup", buttonUp);
            }

            bindResizer.init();
            bindBoxHandle.init();


            var cssTimeout;    //函数节流
            var htmlTimeout;
            var jsTimeout;

            window.sc.codeCss.on("change", function(codeMirror, obj) {
                var doc = codeMirror.doc;
                iframeDocument = aimIframe.contentWindow.document;

                clearTimeout(cssTimeout);
                cssTimeout = setTimeout(function() {
                    console.log("CSS刷新");
                    var currStyle = document.createElement("style");
                    currStyle.id = "aimStyle";
                    currStyle.textContent = doc.getValue();
                    iframeDocument.getElementById("aimStyle").remove();    //删除这里

                    iframeDocument.head.appendChild(currStyle);
                }, changeTime)
            });

            window.sc.codeHtml.on("change", function(codeMirror, obj) {
                var doc = codeMirror.doc;
                iframeDocument = aimIframe.contentWindow.document;
                iframeBody = iframeDocument.body;

                clearTimeout(htmlTimeout);
                htmlTimeout = setTimeout(function() {
                    console.log("html刷新");
                    iframeBody.innerHTML = doc.getValue();
                    window.sc.codeCss.triggerOnKeyUp("change");
                    window.sc.codeJs.triggerOnKeyUp("change");
                }, changeTime)
            });

            window.sc.codeJs.on("change", function(codeMirror, obj) {
                var doc = codeMirror.doc;
                iframeDocument = aimIframe.contentWindow.document;

                clearTimeout(jsTimeout);
                jsTimeout = setTimeout(function() {
                    console.log("js刷新");
                    var currScript = document.createElement("script");
                    currScript.id = "aimScript";
                    currScript.textContent = "try{" + doc.getValue() + "}catch(e){}";   //捕获掉这里所有的异常
                    try {
                        iframeDocument.getElementById("aimScript").remove();
                    }catch(e){}
                    iframeDocument.body.appendChild(currScript);
                }, changeTime)

            });

            /*保存代码按钮，准备上传，上传完毕（这里做ajax）*/
            $saveBtn.on("readyUpload", function(event) {
                $(this).addClass("btn-insert");
            }).on("doUpload", function(event) {
                $(this).addClass("a-wobble");
            }).on("click", function(event) {

                event.preventDefault();
                var $alert = $("<div>");
                $alert.addClass("alert-message");

                var codeData = {
                    codename : $("#titleValue").val(),
                    codemessage : $("#infoValue").val(),
                    cid : parseInt($("#cid").text()),
                    htmlcode : window.sc.codeHtml.getValue(),
                    csscode : window.sc.codeCss.getValue(),
                    jscode : window.sc.codeJs.getValue()
                }
                console.log(codeData);
                
                $.ajax({
                    url : "http://" + window.location.host + "/codepencil/index.php/Code/addcode",
                    type : "POST",
                    data : codeData,
                    success : function(data, status) {
                        var res = JSON.parse(data);
                        console.log(arguments);
                        if(res['state'] === 'success') {
                            $alert.text("你已经保存了新的code片段");
                            if(res['cid'] !== undefined) {
                                $("#cid").text(res['cid']);
                            }
                            fadeOut();
                        }
                        if(res['state'] === 'error') {
                            $alert.css({
                                "backgroundColor" : "#ff0000"
                            })
                            $alert.text("代码保存失败，请刷新重试");
                            fadeOut();
                        }
                        if(res['state'] === 'error2') {
                            $alert.css({
                                "backgroundColor" : "#ff0000"
                            })
                            $alert.text("您还没有登录,请登陆后再尝试");
                            fadeOut();
                        }
                    },
                    error : function() {
                        $alert.css({
                            "backgroundColor" : "#ff0000",
                            "color" : "#ffffff"
                        })
                        $alert.text("代码保存失败，请刷新重试");
                        fadeOut();
                    }
                })

                function fadeOut() {
                   if($(".alert-message").length === 0) {
                        $alert.addClass("alert-message");
                        $("body").append($alert);
                   }
                   clearTimeout(alertTimeout);
                   alertTimeout = setTimeout(function() {
                        $(".alert-message").css({
                            "opacity" : 0
                        })
                        setTimeout(function() {
                            $(".alert-message").remove();
                        }, 700)
                   }, 1000)
                }
            });

            $settingBtn.on("click", function(event) {
                if($penSetting.hasClass("pen-setting-active")) {
                    return false;
                }else {
                    $penSetting.css({
                        "display" : "block"
                    });
                    setTimeout(function() {
                        $penSetting.addClass("pen-setting-active");
                    }, 30);
                    $popupModal.css({
                        "display" : "block"
                    });
                }
            });
            $popupModal.on("click", function(event) {
                $penSetting.css({
                    "display" : "none"
                });
                $popupModal.css({
                    "display" : "none"
                });
                $penSetting.removeClass("pen-setting-active");
            });

            $("#save-and-close").on("click", function(event) {
                $popupModal.trigger("click");
            });

            /*渲染Code页面*/

        });
    
        window.drawCodeArea = function(cid) {
            if(cid === 0 || cid === undefined) {
                console.log("选择空模板");
                return false;
            }else {
               $.ajax({
                    url : "http://" + window.location.host + "/codepencil/index.php/Code/readcode",
                    data : {"readc" : 1, "cid" : cid},
                    type : "GET",
                    success : function(data, status) {
                        if(status === 'success') {
                            var data = JSON.parse(data);
                            $("#codeName").text(data['codename']);
                            window.sc.codeHtml.getDoc().setValue(data['htmlcode']);
                            window.sc.codeCss.getDoc().setValue(data['csscode']);
                            window.sc.codeJs.getDoc().setValue(data['jscode']);
                        }
                    },
                    error : function() {
                        alert("系统内部错误请稍后重试")
                    }
                })
            }
        }

        window.onload = function(event) {
            var cid = parseInt($("#cid").text());
            window.drawCodeArea(cid);
        }

        window.sc.reset = function() {

            window.sc.winSize = {
                "width" : window.innerWidth || $(document).innerWidth(),
                "height" : window.innerHeight || $(document).height()
            }
            bindResizer.init();
            bindBoxHandle.init();
        };

        /*浏览器窗口发生变化，重置所有内容*/
        $(window).on("resize", function() {
            window.sc.reset();
        })
    </script>
</body>
</html>