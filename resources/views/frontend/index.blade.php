<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('add') }}"><button>Tambah Pengguna</button></a>
    <table border="1">
        <thead>
            <tr>

                <th>Nama</th>
                <th>Email</th>
                <th>photo</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody id="daftar-pengguna">

        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        </tbody>

        </table>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

    <script>
        $.ajax({
            url: "http://127.0.0.1:8000/api/pengguna/list",
            method: "",
            dataType: "json",
            success: response => 
            {
                let listPengguna = response.data
                let htmlString = ""
                //list pengguna di loop setiap item jadi pengguna
                for (let pengguna of listPengguna) {
                    htmlString += `<tr> 
                    <td> ${ pengguna.name } </td>
                    <td> ${ pengguna.email } </td>
                    <td> ${ pengguna.photo } </td>

                    <td> 

                    <a href="http://127.0.0.1:8000/detail/${pengguna.id}">
                        <button>Detail</button>
                    </a>

                        <button onclick="deletePengguna(${pengguna.id})">Hapus</button>

                        <a href="http://127.0.0.1:8000/update/${pengguna.id}">
                        <button>Update</button>
                        </a>                                          

                    </td>

                    </tr>`
                }

                //buat html di parsing dulu biar ke wab
                let html = $.parseHTML(htmlString)
                $("#daftar-pengguna").append(html)
            }
        })


        //api untuk apus pengguna
        function deletePengguna(id) {
           $.ajax({
                url: `http://127.0.0.1:8000/api/pengguna/${id}`,
                method: "POST",
                dataType: "json",
                success: _=> {
                    console.log("SUCCESS")
                    window.location.href = ""
                },
                error: err => {
                    console.log("err")
                }
            })
        }

    </script>

</body>
</html>