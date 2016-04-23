<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>jQuery柱状进度条百分比代码 - 站长素材</title>

    <link href="/Public/admin/css/demo.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/Public/admin/css/jqbar.css" />

</head>
<body>

<div class="container">
    <div class="sixteen columns">
        <div class="row">
            <h1>
                收入报表柱状统计图
            </h1>
        </div>
    </div>
    <div id="skillset" class="sixteen columns ">

        <div class="eight columns">
            <div class="bars MT30">
                <div id="bar-1">
                </div>
                <div id="bar-2">
                </div>
                <div id="bar-3">
                </div>
                <div id="bar-4">
                </div>
            </div>
        </div>
        <div class="two columns">
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row clear">
    </div>
    <a style="float: right;font-size:20px;text-decoration: none;" href="/index.php/Home/Finance/income">- -》<font color="orange">返回收入报表</font></a>
</div>

<script src="/Public/admin/js/jquery.min.js" type="text/javascript"></script>
<script src="/Public/admin/js/jqbar.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function () {

        $('#bar-1').jqbar({ label: '学费', value:<?php echo ($sum1); ?>, barColor: '#D64747' });

        $('#bar-2').jqbar({ label: '包车费', value: <?php echo ($sum2); ?>, barColor: '#FF681F' });

        $('#bar-3').jqbar({ label: '欠费', value: <?php echo ($sum3); ?>, barColor: '#ea805c' });

        $('#bar-4').jqbar({ label: '其他费', value: <?php echo ($sum4); ?>, barColor: '#88bbc8' });

    });
</script>

</body>
</html>