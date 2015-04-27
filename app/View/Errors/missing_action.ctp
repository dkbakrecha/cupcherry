<?php ?>
<div class="row">

    <div class="span12">

        <div class="error-container">
            <h1>404 - (Missing action)</h1>

            <h2>Who! bad trip man. No more pixesl for you.</h2>

            <div class="error-details">
                Sorry, an error has occured! Why not try going back to the <a href="index.html">home page</a> or perhaps try following!

            </div> <!-- /error-details -->

            <div class="error-actions">
                <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'index'));?>" class="btn btn-large btn-primary">
                    <i class="icon-chevron-left"></i>
                    &nbsp;
                    Back to Dashboard						
                </a>



            </div> <!-- /error-actions -->

        </div> <!-- /error-container -->			

    </div> <!-- /span12 -->

</div> <!-- /row -->