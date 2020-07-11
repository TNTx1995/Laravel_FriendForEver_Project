<div align = "center">
    <h1>User Free Registration</h1>
    <form action ="{{route('registerInsert')}}" method ="post">
        @csrf
        <table>
            <tr>
                <td>User Name</td>
                <td><input type ="text" value = "{{Request::old('userName')}}" name = "userName"></td>
                <td>
                    @error('userName')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <td>user Email</td>
                <td><input type ="text" value = "{{Request::old('userEmail')}}" name = "userEmail"></td>
                <td>
                    @error('userEmail')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <td>User Contact</td>
                <td><input type ="text" value = "{{Request::old('userContact')}}" name = "userContact"></td>
                <td>@error('userContact')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <td>userGender </td>
                <td>
                    <select name = "userGender" value = "{{Request::old('userGender')}}">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </td>
                <td>@error('userGender')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type ="password" name = "userPassword"></td>
                <td>
                    @error('userPassword')
                        {{$message}}
                    @enderror

                </td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type ="password" name = "userConfirmPassword"></td>
                <td>
                    @error('userConfirmPassword')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Birth Date</td>
                <td><input type ="date" value = "{{Request::old('userBirthDay')}}" name = "userBirthDay"></td>
                <td>
                    @error('userBirthDay')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type ="submit"></td>
                <td></td>
            </tr>

        </table>
    </form>
    <h1>
        <a href = "{{route('log')}}" >Sign In</a>
    </h1>

</div>
