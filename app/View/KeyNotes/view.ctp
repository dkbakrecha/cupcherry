<div class="row keynotes-view">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">KeyNotes
                <a href="<?php echo $this->Html->url(array('controller' => 'key_notes', 'action' => 'mynotes')) ?>" class="btn pull-right btn-outline">My Notes</a>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <section class="paper">
                    <article class="head">
                        <div class="row notes-header">
                            <div class="col-lg-6">
                                <span class="notes_title"><?php echo $noteData['KeyNote']['title']; ?></span>
                            </div>
                            <div class="col-lg-6 fav_icon"><?php pr($currentUserInfo); pr($noteData); ?>
                                <?php if($currentUserInfo['User']['id'] != $noteData['KeyNote']['user_id'] ){ ?>
                                <span class="pull-right"> <i class="fa fa-heart-o fa-2x" onclick="makeFev(<?php echo $noteData['KeyNote']['id']; ?>)"></i> </span>
                                <?php } ?>
                            </div>
                        </div>
                    </article>

                    <article contenteditable="true"><?php echo $noteData['KeyNote']['description']; ?></article>
                </section>
            </div>

        </div>
    </div>
</div>

<script>
    function makeFev(id) {
        URL = '<?php echo $this->html->url(array('admin' => false, 'controller' => 'favorites', 'action' => 'doKeynotes')); ?>';
        $.ajax({
            url: URL,
            method: 'POST',
            data: ({id: id}),
            success: function(data) {
                if (data == '1')
                {
                    $(".fav_icon").find('.fa').toggleClass("fa-heart-o");
                    $(".fav_icon").find('.fa').toggleClass("fa-heart");
                } else {
                    $(".fav_icon").find('.fa').toggleClass("fa-heart");
                    $(".fav_icon").find('.fa').toggleClass("fa-heart-o");
                }
            }
        });
    }
</script>