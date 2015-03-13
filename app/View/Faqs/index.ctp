<style>
    .faq_text {
        color: #000000;
        float: left;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 17px;
        width: 100%;
    }
    .faq_text3 {
        color: #333333;
        cursor: pointer;
        float: left;
        font-size: 14px;   
        margin-bottom: 7px;
        margin-left: 3px;
        width: 100%;
    }
    .faq_text2 {
        color: #F52A2A !important;
    }
    .faq_content {
        background: none repeat scroll 0 0 #FFFFFF;
        border: 1px solid #C1C1C1;
        /*     border-radius: 5px; */
        color:#333333;
        display: none;
        float: left;
        font-size: 13px;   
        margin: 5px 0 10px -4px;
        padding: 8px 36px 17px 12px;
        width: 100%;
    }
    .faq_arrow_img2 {
        background: url(<?php echo IMAGE_PATH . 'img/images/buttomarrow.png' ?>) no-repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
        float: left;
        height: 6px !important;
        margin-left: -4px !important;
        margin-right: 7px !important;
        margin-top: 7px !important;
        width: 9px !important;
    }
    .faq_arrow_img {
        background: url(<?php echo IMAGE_PATH . 'img/images/leftarrow.png' ?>) no-repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
        float: left;
        height: 9px !important;
        margin-left: 0 !important;
        margin-right: 7px !important;
        margin-top: 5px !important;
        width: 5px !important;
    }
    
</style>

<div class="main">
    <!-- START : PAGE CONTENT -->


    <div class="section" style="min-height: 500px">
        <div class="row">
            <div class="col-lg-12"><h1 class="amber">FAQs</h1></div>
            <div class="col-lg-9">

                <div class="signup">
                    <div class="signup_container">
                        
                        <div class="signup_text"><?php //echo $FAQ_Text; ?></div>


                        <div class="contact_form">  	

                            <div class="faq_contenter">
                                <?php
                                $display = 'style="display:block"';
                                $first_faqopen = 'faq_text2';
                                $first_faqimg = 'faq_arrow_img2';

                                //if (!empty($categories)) {
                                    //foreach ($categories as $rec) {
                                        ?>
                                        <div class="faq_text"><?php //echo ucfirst($rec['FaqCategory']['faq_category_title']); ?></div> 

                                        <?php
                                        if (isset($faqList) && !empty($faqList)) {
                                            foreach ($faqList as $faq) {
                                                ?>
                                                <div class="faq_text3 <?= $first_faqopen ?>">
                                                    <div class="faq_arrow_img <?= $first_faqimg ?>"></div>
                                                    <?php echo $faq['Faq']['title']; ?>
                                                    <div class="faq_content" <?= $display ?>><?php echo $faq['Faq']['content']; ?></div>
                                                </div>	
                                                <?php
                                                $display = $first_faqopen = $first_faqimg = '';
                                            }
                                        } else {
                                            ?>
                                            <div class="faq_text1" > <?php echo __('No record found.');?> </div>
                                        <?php
                                        }
                                    //}
                                //} else {
                                    ?>
                                    <div class="faq_text1" > <?php //echo __('No record found.');?> </div>
                                <?php //}
                                ?>
                            </div>          
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <ul class="nav nav-pills nav-stacked">
                <?php foreach ($categories as $rec) { 
                    $sel = "";
                    (strtolower($rec['FaqCategory']['faq_category_title']) == $cate) ? $sel = 'active' : $sel = '';
                ?>
                    <li role="presentation" class="<?php echo $sel; ?>">
                        <a href="<?php echo $this->Html->url(array('admin' => false, 'controller' => 'faqs' , 'action' => 'index' , strtolower($rec['FaqCategory']['faq_category_title']))); ?>"> 
                            <span class="badge">0</span> &nbsp;&nbsp; <?php echo ucfirst($rec['FaqCategory']['faq_category_title']); ?>
                        </a>
                    </li>
                <?php } ?>
                </ul>
            </div>
            
        </div>
    </div>
</div>

<script >
    $(document).ready(function() {
        setTimeout(function() {
            $('.active-marker2 li:first').addClass('active-marker')
        }), 300;
        $('.faq_text3').click(function() {
            if ($(this).children(':last').css('display') == 'none') {
                $('.faq_text3').removeClass('faq_text2');
                $('.faq_arrow_img').removeClass('faq_arrow_img2');
                $('.faq_content').slideUp('slow');
                $(this).addClass('faq_text2');
                $(this).children(':last').slideDown('slow');
                $(this).children(':first').addClass('faq_arrow_img2');
            }
        })
    })
</script>