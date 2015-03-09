<?php
//prd($groupData);
 //prd($messages);
?>

<div class="row">
    <div class="col-md-12 for_heading">
        <span><h3>Group</h3></span>
    </div>

    <div  class="group-detail-div col-md-12">

        <div class="col-md-7 LRpadding middle-left">
            <div class="col-md-6 LRpadding">
                <div class="thumbnail">
                    <?php
                    if (isset($groupData[0]['Group']['logo']) && !empty($groupData[0]['Group']['logo'])) {
                        ?>
                        <img src="<?php echo $this->webroot . "img/group/" . $groupData[0]['Group']['logo'] ?>" />
                        <?php
                    } else {

                        echo $this->Html->image('no_image.jpg');
                    }
                    ?>


                </div> 
            </div>
            <div class="col-md-6">
                <div class="group_info">
                    <span><?php echo $groupData[0]['Group']['title']; ?></span>
                    <p><?php echo $groupData[0]['Group']['description']; ?></p>
                </div>   
            </div>

        </div>




        <div class="col-md-5 LRpadding grp-top-right">

            <div class="col-md-12">
                <div>
                    <span class="pull-right" >Members(<?php echo $groupData[0]['Group']['total_member']; ?>)</span>
                </div>

            </div>
            <div id="success"></div>
            <div id="sending" style="display: none">Sending ...</div>
            <div class="invite-group-div col-md-12">

                <?php
                echo $this->Form->create('Group', array(
                    'id' => 'inviteForm'
                ));
                ?>
                <div class="form-group">
                    <?php
                    echo $this->Form->input('user_address', array(
                        'class' => 'form-control',
                        'label' => false,
                        'div' => false,
                        'placeholder' => 'Enter email address',
                        'required' => 'required'
                    ));

                    echo $this->Js->submit('Invite', array(
                        'class' => array('btn btn-primary pull-right btn-invite'),
                        'url' => array('controller' => 'groups', 'action' => 'send_invitation', $groupData[0]['Group']['id']),
                        'before' => $this->Js->get('#sending')->effect('fadeIn'),
                        'success' => $this->Js->get('#sending')->effect('fadeOut'),
                        'complete' => 'javascript:resetThisForm();',
                        'update' => '#success'
                    ));
                    echo $this->Form->end();
                    ?>
                </div>


            </div
        </div>

    </div>


</div>


</div>
<hr class="hr-marginTop">
<div class="row">
    <?php
    if (isset($groupData) && !empty($groupData)) {
        ?>

        <div class="col-md-8 ">
            <div class="col-md-12 member">
                <div class="col-md-12">
                    <div class="row TBmargin">
                        <ul class="nav nav-tabs">

                            <li class="active"><a data-toggle="tab" href="#sectionA">Post</a></li>

                            <li><a data-toggle="tab" href="#sectionB">Add file</a></li>

                        </ul>

                        <div class="tab-content">
                            <div id="msg_pro_gif" class="pull-right">
                                <?php echo $this->Html->image('loading1.gif', array('width' => 40, 'height' => 40)); ?>
                            </div>

                            <div id="sectionA" class="tab-pane fade in active">


                                <?php
                                echo $this->Form->create('Group', array(
                                    'id' => 'postForm'
                                ));
                              
                                ?>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->input('message', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'type' => 'textarea',
                                        'rows' => 2,
                                        'required' => 'required',
                                        'placeholder' => 'Write a post'));
                                    ?>
                                </div>
                                <?php
                                echo $this->Js->submit('Post', array(
                                    'url' => array('controller' => 'groups', 'action' => 'save_message', $groupData[0]['Group']['id']),
                                    'before' => $this->Js->get('#msg_pro_gif')->effect('show'),
                                    // 'success' => $this->Js->get('#save_message')->prepend(),
                                    //  'update' => "updatediv()",
                                    'success' => "javascript:updatediv(data)",
                                    'complete' => 'javascript:resetThisForm1();',
                                    'class' => 'btn btn-primary pull-right'
                                ));
                                echo $this->Form->end();
                                ?>

                            </div>

                            <div id="sectionB" class="tab-pane fade">

                                <?php
                                echo $this->Form->create('GroupResource');
                              
                                ?>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->input('short_description', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'placeholder' => 'About this Share'));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->input('file', array(
                                        'label' => false,
                                        'div' => false,
                                        'class' => '',
                                        'type' => 'file'));
                                    ?>
                                </div>
                                <?php
                                echo $this->Js->submit('Share', 
                                        array(
                                            'url' =>array('controller'=>'groups','action'=>'save_resource' ,$groupData[0]['Group']['id']),
                                            'class' => 'btn btn-primary pull-right',
                                            'before' => $this->Js->get('#msg_pro_gif')->effect('show'),
                                            'after' => $this->Js->get('#msg_pro_gif')->effect('hide'),
                                            'sccuess' => $this->Js->alert('Saved'),
                                            'update' =>'',
                                            'error' => $this->Js->alert('Some Error')
                                           // 'complete' => $this->Js->alert('Saved'),
                                            
                                            
                                            ));
                                echo $this->Form->end();
                                ?>

                            </div>



                        </div>

                    </div>
                    <div class="row">

                        <div id="save_message"></div>
                        <?php
                        foreach ($messages as $msg) {
                            ?>
                            <div class="col-md-12 posts ">
                                
                                
                                    <div class="col-md-12  little_margin">
                                        <div class="col-md-6 LRpadding">
                                            <?php
                                            echo $msg['User']['fname'].' '. $msg['User']['lname'];;
                                            ?>
                                        </div>
                                        <div class="col-md-6  ">
                                            <span class="pull-right">
                                                <?php
                                                $dateTime = strtotime($msg['GroupMessage']['created']);
                                                $dateFormated = date('m.d.y , g:i a',$dateTime);
                                                echo $dateFormated;
                                                ?>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-12 msg LRpadding ">
                                        <p>
                                            <?php
                                            echo $msg['GroupMessage']['message'] . '<br>';
                                            ?>   
                                        </p>
                                    </div>

                            </div>
                            <?php
                        }
                        ?>


                    </div>
                </div>

            </div>
        </div>


        <?php
    }
    ?>



<?php
//$this->Js->get('.for_heading')->event('click', $this->Js->alert('Hey You'));
?>
</div>

<script>

    jQuery(document).ready(function($) {
        $('#msg_pro_gif').css({'margin-right': '10px', 'margin-top': '10px', 'display': 'none'});
//        $(window).scroll(function() {
//            alert('scrolling');
//        });
    });

    function msgprepend() {
        $(response).hide().prependTo("#save_message");
        // $(response).prependTo('#save_message');
    }

    function resetThisForm()
    {
        $('#inviteForm').each(function() {
            this.reset();
        });
        $('#success').fadeOut(3000);
    }
    function resetThisForm1() {
        // $.get("save_message.ctp", function(data) {
        //alert(data);
        //console.log(data);
        //$(data).prependTo("#save_message").fadeIn("slow");
        //});

        $('#postForm').each(function() {
            this.reset();
        });
    }

    function updatediv(data) {
        console.log(data);
        //alert(data);
        $('#save_message').prepend(data);
        $('#msg_pro_gif').css('display', 'none')
    }
    function updatediv1() {

        console.log(data);
        alert(data);
        //$(data).prepend("#save_message");
        //var result1 = data;
        $("<div></div>").html(data).prependTo("#save_message").fadeIn("slow");
        //alert(html(data));
        // $('#save_message').prepend(data);
        // $(data).prepend("#save_message");
        //  $('#save_message').append(data.html());

    }
    ;

</script>