<!DOCTYPE html>
<html>
    <head>
        <title>Dev Challenge</title>

        {{-- General meta --}}
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- Bootstrap Latest compiled and minified CSS --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <style>
            html, body {
                width:100%;
                max-width:100%;
                height:100%;
            }

            body {
                font-family: 'Verdana', sans-serif;
                font-size: 12px;
                letter-spacing: 0.05em;
            }

            .title {
                text-align: center;
                margin-bottom: 50px;
            }

            .report-title {
                text-align: center;
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <h1 class="title">DEV CHALLENGE</h1>
            <div class="form-group text-center">
                <div class="col-md-4 col-md-offset-4">
                    <form id="report-form" class="form-horizontal" role="form" method="POST" action="{{ url('/') }}">
                        {{ csrf_field() }}
                        <select class="form-control" id="customer" name="customer" onchange="this.form.submit()">
                            <option value="0" {{ (0 == $selected) ? 'selected' : '' }}>Choose a customer</option>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ ($customer->id == $selected) ? 'selected' : '' }}>{{ $customer->fullname }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            @if(isset($selected) && $selected<>0)
            <div class="col-md-8 col-md-offset-2">
                <h4 class="report-title">Transactions of customer with ID = {{ $selected }}</h4>
                @if(!empty($transactions))
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount in EUR</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->date }}</td>
                            <td>{{ $transaction->getConvertedAmount() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                @else
                    There are no transactions for customer with id {{ $selected }}
                @endif
            </div>
            @endif
        </div>
    </div>
    </body>
</html>
