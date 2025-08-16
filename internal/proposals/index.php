<?php
// Get parameters from URL
$proposal_number = isset($_GET['proposal']) ? $_GET['proposal'] : '1';
$secret = isset($_GET['secret']) ? $_GET['secret'] : '';

// Validate proposal number
if (empty($proposal_number)) {
    http_response_code(404);
    die('Proposal not found. Please check the URL and try again.');
}

// Load proposal data from JSON file
$json_file = __DIR__ . '/json/' . $proposal_number . '.json';

if (!file_exists($json_file)) {
    http_response_code(404);
    die('Proposal not found.');
}

$proposal_data = json_decode(file_get_contents($json_file), true);

if (!$proposal_data) {
    http_response_code(500);
    die('Error loading proposal data.');
}

// Verify secret if provided
if (!empty($secret) && $proposal_data['secret'] !== $secret) {
    http_response_code(403);
    die('Access denied. Invalid credentials.');
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
  <title>Project Proposal <?php echo htmlspecialchars($proposal_data['proposal_number']); ?> – CAAQIT (PVT) LTD</title>
  <!--
    Email-friendly, table-based layout. All styling inline where practical.
    Designed for both email viewing and printing.
  -->
  <style type="text/css">
    /* These styles are respected by most modern email clients and also help with printing. */
    :root {
      --elridhma-primary: #5323a7;
      --elridhma-secondary: #2b1058ff;
      --elridhma-accent: #FFD600;
      --elridhma-text: #5323a7;
      --elridhma-text-secondary: #64748b;
      --elridhma-border: #e2e8f0;
      --elridhma-bg: #f8fafc;
      --elridhma-white: #fff;
      --elridhma-shadow: rgba(30,5,84,0.1);
      --elridhma-red-shadow: rgba(220, 38, 38, 0.2);
      --elridhma-green-shadow: rgba(5, 150, 105, 0.2);
      --elridhma-gradient: linear-gradient(135deg, var(--elridhma-primary), var(--elridhma-secondary));
      --elridhma-light-border: #e5e7eb;
      --elridhma-muted-text: #6b7280;
      --elridhma-dark-text: #111827;
      --elridhma-light-bg: #f4f5f7;
      --elridhma-success-bg: #ecfdf5;
      --elridhma-success-text: #065f46;
      --elridhma-success-border: #a7f3d0;
      --elridhma-warning-bg: #FFD600;
      --elridhma-warning-border: #FFD600;
      --elridhma-link-color: #93c5fd;
      --elridhma-light-text: #d1d5db;
      --elridhma-very-light-text: #e5e7eb;
      --elridhma-dashed-border: #9ca3af;
    }
    body { margin:0; padding:0; background:var(--elridhma-white); }
    /* background:var(--elridhma-light-bg); */
    table { border-collapse:collapse; }
    img { border:0; outline:none; text-decoration:none; display:block; }
    .container { width:100%; background:var(--elridhma-white); }
    .wrapper { width:100%; max-width:720px; margin:0 auto; }
    .card { background:var(--elridhma-white); border:1px solid var(--elridhma-light-border); }
    .px { padding-left:24px; padding-right:24px; }
    .py { padding-top:20px; padding-bottom:20px; }
    .h1 { font-family:Arial, Helvetica, sans-serif; font-size:26px; line-height:1.2; color:var(--elridhma-dark-text); }
    .h2 { font-family:Arial, Helvetica, sans-serif; font-size:20px; line-height:1.3; color:var(--elridhma-dark-text); }
    .h3 { font-family:Arial, Helvetica, sans-serif; font-size:16px; line-height:1.4; color:var(--elridhma-dark-text); }
    .muted { color:var(--elridhma-muted-text); font-family:Arial, Helvetica, sans-serif; font-size:13px; }
    .text { color:var(--elridhma-dark-text); font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:1.6; }
    .tag { font-family:Arial, Helvetica, sans-serif; font-size:12px; color:var(--elridhma-dark-text); background:var(--elridhma-success-bg); border:1px solid var(--elridhma-success-border); border-radius:999px; padding:4px 10px; display:inline-block; }
    .btn { font-family:Arial, Helvetica, sans-serif; font-size:14px; color:var(--elridhma-white); text-decoration:none; background:var(--elridhma-gradient); border-radius:6px; padding:10px 14px; display:inline-block; }
    .hr { height:1px; background:var(--elridhma-light-border); }
    .table-header { background:var(--elridhma-gradient); color:var(--elridhma-white); font-family:Arial, Helvetica, sans-serif; font-size:12px; letter-spacing:.04em; text-transform:uppercase; }
    .chip { background:var(--elridhma-success-bg); color:var(--elridhma-success-text); border:1px solid var(--elridhma-success-border); font-size:12px; padding:6px 10px; border-radius:999px; font-family:Arial, Helvetica, sans-serif; display:inline-block; }

    @media print {
      body { background:var(--elridhma-white); }
      .card { border:0; page-break-inside:avoid; }
      .muted { color:var(--elridhma-dark-text); }
      .no-print { display:none !important; }
      .wrapper { max-width:100%; page-break-inside:avoid; }
      .table-header { page-break-after:avoid; }
      table[role="presentation"] { page-break-inside:avoid; }
      .px { page-break-inside:avoid; }
    }
  </style>
  
  <?php if (isset($_GET['print'])): ?>
  <script>
    window.onload = function() {
      window.print();
    };
  </script>
  <?php endif; ?>
</head>
<body>
  <!-- Full-bleed background layer -->
  <table role="presentation" width="100%" class="container" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="top">
        
        <!-- PDF Download Button -->
        <!-- <table role="presentation" width="720" class="wrapper no-print" cellpadding="0" cellspacing="0" style="margin:12px auto;">
          <tr>
            <td align="center" style="padding:0 24px;">
              <a href="<?php echo htmlspecialchars($proposal_number); ?>.pdf.php" target="_blank" class="btn" style="background:var(--elridhma-warning-bg); color:var(--elridhma-white); text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; border-radius:8px; padding:12px 24px; display:inline-block; box-shadow:0 4px 6px var(--elridhma-red-shadow);">
                📄 Download PDF Version
              </a>
              <br><br>
              <a href="?proposal=<?php echo htmlspecialchars($proposal_number); ?>&print=1" onclick="window.print(); return false;" class="btn" style="background:var(--elridhma-success-text); color:var(--elridhma-white); text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; border-radius:8px; padding:12px 24px; display:inline-block; box-shadow:0 4px 6px var(--elridhma-green-shadow); margin-left:10px;">
                🖨️ Print Version
              </a>
            </td>
          </tr>
        </table> -->

        <!-- Header / Cover Card -->
        <table role="presentation" width="720" class="wrapper card" cellpadding="0" cellspacing="0" style="margin:0 auto 12px auto; border-radius:0px; overflow:hidden;">
          <tr>
            <td style="background:var(--elridhma-gradient);">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="px py" style="padding-top:28px; padding-bottom:28px;">
                    <table role="presentation" width="100%">
                      <tr>
                        <td valign="middle" class="h1" style="color:var(--elridhma-white); font-weight:bold;">
                          <img src="../../assets/logo/logo.png" alt="Elridhma Logo" style="height:60px; vertical-align:bottom; display:inline-block;">
                          <span style="vertical-align:bottom; font-size:24px; line-height:1;"><?php echo htmlspecialchars($proposal_data['company']['name']); ?></span>
                        </td>
                        <td valign="middle" align="right">
                          <span class="tag" style="background:var(--elridhma-warning-bg); border-color:var(--elridhma-warning-border); color:var(--elridhma-dark-text); font-weight:bold;">Proposal</span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" style="padding-top:8px;">
                          <div class="h2" style="color:var(--elridhma-very-light-text);"><?php echo htmlspecialchars($proposal_data['proposal']['title']); ?></div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" style="padding-top:14px;">
                          <table role="presentation" width="100%">
                            <tr>
                              <td class="muted" style="color:var(--elridhma-light-text);" valign="bottom">
                                <strong>Prepared for:</strong> <?php echo htmlspecialchars($proposal_data['client']['name']); ?><br/>
                                <?php echo htmlspecialchars($proposal_data['client']['address']); ?>
                              </td>
                              <td class="muted" align="right" style="color:var(--elridhma-light-text);" valign="bottom">
                                <strong>Prepared by:</strong> <?php echo htmlspecialchars($proposal_data['company']['name']); ?><br/>
                                <a href="http://<?php echo htmlspecialchars($proposal_data['company']['website']); ?>" style="color:var(--elridhma-link-color); text-decoration:none;"><?php echo htmlspecialchars($proposal_data['company']['website']); ?></a><br/>
                                <?php echo htmlspecialchars($proposal_data['company']['address']); ?>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="px py">
              <table role="presentation" width="100%">
                <tr>
                  <td class="text">
                    <?php foreach ($proposal_data['introduction']['paragraphs'] as $paragraph): ?>
                      <p class="text" style="margin:0 0 12px 0;"><?php echo htmlspecialchars($paragraph); ?></p>
                    <?php endforeach; ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!-- Free Package -->
        <table role="presentation" width="720" class="wrapper card" cellpadding="0" cellspacing="0" style="margin:12px auto; border-radius:0px; overflow:hidden;">
          <tr>
            <td class="table-header px py" style="background:var(--elridhma-gradient); color:var(--elridhma-white);">
              <strong><?php echo htmlspecialchars($proposal_data['free_package']['title']); ?></strong>
            </td>
          </tr>
          <tr>
            <td class="px py">
              <table role="presentation" width="100%">
                <tr>
                  <td class="text" style="padding-bottom:6px;"><span class="chip">Included (Free)</span></td>
                </tr>
                <tr>
                  <td>
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid var(--elridhma-light-border);">
                      <?php foreach ($proposal_data['free_package']['features'] as $index => $feature): ?>
                      <tr>
                        <td class="text" style="padding:10px; width:40px; <?php echo ($index < count($proposal_data['free_package']['features']) - 1) ? 'border-bottom:1px solid var(--elridhma-light-border);' : ''; ?>">•</td>
                        <td class="text" style="padding:10px; <?php echo ($index < count($proposal_data['free_package']['features']) - 1) ? 'border-bottom:1px solid var(--elridhma-light-border);' : ''; ?>">
                          <strong><?= htmlspecialchars($feature['name']); ?></strong>
                          <?php if (!empty($feature['description'])): ?>
                          <?= htmlspecialchars($feature['description']); ?>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td class="text" style="padding-top:14px;">
                    <?= $proposal_data['free_package']['hosting_note']['title']; ?>
                  </td>
                </tr>
                <tr>
                  <td style="padding-top:8px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid var(--elridhma-light-border);">
                      <?php foreach ($proposal_data['free_package']['hosting_note']['costs'] as $index => $cost): ?>
                      <tr>
                        <td class="text" style="padding:10px; width:50%; border-right:1px solid var(--elridhma-light-border); <?= ($index < count($proposal_data['free_package']['hosting_note']['costs']) - 1) ? 'border-bottom:1px solid var(--elridhma-light-border);' : '' ?>"><?= htmlspecialchars($cost['item']); ?></td>
                        <td class="text" style="padding:10px; <?= ($index < count($proposal_data['free_package']['hosting_note']['costs']) - 1) ? 'border-bottom:1px solid var(--elridhma-light-border);' : '' ?>"><?= htmlspecialchars($cost['price']); ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!-- Why We Do This / Terms -->
        <table role="presentation" width="720" class="wrapper card" cellpadding="0" cellspacing="0" style="margin:12px auto; border-radius:0px; overflow:hidden;">
          <tr>
            <td class="table-header px py" style="background:var(--elridhma-gradient); color:var(--elridhma-white);">
              <strong>Why We Do This</strong>
            </td>
          </tr>
          <tr>
            <td class="px py text">
              <?= $proposal_data['why_we_do_this']['content']; ?>
            </td>
          </tr>
          <tr>
            <td class="table-header px py" style="background:var(--elridhma-gradient); color:var(--elridhma-white);">
              <strong>Terms of Free Website Offer</strong>
            </td>
          </tr>
          <tr>
            <td class="px py">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid var(--elridhma-light-border);">
                <?php foreach ($proposal_data['terms'] as $term): ?>
                  <tr>
                    <td class="text" style="padding:12px; width:36px; border-bottom:1px solid var(--elridhma-light-border); vertical-align:top;"><?= htmlspecialchars($term['number']); ?>.</td>
                    <td class="text" style="padding:12px; border-bottom:1px solid var(--elridhma-light-border);">
                      <strong><?= htmlspecialchars($term['title']); ?></strong><br/>
                      <?= nl2br(htmlspecialchars($term['content'])); ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </td>
          </tr>
        </table>

        <!-- Next Steps -->
        <table role="presentation" width="720" class="wrapper card" cellpadding="0" cellspacing="0" style="margin:12px auto; border-radius:0px; overflow:hidden;">
          <tr>
            <td class="table-header px py" style="background:var(--elridhma-gradient); color:var(--elridhma-white);">
              <strong>Next Steps</strong>
            </td>
          </tr>
          <tr>
            <td class="px py">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid var(--elridhma-light-border);">
                <?php foreach ($proposal_data['next_steps'] as $index => $step): ?>
                <tr>
                  <td class="text" style="padding:10px; width:36px; border-bottom:1px solid var(--elridhma-light-border); <?= ($index < count($proposal_data['next_steps']) - 1) ? '' : 'border-bottom: none;' ?>">•</td>
                  <td class="text" style="padding:10px; border-bottom:1px solid var(--elridhma-light-border); <?= ($index < count($proposal_data['next_steps']) - 1) ? '' : 'border-bottom: none;' ?>"><?= htmlspecialchars($step['step']); ?></td>
                </tr>
                <?php endforeach; ?>
              </table>
            </td>
          </tr>
        </table>

        <!-- Optional Add-ons Pricing Table -->
        <table role="presentation" width="720" class="wrapper card" cellpadding="0" cellspacing="0" style="margin:12px auto; border-radius:0px; overflow:hidden;">
          <tr>
            <td class="table-header px py" style="background:var(--elridhma-gradient); color:var(--elridhma-white);">
              <strong>Optional Add‑on Features</strong>
            </td>
          </tr>
          <tr>
            <td class="px py">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid var(--elridhma-light-border);">
                <?php foreach ($proposal_data['addon_features'] as $index => $add_on): ?>
                <tr>
                  <td class="text" style="padding:10px; border-bottom:1px solid var(--elridhma-light-border); width:40%; <?= ($index < count($proposal_data['addon_features']) - 1) ? '' : 'border-bottom: none;' ?>"><?= htmlspecialchars($add_on['feature']); ?></td>
                  <td class="text" style="padding:10px; border-bottom:1px solid var(--elridhma-light-border); <?= ($index < count($proposal_data['addon_features']) - 1) ? '' : 'border-bottom: none;' ?>"><?= nl2br(htmlspecialchars($add_on['description'])); ?></td>
                  <td class="text" style="padding:10px; border-bottom:1px solid var(--elridhma-light-border); width:24%; <?= ($index < count($proposal_data['addon_features']) - 1) ? '' : 'border-bottom: none;' ?>"><?= htmlspecialchars($add_on['price']); ?></td>
                </tr>
                <?php endforeach; ?>
              </table>
            </td>
          </tr>
        </table>

        <!-- Bank Details -->
        <table role="presentation" width="720" class="wrapper card" cellpadding="0" cellspacing="0" style="margin:12px auto; border-radius:0px; overflow:hidden;">
          <tr>
            <td class="table-header px py" style="background:var(--elridhma-gradient); color:var(--elridhma-white);">
              <strong>Bank Account Details</strong>
            </td>
          </tr>
          <tr>
            <td class="px py">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid var(--elridhma-light-border);">
                <tr>
                  <td class="text" style="padding:10px; width:35%; border-bottom:1px solid var(--elridhma-light-border);">Bank Name</td>
                  <td class="text" style="padding:10px; border-bottom:1px solid var(--elridhma-light-border);"><?php echo htmlspecialchars($proposal_data['bank_details']['bank_name']); ?></td>
                </tr>
                <tr>
                  <td class="text" style="padding:10px; width:35%; border-bottom:1px solid var(--elridhma-light-border);">Branch</td>
                  <td class="text" style="padding:10px; border-bottom:1px solid var(--elridhma-light-border);"><?php echo htmlspecialchars($proposal_data['bank_details']['bank_branch']); ?></td>
                </tr>
                <tr>
                  <td class="text" style="padding:10px; width:35%; border-bottom:1px solid var(--elridhma-light-border);">Account Name</td>
                  <td class="text" style="padding:10px; border-bottom:1px solid var(--elridhma-light-border);"><?php echo htmlspecialchars($proposal_data['bank_details']['account_name']); ?></td>
                </tr>
                <tr>
                  <td class="text" style="padding:10px; width:35%;">Account Number</td>
                  <td class="text" style="padding:10px;"><?php echo htmlspecialchars($proposal_data['bank_details']['account_number']); ?></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!-- Agreement & Acknowledgment -->
        <table role="presentation" width="720" class="wrapper card" cellpadding="0" cellspacing="0" style="margin:12px auto; border-radius:0px; overflow:hidden;">
          <tr>
            <td class="table-header px py" style="background:var(--elridhma-gradient); color:var(--elridhma-white);">
              <strong>Agreement & Acknowledgment</strong>
            </td>
          </tr>
          <tr>
            <td class="px py text">
              By signing below, you acknowledge the details outlined in this proposal, including the free service offer, associated conditions, and any optional add‑ons as discussed.
            </td>
          </tr>
          <tr>
            <td class="px py">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid var(--elridhma-light-border);">
                <tr>
                  <td class="text" style="padding:12px; width:50%; vertical-align:top; border-right:1px solid var(--elridhma-light-border);">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="muted" style="padding-bottom:6px;"><strong>Client Name</strong></td>
                      </tr>
                      <tr>
                        <td class="text" style="padding-bottom:18px;"><?= htmlspecialchars($proposal_data['client']['name']); ?></td>
                      </tr>
                      <tr>
                        <td class="muted" style="padding-bottom:6px;"><strong>Signature</strong></td>
                      </tr>
                      <tr>
                        <td style="height:60px; border:1px dashed var(--elridhma-dashed-border);"></td>
                      </tr>
                      <tr>
                        <td class="muted" style="padding-top:8px;">Date</td>
                      </tr>
                    </table>
                  </td>
                  <td class="text" style="padding:12px; vertical-align:top;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="muted" style="padding-bottom:6px;"><strong>Role</strong></td>
                      </tr>
                      <tr>
                        <td class="text" style="padding-bottom:18px;">Director</td>
                      </tr>
                      <tr>
                        <td class="muted" style="padding-bottom:6px;"><strong>Signature</strong></td>
                      </tr>
                      <tr>
                        <td style="height:60px; border:1px dashed var(--elridhma-dashed-border); position:relative;">
                          <img src="/assets/stamps/company-stamp.png" alt="Company Stamp" style="position:absolute; left:50%; top:-180px; transform:translateX(-50%) rotate(-8deg); max-width:120px; max-height:120px; opacity:0.85; pointer-events:none;">
                          <img src="/assets/stamps/director-stamp.png" alt="Director Stamp" style="position:absolute; left:45%; top: -30px; transform:translateX(-50%); max-width:200px; max-height:200px; opacity:0.85; pointer-events:none;">
                        </td>
                      </tr>
                      <tr>
                        <td class="muted" style="padding-top:8px;">Date</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!-- Contact -->
        <table role="presentation" width="720" class="wrapper card" cellpadding="0" cellspacing="0" style="margin:12px auto 24px auto; border-radius:0px; overflow:hidden;">
          <tr>
            <td class="table-header px py" style="background:var(--elridhma-gradient); color:var(--elridhma-white);">
              <strong>Contact</strong>
            </td>
          </tr>
          <tr>
            <td class="px py">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="text" style="padding:6px 0; width:35%;"><?php echo htmlspecialchars($proposal_data['contact']['director']['title']); ?></td>
                  <td class="text" style="padding:6px 0;"><a href="mailto:<?php echo htmlspecialchars($proposal_data['contact']['director']['email']); ?>" style="color:var(--elridhma-dark-text); text-decoration:none;"><?php echo htmlspecialchars($proposal_data['contact']['director']['email']); ?></a></td>
                </tr>
                <tr>
                  <td class="text" style="padding:6px 0;"><?php echo htmlspecialchars($proposal_data['contact']['technical_manager']['title']); ?></td>
                  <td class="text" style="padding:6px 0;"><a href="mailto:<?php echo htmlspecialchars($proposal_data['contact']['technical_manager']['email']); ?>" style="color:var(--elridhma-dark-text); text-decoration:none;"><?php echo htmlspecialchars($proposal_data['contact']['technical_manager']['email']); ?></a></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!-- Footer note -->
        <table role="presentation" width="720" class="wrapper" cellpadding="0" cellspacing="0" style="margin:0 auto 32px auto;">
          <tr>
            <td align="center" class="muted" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:var(--elridhma-muted-text);">
              © CAAQIT (PVT) LTD — www.elridhma.com — info@elridhma.com
            </td>
          </tr>
        </table>

      </td>
    </tr>
  </table>
</body>
</html>
