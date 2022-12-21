<html>
    <head>
        <title>Login</title>
    </head>

    <body>

    @if($errors->any())

        <h1 style="color: red; background: blue; ">

        {{ $errors->first() }}

        </h1>
        @endif
        <form method="post" action="/login">
         @csrf
    <label for="email">Email :</label>
    <input type="text" name="email" id="email" placeholder="Email">

    <label for="password">Password :</label>
    <input type="password" name="password" id="password" placeholder="password">
    <button type="submit" name="">Login</button>

    </form>

        </body>

</html>    
