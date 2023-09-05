$("#verify_type").on("change", function(event) {
    event.preventDefault();
    var verify_type = $("#verify_type").val();
    if (verify_type == 'passport') {
        $("#verify_field").html(`
        <div class="form-group row mb-4">
            <label for="id_number" class="col-md-4 col-form-label">Passport Cover </label>
            <div class="col-md-8">
                <input name='document1' type='file' class='form-control' id='document1' required>
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="id_number" class="col-md-4 col-form-label">Passport Inner </label>
            <div class="col-md-8">
                <input name='document2' type='file' class='form-control' id='document2' required>
            </div>
        </div>
        `);
    } else if (verify_type == 'driving_license') {
        $("#verify_field").html(`
            <div class="form-group row mb-4">
                <label for="id_number" class="col-md-4 col-form-label">Driving License</label>
                <div class="col-md-8">
                    <input name='document1' type='file' class='form-control' id='document1' required>
                </div>
            </div> 
        `);
    } else if (verify_type == 'nid') {
        $("#verify_field").html(`
            <div class="form-group row mb-4">
                <label for="id_number" class="col-md-4 col-form-label">NID With selfie</label>
                <div class="col-md-8">
                    <input name='document1' type='file' class='form-control' id='document1' required>
                </div>
            </div>
        `);
    } else {
        $("#verify_field").html();
    }
});