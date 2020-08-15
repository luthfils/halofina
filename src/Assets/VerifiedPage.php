<?php namespace Halofina\Assets;

abstract class VerifiedPage {
    public static function get($name)
    {
        $page = self::getHTML();
        $page = str_replace(array('{$NAME}'), array($name), $page);
        return $page;
    }

    private static function getHTML()
    {
        return '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="date=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="x-apple-disable-message-reformatting" />
	<style type="text/css" media="screen">
		/* Linked Styles */
		body { padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#ffffff; -webkit-text-size-adjust:none }
		a { color:#66b7f0; text-decoration:none }
		p { padding:0 !important; margin:0 !important } 
		img { -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
		.mcnPreviewText { display: none !important; }
		
		/** Regular */
		@font-face {
		  font-family: "SF Display";
		  font-weight: 400;
		  src: url("https://sf.abarba.me/SF-UI-Display-Regular.otf");
		}
		
		/* Mobile styles */
		@media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
			.mobile-shell { width: 100% !important; min-width: 100% !important; }
			
			.m-center { text-align: center !important; }
			
			.center { margin: 0 auto !important; }
			
			.td { width: 100% !important; min-width: 100% !important; }

			.m-br-3 { height: 3px !important; }
			.m-br-4 { height: 4px !important; background: #f4f4f4 !important; }
			.m-br-15 { height: 15px !important; }
			.m-br-25 { height: 25px !important; }

			.m-td,
			.m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

			.m-block { display: block !important; }

			.fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

			.column-top,
			.column { float: left !important; width: 100% !important; display: block !important; }

			.content-spacing { width: 15px !important; }

			.m-bg { display: block !important; width: 100% !important; height: auto !important; background-position: center center !important; }

			.h-auto { height: auto !important; }

			.plr-15 { padding-left: 15px !important; padding-right: 15px !important; }

			.w-2 { width: 2% !important; }
			.w-49 { width: 49% !important; }

			.pb-4 { padding-bottom: 4px !important; }
			.pb-15 { padding-bottom: 15px !important; }

			.pt-0 { padding-top: 0 !important; }

			

			.text-btn-large,
			.text-btn-large-white { padding: 15px 25px !important; }
			.text-btn,
			.text-btn-1,
			.text-btn-1-white { padding: 12px 15px !important; }
		}
	</style>
</head>
<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#ffffff; -webkit-text-size-adjust:none;">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
		<tr>
			<td align="center" valign="top">
			<!-- Top -->
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="img" height="300" bgcolor="#f4f4f4" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
					</tr>
				</table>
				<!-- END Top -->
				<!-- Main -->
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>
							<div mc:repeatable="Select" mc:variant="Section - Callout">
								<!-- Section - Callout -->
								<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="">
									<tr>
										<td align="center" valign="top">
											<table width="670" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
												<tr>
													<td>
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td>
																	
																	<div >
																		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:-300px; position: relative;">
																			<tr>
																				<td class="h-auto plr-15" height="auto" style="padding: 0px 0;">
																					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.09); border-radius: 5px;" bgcolor="#ffffff">
																						<tr>
																							
																							<td class="plr-15" style="padding: 30px 100px;">
																								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 30px;">
																									<center>
																									<img src="https://halofina.com/img/verify/banner-min2.png" class="fluid-img" width="100%" height="auto" mc:edit="image_2" border="0" alt="" />
																									</center>
																									<tr>
																										<td class="h1 fw-medium" style="color:#51AAF4; font-family:\'SF Display\', Arial,sans-serif; font-size:26px; text-align:center; font-weight:600; padding: 0px 0px 20px;">
																											<div mc:edit="text_33">
																												Terima Kasih, {$NAME}.<br/> Password Barumu Telah Terverifikasi
																											</div>
																										</td>
																									</tr>
																									<tr>
																										<td class="h2 fw-medium" style="color:#919191; font-family:\'SF Display\', Arial,sans-serif; font-size:26px; text-align:center; font-weight:700;">
																											<div mc:edit="text_33">
																												Segera Gunakan Password Barumu untuk Login
																											</div>
																										</td>
																									</tr>
																								</table>
																							</td>
																							
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</div>
																	
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- END Section - Callout -->
							</div>
						</td>
					</tr>
				</table>
				<!-- END Main -->

				<!-- Footer -->
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center" valign="top">
							<table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
								<tr>
									<td class="plr-15" style="padding: 40px 30px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<th class="column-top" valign="top" width="225" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="text-footer-1 to-right m-center" style="color:#919191; font-family:\'SF Display\', Arial,sans-serif; font-size:12px; line-height:22px; text-align:left;">
																<div mc:edit="text_36">
																	<span class="link-4" style="color:#919191; text-decoration:none;">
																		PT. Akselerasi Edukasi Internasional </br>
																		Jl. Ir. H. Djuanda No. 299, Dago, Coblong </br>
																		Kota Bandung 40135 </br>
																		(022) 20457263
																	</span>
																</div>
															</td>
														</tr>
													</table>
												</th>
												<th class="column-top" valign="top" width="15" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"><div style="font-size:0pt; line-height:0pt;" class="m-br-15"></div>
												</th>
												<th class="column-top" valign="top" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td align="right" style="padding: 15px 0 25px 0;">
																<!-- Socials -->
																<table border="0" cellspacing="0" cellpadding="0" class="center">
																	<tr>
																		<td class="img" width="11" style="font-size:0pt; line-height:0pt; text-align:left;">
																			<a href="https://www.facebook.com/halofina.id" target="_blank">
																				<img src="https://halofina.com/img/verify/social/facebook.png" width="11" height="22" mc:edit="image_11" style="max-width:11px;" border="0" alt="" />
																			</a>
																		</td>
																		<td class="img" width="36" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
																		<td class="img" width="23" style="font-size:0pt; line-height:0pt; text-align:left;">
																			<a href="https://twitter.com/halofina_id" target="_blank">
																				<img src="https://halofina.com/img/verify/social/twitter.png" width="23" height="22" mc:edit="image_12" style="max-width:23px;" border="0" alt="" />
																			</a>
																		</td>
																		<td class="img" width="36" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
																		<td class="img" width="22" style="font-size:0pt; line-height:0pt; text-align:left;">
																			<a href="https://www.instagram.com/halofina.id/" target="_blank">
																				<img src="https://halofina.com/img/verify/social/instagram.png" width="22" height="22" mc:edit="image_13" style="max-width:22px;" border="0" alt="" />
																			</a>
																		</td>
																		<td class="img" width="36" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
																		<td class="img" width="23" style="font-size:0pt; line-height:0pt; text-align:left;">
																			<a href="https://www.linkedin.com/company/halofina/" target="_blank">
																				<img src="https://halofina.com/img/verify/social/linkedin.png" width="22" height="22" mc:edit="image_15" style="max-width:23px;" border="0" alt="" />
																			</a>
																		</td>
																		<td class="img" width="36" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
																		<td class="img" width="23" style="font-size:0pt; line-height:0pt; text-align:left;">
																			<a href="https://www.youtube.com/channel/UCBAinTUPp8bPO9ZqEh8aTjw" target="_blank">
																				<img src="https://halofina.com/img/verify/social/youtube.png" width="26" height="22" mc:edit="image_15" style="max-width:23px;" border="0" alt="" />
																			</a>
																		</td>
																	</tr>
																</table>
																<!-- END Socials -->
															</td>
														</tr>
														<tr>
															<td class="text-footer-1 to-right m-center" style="color:#919191; font-family:\'SF Display\', Arial,sans-serif; font-size:12px; line-height:22px; text-align:right;">
																<div mc:edit="text_36">
																	<a href="https://mail.google.com/mail/?view=cm&fs=1&to=admin@halofina.com" target="_blank">
																		<span class="link-4" style="color:#919191; text-decoration:none;">admin@halofina.com</span>
																	</a>
																</div>
															</td>
														</tr>
													</table>
												</th>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<!-- END Footer -->
			</td>
		</tr>
	</table>
</body>
</html>

        ';
    }
}
