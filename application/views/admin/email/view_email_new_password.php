<html>
<head></head>
<body>
<div style="width:650px">
    <table width="650px" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td align="left" style="border: 1px solid #f0f0f0;">
                <div style="padding-left: 50px; padding-top: 50px; padding-right: 50px; padding-bottom: 15px;">
                    <a href="<?= $base_url ?>"><img width="120" height="89" style="margin-bottom: 15px; border:0;"
                                                    alt="" src="<?= $base_url ?>/assets/img/ico.jpg"></a>
                    <h1 style="font-size: 18px; color: #333333; font-family: Arial;">
                        <b><?=$text_email_hello?>!</b>
                    </h1>
                    <p style="font-size: 14px; color: #333333; font-family: Arial;">
                        <?=$text_email_new_pass_text1?>.
                        <br>
                    </p>
                    <p style="font-size: 14px; color: #333333; font-family: Arial;">
                        <?=$text_email_new_pass_save_access_data?>:
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td align="left" style="background-color: #cccccc;">
                <div style="padding-left: 50px; padding-top: 12px; padding-right: 50px; padding-bottom: 12px;">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td>
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                    <tr width="25%">
                                        <td style="font-size: 18px; color: #333333; font-family: Arial, sans-serif; font-weight: bold; padding-bottom: 12px;"><?=$text_email_login?>:</td>
                                        <td style="font-size: 18px; color: #333333; font-family: Arial, sans-serif; font-weight: bold; padding-bottom: 12px;"><?=$login?></td>
                                    </tr>
                                    <tr width="75%">
                                        <td style="font-size: 18px; color: #333333; font-family: Arial, sans-serif; font-weight: bold;"><?=$text_email_password?>:</td>
                                        <td style="font-size: 18px; color: #333333; font-family: Arial, sans-serif; font-weight: bold;"><?=$password?></td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>