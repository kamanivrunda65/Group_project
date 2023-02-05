<style>
.modal-dialog {
    width: 800px;
    margin: 100px auto;
}
</style>

<!-- dialog-box section1  start--->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title text-center">Form Slider</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" role="form" id="sliderform" method="post">
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label">Main Title </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="slider_title" name="slider_title" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label">Text</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="slider_text" name="slider_text" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label">Image location</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="slider_image" name="slider_image" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-9">
                                                    <button type="submit" class="btn btn-primary" onclick="addview()">Sign in</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
<!-- dialog-box section1  end-->
<!-- dialog-box section2  start--->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-2" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title text-center"> Slider 2</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" role="form" id="section2" method="post">
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label">Features icon</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="s2_icon" name="s2_icon" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label">Features Title</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="s2_title" name="s2_title" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label">Features Text</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="s2_text" name="s2_text" >
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-9">
                                                    <button type="submit" class="btn btn-primary" onclick="addfeatures()">Add Festures</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
<!-- dialog-box section2  end-->