<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Admin extends Model
{
    //
	protected $table = 'users';
	protected $guarded = [

	];

	public function setFirstName($value){
	    $this->attributes['firstname'] = strtolower($value);
    }

    public function getFirstName($value)
    {
        return $this->attributes['firstname'] = ucwords($value);
    }

    public function setLastName($value)
    {
        $this->attributes['lastname'] = strtolower($value);
    }

    public function getLastName($value)
    {
        return $this->attributes['lastname'] = ucwords($value);
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    public static function sendInvite($email, $first_name, $link)
    {
        // To send HTML mail, the Content-type header must be set
        $headers  = "MIME-Version: 1.0 \r\n";
        $headers .= "From: QISIMAH@qisimah.com \r\n";
        $headers .= "Reply-to: admin@qisimah.com \r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";

        return mail($email, 'VERIFY YOUR QISIMAH ACCOUNT', Admin::prepareInvite($first_name, $link), $headers);
	}

    public static function generateVerifyLink($email, $token)
    {
        return URL::to('/account/verify').'/'.$token;
	}

    public static function prepareInvite($first_name, $link)
    {
        return '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="utf-8"> <!-- utf-8 works for most cases -->
	<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn\'t be necessary -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
	<meta name="x-apple-disable-message-reformatting">	<!-- Disable auto-scale in iOS 10 Mail entirely -->
	<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

	<!-- Web Font / @font-face : BEGIN -->
	<!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

	<!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
	<!--[if mso]>
		<style>
			* {
				font-family: sans-serif !important;
			}
		</style>
	<![endif]-->

	<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
	<!--[if !mso]><!-->
		<!-- insert web font reference, eg: <link href=\'https://fonts.googleapis.com/css?family=Roboto:400,700\' rel=\'stylesheet\' type=\'text/css\'> -->
	<!--<![endif]-->

	<!-- Web Font / @font-face : END -->

	<!-- CSS Reset -->
	<style>

		/* What it does: Remove spaces around the email design added by some email clients. */
		/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin:0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}
		table table table {
			table-layout: auto;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		*[x-apple-data-detectors],	/* iOS */
		.x-gmail-data-detectors, 	/* Gmail */
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
		.a6S {
			 display: none !important;
			 opacity: 0.01 !important;
		}
		/* If the above doesn\'t work, add a .g-img class to any image in question. */
		img.g-img + div {
			 display:none !important;
			}

		/* What it does: Prevents underlining the button text in Windows 10 */
		.button-link {
			text-decoration: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you\'d like to fix */
		/* Thanks to Eric Lepetit (@ericlepetitsf) for help troubleshooting */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
			.email-container {
				min-width: 375px !important;
			}
		}

	</style>

	<!-- Progressive Enhancements -->
	<style>

		/* What it does: Hover styles for buttons */
		.button-td,
		.button-a {
			transition: all 100ms ease-in;
		}
		.button-td:hover,
		.button-a:hover {
			background: #555555 !important;
			border-color: #555555 !important;
		}

		/* Media Queries */
		@media screen and (max-width: 600px) {

			.email-container {
				width: 100% !important;
				margin: auto !important;
			}

			/* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
			.fluid {
				max-width: 100% !important;
				height: auto !important;
				margin-left: auto !important;
				margin-right: auto !important;
			}

			/* What it does: Forces table cells into full-width rows. */
			.stack-column,
			.stack-column-center {
				display: block !important;
				width: 100% !important;
				max-width: 100% !important;
				direction: ltr !important;
			}
			/* And center justify these ones. */
			.stack-column-center {
				text-align: center !important;
			}

			/* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
			.center-on-narrow {
				text-align: center !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
			}
			table.center-on-narrow {
				display: inline-block !important;
			}

			/* What it does: Adjust typography on small screens to improve readability */
			.email-container p {
				font-size: 17px !important;
				line-height: 22px !important;
			}

		}

	</style>

	<!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->

</head>
<body width="100%" bgcolor="#222222" style="margin: 0; mso-line-height-rule: exactly;">
	<center style="width: 100%; background: #222222; text-align: left;">

		<!-- Visually Hidden Preheader Text : BEGIN -->
		<div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
			Welcome to Qisimah Audio Insights
		</div>
		<!-- Visually Hidden Preheader Text : END -->

		<!-- Email Body : BEGIN -->
		<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">

			<!-- Hero Image, Flush : BEGIN -->
			<tr>
				<td bgcolor="#ffffff">
					<img src="https://s3-us-west-1.amazonaws.com/qisimahemail/emailbanner1-1200x600.png" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
				</td>
			</tr>
			<!-- Hero Image, Flush : END -->

			<!-- 1 Column Text + Button : BEGIN -->
			<tr>
				<td bgcolor="#ffffff" style="padding: 40px 40px 20px; text-align: center;">
					<h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Hi '.$first_name.'! Welcome to Qisimah Audio Insights</h1>
				</td>
			</tr>
			<tr>
				<td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center;">
					<p style="margin: 0;">Know when your content is aired on radio in real-time with Qisimah. To start this journey, click the button below to setup your password and start uploading your content for monitoring. </p>
				</td>
			</tr>
			<tr>
				<td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
					<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
						<tr>
							<td style="border-radius: 3px; background: #1196f8; text-align: center;" class="button-td">
								<a href="'.$link.'" style="background: #1196f8; border: 15px solid #1196f8; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
									&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ffffff;">Create Password</span>&nbsp;&nbsp;&nbsp;&nbsp;
								</a>
							</td>
						</tr>
					</table>
					<!-- Button : END -->
				</td>
			</tr>
			<!-- 1 Column Text + Button : END -->

			<!-- Background Image with Text : BEGIN -->
			<tr>
				<!-- Bulletproof Background Images c/o https://backgrounds.cm -->
				<td background="https://s3-us-west-1.amazonaws.com/qisimahemail/emailbg600x230.png" bgcolor="#222222" valign="middle" style="text-align: center; background-position: center center !important; background-size: cover !important;">

					<!--[if gte mso 9]>
					<v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:175px; background-position: center center !important;">
					<v:fill type="tile" src="http://placehold.it/600x230/222222/666666" color="#222222" />
					<v:textbox inset="0,0,0,0">
					<![endif]-->
					<div>
						<table role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td valign="middle" style="text-align: center; padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #ffffff;">
									<h2 style="margin: 1;">What is Qisimah?</h2>
									<p style="margin: 0;">Qisimah is a radio content tracking platform that allows content owners: advertisers or musicians to monitor their content on radio in real - time. </p>
								</td>
							</tr>
						</table>
						</div>
					<!--[if gte mso 9]>
					</v:textbox>
					</v:rect>
					<![endif]-->
				</td>
			</tr>
			<!-- Background Image with Text : END -->

			<!-- 3 Even Columns : BEGIN -->
			<tr>
				<td bgcolor="#ffffff" align="center" valign="top" style="padding: 10px;">
					<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<!-- Column : BEGIN -->
							<td width="33.33%" class="stack-column-center">
								<table role="presentation" cellspacing="0" cellpadding="0" border="0">
									<tr>
										<td style="padding: 10px; text-align: center">
											<img src="https://s3-us-west-1.amazonaws.com/qisimahemail/Qisimah-advertiser170x170.png" width="170" height="170" alt="alt_text" border="0" class="fluid" style="height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
										</td>
									</tr>
									<tr>
										<td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 17px; line-height: 21px; color: #333333; font-weight: bold;">For the Advertiser</h2>
											<p style="margin: 0;">We make ad monitoring easy for advertisers and marketers by tracking when and where ads are played. Qisimah also helps you determine how to better target your ads and save on ad spends. </p>
										</td>
									</tr>
								</table>
							</td>
							<!-- Column : END -->
							<!-- Column : BEGIN -->
							<td width="33.33%" class="stack-column-center">
								<table role="presentation" cellspacing="0" cellpadding="0" border="0">
									<tr>
										<td style="padding: 10px; text-align: center">
											<img src="https://s3-us-west-1.amazonaws.com/qisimahemail/Qisimah-musictian170x170.png" width="170" height="170" alt="alt_text" border="0" class="fluid" style="height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
										</td>
									</tr>
									<tr>
										<td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 17px; line-height: 21px; color: #333333; font-weight: bold;">For the Musician</h2>
											<p style="margin: 0;">Get real-time notification on songs played. With our intelligent monitoring system, we are able to tell you who is playing your song, how often they play it and where it is played.</p>
										</td>
									</tr>
								</table>
							</td>
							<!-- Column : END -->
							<!-- Column : BEGIN -->
							<td width="33.33%" class="stack-column-center">
								<table role="presentation" cellspacing="0" cellpadding="0" border="0">
									<tr>
										<td style="padding: 10px; text-align: center">
											<img src="https://s3-us-west-1.amazonaws.com/qisimahemail/Qisimah-hosting170x170.png" width="170" height="170" alt="alt_text" border="0" class="fluid" style="height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
										</td>
									</tr>
									<tr>
										<td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" class="center-on-narrow">
                                            <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 17px; line-height: 21px; color: #333333; font-weight: bold;">For the Radio Station</h2>
											<p style="margin: 0;">Deliver your internet radio stream to any device, anywhere, with ease with Qisimah Hosting. Expand your reach beyond the capabilities of your antenna tower and reach millions of potential listeners worldwide.</p>
										</td>
									</tr>
								</table>
							</td>
							<!-- Column : END -->
						</tr>
					</table>
				</td>
			</tr>
			<!-- 3 Even Columns : END -->


		</table>
		<!-- Email Body : END -->

		<!-- Email Footer : BEGIN -->
		<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
			<tr>
				<td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
					<webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">View as a Web Page</webversion>
					<br><br>
					Qisimah Audio Insights<br>20 Aluguntugui St, Accra<br>+233-50-7230806
					<br><br>
					<unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe>
				</td>
			</tr>
		</table>
		<!-- Email Footer : END -->

		<!-- Full Bleed Background Section : BEGIN -->
		<table role="presentation" bgcolor="#1196f8" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
			<tr>
				<td valign="top" align="center">
					<div style="max-width: 600px; margin: auto;" class="email-container">
						<!--[if mso]>
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
						<tr>
						<td>
						<![endif]-->
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td style="padding: 40px; text-align: left; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #ffffff;">
									<p style="margin: 0;">The information contained in this email may be confidential and/or legally privileged. It has been sent for the sole use of the intended recipient(s). If the reader of this message is not an intended recipient, you are hereby notified that any unauthorized review, use, disclosure, dissemination, distribution, or copying of this communication, or any of its contents, is strictly prohibited. If you have received this communication in error, please reply to the sender and destroy all copies of the message. To contact us directly, send to admin@qisimah.com</p>
								</td>
							</tr>
						</table>
						<!--[if mso]>
						</td>
						</tr>
						</table>
						<![endif]-->
					</div>
				</td>
			</tr>
		</table>
		<!-- Full Bleed Background Section : END -->

	</center>
</body>
</html>
';
	}
}
