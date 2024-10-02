<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen">
    <form action="{{ route('createUser') }}" method="POST" class="space-y-3">
        @csrf
        <h1 class="text-center text-3xl font-semiBold mb-4">User Form</h1>
        <input name="fullName" type="text" placeholder="name" class="border-2 rounded px-2 py-1 border-black block">
        <input name="userPhone" type="number" placeholder="phone" class="border-2 rounded px-2 py-1 border-black block">
        <input name="userEmail" type="email" placeholder="email" class="border-2 rounded px-2 py-1 border-black block">
        <input name="userAddress" type="text" placeholder="address" class="border-2 rounded px-2 py-1 border-black block">
        <input name="userAge" type="number" placeholder="age" class="border-2 rounded px-2 py-1 border-black block">
        <select name="userGender" id="" placeholder="Select gender" class="border-2 w-full rounded px-2 py-1 border-black block">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <input type="submit" class="border-2 rounded px-2 py-1 border-black cursor-pointer" >
    </form>
</body>
</html>

