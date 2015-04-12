<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-users"></i>
                    CMS Pages
                </h3>
            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           

                <div class="table-responsive">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="row dt-rt"><div class="col-sm-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label><select aria-controls="DataTables_Table_0" size="1" name="DataTables_Table_0_length"><option selected="selected" value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input placeholder="Search..." aria-controls="DataTables_Table_0" type="text"></label></div></div></div><table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered table-hover table-highlight table-checkable dataTable-helper dataTable datatable-columnfilter" data-provide="datatable" data-display-rows="10" data-info="true" data-search="true" data-length-change="true" data-paginate="true">
                            <thead>
                                <tr role="row">
                                    <th aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 30px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="" data-filterable="true" data-sortable="true" data-direction="desc"><input type="checkbox" id="selecctall"></th>
                                    <th aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 30px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="" data-filterable="true" data-sortable="true" data-direction="desc">Unique Name</th>
                                    <th aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 187px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_desc" data-filterable="true" data-sortable="true" data-direction="desc">Title</th>
                                    <th aria-label="CSS grade" style="width: 180px;" colspan="1" rowspan="1" role="columnheader" data-filterable="true" class="hidden-xs hidden-sm sorting_disabled">Created</th>
                                    <th aria-label="Engine version" style="width: 133px;" colspan="1" rowspan="1" role="columnheader" data-filterable="false" class="hidden-xs hidden-sm sorting_disabled">Action</th>
                                </tr>
                            </thead>

                            <tbody aria-relevant="all" aria-live="polite" role="alert"> 
                                <?php
                                foreach ($cmsList as $cmsContent) {
                                    ?>
                                    <tr class="odd">
                                        <td class="sorting_1">   
                                            <?php echo $cmsContent['CmsPage']['id']; ?>
                                        </td>

                                        <td class="  sorting_1"><?php echo $cmsContent['CmsPage']['unique_name']; ?></td>
                                        <td class="  sorting_2"><?php echo $cmsContent['CmsPage']['title'] ?></td>
                                        <td class=" "><?php echo $cmsContent['CmsPage']['updated'] ?></td>
                                        <td class="hidden-xs hidden-sm ">
                                            <?php
                                            /*
                                            if ($cmsContent['CmsPage']['status'] == 0) {
                                                ?>
                                                <i class="fa fa-circle fa-2x  redcolor"></i>
                                                <?php
                                            } elseif ($cmsContent['CmsPage']['status'] == 1) {
                                                ?>
                                                <i class="fa fa-circle fa-2x greencolor"></i>
                                                <?php
                                            } elseif ($cmsContent['CmsPage']['status'] == 2) {
                                                ?>
                                                <i class="fa fa-circle fa-2x blackcolor"></i>
                                                <?php
                                            } elseif ($cmsContent['CmsPage']['status'] == 3) {
                                                ?>
                                                <i class="fa fa-circle fa-2x yellowcolor"></i>
                                                <?php
                                               } */
                                            ?>

                                            &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'cms_pages', 'action' => 'admin_edit', $cmsContent['CmsPage']['id'])); ?>"><i class="fa fa-edit fa-2x "></i></a> 
                                        </td>

                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>
                        </table>
                        <div class="row dt-rb">
                            <div class="col-sm-6">
                                <?php echo $this->Form->create('User', array('controller' => 'users', 'action' => 'sendmail')) ?>
                                <?php echo $this->Form->hidden('checkedvalues', array('id' => 'checks', 'value' => '')) ?>
                                <?php echo $this->Form->submit('Send Mail', array('class' => 'btn btn-primary', 'id' => 'buttonClass')); ?>
                                <?php $this->Form->end() ?>

                                <div id="DataTables_Table_0_info" class="dataTables_info">
                                    Showing 1 to 10 of 20 entries
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_bootstrap">
                                    <ul class="pagination">
                                        <li class="prev disabled">
                                            <a href="#">← Previous</a>
                                        </li>
                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li class="next">
                                            <a href="#">Next → </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.table-responsive -->


            </div> <!-- /.portlet-content -->

        </div> <!-- /.portlet -->



    </div> <!-- /.col -->

</div> <!-- /.row -->





<script>

    /* if the page has been fully loaded we add two click handlers to the button */
    $(document).ready(function() {
        /* Get the checkboxes values based on the class attached to each check box */
        $("#buttonClass").click(function() {
            getValueUsingClass();
        });

        /* Get the checkboxes values based on the parent div id */
        $("#buttonParent").click(function() {
            getValueUsingParentTag();
        });


        $('#selecctall').click(function(event) {  //on click
            if (this.checked) { // check select status
                $('.chk').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                });
            } else {
                $('.chk').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                });
            }
        });




    });

    function getValueUsingClass() {
        /* declare an checkbox array */
        var chkArray = [];

        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".chk:checked").each(function() {
            chkArray.push($(this).val());
            $('#checks').val(chkArray);
        });

        /* we join the array separated by the comma   
         Working Code ,  Just remove comments from below   
         //	  */
//	var selected;
//	selected = chkArray.join(',') + ",";
//	
//	/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
//	if(selected.length > 1){
//		alert("You have selected " + selected);	
//	}else{
//		alert("Please at least one of the checkbox");	
//	}
    }

    function getValueUsingParentTag() {
        var chkArray = [];

        /* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
        $("#checkboxlist input:checked").each(function() {
            chkArray.push($(this).val());
        });

        /* we join the array separated by the comma */
        var selected;
        selected = chkArray.join(',') + ",";

        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if (selected.length > 1) {
            alert("You have selected " + selected);
        } else {
            alert("Please at least one of the checkbox");
        }
    }

</script>