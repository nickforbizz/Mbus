
   <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" style="dislay:none">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title h-modal" >{{  $title }}</h4>
			</div>

			    <form id="update" class="form" style="margin:15px">
                    <div id="edit" class="modal-body">
                    <p class="p-4" id="modal_text">Some text in the modal.</p>
                    </div>
                    <div class="col-md-12" id="submit_btn">
                        <input type="submit" class="btn btn-success btn-lg" value="Submit">
                    </div>
                </form>

			<div class="modal-footer ">
                <div class="col-md-12">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
			</div>
		</div>

		</div>
 	 </div>
