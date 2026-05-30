<tr>
    <td align="center" style="padding:32px;background:#16102a;color:#e8dff5;font-family:Arial,sans-serif;">
        <h1 style="margin:0 0 16px;color:#fff;font-size:24px;">
            {{ __tr('Welcome to __siteName__!', ['__siteName__' => getStoreSettings('name')]) }}
        </h1>

        <p style="margin:0 0 16px;font-size:15px;line-height:1.6;">
            {{ __tr('Dear') }} {{ $fullName }},
        </p>

        <p style="margin:0 0 24px;font-size:15px;line-height:1.6;">
            {{ __tr('Complete your profile and start discovering matches near you.') }}
        </p>

        <a href="{{ route('user.login') }}"
           style="display:inline-block;padding:14px 32px;background:#DF0D78;color:#fff;text-decoration:none;border-radius:8px;font-weight:bold;">
            {{ __tr('Log in') }}
        </a>
    </td>
</tr>
