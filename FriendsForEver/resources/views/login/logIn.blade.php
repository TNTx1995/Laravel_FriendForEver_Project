<div align = "center">
    <form action = "{{route('checking-user')}}" method="post">
    @csrf
    <h1>User Sign Up</h1>
            <table>
                <tr>
                    <td>User Email</td>
                    <td><input type = "text" name="userEmail"></td>
                    <td>
                    
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                    <input type = "password" name="userPassword">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type = "submit">
                    </td>
                </tr>
            </table>
    </form>


</div>