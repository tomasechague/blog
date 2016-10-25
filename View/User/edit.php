<script src="../web/js/user.js" type="text/javascript"></script>
<div class="col-sm-12">
    <div class="col-sm-2"></div>    
<div class="alert alert-success col-sm-10" id="alerts" style="display: none">
    <strong id="errors"></strong>
</div>
</div>

<form class="form-horizontal" id="myform" enctype="multipart/form-data">
<img src="" height="100" width="100" id="avatar-image"><br/><br/>
    <div class="form-group">
        <label class="control-label col-sm-2" for="avatar-link">Avatar:</label>
        <div class="col-sm-10"> 
            <input type="file" class="form-control" id="avatar-link" placeholder="Enter Username">
            <input type="hidden" class="form-control" id="id">

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="username">Username:</label>
        <div class="col-sm-10"> 
            <input type="text" class="form-control" id="username" placeholder="Enter Username">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
    </div>
    
</form>

