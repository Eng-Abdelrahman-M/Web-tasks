<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
			
                <table id="footable-3" class="table mb-0" data-paging="true" data-filtering="true" data-sorting="true" data-paging-size="5">   
                </table><!--end table-->
                <!--Editor-->
                <div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">

                    <div class="modal-dialog" role="document">
                        <form class="modal-content form-horizontal" id="editor">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editor-title">Add Row</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group required row">
                                    <label for="bookName" class="col-sm-3 control-label">Book Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="bookName" name="bookName" placeholder="Book Name" required>
                                    </div>
                                </div>
                                <div class="form-group require row">
                                    <label for="authhorName" class="col-sm-3 control-label">Author Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="authorName" name="authorName" placeholder="Author Name" required>
                                    </div>
                                </div>
                                <div class="form-group required row">
                                    <label for="allNumber" class="col-sm-3 control-label">All Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="allNumber" name="allNumber" placeholder="All Number" required>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="borrow-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">

                    <div class="modal-dialog" role="document">
                        <form class="modal-content form-horizontal card-body" id="borrow-editor">
                            <div class="modal-header">
                                <h5 class="modal-title" id="borrow-editor-title">Select Borrower</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group required row">
                                    <select id="borrow-select" class="select2 form-control mb-3 custom-select" style="width: 100%; height: 36px;">
                                        
                                        

                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Borrow</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end modal-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->