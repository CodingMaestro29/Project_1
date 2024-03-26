<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completion Certification</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100 p-4">
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Somebody Contacts You</h2>
    <p class="mb-4">Dear Admin,</p>
    <h2>You 've got mail</h2>
    <p>Name :  {{ $mailData['name'] }}</p>
    <p>Email :  {{ $mailData['email'] }}</p>
    <p>Phone :  {{ $mailData['phone'] }}</p>
    <p>Subject :  {{ $mailData['subject'] }}</p>
    <p>Message :  {{ $mailData['message'] }}</p>
    <p class="mt-4">Regards,<br>over55 Team</p>
</div>
</body>
</html>