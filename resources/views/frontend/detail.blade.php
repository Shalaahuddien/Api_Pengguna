<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action=""> -->
        <label for="name">Nama</label>
        <input type="text" id="name">

        <label for="email">Email</label>
        <input type="email" id="email">
        
        <!-- <label for="password">Password</label>
        <input type="password" id="password"> -->

        <button type="" onclick="add()">submit</button>

    <!-- </form> -->

    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous">

    </script>

    <script>

    $.ajax({
        url: "http://127.0.0.1:8000/api/pengguna/{{$id}}",
        method: "GET",
        success: response => {
            let pengguna = response.data
            $("#name").val(pengguna.name)
            $("#email").val(pengguna.email)
        }
    })


    //api untuk menambahkan data inputan
function add() {
        let name = $("#name").val()
        let email = $("#email").val()
        let password = $("#password").val()
        let photo = $("#input-photo")

        if(name == ``) return alert("Nama Tidak Boleh Kosong")
        if(email == ``) return alert("email Tidak Boleh Kosong")

        let fd = new FormData();
        fd.append(`name`, name)
        fd.append(`email`, email)

        if (photo.prop("files").length>0)
        {
            fd.append("photo", photo.prop("files")[0])
        }
        
        if(password == ``) fd.append("password", password)

        $.ajax({
            url: "http://127.0.0.1:8000/api/pengguna/{{$id}}",
            method: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: _ => {
                window.location.href = "http://127.0.0.1:8000"
            }
        });

    }

    </script>

</body>
</html>