<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="jquery-3.7.1.min.js"></script>
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
        }

        .no-line {
            border-top: none;
        }

        .thick-line {
            border-top: 2px solid;
        }

         .address-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .address-section div {
            width: 100%;
        }

        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .panel-heading {
            color: #333;
            background-color: #f5f5f5;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
            padding: 10px 15px;
        }

        .panel-title {
            font-size: 23px;
            color: inherit;
        }

        .panel-body {
            padding: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f5f5f5;
        }

        table td {
            border-bottom: none;
        }

        table td.text-center,
        table th.text-center {
            text-align: center;
        }

        .text-end {
            text-align: end;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="invoice-title">
        <h2>Invoice</h2><br>
        <h3>Payment Id #{{ $formData['payment_id'] }} </h3>
    </div>
    <hr>
    <div class="row address-section">
        <div class="col-md-6">
            
                <strong>Billed To:</strong><br>
                {{ $formData['name'] }}<br>
                {{ $formData['address'] }}<br>
                {{ $formData['city'] }}<br>
                {{ $formData['state'] }}&nbsp;&nbsp;{{ $formData['zipcode'] }}
           
        </div>
        <div class="col-xl-6 text-end">
           
                <strong>Invoice From:</strong><br>
                over55maturedrivingcourse<br>
                terryhaggin@gmail.com<br>
                800-574-5643
            
    </div>
    </div>
    <div class="row address-section">
         
         
        <div class="col-md-6">
           
                <strong>Payment Method:</strong><br>
                {{ $formData['payment_method'] }}<br>
                {{ $formData['email'] }}
           
        </div>
        <div class="col-xl-6 text-end">
           
                <strong>Order Date:</strong><br>
                {{ $formData['date'] }}<br><br>
          
    </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Order summary</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Totals</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $formData['product_name'] }}</td>
                        <td class="text-center">{{ $formData['amount'] }}</td>
                        <td class="text-center">{{ $formData['quantity'] }}</td>
                        <td class="text-right">{{ $formData['quantity'] * $formData['amount'] }}</td>
                    </tr>

                    <tr>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line text-center"><strong>Subtotal</strong></td>
                        <td class="thick-line text-right">{{ $formData['quantity'] * $formData['amount'] }}</td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center"><strong>Shipping</strong></td>
                        <td class="no-line text-right">$0</td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center"><strong>Total</strong></td>
                        <td class="no-line text-right">{{ $formData['quantity'] * $formData['amount'] }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
