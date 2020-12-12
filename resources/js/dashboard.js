$(document).ready(function() {
    $("#dt").DataTable();
});

$(document).ready(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(".img-preview").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(".custom-file-input").on("change", function() {
        let fileName = $(this)
            .val()
            .split("\\")
            .pop();
        $(this)
            .next(".custom-file-label")
            .addClass("selected")
            .html(fileName);
        console.log("ok");
        readURL(this);
    });

    $(".image").on("change", function() {
        console.log("ok");
        readURL(this);
    });
});
