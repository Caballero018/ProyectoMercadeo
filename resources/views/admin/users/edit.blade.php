<h1>Editar usuario</h1>
<p>{{$user->name}}</p>
<form action="#" method="post">
    @csrf
    <label for="">Name: </label>
    <input type="text" placeholder="{{$user->name}}">

    <label for="">Last Name: </label>
    @if(empty($user->lastname))
        <input type="text" placeholder="No last name">
    @else
        <input type="text" placeholder="{{$user->lastname}}">
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
    <input type="text" placeholder="{{$user->username}}">

    <label for="">Email: </label>
    <input type="email" placeholder="{{$user->email}}">
</form>