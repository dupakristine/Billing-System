<!DOCTYPE html>
<html>

<head>

    <title>Client Summary</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;

            font-size: 10pt;
        }

        h1 {
            font-size: 22pt;
        }

        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #777;
            padding: 2px;
        }
    </style>
</head>
<body>
    <p style="background-color: rgb(214, 214, 214); padding: 10px; border-radius: 10px; text-align: center; margin-bottom: 18pt; font-size: 20px;">

        <b>Billing System <br>
            Boheco Tubigon Bohol <br>
            Tel: 09606765143</b>

    </p> <br> <hr> <br>

    <h1 style="">Customer Details</h1>
    <h1 style="font-size: 20px;">Name: {{$client->name}}</h1>
    <h1 style="font-size: 20px;">Email: {{$client->email}}</h1>
    <h1 style="font-size: 20px;">Address: {{$client->address}}</h1>
    <h1 style="font-size: 20px;">Phone: {{$client->phone}}</h1>

    <br> <hr> <br>
    <h1 style="">Balance Information</h1>
    <h1 style="font-size: 20px;">Balance: {{$client->balance}}</h1>
    <h1 style="font-size: 20px;">Credit Limit: {{$client->credit_limit}}</h1>
    <br>

    <h1 style="">Subscription Details</h1>
    <h1 style="font-size: 20px;">Subscription Expiry Date: {{$client->subscription_expiry_date}}</h1>
    <h1 style="font-size: 20px;">subscription_plan: {{$client->subscription_plan}}</h1>

 <br>
 Notes:
 <h1 style="font-size: 20px;">{{$client->notes}}</h1>


 <br> <hr> <br>
 Boheco is dedicated to providing top-notch service to all our valued customers. If you have any inquiries or require assistance with your account, please don't hesitate to contact our support team using the provided contact information above.

 We appreciate your continued patronage and look forward to serving you again in the future.

 Sincerely,

Kristine Dupa
Officer
Boheco

</body>
</html>
