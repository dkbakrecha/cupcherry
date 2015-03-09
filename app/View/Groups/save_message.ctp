<?php
//prd($lastInsertMsgData);
//echo 'message saved.';
?>
<div class="col-md-12 posts ">


    <div class="col-md-12  little_margin">
        <div class="col-md-6 LRpadding">
            <?php
            echo $lastInsertMsgData['User']['fname'] . ' ' . $lastInsertMsgData['User']['lname'];
            ;
            ?>
        </div>
        <div class="col-md-6  ">
            <span class="pull-right">
                <?php
                $dateTime = strtotime($lastInsertMsgData['GroupMessage']['created']);
                $dateFormated = date('m.d.y , g:i a', $dateTime);
                echo $dateFormated;
                ?>
            </span>
        </div>

    </div>
    <div class="col-md-12 msg LRpadding ">
        <p>
            <?php
            echo $lastInsertMsgData['GroupMessage']['message'] . '<br>';
            ?>   
        </p>
    </div>

</div>



