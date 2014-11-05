<?php
include_once 'header.inc.php';
?>




    <div class="jumbotron">
        <h1>网址还原</h1>
        <form name="sina" method="get" action="restore.php" onsubmit="return urlcheck()" >
            <p class="lead ">
                <input name="url" class="form-control" placeholder="在这里输入t.cn短网址..." >
            </p>
            <p><button class="btn btn-lg btn-primary  " type="submit"  >立即还原</button></p>
        </form>
    </div>


<?php
include_once 'footer.inc.php';
?>