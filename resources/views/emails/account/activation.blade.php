<tr>
    <td align="center" style="padding:32px;background:#16102a;color:#e8dff5;font-family:Arial,sans-serif;">
        <h1 style="margin:0 0 16px;color:#fff;font-size:24px;">{{ __tr('Verify your email') }}</h1>

        <p style="margin:0 0 24px;font-size:15px;line-height:1.6;">
            {{ __tr('Thanks for joining __siteName__! Click the button below to verify your email.', ['__siteName__' => getStoreSettings('name')]) }}
        </p>

        <a href="{{ $activation_url }}"
           style="display:inline-block;padding:14px 32px;background:#DF0D78;color:#fff;text-decoration:none;border-radius:8px;font-weight:bold;">
            {{ __tr('Verify email') }}
        </a>

        <p style="margin:24px 0 0;font-size:13px;color:#a89bc4;">
            {{ __tr('Please activate within __expirationTime__ hours.', ['__expirationTime__' => $expirationTime]) }}
        </p>

        <p style="margin:16px 0 0;font-size:14px;">
            <strong>{{ __tr('Username') }}:</strong> {{ $userName }}<br>
            <strong>{{ __tr('Email') }}:</strong> {{ $email }}
        </p>
    </td>
</tr>
