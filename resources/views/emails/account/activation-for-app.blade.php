<tr>
    <td align="center" style="padding:32px;background:#16102a;color:#e8dff5;font-family:Arial,sans-serif;">
        <h1 style="margin:0 0 16px;color:#fff;font-size:24px;">{{ __tr('Verify your account') }}</h1>

        <p style="margin:0 0 16px;font-size:15px;">{{ __tr('Enter this code in the app:') }}</p>

        <p style="margin:0 0 24px;font-size:32px;font-weight:bold;color:#DF0D78;letter-spacing:4px;">
            {{ $otp }}
        </p>

        <p style="margin:0;font-size:14px;">
            {{ $fullName }} — {{ $email }}
        </p>

        <p style="margin:16px 0 0;font-size:13px;color:#a89bc4;">
            {{ __tr('Expires in __expirationTime__ minutes.', ['__expirationTime__' => $expirationTime]) }}
        </p>
    </td>
</tr>
