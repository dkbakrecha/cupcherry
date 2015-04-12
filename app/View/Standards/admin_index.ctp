<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-users"></i>
                    Type (Primary Content Type)
                </h3>
                <a class="btn btn-primary pull-right" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'standards', 'action' => 'add')); ?>">Add New Types</a>
            </div> 

            <div class="portlet-content">           
                <div class="table-responsive">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                        <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered table-hover table-highlight table-checkable dataTable-helper dataTable datatable-columnfilter" data-provide="datatable" data-display-rows="10" data-info="true" data-search="true" data-length-change="true" data-paginate="true">
                            <thead>
                                <tr role="row">
                                    <th aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 30px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="" data-filterable="true" data-sortable="true" data-direction="desc">S. No.</th>
                                    <th aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 187px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_desc" data-filterable="true" data-sortable="true" data-direction="desc">Title</th>
                                    <th aria-label="CSS grade" style="width: 180px;" colspan="1" rowspan="1" role="columnheader" data-filterable="true" class="hidden-xs hidden-sm sorting_disabled">Created</th>
                                    <th aria-label="Engine version" style="width: 133px;" colspan="1" rowspan="1" role="columnheader" data-filterable="false" class="hidden-xs hidden-sm sorting_disabled">Action</th>
                                </tr>
                            </thead>

                            <tbody aria-relevant="all" aria-live="polite" role="alert"> 
                                <?php
                                foreach ($typeList as $typeRow) {
                                    ?>
                                    <tr class="odd">
                                        <td class="sorting_1">   
                                            <?php echo $typeRow['Standard']['id']; ?>
                                        </td>
                                        <td class="  sorting_2"><?php echo $typeRow['Standard']['title'] ?></td>
                                        <td class=" "><?php echo $typeRow['Standard']['updated'] ?></td>
                                        <td class="hidden-xs hidden-sm ">
                                            &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'standards', 'action' => 'admin_edit', $typeRow['Standard']['id'])); ?>"><i class="fa fa-edit fa-2x "></i></a> 
                                            &nbsp;  <?php
                                                echo $this->Form->postLink('<i class="fa fa-remove fa-2x"></i>', array(
                                                    'action' => 'admin_delete', $typeRow['Standard']['id']
                                                        ), array(
                                                    'class' => 'tip',
                                                    'escape' => false,
                                                    'confirm' => 'Are you sure ?'
                                                ));
                                                ?>
                                            




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
</div>