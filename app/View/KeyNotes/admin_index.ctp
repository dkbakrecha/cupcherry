<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-file-word-o"></i>
                    Key Notes
                </h3>
                <a class="btn btn-sm btn-primary pull-right" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'key_notes', 'action' => 'add')); ?>">Add KeyNote</a>
            </div> 

            <div class="portlet-content">           
                <div class="table-responsive">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                        <table>
                            <tbody aria-relevant="all" aria-live="polite" role="alert"> 
                                <?php
                                foreach ($keyNotesList as $Row) {
                                    ?>
                                    <tr class="odd">
                                        <td class="sorting_1">   
                                            <?php echo $Row['KeyNote']['id']; ?>
                                        </td>
                                        <td class="  sorting_2"><?php echo $Row['KeyNote']['title'] ?></td>
                                        <td class=" "><?php echo $Row['KeyNote']['updated'] ?></td>
                                        <td class="hidden-xs hidden-sm ">
                                            &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'key_notes', 'action' => 'admin_edit', $Row['KeyNote']['id'])); ?>"><i class="fa fa-edit fa-2x "></i></a> 
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

