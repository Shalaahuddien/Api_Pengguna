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


        <img src="" alt="" id="photo" for="photo">photo</img>
        <input type="file" id="photo">

        <br>

        <label for="name">Nama</label>
        <input type="text" id="name">

        <label for="email">Email</label>
        <input type="email" id="email">
        
        <label for="password">Password</label>
        <input type="password" id="password">

        <button onclick="add()">submit</button>

    <!-- </form> -->
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous">

    </script>

    <script>

function add() {

        let name = $("#name").val()
        let email = $("#email").val()
        let password = $("#password").val()
        let photo = $("#photo").prop("file")

        if(photo == ``) return alert("poto Tidak Boleh Kosong")
        if(name == ``) return alert("Nama Tidak Boleh Kosong")
        if(email == ``) return alert("email Tidak Boleh Kosong")
        if(password == ``) return alert("password Tidak Boleh Kosong")
       
        let fd = new FormData();
        fd.append(`name`, name)
        fd.append(`email`, email)
        fd.append(`password`, password)
        fd.append(`photo`, photo)
        console.log(fd.toString());

        $.ajax({
            url: "http://127.0.0.1:8000/api/pengguna",
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