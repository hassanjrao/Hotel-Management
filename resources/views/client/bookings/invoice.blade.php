<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table.items {
            border: 0.1mm solid #000000;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        table thead td {
            background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
        }

        .items td.cost {
            text-align: "."center;
        }
    </style>
</head>

<body>


    <htmlpageheader name="myheader" >
        <table width="100%"  style="background: #38507E">
            <tr>
                <td width="50%" style="color:white; "><span style="font-weight: bold; font-size: 14pt;">{{ config("app.name") }}</span><br />{{ config("app.office_address") }}<br />{{ config("app.office_country") }}<br><span
                        style="font-family:dejavusanscondensed;">&#9742;</span>{{ config("app.office_phone") }}</td>
                <td width="50%"  style="text-align: right; color:white">Membership Number<br /><span
                        style="font-weight: bold; font-size: 12pt; color:white">{{ $user->member_ship_number }}</span></td>
            </tr>
        </table>
    </htmlpageheader>

    <htmlpagefooter name="myfooter">
        <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
            Page {PAGENO} of {nb}
        </div>
    </htmlpagefooter>

    <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
    <sethtmlpagefooter name="myfooter" value="on" />


    <div style="text-align: right">Date: {{ $user->created_at }}</div>

    <table width="100%" style="font-family: serif;" cellpadding="10">
        <tr>
            <td width="45%" style="border: 0.1mm solid #888888; "><span
                    style="font-size: 7pt; font-family: sans;">Bill To:</span><br />
                    <br />Name: <b>{{ $user->name }}</b>
                    <br />Address: <b>{{ $user->address }}</b>
                    <br />City: <b>{{ $user->city }}</b>
                    <br />Country: <b>{{ $user->country }}</b>
                    <br />Zip: <b>{{ $user->post_code }}</b>
                    <br />Phone: <b>{{ $user->mobile }}</b>
                </td>
            <td width="10%">&nbsp;</td>
            <td width="45%" style="border: 0.1mm solid #888888;"><span
                    style="font-size: 7pt; color: #555555; font-family: sans;">For:</span><br /><br />Membership</td>
        </tr>
    </table>

    <br />

    <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
        <thead>
            <tr>
                <td width="15%" colspan="4"><b>Item Desciption</b></td>
                <td width="10%"><b>Amount</b></td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <tr>
                <td align="center" colspan="4">{{ $user->subscriptionPlan->name }}</td>
                <td align="center">{{ $user->subscriptionPlan->price }}</td>
            </tr>
            <!-- END ITEMS HERE -->
            <tr>
                <td class="blanktotal" colspan="3" rowspan="6"></td>
                <td class="totals">Subtotal:</td>
                <td class="totals cost">&pound;{{ $user->subscriptionPlan->price }}</td>
            </tr>
            <tr>
                <td class="totals">Tax:</td>
                <td class="totals cost">&pound;0</td>
            </tr>
            <tr>
                <td class="totals">Additional Cost:</td>
                <td class="totals cost">&pound;0</td>
            </tr>
            <tr>
                <td class="totals"><b>TOTAL:</b></td>
                <td class="totals cost"><b>&pound;{{ $user->subscriptionPlan->price  }}</b></td>
            </tr> 
        </tbody>
    </table>


    <div style="text-align: center; font-style: italic;"><b>Payment received  via PayPal/Stripe</b></div>

    <br><br>
    <div style="text-align: center; font-style: italic;">
        <h4>If you have any questions concerning this invoice, use the following contact information:</h4>
        <p>{{ config("app.office_customer_service_email") }}</p>
        <p>Thank you for your business!</p>
    </div>


</body>

</html>
