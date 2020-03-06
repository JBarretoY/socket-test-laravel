<template>
    <div class="workspace-files-wrap mCustomScrollbar _mCS_2" style="height: 672px;">
        <div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0">
            <div id="mCSB_2_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">

                <div id="workspace-milestone" class="workspace-milestone tab-pane fade">
                    <h2 class="workspace-title">Milestones del proyecto</h2>
                    <ul class="cat-list-milestone">
                        <li class="item-list-milestone">
                            <div class="item-list-milestone-wrapper closed">
                                <span class="icon-status-milestone">
                                    <i class="fa fa-circle"></i>
                                </span>
                                <div class="content-steps-milestone">
                                    <span>none</span>

                                    <div class="txt-status-milestone">
                                        <a class="change-status-milestone" href="javascript:void(0);">
                                            <span>Cerrada</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div id="workspace-files" class="workspace-files tab-pane fade workplace-project-details">
                    <div class="content-require-project content-require-project-attachment active">
                        <h2 class="workspace-title">Archivos del proyecto</h2>
                        <div class="workplace-title-arrow file-container" id="file-container" style="font-size: 0;">
                            <div id="apply_docs_container" style="position: relative;">
                                <span class="et_ajaxnonce" id="2a7399bf35"></span>
                                <span class="project_id" data-project="640"></span>
                                <span class="author_id" data-author="21"></span>
                                <a href="#" class="workspace-add-files attack attach-file" id="apply_docs_browse_button" style="z-index: 1;">
                                    <i class="fa fa-plus"></i>
                                    <span>Agregar archivo</span>
                                </a>
                                <div id="html5_1e2f0lrk21if31ir910ke7a4t3k3_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 560px; left: 1105px; width: 138px; height: 22px; overflow: hidden; z-index: 0;"><input id="html5_1e2f0lrk21if31ir910ke7a4t3k3" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" multiple="" accept="application/zip,.zip,.rar,application/pdf,.pdf,application/msword,.doc,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.docx,image/png,.png,image/jpeg,.jpg,.jpeg,image/gif,.gif,application/vnd.ms-excel,.xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,.xlsx"></div>
                            </div>
                        </div>
                        <ul class="workspace-files-list" id="workspace_files_list">
                            <li class="no_file_upload">
                                <i>No hay archivos subidos.</i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical">
                <div class="mCSB_draggerContainer" style="">
                    <div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; height: 1124px; top: 0px; display: block; max-height: 561px;" oncontextmenu="return false;">
                        <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                    </div>
                    <div class="mCSB_draggerRail"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>