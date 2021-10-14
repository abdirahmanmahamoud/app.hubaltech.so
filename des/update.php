<?php
include 'header.php';
include 'bidix.php';
?>
<div class="pcoded-main-container">

<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
       
            <div class="main-body">
                <div class="page-wrapper">
                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Basic Table</h5>
                                            <span class="d-block m-t-5">use class <code>table</code> inside table element</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" tabindex="-1" id="modal2">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Aad user</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="x"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form" enctype="multipart/form-data">
                                <div class="alert alert-success d-none"  role="alert">
                                    This is a success alert—check it out!
                                    </div>
                                    <div class="alert alert-danger d-none" role="alert">
                                    This is a danger alert—check it out!
                                    </div> <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">username</label>
                                            <input type="text" name="username" id="username" class="form-control m-2 " required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label ">password</label>
                                            <input type="password" name="password" id="password" class='form-control mt-2' required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">image</label>
                                            <input type="file" name="image" id="image" class="form-control m-2" >
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                            </div>
                                        <div class="col-sm-8">
                                                <div class="form-group justify-content-center" id="fshow">
                                                    <img id="show">
                                                </div>
                                            </div>
                                        </div>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="butt">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                            </div>
                        </div
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>
<script src="../js/update.js"></script>