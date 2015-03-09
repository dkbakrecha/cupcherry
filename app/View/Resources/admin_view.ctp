<?php
//echo $totalUsers;
//prd($resourceAll);
?>




<div class="content-header">
    <h2 class="content-header-title"><i class="fa fa-users fa-lg"></i> &nbsp; View Resources</h2>
    <!--            <ol class="breadcrumb">
                    <li><a href="http://preview.jumpstartthemes.com/target-admin/index.html">Home</a></li>
                    <li><a href="javascript:;">Data Elements</a></li>
                    <li class="active">Tables Advanced</li>
                </ol>-->
</div> <!-- /.content-header -->



<div class="row">

    <div class="col-md-12">

        <div class="portlet">

            <div class="portlet-header">

                <h3>
                    <i class="fa fa-users"></i>
                    Resources Details 
                </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           

                <div class="table-responsive">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="row dt-rt"><div class="col-sm-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label><select aria-controls="DataTables_Table_0" size="1" name="DataTables_Table_0_length"><option selected="selected" value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input placeholder="Search..." aria-controls="DataTables_Table_0" type="text"></label></div></div></div><table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered table-hover table-highlight table-checkable dataTable-helper dataTable datatable-columnfilter" data-provide="datatable" data-display-rows="10" data-info="true" data-search="true" data-length-change="true" data-paginate="true">
                            <thead>
                                <tr role="row">
                                    <th aria-label="" style="width: 23px;" colspan="1" rowspan="1" role="columnheader" class="checkbox-column sorting_disabled">
                            <div style="position: relative;" class="icheckbox_minimal-blue icheck-input">
                                <input style="position: absolute; opacity: 0;" class="icheck-input" type="checkbox">
                                <ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 0px none; opacity: 0;" class="iCheck-helper">

                                </ins>
                            </div>
                            ID
                            </th>
                            <th aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 187px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_desc" data-filterable="true" data-sortable="true" data-direction="desc">Book Title</th>
                            <th aria-label="Browser: activate to sort column ascending" style="width: 273px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc" data-direction="asc" data-filterable="true" data-sortable="true">Short Desc</th>
                            <th aria-label="Platform(s): activate to sort column ascending" style="width: 247px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" data-filterable="true" data-sortable="true">Privacy</th>
                            <th aria-label="Engine version" style="width: 133px;" colspan="1" rowspan="1" role="columnheader" data-filterable="false" class="hidden-xs hidden-sm sorting_disabled">Action</th>
                            <th aria-label="CSS grade" style="width: 92px;" colspan="1" rowspan="1" role="columnheader" data-filterable="true" class="hidden-xs hidden-sm sorting_disabled">Status</th></tr>

                            <tr cls="dataTable-filter-row">

                                <th class="checkbox-column">
                                    <input class="form-control input-sm hide" placeholder=" " type="text">
                                </th>
                                <th class="">
                                    <input class="form-control input-sm show" placeholder="Search" type="text">
                                </th>
                                <th class="">
                                    <input class="form-control input-sm show" placeholder="Search" type="text">
                                </th>
                                <th class="">
                                    <input class="form-control input-sm show" placeholder="Search" type="text">
                                </th>
                                <th class="hidden-xs hidden-sm">
                                    <input class="form-control input-sm hide" placeholder="Search" type="text">
                                </th>
                                <th class="hidden-xs hidden-sm">
                                    <input class="form-control input-sm show" placeholder="Search" type="text">
                                </th>
                            </tr>
                            </thead>

                            <tbody aria-relevant="all" aria-live="polite" role="alert"> 
                                <?php
                                foreach ($resourceAll as $resource) {
                                    ?>
                                    <tr class="odd">
                                        <td class="checkbox-column ">
                                            <?php echo $resource['Resource']['id']; ?>
                                            <div style="position: relative;" class="icheckbox_minimal-blue icheck-input"><input style="position: absolute; opacity: 0;" class="icheck-input" type="checkbox"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div>
                                        </td>
                                        <td class="  sorting_1"><?php echo $resource['Resource']['title']; ?></td>
                                        <td class="  sorting_2"><?php echo $this->General->short_msg($resource['Resource']['description'], 50) ?></td>
                                        <td class=" ">


                                            <?php
                                            if ($resource['Resource']['privacy'] == 1) {
                                                echo "Active";
                                            } elseif ($resource['Resource']['privacy'] == 0) {
                                                echo "Inactive";
                                            }
                                            ?>

                                        </td>
                                        <td class="hidden-xs hidden-sm ">
                                            <a href=""><i class="fa fa-user fa-2x "></i></a>
                                            &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'resources', 'action' => 'admin_edit', $resource['Resource']['id'])); ?>"><i class="fa fa-edit fa-2x "></i></a> 
                                            &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'resources', 'action' => 'admin_delete',$resource['Resource']['id'] )); ?>"  onclick="return confirm('Are you sure?')" > <i class="fa fa-remove  fa-2x"></i></a>
                                        </td>
                                        <td onclick="changeStatus(<?= $resource['Resource']['id']; ?>,<?= $resource['Resource']['status']; ?>)" class="hidden-xs hidden-sm ">


                                            <?php
                                            if ($resource['Resource']['status'] == 1) {
                                                ?>
                                                <i class="fa fa-circle fa-2x greencolor "></i>
                                                <?php
                                            } else {
                                                ?>
                                                <i class="fa fa-circle fa-2x redcolor "></i>

                                                <?php
                                            }
                                            ?>


                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>
                        </table>
                        <div class="row dt-rb">
                            <div class="col-sm-6">
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
    function changeStatus(id, status) {
        URL = '<?php echo $this->Html->url(array('controller' => 'resources', 'action' => 'changeStatus')) ?>';

        $.ajax({
            url: URL,
            method: 'POST',
            data: ({id: id, status: status}),
            complete: function(XMLHttpRequest, textStatus) {
               location.reload();
            }


        });
    }

</script>














