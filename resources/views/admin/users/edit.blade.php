<h1>Editar usuario</h1>
<p>{{$user->name}}</p>
<form action="" method="POST">
    @method('PUT')
    @csrf
    <label for="">Name: </label>
    <input type="text" name="name" placeholder="{{$user->name}}">

    <label for="">Last Name: </label>
    @if(empty($user->lastname))
        <input type="text" name="lastname" placeholder="No last name">
    @else
        <input type="text" name="lastname" placeholder="{{$user->lastname}}">
    @endif

    <?php
        function gender($gender)
        {
            $genders = array('male', 'female', 'other');
            $gende = array();

            foreach ($genders as $value) {
                if ($gender ==  $value) {
                    continue;
                }    
                $gende[] = $value;
            }
            return $gende;
        }
    ?>
    <label>Gender:</label>
    <label>{{ucfirst($user->gender)}}: </label>
    <input type="radio" name="gender" value="{{$user->gender}}" checked>
    @foreach (gender($user->gender) as $gender)
        <label>{{ucfirst($gender)}}: </label>
        <input type="radio" name="gender" value="{{$gender}}">
    @endforeach

    <label for="">User Name: </label>
    <input type="text" name="username" placeholder="{{$user->username}}">
    @error('username')
        <p>* {{$message}}</p>
    @enderror

    <label for="">Email: </label>
    <input type="email" name="email" placeholder="{{$user->email}}">
    @error('email')
        <p>* {{$message}}</p>
    @enderror

    <Label>Disabled: </Label>
    <input type="hidden" name="disabled" value="0">
    <input type="checkbox" name="disabled" value="1" {{ $user->disabled ? 'checked' : '' }}>

    <input type="submit" value="Send">
</form>