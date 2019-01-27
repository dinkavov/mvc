<div class="panel panel-info">
    <div class="panel-heading">
        <strong>To participate in the conference, please fill out the form</strong>
    </div>
    <div class="panel-body">
        <form id="second-form">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" name="company">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" name="position">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="about_me">About me</label>
                        <textarea class="form-control" name="about_me" rows="6"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success pull-right">Finish</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#second-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '/main/second',
                type: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
            })
            .done(function(data) {
                $('#wizard-form').html(data);
            })
            .fail(function() {
                console.log("Second form request error.");
            });
        });
    });
</script>