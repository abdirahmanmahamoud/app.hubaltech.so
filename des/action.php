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
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <button class="btn btn-primary float-right" id='add'>Add new</button>
                                                <table class="table" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>name</th>
                                                            <th>action</th>
                                                            <th>link</th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                <div class="modal" tabindex="-1" id="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Link</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="x" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form">
                        <div class="alert alert-success d-none"  role="alert">
                            This is a success alert—check it out!
                            </div>
                            <div class="alert alert-danger d-none" role="alert">
                            This is a danger alert—check it out!
                            </div> <div class="col-12">
                                <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label d-none">id</label>
                                <input type="text" name="id" id="id" class="form-control m-2 d-none" >
                                </div>
                                <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label ">name</label>
                                <input type="text" name="name" id="name" class='form-control mt-2' required>
                                </div>
                                <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label ">action</label>
                                <input type="text" name="actions" id="actions" class='form-control mt-2' required>
                                </div>
                                <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">link</label>
                                <select name="link" id="link" class="form-control mt-2">

                                </select>
                                </div>  

                                
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="butt">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>
<script src="../js/action.js"></script>