<?php
// Get parameters from URL
$invoice_number = isset($_GET['invoice']) ? $_GET['invoice'] : '';
$secret = isset($_GET['secret']) ? $_GET['secret'] : '';

// Validate parameters
if (empty($invoice_number) || empty($secret)) {
    http_response_code(404);
    die('Invoice not found. Please check the URL and try again.');
}

// Load invoice data from JSON file
$json_file = __DIR__ . '/json/' . $invoice_number . '.json';

if (!file_exists($json_file)) {
    http_response_code(404);
    die('Invoice not found.');
}

$invoice_data = json_decode(file_get_contents($json_file), true);

if (!$invoice_data) {
    http_response_code(500);
    die('Error loading invoice data.');
}

// Verify secret
if ($invoice_data['secret'] !== $secret) {
    http_response_code(403);
    die('Access denied. Invalid credentials.');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
  <title>Invoice - <?php echo htmlspecialchars($invoice_data['invoice_number']); ?></title>
  <style>
    body { margin:0; padding:0; background:#fff; }
    .container { width:100%; background:#fff; }
    .wrapper { width:100%; max-width:720px; margin:0 auto; }
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
    }
    @media print {
      body { background:#ffffff; }
      .card { border:0; page-break-inside:avoid; }
      .muted { color:#111827; }
      .no-print { display:none !important; }
      .wrapper { max-width:100%; page-break-inside:avoid; }
      .table-header { page-break-after:avoid; }
      table[role="presentation"] { page-break-inside:avoid; }
      .px { page-break-inside:avoid; }
    }
  </style>
</head>
<body style="margin:0; padding:0; font-family: 'Segoe UI', Arial, sans-serif; background-color: var(--elridhma-bg); color: var(--elridhma-text);">
  <table role="presentation" width="100%" class="container" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="top">
        <table width="720" align="center" class="wrapper" cellpadding="0" cellspacing="0" style="background: var(--elridhma-white); border-collapse:collapse; border:1px solid var(--elridhma-border); box-shadow: 0 4px 6px var(--elridhma-shadow);">
          <!-- HEADER -->
          <tr>
            <td style="padding:20px; border-bottom:3px solid var(--elridhma-primary); background: linear-gradient(135deg, var(--elridhma-primary) 0%, var(--elridhma-secondary) 100%);">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="vertical-align: middle;">
                    <img src="../../assets/logo/logo.png" alt="Elridhma Logo" style="height: 60px; vertical-align: bottom;">
                    <span style="font-size:24px; font-weight:bold; color: var(--elridhma-white); vertical-align: bottom;"><?php echo htmlspecialchars($invoice_data['company']['name']); ?></span>
                  </td>
                  <td align="right" style="font-size:14px; color: rgba(255,255,255,0.9); line-height: 1.5;">
                    <?php echo htmlspecialchars($invoice_data['company']['address']); ?><br>
                    <span style="color: var(--elridhma-accent);"><?php echo htmlspecialchars($invoice_data['company']['email']); ?></span> | <?php echo htmlspecialchars($invoice_data['company']['website']); ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
      
          <!-- TITLE -->
          <tr>
            <td style="padding:25px 20px; text-align:center; font-size:22px; font-weight:bold; color: var(--elridhma-primary); background: linear-gradient(90deg, var(--elridhma-bg) 0%, var(--elridhma-white) 50%, var(--elridhma-bg) 100%);">
              RECEIPT
            </td>
          </tr>
      
          <!-- INFO -->
          <tr>
            <td style="padding:0 20px 20px 20px;">
              <table width="100%" cellpadding="8" cellspacing="0" style="font-size:14px; color: var(--elridhma-text); border: 1px solid var(--elridhma-border); border-radius: 8px;">
                <tr>
                  <td style="background: var(--elridhma-bg); font-weight:bold; color: var(--elridhma-primary); border-right: 1px solid var(--elridhma-border);">Invoice No:</td>
                  <td style="font-weight: 600;">#<?php echo htmlspecialchars($invoice_data['invoice_number']); ?></td>
                  <td style="background: var(--elridhma-bg); font-weight:bold; color: var(--elridhma-primary); border-right: 1px solid var(--elridhma-border);">Date:</td>
                  <td style="font-weight: 600;"><?php echo htmlspecialchars($invoice_data['date']); ?></td>
                </tr>
                <tr>
                  <td style="background: var(--elridhma-bg); font-weight:bold; color: var(--elridhma-primary); border-right: 1px solid var(--elridhma-border); vertical-align: top;">Bill To:</td>
                  <td colspan="3" style="padding: 10px; background: rgba(30,5,84,0.02); border-radius: 4px;">
                    <strong style="color: var(--elridhma-primary);"><?php echo htmlspecialchars($invoice_data['bill_to']['name']); ?></strong><br>
                    <?php if (!empty($invoice_data['bill_to']['email'])): ?>
                      <span style="color: var(--elridhma-text-secondary);"><?php echo htmlspecialchars($invoice_data['bill_to']['email']); ?></span><br>
                    <?php endif; ?>
                    <span style="color: var(--elridhma-text-secondary);"><?php echo htmlspecialchars($invoice_data['bill_to']['address']); ?></span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
      
          <!-- ITEMS -->
          <tr>
            <td style="padding:0 20px 20px 20px;">
              <table width="100%" cellpadding="10" cellspacing="0" style="border:1px solid var(--elridhma-border); border-collapse:collapse; font-size:14px; border-radius: 8px; overflow: hidden;">
                <tr style="background: linear-gradient(135deg, var(--elridhma-primary) 0%, var(--elridhma-secondary) 100%); color: var(--elridhma-white);">
                  <th align="left" style="padding: 12px 10px; font-weight: 600;">Item No.</th>
                  <th align="left" style="padding: 12px 10px; font-weight: 600;">Description</th>
                  <th align="center" style="padding: 12px 10px; font-weight: 600;">Qty</th>
                  <th align="right" style="padding: 12px 10px; font-weight: 600;">Unit Price (LKR)</th>
                  <th align="right" style="padding: 12px 10px; font-weight: 600;">Amount (LKR)</th>
                </tr>
                <?php foreach ($invoice_data['items'] as $index => $item): ?>
                <tr style="<?php echo ($index % 2 == 0) ? 'background: var(--elridhma-white);' : 'background: var(--elridhma-bg);'; ?> border-bottom: 1px solid var(--elridhma-border);">
                  <td style="color: var(--elridhma-text-secondary);"><?php echo htmlspecialchars($item['item_no']); ?></td>
                  <td>
                    <strong style="color: var(--elridhma-primary);"><?php echo htmlspecialchars($item['description']); ?></strong>
                    <?php if (!empty($item['note'])): ?>
                      <br><em style="color: var(--elridhma-accent); font-size: 12px;"><?php echo htmlspecialchars($item['note']); ?></em>
                    <?php endif; ?>
                  </td>
                  <td align="center" style="color: var(--elridhma-text-secondary);"><?php echo htmlspecialchars($item['quantity']); ?></td>
                  <td align="right" style="color: var(--elridhma-text);"><?php echo number_format($item['unit_price'], 2); ?></td>
                  <td align="right" style="font-weight: 600; color: var(--elridhma-primary);"><?php echo number_format($item['amount'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                  <td colspan="4" align="right" style="background: var(--elridhma-bg); font-weight:bold; color: var(--elridhma-primary); padding: 10px;">Subtotal:</td>
                  <td align="right" style="background: var(--elridhma-bg); font-weight: 600; color: var(--elridhma-primary); padding: 10px;"><?php echo number_format($invoice_data['totals']['subtotal'], 2); ?></td>
                </tr>
                <tr>
                  <td colspan="4" align="right" style="background: var(--elridhma-primary); font-weight:bold; color: var(--elridhma-white); padding: 10px;">Total Paid:</td>
                  <td align="right" style="background: var(--elridhma-primary); font-weight: bold; color: var(--elridhma-white); padding: 10px;"><?php echo number_format($invoice_data['totals']['total_paid'], 2); ?></td>
                </tr>
                <tr>
                  <td colspan="4" align="right" style="background: var(--elridhma-accent); font-weight:bold; color: var(--elridhma-white); padding: 10px;">Balance Due:</td>
                  <td align="right" style="background: var(--elridhma-accent); font-weight: bold; color: var(--elridhma-white); padding: 10px;"><?php echo number_format($invoice_data['totals']['balance_due'], 2); ?></td>
                </tr>
              </table>
            </td>
          </tr>
      
          <!-- NOTES -->
          <tr>
            <td style="padding:20px; font-size:13px; color: var(--elridhma-text-secondary); line-height:1.6; background: var(--elridhma-bg); border-radius: 8px; margin: 0 20px;">
              <strong style="color: var(--elridhma-primary); font-size: 14px;">📋 Notes:</strong><br><br>
              <?php foreach ($invoice_data['notes'] as $note): ?>
              • <?php echo htmlspecialchars($note); ?><br>
              <?php endforeach; ?>
            </td>
          </tr>
      
          <!-- CONTACT INFORMATION -->
          <tr>
            <td style="padding:20px; background: var(--elridhma-bg);">
              <table width="100%" cellpadding="0" cellspacing="0" style="background: var(--elridhma-white); border-radius: 8px; border: 1px solid var(--elridhma-border); overflow: hidden;">
                <tr>
                  <td style="padding: 15px; background: linear-gradient(135deg, var(--elridhma-primary) 0%, var(--elridhma-secondary) 100%); color: var(--elridhma-white); font-weight: 600; font-size: 14px;">
                  Contact Information
                  </td>
                </tr>
                <tr>
                  <td style="padding: 20px;">
                    <table width="100%" cellpadding="0" cellspacing="0" style="font-size: 13px;">
                      <tr>
                        <td width="50%" style="vertical-align: top; padding-right: 15px;">
                          <div style="padding: 15px; border-radius: 8px; background: var(--elridhma-bg); border-left: 4px solid var(--elridhma-primary);">
                            <div style="color: var(--elridhma-text-secondary); font-size: 12px; margin-bottom: 5px;">DIRECTOR</div>
                            <div style="font-weight: 600; color: var(--elridhma-primary); margin-bottom: 2px;">
                              <?php echo htmlspecialchars($invoice_data['signatures']['director']['name']); ?>
                            </div>
                            <div style="color: var(--elridhma-text-secondary); font-size: 11px; margin-bottom: 2px;">
                              <?php echo htmlspecialchars($invoice_data['signatures']['director']['title']); ?>
                            </div>
                            <div style="color: var(--elridhma-accent); font-size: 11px;">
                              <?php echo htmlspecialchars($invoice_data['signatures']['director']['email']); ?>
                            </div>
                          </div>
                        </td>
                        <td width="50%" style="vertical-align: top; padding-left: 15px;">
                          <div style="padding: 15px; border-radius: 8px; background: var(--elridhma-bg); border-left: 4px solid var(--elridhma-accent);">
                            <div style="color: var(--elridhma-text-secondary); font-size: 12px; margin-bottom: 5px;">PREPARED BY</div>
                            <div style="font-weight: 600; color: var(--elridhma-primary); margin-bottom: 2px;">
                              <?php echo htmlspecialchars($invoice_data['signatures']['prepared_by']['name']); ?>
                            </div>
                            <div style="color: var(--elridhma-text-secondary); font-size: 11px; margin-bottom: 2px;">
                              <?php echo htmlspecialchars($invoice_data['signatures']['prepared_by']['title']); ?>
                            </div>
                            <div style="color: var(--elridhma-accent); font-size: 11px;">
                              <?php echo htmlspecialchars($invoice_data['signatures']['prepared_by']['email']); ?>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
      
          <!-- FOOTER -->
          <tr>
            <td style="padding:25px 20px; background: linear-gradient(135deg, var(--elridhma-bg) 0%, var(--elridhma-white) 100%);">
              <table width="100%">
                <tr>
                  <td align="right" style="font-size:14px; color: var(--elridhma-accent); font-weight: 600; vertical-align: top;">
                    <div style="text-align: center; padding: 10px;">
                      💙 Thank you for your business!<br>
                      <span style="font-size: 12px; color: var(--elridhma-text-secondary);">CAAQIT - AI & Technology Solutions</span>
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
</body>
</html>
