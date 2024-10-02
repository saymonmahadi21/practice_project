<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>All Student</h1>

    @foreach($data as $value)
    <div class="my-5 px-5">
        <h1>Name: {{$value->name}}</h1>
        <h1>Email: {{$value->email}}</h1>
        <h1>Phone: {{$value->phone}}</h1>
        <h1>Date of Birth: {{$value->data_of_birth}}</h1>
        <h1>Semester: {{$value->semester}}</h1>
        <h1>Status: <span class=" {{ $value->status == 1 ? "text-green-600" : "text-red-600" }} ">{{$value->status == 1 ? "Enrolled" : "Not Enrolled"}}</span> </h1>
        <div class="my-5">
            <a href="{{ route("student.edit", $value->id ) }}" class="border border-blue-500 px-2 py-1 text-blue-500 rounded hover:text-white hover:bg-blue-500 text-sm cursor-pointer">Update</a>
            <a href="{{ route("student.delete", $value->id ) }}" class="border border-red-500 px-2 py-1 text-red-500 rounded hover:text-white hover:bg-red-500 text-sm cursor-pointer">Delete</a>
        </div>
        <hr class="mt-2">
    </div>
    @endforeach
    
</body>
</html>

