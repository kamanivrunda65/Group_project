<style>
  .compose-mail input, .compose-mail input:focus {
    border: none;
    padding: 0;
    width: 80%;
    float: right;
}
.change{
    float:left;
}
</style>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<div class="mail-w3agile">
		<!---728x90--->

        <div class="row">
            <div class="col-sm-3 com-w3ls">
                <section class="panel">
                    <div class="panel-body">
                        <a href="mail_compose.html"  class="btn btn-compose">
                            Compose Mail
                        </a>
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active"><a href="mail.php"> <i class="fa fa-inbox"></i> Inbox</a></li>
                            <li><a href="#"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                            <li><a href="#"> <i class="fa fa-certificate"></i> Important</a></li>
                            <li><a href="#"> <i class="fa fa-file-text-o"></i> Drafts </a></a></li>
                            <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
                        </ul>
                    </div>
                </section>

            </div>
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case"> Compose Mail
                           
                       </h4>
                    </header>
                    <div class="panel-body">
                       
                        <div class="compose-mail">
                            <form role="form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="to" class="">To:</label>
                                    <input type="text" tabindex="1" id="to" class="form-control">

                                </div>

                               
                                <div class="form-group">
                                    <label for="subject" class="">Subject:</label>
                                    <input type="text" tabindex="1" id="subject" class="form-control">
                                </div>

                                <div class="compose-editor">
                                    <textarea class="wysihtml5 form-control" rows="9"></textarea>
                                    <input type="file" class="default change">
                                </div>
                                <div class="compose-btn">
                                    <button class="btn btn-primary "><i class="fa fa-check"></i> Send</button>
                                    <button class="btn btn-info"><i class="fa fa-times"></i> Discard</button>
                                    <button class="btn btn-warning">Draft</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
			<!---728x90--->
        </div>

        <!-- page end-->
		 </div>
</section>