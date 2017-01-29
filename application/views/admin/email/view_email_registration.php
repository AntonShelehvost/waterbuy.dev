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
                                                    alt="" src="<?= $base_url ?>assets/img/ico.jpg"></a>
                    <h1 style="font-size: 18px; color: #333333; font-family: Arial;">
                        <b><?=$text_email_hello?>!</b>
                    </h1>
                    <p style="font-size: 14px; color: #333333; font-family: Arial;">
                        <?=$text_email_congratulations?>!
                        <br>
                        <?=$text_email_thank_you?>.
                    </p>
                    <p style="font-size: 14px;color: #333333; font-family: Arial;">
                        <?=$text_email_to_confirm_registration?>:
                    </p>
                    <p style="font-size: 14px;color: #333333; font-family: Arial;">
                        <a style="color: #3399cc; text-decoration: underline;" href="<?=$base_url?>?u=<?=$user_id?>&confirm_code=<?=$confirm_code?>">
                            <?=$base_url?>?u=<?=$user_id?>&confirm_code=<?=$confirm_code?>
                        </a>
                    </p>
                    <p style="font-size: 14px; color: #333333; font-family: Arial;">
                        <?=$text_email_save_access_data?>:
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
                                    <tbody><tr>
                                        <td style="font-size: 18px; color: #333333; font-family: Arial, sans-serif; font-weight: bold; padding-bottom: 12px;"><?=$text_email_login?>:</td>
                                        <td style="font-size: 18px; color: #333333; font-family: Arial, sans-serif; font-weight: bold; padding-bottom: 12px;"><?=$login?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 18px; color: #333333; font-family: Arial, sans-serif; font-weight: bold;"><?=$text_email_password?>:</td>
                                        <td style="font-size: 18px; color: #333333; font-family: Arial, sans-serif; font-weight: bold;"><?=$password?></td>
                                    </tr>
                                    </tbody></table>
                            </td>
                            <td>
                                <div style="padding-left: 15px;">
                                    <a href="<?=$base_url?>?u=<?=$user_id?>&confirm_code=<?=$confirm_code?>" style="border-radius: 5px 5px 5px 5px; display: block; height: 44px; text-align: center; font-weight: bold; font-size:14px; color:#fff; background-color: #ff3333; line-height: 44px; text-decoration: none;font-family: Arial, sans-serif; ">
                                        <?=$text_email_confirm_registration?>
                                    </a>
                                </div>
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