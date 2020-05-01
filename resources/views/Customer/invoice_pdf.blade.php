<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<style>

    @page { margin: 60px 40px; }
    header { position: fixed; top: 0px; left: 0px; right: 0px; height: 150px; }
    footer { position: fixed; bottom: -50px; left: 0px; right: 0px; height: 50px; text-align: center; }

    table, th, td {
        border: none;
        border-collapse: collapse;
        font-size: 12px;
    }

    table {
        width: 100%;
    }

    thead {
        color:  #ca2c92;
        background-color: #e8cae6;
    }



</style>

<body>
<header>
    <div>
        <div style="float: left; width: 50%;">
            Hornsby Baha'i Centre of Learning
            <br>
            19 Dural Street
            <br>
            Hornsby NSW 2077
            <br>
            hornsbybahaicentre@gmail.com
            <br>
            ABN 65 139 032 248
        </div>
        <div style="float: right; width: 50%; text-align: right;">
            <img src="{{ storage_path('app/public/img/logo.png') }}" height="100px" width="100px">
        </div>
    </div>
</header>

<footer>
    Generated on {{ date('d-F-Y') }} at {{ date('H:i:s') }}
</footer>

<div style="margin-top: 150px">
    <div style="width: 50%; float: left;">
        <b><span style="color:  #ca2c92;">INVOICE TO</span></b>
        <br>
        {{ $customer->name }}
        <br>
        {{ $customer->address }}
    </div>

    <div style="width: 50%; float: right; text-align: right;">
        <b><span style="color:  #ca2c92;">INVOICE NO.</span></b> {{ $invoiceNumber }}
        <br>
        <b><span style="color:  #ca2c92;">DATE</span></b> {{ date('Y-m-d') }}
    </div>
    <div style="clear: both"></div>

    <hr style="border-top: 1px dotted #ca2c92; margin-top: 30px;">
    <div style="margin-top: 50px;">
        <table>
            <thead>
            <tr>
                <th>ACTIVITY</th>
                <th>QTY</th>
                <th>RATE PER HOUR</th>
                <th>TOTAL HOUR</th>
                <th>AMOUNT</th>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td>CENTER BOOKING ({{ $venue->venue }})</td>
                <td>1</td>
                <td>${{ $venue->price_per_hour }}</td>
                <td>{{ $totalHour }}</td>
                <td>${{ $venue->price_per_hour * $totalHour }}</td>
            </tr>
            <tr>
                <td>SECURITY DEPOSIT</td>
                <td>1</td>
                <td>---</td>
                <td>---</td>
                <td>${{ $venue->security_deposit_amount }}</td>
            </tr>
            <tr>
                <td>CLEANING FEE</td>
                <td>1</td>
                <td>---</td>
                <td>---</td>
                <td>${{ $venue->cleaning_fee }}</td>
            </tr>
            <tr>
                <td>CITY FEE</td>
                <td>1</td>
                <td>---</td>
                <td>---</td>
                <td>${{ $venue->city_fee }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <hr style="border-top: 1px dotted #ca2c92;">

    <div style="margin-top: 20px; text-align: right;">
        <b><span style="color:  #ca2c92;">INVOICE TOTAL</span></b>
        ${{ ($venue->price_per_hour * $totalHour) + ($venue->cleaning_fee + $venue->city_fee + $venue->security_deposit_amount) }}
    </div>

</div>


</body>
</html>
