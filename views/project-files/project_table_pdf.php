<html>
<head>
    <title></title>
</head>
<body>


<p align="center">สารบัญ</p>

<div class="mpdf_toc" id="mpdf_toc_0" style="margin-top: 15px;">
<?php
    foreach ($model as $data) {
        $title = $data['title'];
        $page = $data['page']; ?>

        <div class="mpdf_toc_level_1">
            <a class="mpdf_toc_a" href="#__mpdfinternallink_2">
                <span class="mpdf_toc_t_level_1"><?php echo $title; ?></span>
            </a>
            <dottab outdent="2em" />
            <a class="mpdf_toc_a" href="#__mpdfinternallink_2">
                <span class="mpdf_toc_p_level_1"><?php echo $page; ?></span>
            </a>
        </div>
<?php
    }
?>
</div>
</body>
</html>