@extends('./layout/layout')

@section('title', 'Welcome')

@section('content')


    <?php 
        // if(isset($name)){
        //     $currentname = $name;
        // }
        // else{
        //     $currentname = 'noob';
        // }
        
        //if else statement using the ternary operator
        //$currentname = isset($name) ? $name : 'noob';

    ?>

    <h1>Hi, {{ $name }}</h1>

    

@endsection