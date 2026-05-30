<tr>
    <td align="center" style="padding:32px;background:#16102a;color:#e8dff5;font-family:Arial,sans-serif;">
        <h1 style="margin:0 0 16px;color:#fff;font-size:24px;">{{ __tr('Reset your password') }}</h1>

        <p style="margin:0 0 24px;font-size:15px;line-height:1.6;">
            {{ __tr('Click the button below to reset your password.') }}
        </p>

        <a href="{{ $tokenUrl }}"
           style="display:inline-block;padding:14px 32px;background:#DF0D78;color:#fff;text-decoration:none;border-radius:8px;font-weight:bold;">
            {{ __tr('Reset password') }}
        </a>

        <p style="margin:24px 0 0;font-size:13px;color:#a89bc4;">
            {{ __tr('Link expires in __expirationTime__ hours.', ['__expirationTime__' => $expirationTime]) }}
        </p>
    </td>
</tr>
