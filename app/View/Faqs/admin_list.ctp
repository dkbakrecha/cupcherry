<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-question"></i>
                    FAQ'S Section 
                </h3>
                <a class="btn btn-primary pull-right" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'faqs', 'action' => 'index')); ?>">New FAQ</a>
            </div> 

            <div class="portlet-content">           
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="row dt-rt"><div class="col-sm-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label><select aria-controls="DataTables_Table_0" size="1" name="DataTables_Table_0_length"><option selected="selected" value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input placeholder="Search..." aria-controls="DataTables_Table_0" type="text"></label></div></div></div>
                        <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered table-hover table-highlight table-checkable dataTable-helper dataTable datatable-columnfilter" data-provide="datatable" data-display-rows="10" data-info="true" data-search="true" data-length-change="true" data-paginate="true">
                            <thead>
                                <tr role="row">
                                    <th width="5%"> S. No. </th>
                                    <th width="15%"> Category Name </th>
                                    <th width="15%"> Title </th>
                                    <th> Content </th>
                                    <th  width="10%"> Action </th>
                                </tr>
                           </thead>

                            <tbody aria-relevant="all" aria-live="polite" role="alert"> 
                                <?php
                                foreach ($faqAll as $faqs) {
                                    ?>
                                    <tr class="odd">
                                        <td class="checkbox-column ">
                                            <?php echo $faqs['Faq']['id']; ?>
                                        </td>
                                        <td class="  sorting_1"><?php echo $faqs['faq_cat']['faq_category_title']; ?></td>
                                        <td class="  sorting_2"><?php echo $faqs['Faq']['title']; ?></td>
                                        <td class=" "><?php echo $faqs['Faq']['content']; ?></td>
                                        <td class="hidden-xs hidden-sm " align="center">
                                            <?php 
                                            if($faqs['Faq']['status'] == 1){
                                            ?><a href=""><i class="fa fa-circle"></i></a><?php    
                                            } else {
                                            ?><a href=""><i class="fa fa-circle-o"></i></a><?php    
                                            }
                                            ?>
                                            
                                            &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_edit', $faqs['Faq']['id'])); ?>"><i class="fa fa-edit"></i></a> 
                                            &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'admin_delete', $faqs['Faq']['id'])); ?>"  onclick="return confirm('Are you sure?')" > <i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>                        
                </div>
            </div>
        </div>
    </div>
</div>