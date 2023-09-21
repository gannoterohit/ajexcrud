<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <h2>Student Registration Form</h2>
        <form id="my_form">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="phone" >
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" >
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit"  id="btnSubmit" value="Add submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <span id="output"> </span>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       $('#my_form').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission
    
    var form = $('#my_form')[0];
    var data = new FormData(form); // Correct the FormData constructor spelling
    
    $('#btnSubmit').prop("disabled", false); // Correct spelling of "disabled"

    // var formData = new FormData();
// data.append('file', $('#file')[0].files[0]);
    // AJAX request here
    $.ajax({
        type: "POST",
        url: "{{ route('add_data') }}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        // data: data,
        processData: false, // Set to false to prevent jQuery from processing the data 
        contentType: false, // Set to false to prevent jQuery from setting the content type
        data: new FormData(this) ,
        enctype: 'multipart/form-data',
        success: function(data) {
            console.log(data, 'hello');
            
        },
        error: function(e) {
            console.log(e);
        }
    });
});

        </script>
</body>

</html>