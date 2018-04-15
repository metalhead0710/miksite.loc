</div>
</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/template/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/template/js/bootstrap.min.js"></script>
	<SCRIPT type="text/javascript">
		$(function() {
			var url=document.location.href;
			$.each($('.side-nav a'),function(){
				if(this.href==url)
				{
				   $(this).closest("li").addClass("active");
				}
			});
		});
	</SCRIPT>