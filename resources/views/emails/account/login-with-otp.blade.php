<tr>
    <td align="center" style="padding:32px;background:#16102a;color:#e8dff5;font-family:Arial,sans-serif;">
        <h1 style="margin:0 0 16px;color:#fff;font-size:24px;">{{ __tr('Your login code') }}</h1>

        <p style="margin:0 0 16px;font-size:15px;">{{ __tr('Use this OTP to log in:') }}</p>

        <p style="margin:0 0 24px;font-size:32px;font-weight:bold;color:#DF0D78;letter-spacing:4px;">
            {{ $otp }}
        </p>

        <p style="margin:0;font-size:14px;">
            <strong>{{ __tr('Email') }}:</strong> {{ $email }}
        </p>
    </td>
</tr>
