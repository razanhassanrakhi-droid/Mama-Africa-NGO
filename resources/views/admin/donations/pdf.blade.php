<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ app()->getLocale() == 'ar' ? 'تقرير التبرعات' : 'Donations Report' }}</title>
    <style>
        @page {
            margin: 1cm;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11pt;
            color: #333;
            line-height: 1.5;
            direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .report-title {
            font-size: 20pt;
            font-weight: bold;
            color: #1e293b;
            margin: 0;
        }
        .report-info {
            font-size: 10pt;
            color: #64748b;
            margin-top: 5px;
        }
        .summary-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 30px;
        }
        .summary-title {
            font-weight: bold;
            font-size: 12pt;
            margin-bottom: 10px;
            color: #334155;
        }
        .summary-item {
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed;
        }
        thead {
            display: table-row-group; /* Prevent header repetition on every page */
        }
        tr {
            page-break-inside: avoid;
        }
        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: bold;
            text-align: center;
            padding: 8px 5px;
            border-bottom: 2px solid #e2e8f0;
            font-size: 10pt;
        }
        td {
            padding: 8px 5px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 9pt;
            vertical-align: middle;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 10px;
        }
        .summary-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 9pt;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
        }
        .total-row {
            background-color: #f8fafc;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="report-title">{{ $labels['report_title'] }}</h1>
        <div class="report-info">
            <table style="width: auto; margin: 0 auto; border: none;">
                <tr>
                    @if(app()->getLocale() == 'ar')
                        <td style="border: none; padding: 0 5px;">{{ now()->format('Y-m-d H:i') }}</td>
                        <td style="border: none; padding: 0 5px;">{{ $labels['generated_on'] }}</td>
                    @else
                        <td style="border: none; padding: 0 5px;">{{ $labels['generated_on'] }}</td>
                        <td style="border: none; padding: 0 5px;">{{ now()->format('Y-m-d H:i') }}</td>
                    @endif
                </tr>
            </table>
        </div>
    </div>

    <div class="summary-box">
        <div class="summary-title">{{ $labels['summary_title'] }}</div>
        <table style="width: 100%; border: none;">
            @php
                $isAr = app()->getLocale() == 'ar';
            @endphp
            <tr>
                @if($isAr)
                    <td style="border: none; padding: 2px 0; text-align: left;">
                        @if($dateRange['from'] || $dateRange['to'])
                            {{ $dateRange['from'] ?? '...' }} {{ $labels['to'] }} {{ $dateRange['to'] ?? '...' }}
                        @else
                            {{ $labels['all_records'] }}
                        @endif
                    </td>
                    <td style="border: none; padding: 2px 0; text-align: right; font-weight: bold; width: 120px;">
                        {{ $labels['period'] }}
                    </td>
                @else
                    <td style="border: none; padding: 2px 0; text-align: left; font-weight: bold; width: 120px;">
                        {{ $labels['period'] }}
                    </td>
                    <td style="border: none; padding: 2px 0; text-align: right;">
                        @if($dateRange['from'] || $dateRange['to'])
                            {{ $dateRange['from'] ?? '...' }} {{ $labels['to'] }} {{ $dateRange['to'] ?? '...' }}
                        @else
                            {{ $labels['all_records'] }}
                        @endif
                    </td>
                @endif
            </tr>
            <tr>
                @if($isAr)
                    <td style="border: none; padding: 2px 0; text-align: left;">{{ $donations->count() }}</td>
                    <td style="border: none; padding: 2px 0; text-align: right; font-weight: bold;">
                        {{ $labels['total_count'] }}
                    </td>
                @else
                    <td style="border: none; padding: 2px 0; text-align: left; font-weight: bold;">
                        {{ $labels['total_count'] }}
                    </td>
                    <td style="border: none; padding: 2px 0; text-align: right;">{{ $donations->count() }}</td>
                @endif
            </tr>
            <tr>
                @if($isAr)
                    <td style="border: none; padding: 2px 0; text-align: left; color: #2563eb; font-weight: bold;">${{ number_format($totalAmount, 2) }}</td>
                    <td style="border: none; padding: 2px 0; text-align: right; font-weight: bold;">
                        {{ $labels['total_amount'] }}
                    </td>
                @else
                    <td style="border: none; padding: 2px 0; text-align: left; font-weight: bold;">
                        {{ $labels['total_amount'] }}
                    </td>
                    <td style="border: none; padding: 2px 0; text-align: right; color: #2563eb; font-weight: bold;">${{ number_format($totalAmount, 2) }}</td>
                @endif
            </tr>
        </table>
    </div>

    <table style="direction: {{ $isAr ? 'ltr' : 'ltr' }};">
        <thead>
            <tr>
                @if($isAr)
                    <th style="text-align: center; width: 15%;">{{ $labels['date'] }}</th>
                    <th style="text-align: center; width: 15%;">{{ $labels['status'] }}</th>
                    <th style="text-align: center; width: 25%;">{{ $labels['method'] }}</th>
                    <th style="text-align: center; width: 15%;">{{ $labels['amount'] }}</th>
                    <th style="text-align: right; width: 30%;">{{ $labels['donor'] }}</th>
                @else
                    <th style="text-align: left; width: 30%;">{{ $labels['donor'] }}</th>
                    <th style="text-align: center; width: 15%;">{{ $labels['amount'] }}</th>
                    <th style="text-align: center; width: 25%;">{{ $labels['method'] }}</th>
                    <th style="text-align: center; width: 15%;">{{ $labels['status'] }}</th>
                    <th style="text-align: center; width: 15%;">{{ $labels['date'] }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($donations as $donation)
                <tr>
                    @if($isAr)
                        <td style="text-align: center;">{{ $donation->created_at->format('Y-m-d') }}</td>
                        <td style="text-align: center;">
                            <span class="status-badge status-{{ $donation->status }}">
                                {{ $labels['statuses'][$donation->status] ?? $donation->status }}
                            </span>
                        </td>
                        <td style="text-align: center;">{{ $donation->paymentMethod->name ?? '-' }}</td>
                        <td style="text-align: center;" class="amount">${{ number_format($donation->amount, 2) }}</td>
                        <td style="text-align: right; direction: rtl;">
                            {{ $donation->donor_name }}<br>
                            <span style="font-size: 8pt; color: #64748b;">{{ $donation->donor_email }}</span>
                        </td>
                    @else
                        <td style="text-align: left;">
                            {{ $donation->donor_name }}<br>
                            <span style="font-size: 8pt; color: #64748b;">{{ $donation->donor_email }}</span>
                        </td>
                        <td style="text-align: center;" class="amount">${{ number_format($donation->amount, 2) }}</td>
                        <td style="text-align: center;">{{ $donation->paymentMethod->name ?? '-' }}</td>
                        <td style="text-align: center;">
                            <span class="status-badge status-{{ $donation->status }}">
                                {{ $labels['statuses'][$donation->status] ?? $donation->status }}
                            </span>
                        </td>
                        <td style="text-align: center;">{{ $donation->created_at->format('Y-m-d') }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                @if($isAr)
                    <td style="text-align: center; font-weight: bold; width: 15%;">
                        ${{ number_format($totalAmount, 2) }}
                    </td>
                    <td colspan="4" style="text-align: right; padding: 10px; font-weight: bold;">
                        {{ $labels['verifiable_total'] }}
                    </td>
                @else
                    <td colspan="4" style="text-align: left; padding: 10px; font-weight: bold;">
                        {{ $labels['verifiable_total'] }}
                    </td>
                    <td style="text-align: center; font-weight: bold; width: 15%;">
                        ${{ number_format($totalAmount, 2) }}
                    </td>
                @endif
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <table style="width: auto; margin: 0 auto; border: none;">
            <tr>
                @if($isAr)
                    <td style="border: none; padding: 0 5px;">{{ $labels['footer'] }}</td>
                    <td style="border: none; padding: 0 5px;">-</td>
                    <td style="border: none; padding: 0 5px;">Mama Africa NGO</td>
                    <td style="border: none; padding: 0 5px;">&copy; {{ date('Y') }}</td>
                @else
                    <td style="border: none; padding: 0 5px;">&copy; {{ date('Y') }}</td>
                    <td style="border: none; padding: 0 5px;">Mama Africa NGO</td>
                    <td style="border: none; padding: 0 5px;">-</td>
                    <td style="border: none; padding: 0 5px;">{{ $labels['footer'] }}</td>
                @endif
            </tr>
        </table>
    </div>
</body>
</html>
