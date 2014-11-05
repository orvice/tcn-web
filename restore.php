<?php
include_once 'header.inc.php';

require_once 'class/tcn.class.php';
$url = $_GET['url'];
$tcn = new tcn();
$long_url  = $tcn->expand($url);
?>




    <div class="jumbotron">
        <h1>网址缩短</h1>

        <?php  if ($long_url != "0"){ ?>
            <p class="lead ">
                <input name="url" class="form-control" value="<?php echo $long_url;   ?>" >
            </p>
            <p>   <a class="btn  btn-info" href="<?php echo $srt_url; ?>">访问</a> <a class="btn btn-success" href="expand.php">返回</a></p>

        <?php } ?>

        <?php  if ($long_url == "0"){ ?>
            <div class="alert alert-danger" role="alert">貌似有错误发生,请联系管理员。</div>
        <?php } ?>

    </div>

<?php
include_once 'footer.inc.php';
?>