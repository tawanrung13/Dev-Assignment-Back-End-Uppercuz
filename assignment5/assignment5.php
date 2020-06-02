<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div id="home" class="container">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

<script>
    var users;
    var cardHtml = "";

    function displayUser(user, index) {
        cardHtml = "";
        cardHtml += "<div class='card bg-light mb-3'>" +
            "<div class='card-header'>" + user.first_name + " " + user.last_name + "</div>" +
            "<div class='card-body'>" +
            "<p class='card-text'>Address : " + user.address + "</p>" +
            "<p class='card-text'>Dob : " + user.dob + "</p>" +
            "<p class='card-text'>Gender : " + user.gender + "</p>" +
            "<p class='card-text'>ID : " + user.id + "</p>" +
            "<p class='card-text'>Phone : " + user.phone + "</p>" +
            "<p class='card-text'>Status : " + user.status + "</p>" +
            "<p class='card-text'>Website : <a href='" + user.website + "'>" + user.website + "</a></p>" +
            "<div class='dropdown'><button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Links</button>" +
            "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
            "<a class='dropdown-item' target='_blank' href='" + user._links.avatar.href + "'>Avatar</a>" +
            "<a class='dropdown-item' target='_blank' href='" + user._links.edit.href + "'>Edit</a>" +
            "<a class='dropdown-item' target='_blank' href='" + user._links.self.href + "'>Self</a>" +
            "</div></div>";
        cardHtml += "</div></div>";
        $("#home").append(cardHtml);
        // debugger;
    }

    $(document).ready(function() {
        $.ajax({
            url: "https://gorest.co.in/public-api/users",
            method: "GET",
            headers: {
                'Content-Type': 'application/json'
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ziqco1YyL0LGNIl-_2k_95oWD-aDHvrEfkmA'); //generate new Bearer token from https://gorest.co.in/rest-console.html
            },
            success: function(result) {
                if (result._meta.code != 200) {
                    alert(result._meta.message);
                    return;
                }
                users = result.result;
                users.sort();
                users.forEach(displayUser);
                // debugger;
            }
        });
    });
</script>


</html>